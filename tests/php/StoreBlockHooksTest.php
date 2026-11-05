<?php
/**
 * Tests for the per-theme store block hook choices.
 *
 * @package Aludra
 */

use PHPUnit\Framework\TestCase;

use function Aludra\aludra_merge_store_block_hooks;
use function Aludra\aludra_resolve_store_block_hook;

/**
 * Covers how a saved Store tab choice and the default theme list decide whether
 * a store block is hooked, and how a submission is merged into the option.
 */
class StoreBlockHooksTest extends TestCase {

	const FSB    = 'aludra/free-shipping-bar';
	const STICKY = 'aludra/sticky-add-to-cart';

	/**
	 * Known store block names.
	 *
	 * @return string[]
	 */
	private function blocks() {
		return array( self::FSB, self::STICKY );
	}

	/**
	 * Without a saved choice, a theme in the default list is on and others off.
	 */
	public function test_default_list_applies_without_a_saved_choice() {
		$this->assertTrue( aludra_resolve_store_block_hook( self::FSB, array( 'winespring' ), array(), array( 'winespring' ) ) );
		$this->assertFalse( aludra_resolve_store_block_hook( self::FSB, array( 'elayne' ), array(), array( 'winespring' ) ) );
	}

	/**
	 * A child theme of a default theme inherits the default.
	 */
	public function test_child_theme_inherits_the_parents_default() {
		$this->assertTrue( aludra_resolve_store_block_hook( self::FSB, array( 'winespring-child', 'winespring' ), array(), array( 'winespring' ) ) );
	}

	/**
	 * A saved choice overrides the default in both directions.
	 */
	public function test_saved_choice_overrides_the_default() {
		$saved = array(
			'winespring' => array( self::FSB => false ),
			'elayne'     => array( self::STICKY => true ),
		);

		$this->assertFalse( aludra_resolve_store_block_hook( self::FSB, array( 'winespring' ), $saved, array( 'winespring' ) ) );
		$this->assertTrue( aludra_resolve_store_block_hook( self::STICKY, array( 'winespring' ), $saved, array( 'winespring' ) ), 'An unsaved block keeps the default.' );
		$this->assertTrue( aludra_resolve_store_block_hook( self::STICKY, array( 'elayne' ), $saved, array( 'winespring' ) ) );
	}

	/**
	 * The active theme's own choice wins over its parent's.
	 */
	public function test_child_choice_wins_over_parent_choice() {
		$saved = array(
			'winespring-child' => array( self::FSB => false ),
			'winespring'       => array( self::FSB => true ),
		);

		$this->assertFalse( aludra_resolve_store_block_hook( self::FSB, array( 'winespring-child', 'winespring' ), $saved, array( 'winespring' ) ) );
	}

	/**
	 * A submission sets the active theme's blocks, absence meaning off, and
	 * leaves other themes' choices alone.
	 */
	public function test_submission_merges_for_the_active_theme_only() {
		$saved = array( 'elayne' => array( self::STICKY => true ) );
		$input = array(
			'form'   => '1',
			'blocks' => array( self::FSB => '1' ),
		);

		$this->assertSame(
			array(
				'elayne'     => array( self::STICKY => true ),
				'winespring' => array(
					self::FSB    => true,
					self::STICKY => false,
				),
			),
			aludra_merge_store_block_hooks( $saved, $input, 'winespring', $this->blocks() )
		);
	}

	/**
	 * When the option is first created, the Settings API runs the callback again
	 * with the merged value. That second pass must not switch everything off.
	 */
	public function test_stored_value_passes_through_a_second_sanitize() {
		$merged = aludra_merge_store_block_hooks(
			array(),
			array(
				'form'   => '1',
				'blocks' => array( self::FSB => '1' ),
			),
			'winespring',
			$this->blocks()
		);

		$this->assertSame( $merged, aludra_merge_store_block_hooks( array(), $merged, 'winespring', $this->blocks() ) );
	}

	/**
	 * Unknown blocks, junk theme keys and non-array values are dropped.
	 */
	public function test_stored_value_is_cleaned() {
		$this->assertSame(
			array( 'winespring' => array( self::FSB => true ) ),
			aludra_merge_store_block_hooks(
				array(),
				array(
					'winespring' => array(
						self::FSB         => 1,
						'aludra/carousel' => true,
					),
					'<bad>'      => 'yes',
				),
				'winespring',
				$this->blocks()
			)
		);
	}
}
