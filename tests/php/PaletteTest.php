<?php
/**
 * Tests for the palette fallbacks.
 *
 * @package Aludra
 */

use PHPUnit\Framework\TestCase;

/**
 * Covers which Aludra colour slugs are filled in for a theme, and from what.
 * Palettes are copied from the themes' theme.json files.
 */
class PaletteTest extends TestCase {

	/**
	 * Build palette entries from slug => colour pairs.
	 *
	 * @param string[] $colors Colour per slug.
	 * @return array[] Palette entries.
	 */
	private function palette( $colors ) {
		$entries = array();
		foreach ( $colors as $slug => $color ) {
			$entries[] = array(
				'slug'  => $slug,
				'color' => $color,
			);
		}
		return $entries;
	}

	/**
	 * Twenty Twenty-Five 1.5.
	 *
	 * @return array[] Palette entries.
	 */
	private function tt5() {
		return $this->palette(
			array(
				'base'     => '#FFFFFF',
				'contrast' => '#111111',
				'accent-1' => '#FFEE58',
				'accent-2' => '#F6CFF4',
				'accent-3' => '#503AA8',
				'accent-4' => '#686868',
				'accent-5' => '#FBFAF3',
				'accent-6' => 'color-mix(in srgb, currentColor 20%, transparent)',
			)
		);
	}

	/**
	 * Aviendha defines every slug, so nothing is printed.
	 */
	public function test_theme_defining_every_slug_gets_nothing() {
		$aviendha = $this->palette(
			array(
				'base'           => '#FAF7F2',
				'tertiary'       => '#F0E9DD',
				'border-light'   => '#E5DED2',
				'contrast'       => '#211C1A',
				'main'           => '#2B1A20',
				'primary'        => '#9F1239',
				'accent'         => '#4D7C0F',
				'secondary'      => '#57534E',
				'main-accent'    => '#6F6862',
				'primary-accent' => '#FDE8EC',
				'primary-alt'    => '#7F0F2E',
				'white'          => '#FFFFFF',
				'terracotta'     => '#C2410C',
				'sand-deep'      => '#D6C7AE',
			)
		);

		$this->assertSame( array(), aludra_palette_fallback_map( $aviendha ) );
		$this->assertSame( '', aludra_palette_fallback_css( aludra_palette_fallback_map( $aviendha ) ) );
	}

	/**
	 * Twenty Twenty-Five: the brand is the first accent white text is legible on.
	 */
	public function test_tt5_brand_skips_pale_accents() {
		$map = aludra_palette_fallback_map( $this->tt5() );

		// Yellow accent-1 and pink accent-2 fail contrast with white text.
		$this->assertSame( 'var(--wp--preset--color--accent-3)', $map['primary'] );
		$this->assertSame( 'var(--wp--preset--color--contrast)', $map['main'] );
	}

	/**
	 * Slugs the theme defines are never overridden.
	 */
	public function test_slugs_the_theme_defines_are_left_alone() {
		$map = aludra_palette_fallback_map( $this->tt5() );

		$this->assertArrayNotHasKey( 'base', $map );
		$this->assertArrayNotHasKey( 'contrast', $map );
	}

	/**
	 * Twenty Twenty-Four: with no 4.5:1 brand colour, 3:1 is accepted.
	 */
	public function test_tt4_falls_back_to_three_to_one_for_brand() {
		$tt4 = $this->palette(
			array(
				'base'       => '#F9F9F9',
				'base-2'     => '#FFFFFF',
				'contrast'   => '#111111',
				'contrast-2' => '#636363',
				'contrast-3' => '#A4A4A4',
				'accent'     => '#CFCABE',
				'accent-2'   => '#C2A990',
				'accent-3'   => '#D8613C',
				'accent-4'   => '#B1C5A4',
				'accent-5'   => '#B5BDBC',
			)
		);

		$map = aludra_palette_fallback_map( $tt4 );

		// No saturated colour reaches 4.5:1; the grey contrast-2 does, but greys are skipped.
		$this->assertSame( 'var(--wp--preset--color--accent-3)', $map['primary'] );
		// TT4 defines `accent` itself, so it is not remapped.
		$this->assertArrayNotHasKey( 'accent', $map );
	}

	/**
	 * A palette without `contrast` gets its darkest colour.
	 */
	public function test_missing_contrast_uses_darkest_colour() {
		$map = aludra_palette_fallback_map(
			$this->palette(
				array(
					'base'    => '#FFFFFF',
					'primary' => '#1E40AF',
					'main'    => '#0B1120',
				)
			)
		);

		$this->assertSame( 'var(--wp--preset--color--main)', $map['contrast'] );
		$this->assertArrayNotHasKey( 'primary', $map );
		$this->assertArrayNotHasKey( 'main', $map );
	}

	/**
	 * With no palette at all, literal neutrals are used.
	 */
	public function test_empty_palette_gets_literal_base_and_contrast() {
		$map = aludra_palette_fallback_map( array() );

		$this->assertSame( '#ffffff', $map['base'] );
		$this->assertSame( '#111111', $map['contrast'] );
		$this->assertSame( 'var(--wp--preset--color--contrast)', $map['primary'] );
	}

	/**
	 * No slug resolves to its own variable, which would be a cycle.
	 */
	public function test_no_slug_is_mapped_onto_itself() {
		foreach ( aludra_palette_fallback_map( $this->tt5() ) as $slug => $value ) {
			$this->assertNotSame( 'var(--wp--preset--color--' . $slug . ')', $value, $slug );
		}
	}

	/**
	 * Each slug gets a variable plus colour, background and border classes.
	 */
	public function test_css_has_variable_and_three_classes_per_slug() {
		$css = aludra_palette_fallback_css( array( 'primary' => '#503aa8' ) );

		$this->assertStringContainsString( ':root{--wp--preset--color--primary:#503aa8;}', $css );
		$this->assertStringContainsString( '.has-primary-color{color:var(--wp--preset--color--primary) !important;}', $css );
		$this->assertStringContainsString( '.has-primary-background-color{', $css );
		$this->assertStringContainsString( '.has-primary-border-color{', $css );
	}
}
