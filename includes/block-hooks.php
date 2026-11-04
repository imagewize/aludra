<?php
/**
 * Block Hooks for Aludra's store blocks.
 *
 * WordPress.org themes may not ship plugin blocks in their templates, so a
 * companion theme cannot place `aludra/free-shipping-bar` or
 * `aludra/sticky-add-to-cart` itself. Aludra inserts them instead, through the
 * Block Hooks API, into the template part and template the theme provides:
 *
 * - `aludra/free-shipping-bar` as the last child of the group in the
 *   `announcement-bar` template part;
 * - `aludra/sticky-add-to-cart` before the footer template part of the
 *   `single-product` template.
 *
 * Hooked blocks show up in the Site Editor like any other block, and a user who
 * removes one there keeps it removed. They are only inserted while the block is
 * registered, so nothing appears without WooCommerce or with the block turned
 * off under Settings → Aludra.
 *
 * Only themes that opted in are touched: Elayne, Aviendha and Ixian ship their
 * own single-product templates and should not gain a sticky bar unasked. Add a
 * theme (or a fork's slug) with the `aludra_store_block_hooks_themes` filter.
 *
 * @package Aludra
 */

namespace Aludra;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Where each store block is hooked.
 *
 * @return array<string, array{type: string, slug: string, anchor: string, position: string}>
 *         Keyed by hooked block name.
 */
function aludra_store_block_hooks() {
	return array(
		'aludra/free-shipping-bar'  => array(
			'type'     => 'wp_template_part',
			'slug'     => 'announcement-bar',
			'anchor'   => 'core/group',
			'position' => 'last_child',
		),
		'aludra/sticky-add-to-cart' => array(
			'type'     => 'wp_template',
			'slug'     => 'single-product',
			'anchor'   => 'core/template-part',
			'position' => 'before',
		),
	);
}

/**
 * Themes whose templates receive the store blocks.
 *
 * Matched against both the active theme and its parent, so a child theme of an
 * opted-in theme is covered too.
 *
 * @return string[] Theme directory slugs.
 */
function aludra_store_block_hooks_themes() {
	/**
	 * Filters the themes whose templates Aludra inserts its store blocks into.
	 *
	 * @param string[] $themes Theme directory slugs.
	 */
	return (array) apply_filters( 'aludra_store_block_hooks_themes', array( 'winespring' ) );
}

/**
 * Whether a template or template part should receive a given store block.
 *
 * @param string $block_name Hooked block name.
 * @param mixed  $context    Block template, post or pattern being processed.
 * @return bool
 */
function aludra_store_block_hook_applies( $block_name, $context ) {
	$hooks = aludra_store_block_hooks();

	if ( ! isset( $hooks[ $block_name ] ) || ! $context instanceof \WP_Block_Template ) {
		return false;
	}

	$hook = $hooks[ $block_name ];

	if ( $hook['type'] !== $context->type || $hook['slug'] !== $context->slug ) {
		return false;
	}

	if ( ! array_intersect( array( get_stylesheet(), get_template() ), aludra_store_block_hooks_themes() ) ) {
		return false;
	}

	if ( ! \WP_Block_Type_Registry::get_instance()->is_registered( $block_name ) ) {
		return false;
	}

	// A template saved before the theme stopped shipping the block may still
	// carry it; inserting a second copy would show two bars.
	return ! is_string( $context->content ) || false === strpos( $context->content, '<!-- wp:' . $block_name );
}

/**
 * Add the store blocks to the anchor blocks of opted-in templates.
 *
 * @param string[] $hooked_block_types Block types hooked at this position.
 * @param string   $relative_position  before, after, first_child or last_child.
 * @param string   $anchor_block_type  The anchor block's name.
 * @param mixed    $context            Block template, post or pattern being processed.
 * @return string[]
 */
function aludra_hook_store_blocks( $hooked_block_types, $relative_position, $anchor_block_type, $context ) {
	foreach ( aludra_store_block_hooks() as $block_name => $hook ) {
		if (
			$hook['anchor'] === $anchor_block_type
			&& $hook['position'] === $relative_position
			&& aludra_store_block_hook_applies( $block_name, $context )
		) {
			$hooked_block_types[] = $block_name;
		}
	}

	return $hooked_block_types;
}
add_filter( 'hooked_block_types', __NAMESPACE__ . '\aludra_hook_store_blocks', 10, 4 );

/**
 * Keep the sticky add to cart bar to the footer template part.
 *
 * The single-product template has a header and a footer template part, and the
 * anchor is the block type, so drop the copy the header would also receive.
 *
 * @param array|null $parsed_hooked_block The block about to be inserted, or null.
 * @param string     $hooked_block_type   Hooked block name.
 * @param string     $relative_position   before, after, first_child or last_child.
 * @param array      $parsed_anchor_block The anchor block.
 * @return array|null
 */
function aludra_limit_sticky_add_to_cart_hook( $parsed_hooked_block, $hooked_block_type, $relative_position, $parsed_anchor_block ) {
	if ( null === $parsed_hooked_block ) {
		return null;
	}

	$slug = isset( $parsed_anchor_block['attrs']['slug'] ) ? $parsed_anchor_block['attrs']['slug'] : '';

	return 'footer' === $slug ? $parsed_hooked_block : null;
}
add_filter( 'hooked_block_aludra/sticky-add-to-cart', __NAMESPACE__ . '\aludra_limit_sticky_add_to_cart_hook', 10, 4 );

/**
 * Keep the free shipping bar to the announcement bar's outer group.
 *
 * Only the top-level group of the part is the bar itself; a group a user nests
 * inside it in the Site Editor should not get a second progress bar.
 *
 * @param array|null $parsed_hooked_block The block about to be inserted, or null.
 * @param string     $hooked_block_type   Hooked block name.
 * @param string     $relative_position   before, after, first_child or last_child.
 * @param array      $parsed_anchor_block The anchor block.
 * @return array|null
 */
function aludra_limit_free_shipping_bar_hook( $parsed_hooked_block, $hooked_block_type, $relative_position, $parsed_anchor_block ) {
	if ( null === $parsed_hooked_block ) {
		return null;
	}

	$classes = isset( $parsed_anchor_block['attrs']['className'] ) ? (string) $parsed_anchor_block['attrs']['className'] : '';

	$is_full = isset( $parsed_anchor_block['attrs']['align'] ) && 'full' === $parsed_anchor_block['attrs']['align'];

	return ( $is_full || false !== strpos( $classes, 'announcement' ) ) ? $parsed_hooked_block : null;
}
add_filter( 'hooked_block_aludra/free-shipping-bar', __NAMESPACE__ . '\aludra_limit_free_shipping_bar_hook', 10, 4 );
