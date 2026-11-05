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
 * Each block can be switched on or off per theme under Settings → Aludra →
 * Store. Until a choice is saved there, only the themes in the
 * `aludra_store_block_hooks_themes` filter (Winespring by default) get them:
 * Elayne, Aviendha and Ixian ship their own single-product templates and should
 * not gain a sticky bar unasked. Add a fork's slug with that filter to make it
 * default on as well.
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
 * Option holding the per-theme choices made under Settings → Aludra → Store.
 *
 * Shape: `array( 'theme-slug' => array( 'aludra/free-shipping-bar' => bool, ... ) )`.
 */
const ALUDRA_STORE_HOOKS_OPTION = 'aludra_store_hooks';

/**
 * Themes whose templates receive the store blocks until a choice is saved.
 *
 * Matched against both the active theme and its parent, so a child theme of an
 * opted-in theme is covered too. A choice saved under Settings → Aludra → Store
 * overrides this list for that theme, in either direction.
 *
 * @return string[] Theme directory slugs.
 */
function aludra_store_block_hooks_themes() {
	/**
	 * Filters the themes whose templates Aludra inserts its store blocks into
	 * by default, before a choice is saved under Settings → Aludra → Store.
	 *
	 * @param string[] $themes Theme directory slugs.
	 */
	return (array) apply_filters( 'aludra_store_block_hooks_themes', array( 'winespring' ) );
}

/**
 * Resolve whether a store block is switched on for a theme.
 *
 * A saved choice wins, the active theme's before its parent's; without one the
 * theme is on when it, or its parent, is in the default list.
 *
 * @param string   $block_name  Hooked block name.
 * @param string[] $theme_slugs Active theme, then its parent.
 * @param mixed    $saved       The stored option value.
 * @param string[] $defaults    Themes that are on by default.
 * @return bool
 */
function aludra_resolve_store_block_hook( $block_name, array $theme_slugs, $saved, array $defaults ) {
	$saved = is_array( $saved ) ? $saved : array();

	foreach ( $theme_slugs as $slug ) {
		if ( isset( $saved[ $slug ] ) && is_array( $saved[ $slug ] ) && isset( $saved[ $slug ][ $block_name ] ) ) {
			return (bool) $saved[ $slug ][ $block_name ];
		}
	}

	return (bool) array_intersect( $theme_slugs, $defaults );
}

/**
 * Whether a store block is switched on for the active theme.
 *
 * @param string $block_name Hooked block name.
 * @return bool
 */
function aludra_store_block_hook_enabled( $block_name ) {
	return aludra_resolve_store_block_hook(
		$block_name,
		array_values( array_unique( array( get_stylesheet(), get_template() ) ) ),
		get_option( ALUDRA_STORE_HOOKS_OPTION, array() ),
		aludra_store_block_hooks_themes()
	);
}

/**
 * Merge a Store tab submission into the stored per-theme choices.
 *
 * The Settings API runs the sanitize callback a second time, with the already
 * merged value, when the option is first created (update_option() hands off to
 * add_option()). The form posts a `form` marker so a submission can be told
 * apart from a stored value; a stored value is only cleaned, never re-merged,
 * or the second pass would switch every block off.
 *
 * @param mixed    $saved       The stored option value.
 * @param mixed    $input       The submitted value, or an already stored one.
 * @param string   $theme       Theme slug the submission is for.
 * @param string[] $block_names Known store block names.
 * @return array<string, array<string, bool>>
 */
function aludra_merge_store_block_hooks( $saved, $input, $theme, array $block_names ) {
	$clean = function ( $value ) use ( $block_names ) {
		$out = array();

		foreach ( is_array( $value ) ? $value : array() as $slug => $choices ) {
			$slug = is_string( $slug ) ? preg_replace( '/[^A-Za-z0-9._-]/', '', $slug ) : '';

			if ( '' === $slug || ! is_array( $choices ) ) {
				continue;
			}

			foreach ( $block_names as $block_name ) {
				if ( isset( $choices[ $block_name ] ) ) {
					$out[ $slug ][ $block_name ] = (bool) $choices[ $block_name ];
				}
			}
		}

		return $out;
	};

	if ( ! is_array( $input ) || ! isset( $input['form'] ) ) {
		return $clean( $input );
	}

	$merged = $clean( $saved );
	$posted = isset( $input['blocks'] ) && is_array( $input['blocks'] ) ? $input['blocks'] : array();

	foreach ( $block_names as $block_name ) {
		$merged[ $theme ][ $block_name ] = isset( $posted[ $block_name ] ) && '1' === $posted[ $block_name ];
	}

	return $merged;
}

/**
 * Whether the active theme has the template a store block is hooked into.
 *
 * The sticky bar also needs the footer template part it is placed before, and
 * the free shipping bar a group to be the last child of.
 *
 * @param string $block_name Hooked block name.
 * @return bool
 */
function aludra_store_block_hook_anchor_found( $block_name ) {
	$hooks = aludra_store_block_hooks();

	if ( ! isset( $hooks[ $block_name ] ) || ! function_exists( 'get_block_template' ) ) {
		return false;
	}

	$hook     = $hooks[ $block_name ];
	$template = get_block_template( get_stylesheet() . '//' . $hook['slug'], $hook['type'] );

	if ( ! $template || ! is_string( $template->content ) ) {
		return false;
	}

	if ( 'core/template-part' === $hook['anchor'] ) {
		return (bool) preg_match( '/<!-- wp:template-part \{[^}]*"slug":"footer"/', $template->content );
	}

	return false !== strpos( $template->content, '<!-- wp:group' );
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

	if ( ! aludra_store_block_hook_enabled( $block_name ) ) {
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
