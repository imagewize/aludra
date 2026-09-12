<?php
/**
 * Tests for the block enable/disable settings.
 *
 * @package Aludra
 */

use PHPUnit\Framework\TestCase;

/**
 * Covers the three enumerations that have to stay in step when a block is
 * added, and the sanitize/merge rules that decide whether a block registers.
 */
class SettingsTest extends TestCase {

	/**
	 * Block folders that ship a built block.json, i.e. what the plugin
	 * actually discovers and registers at runtime.
	 *
	 * @return array<int, string> Block slugs.
	 */
	private function discovered_block_slugs() {
		$slugs = array();

		foreach ( glob( ALUDRA_TESTS_ROOT . '/blocks/*/build/block.json' ) as $manifest ) {
			$slugs[] = basename( dirname( dirname( $manifest ) ) );
		}

		sort( $slugs );

		return $slugs;
	}

	/**
	 * Every discovered block needs a defaults entry, or it cannot be toggled.
	 */
	public function test_defaults_cover_every_discovered_block() {
		$defaults = array_keys( aludra_get_default_settings() );
		sort( $defaults );

		$this->assertSame(
			$this->discovered_block_slugs(),
			$defaults,
			'blocks/ and aludra_get_default_settings() disagree — add the new block to the defaults.'
		);
	}

	/**
	 * The settings screen renders from aludra_get_available_blocks(), so it has
	 * to enumerate exactly the same slugs as the defaults.
	 */
	public function test_available_blocks_match_defaults() {
		$available = array_keys( aludra_get_available_blocks() );
		$defaults  = array_keys( aludra_get_default_settings() );
		sort( $available );
		sort( $defaults );

		$this->assertSame( $defaults, $available );
	}

	/**
	 * A fresh install must have everything on.
	 */
	public function test_defaults_are_all_enabled() {
		$this->assertNotEmpty( aludra_get_default_settings() );

		foreach ( aludra_get_default_settings() as $slug => $enabled ) {
			$this->assertTrue( $enabled, "Block {$slug} is disabled by default." );
		}
	}

	/**
	 * A stored option written before a block existed has no key for it. Merging
	 * over the defaults must read that absence as enabled, matching the
	 * registration gate in aludra.php — otherwise the settings screen shows the
	 * block unchecked and the next save disables it for real.
	 */
	public function test_missing_stored_key_reads_as_enabled() {
		$defaults = aludra_get_default_settings();

		// Simulate an option saved before the last two blocks were added.
		$stored = $defaults;
		unset( $stored['photo-grid'], $stored['instagram-embed'] );

		$merged = wp_parse_args( $stored, $defaults );

		$this->assertTrue( $merged['photo-grid'] );
		$this->assertTrue( $merged['instagram-embed'] );
		$this->assertSame( array_keys( $defaults ), array_keys( $merged ) );
	}

	/**
	 * Sanitization is absence-means-off, which is what makes the merge above
	 * load-bearing: an unchecked box is simply not posted.
	 */
	public function test_sanitize_disables_blocks_absent_from_the_post() {
		$sanitized = aludra_sanitize_settings( array( 'carousel' => '1' ) );

		$this->assertTrue( $sanitized['carousel'] );
		$this->assertFalse( $sanitized['mega-menu'] );
		$this->assertSame(
			array_keys( aludra_get_default_settings() ),
			array_keys( $sanitized ),
			'Sanitize must return an entry for every known block.'
		);
	}

	/**
	 * Only the literal '1' a checkbox posts counts as enabled.
	 */
	public function test_sanitize_rejects_non_checkbox_values() {
		$sanitized = aludra_sanitize_settings(
			array(
				'carousel'  => 'yes',
				'mega-menu' => 1,
				'faq-tabs'  => '1',
			)
		);

		$this->assertFalse( $sanitized['carousel'] );
		$this->assertFalse( $sanitized['mega-menu'] );
		$this->assertTrue( $sanitized['faq-tabs'] );
	}

	/**
	 * Child blocks are useless without their parent, so disabling the parent
	 * has to take the child with it.
	 *
	 * @dataProvider dependency_provider
	 *
	 * @param string $parent_slug Parent block slug.
	 * @param string $child_slug  Child block slug.
	 */
	public function test_disabling_a_parent_disables_its_child( $parent_slug, $child_slug ) {
		$input = array();

		foreach ( array_keys( aludra_get_default_settings() ) as $slug ) {
			$input[ $slug ] = '1';
		}

		unset( $input[ $parent_slug ] );

		$sanitized = aludra_sanitize_settings( $input );

		$this->assertFalse( $sanitized[ $parent_slug ] );
		$this->assertFalse( $sanitized[ $child_slug ], "{$child_slug} should follow {$parent_slug}." );
	}

	/**
	 * Parent/child block pairs enforced by aludra_validate_dependencies().
	 *
	 * @return array<string, array<int, string>> Parent/child pairs.
	 */
	public function dependency_provider() {
		return array(
			'carousel/slide'          => array( 'carousel', 'slide' ),
			'faq-tabs/faq-tab-answer' => array( 'faq-tabs', 'faq-tab-answer' ),
		);
	}
}
