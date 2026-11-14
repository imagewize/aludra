<?php
/**
 * Tests for the text replacement behind aludra/compose-page.
 *
 * @package Aludra
 */

use PHPUnit\Framework\TestCase;

/**
 * Covers exact-segment text replacement and extraction, the pure-PHP core of
 * swapping copy in pattern markup without breaking block validation.
 */
class AbilitiesTextTest extends TestCase {

	/**
	 * A whole text run is replaced and escaped; markup around it is untouched.
	 */
	public function test_replaces_exact_segment_and_escapes() {
		$html = '<h2 class="x">Old heading</h2>';
		$out  = aludra_abilities_replace_html_text( $html, array( 'Old heading' => 'Fish & <Chips>' ) );

		$this->assertSame( '<h2 class="x">Fish &amp; &lt;Chips&gt;</h2>', $out );
	}

	/**
	 * Entities in the pattern are decoded before matching.
	 */
	public function test_matches_entity_encoded_text() {
		$html = '<p>WordPress &amp; WooCommerce</p>';
		$out  = aludra_abilities_replace_html_text( $html, array( 'WordPress & WooCommerce' => 'Wine' ) );

		$this->assertSame( '<p>Wine</p>', $out );
	}

	/**
	 * A substring of a run is not a match: partial replacement could desync
	 * the markup from a block attribute holding the same text.
	 */
	public function test_ignores_partial_match() {
		$html = '<p>Fast sites for real people</p>';

		$this->assertSame( $html, aludra_abilities_replace_html_text( $html, array( 'Fast' => 'Slow' ) ) );
	}

	/**
	 * Runs split by inline markup are separate segments; whitespace is kept.
	 */
	public function test_inline_runs_and_whitespace() {
		$html = '<h1>Fast Sites. <em>Real Results.</em></h1>';
		$out  = aludra_abilities_replace_html_text(
			$html,
			array(
				'Fast Sites.'   => 'Good Wine.',
				'Real Results.' => 'Fair Prices.',
			)
		);

		$this->assertSame( '<h1>Good Wine. <em>Fair Prices.</em></h1>', $out );
	}

	/**
	 * Extraction skips block comments, decodes entities and deduplicates.
	 */
	public function test_extracts_texts() {
		$html = "<!-- wp:paragraph {\"x\":\">no<\"} -->\n<p>A &amp; B</p>\n<!-- /wp:paragraph -->\n<p>A &amp; B</p><h1>One <em>Two</em></h1>";

		$this->assertSame( array( 'A & B', 'One', 'Two' ), aludra_abilities_extract_html_texts( $html ) );
	}

	/**
	 * Structural attributes are never treated as copy.
	 */
	public function test_text_attr_filter() {
		$this->assertTrue( aludra_abilities_is_text_attr( 'question', 'What do you offer?' ) );
		$this->assertFalse( aludra_abilities_is_text_attr( 'className', 'is-style-night' ) );
		$this->assertFalse( aludra_abilities_is_text_attr( 'level', 2 ) );
	}

	/**
	 * Layout, colour and unit attributes are not copy; stat values are.
	 */
	public function test_layout_attrs_are_not_text() {
		foreach ( array(
			array( 'width', '58%' ),
			array( 'verticalAlignment', 'top' ),
			array( 'borderColor', 'border-light' ),
			array( 'overlayBackdropColor', 'rgba(0, 0, 0, 0.5)' ),
			array( 'minHeightUnit', 'px' ),
			array( 'contentPosition', 'center left' ),
			array( 'aspectRatio', '3/4' ),
			array( 'service', 'instagram' ),
			array( 'dotsBottomSpacing', '-45px' ),
			array( 'arrowBackground', '#d4ecf5' ),
			array( 'iconStyle', 'line' ),
			array( 'iconClass', 'wc-block-customer-account__account-icon' ),
			array( 'imageSizing', 'thumbnail' ),
		) as $case ) {
			$this->assertFalse( aludra_abilities_is_text_attr( $case[0], $case[1] ), $case[0] );
		}

		foreach ( array( '-71%', '0.9s', '20', '24/7', '1 day' ) as $stat ) {
			$this->assertTrue( aludra_abilities_is_text_attr( 'number', $stat ), $stat );
		}
		$this->assertTrue( aludra_abilities_is_text_attr( 'alt', 'Harbor at sunset' ) );
	}
}
