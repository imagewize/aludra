<?php
/**
 * Palette fallbacks: Aludra's colour names mapped onto any theme's palette.
 *
 * Aludra's block styles and patterns name colours from the Aviendha palette
 * (`primary`, `main`, `tertiary`, `border-light` …): as CSS variables in the
 * block stylesheets and as `has-<slug>-color` classes in pattern markup. A theme
 * that defines those slugs needs nothing from this file. On any other theme
 * (Twenty Twenty-Five names its colours `base`, `contrast` and `accent-1` …
 * `accent-6`) the variables are undefined, so the block CSS fell back to
 * hardcoded Aviendha colours, and the pattern classes had no CSS at all.
 *
 * For each slug the active theme does not define, this defines the variable and
 * its three colour classes, derived from the theme's own colours:
 *
 * - `base` and `contrast`: the lightest and darkest colours in the palette.
 * - `primary`: the first saturated colour that the page background colour
 *   is legible on as text (4.5:1, else 3:1). On TT5 that skips the yellow
 *   `accent-1` and lands on the purple `accent-3`; on its dark variations it
 *   picks a light accent. With none, `contrast`.
 * - Every other slug: a `color-mix()` of those three, so tints, borders and
 *   muted text follow the theme, dark style variations included.
 *
 * Slugs the theme defines are never touched, and nothing is printed when the
 * theme defines all of them (Aviendha and the themes built on its palette).
 * An administrator can pick a different brand colour from the theme's palette
 * on the Start tab (`ALUDRA_BRAND_OPTION`, per theme). Filter
 * `aludra_palette_fallbacks` to change the map after that, or return an empty
 * array to switch this off.
 *
 * @package Aludra
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Parse a #rgb or #rrggbb colour.
 *
 * @param string $color CSS colour value.
 * @return int[]|null Red, green and blue (0–255), or null for anything else.
 */
function aludra_palette_parse_hex( $color ) {
	if ( ! is_string( $color ) || ! preg_match( '/^#([0-9a-f]{3}|[0-9a-f]{6})$/i', trim( $color ), $m ) ) {
		return null;
	}

	$hex = $m[1];
	if ( 3 === strlen( $hex ) ) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}

	return array_map( 'hexdec', str_split( $hex, 2 ) );
}

/**
 * WCAG relative luminance of an RGB colour.
 *
 * @param int[] $rgb Red, green and blue (0–255).
 * @return float Luminance between 0 and 1.
 */
function aludra_palette_luminance( $rgb ) {
	$channels = array();
	foreach ( $rgb as $value ) {
		$c          = $value / 255;
		$channels[] = $c <= 0.03928 ? $c / 12.92 : pow( ( $c + 0.055 ) / 1.055, 2.4 );
	}

	return 0.2126 * $channels[0] + 0.7152 * $channels[1] + 0.0722 * $channels[2];
}

/**
 * HSL saturation of an RGB colour, to tell a brand colour from a grey.
 *
 * @param int[] $rgb Red, green and blue (0–255).
 * @return float Saturation between 0 and 1.
 */
function aludra_palette_saturation( $rgb ) {
	$max = max( $rgb ) / 255;
	$min = min( $rgb ) / 255;
	if ( $max === $min ) {
		return 0.0;
	}

	$lightness = ( $max + $min ) / 2;
	return ( $max - $min ) / ( 1 - abs( 2 * $lightness - 1 ) );
}

/**
 * WCAG contrast ratio between two RGB colours.
 *
 * @param int[] $a Red, green and blue (0–255).
 * @param int[] $b Red, green and blue (0–255).
 * @return float Ratio between 1 and 21.
 */
function aludra_palette_contrast( $a, $b ) {
	$la = aludra_palette_luminance( $a );
	$lb = aludra_palette_luminance( $b );
	return ( max( $la, $lb ) + 0.05 ) / ( min( $la, $lb ) + 0.05 );
}

/**
 * Choose the brand colour from a palette.
 *
 * Text on the brand colour is `base`, the page background: aludra/cta-banner
 * pairs them, and so do the patterns' buttons. That is the convention of the
 * Ollie family of themes, whose dark style variations swap `primary` to a
 * light colour while `base` turns dark. So the brand must be legible under
 * `base`: 4.5:1, else 3:1. On a light theme that means a colour white-ish
 * text reads on; on a dark one, a light colour dark text reads on. The same
 * test keeps the brand from disappearing into the page.
 *
 * @param array[] $palette Palette entries (`slug`, `color`), in theme order.
 * @param int[]   $base    The page background colour.
 * @return string|null Slug of the chosen colour, or null when none qualifies.
 */
function aludra_palette_pick_brand( $palette, $base ) {
	foreach ( array( 4.5, 3.0 ) as $min_ratio ) {
		foreach ( $palette as $entry ) {
			// The page and text colours are the ground the brand stands on, not the brand.
			if ( in_array( $entry['slug'] ?? '', array( 'base', 'contrast' ), true ) ) {
				continue;
			}

			$rgb = aludra_palette_parse_hex( $entry['color'] ?? '' );
			if ( $rgb && aludra_palette_saturation( $rgb ) >= 0.25 && aludra_palette_contrast( $rgb, $base ) >= $min_ratio ) {
				return $entry['slug'];
			}
		}
	}

	return null;
}

/**
 * Pick the lightest or darkest colour in a palette.
 *
 * @param array[] $palette Palette entries (`slug`, `color`).
 * @param bool    $darkest True for the darkest, false for the lightest.
 * @return string|null Slug, or null when the palette has no hex colours.
 */
function aludra_palette_pick_extreme( $palette, $darkest ) {
	$best      = null;
	$best_luma = null;
	foreach ( $palette as $entry ) {
		$rgb = aludra_palette_parse_hex( $entry['color'] ?? '' );
		if ( ! $rgb ) {
			continue;
		}

		$luma = aludra_palette_luminance( $rgb );
		if ( null === $best_luma || ( $darkest ? $luma < $best_luma : $luma > $best_luma ) ) {
			$best      = $entry['slug'];
			$best_luma = $luma;
		}
	}

	return $best;
}

/**
 * The page background colour of a palette: its `base` when that is a plain
 * colour, else its lightest colour, else white.
 *
 * @param array[] $palette Palette entries (`slug`, `color`).
 * @return int[] Red, green and blue (0–255).
 */
function aludra_palette_base_rgb( $palette ) {
	$colors = array();
	foreach ( $palette as $entry ) {
		if ( isset( $entry['slug'], $entry['color'] ) ) {
			$colors[ $entry['slug'] ] = $entry['color'];
		}
	}

	$rgb = aludra_palette_parse_hex( $colors['base'] ?? '' );
	if ( ! $rgb ) {
		$light = aludra_palette_pick_extreme( $palette, false );
		$rgb   = $light ? aludra_palette_parse_hex( $colors[ $light ] ) : null;
	}

	return $rgb ? $rgb : array( 255, 255, 255 );
}

/**
 * Fallback values for the Aludra colour slugs a palette lacks.
 *
 * Pure function of its arguments, so it can be tested without WordPress.
 *
 * @param array[] $palette        Palette entries (`slug`, `color`) the site defines.
 * @param string  $brand_override Palette slug chosen as brand on the Start tab,
 *                                or '' for automatic. Ignored when the palette
 *                                does not contain it.
 * @return string[] CSS value per missing slug; empty when nothing is missing.
 */
function aludra_palette_fallback_map( $palette, $brand_override = '' ) {
	$defined = array();
	foreach ( $palette as $entry ) {
		if ( isset( $entry['slug'] ) ) {
			$defined[ $entry['slug'] ] = true;
		}
	}

	$var = static function ( $slug ) {
		return 'var(--wp--preset--color--' . $slug . ')';
	};
	$mix = static function ( $slug, $percent ) use ( $var ) {
		return 'color-mix(in srgb, ' . $var( $slug ) . ' ' . $percent . '%, ' . $var( 'base' ) . ')';
	};

	$light = aludra_palette_pick_extreme( $palette, false );
	$dark  = aludra_palette_pick_extreme( $palette, true );

	// With no qualifying colour, the text colour: `base` text reads on it on
	// light and dark themes alike. A choice made on the Start tab wins, as
	// long as the palette still has that colour.
	$brand = ( '' !== $brand_override && 'primary' !== $brand_override && isset( $defined[ $brand_override ] ) )
		? $brand_override
		: aludra_palette_pick_brand( $palette, aludra_palette_base_rgb( $palette ) );

	$map = array(
		'base'           => $light ? $var( $light ) : '#ffffff',
		'contrast'       => $dark ? $var( $dark ) : '#111111',
		'primary'        => $brand ? $var( $brand ) : $var( 'contrast' ),
		'primary-alt'    => 'color-mix(in srgb, ' . $var( 'primary' ) . ' 80%, #000)',
		'primary-accent' => 'color-mix(in srgb, ' . $var( 'primary' ) . ' 12%, ' . $var( 'base' ) . ')',
		'main'           => $var( 'contrast' ),
		'secondary'      => $mix( 'contrast', 72 ),
		'main-accent'    => $mix( 'contrast', 58 ),
		'tertiary'       => $mix( 'contrast', 6 ),
		'border-light'   => $mix( 'contrast', 14 ),
		'sand-deep'      => $mix( 'contrast', 24 ),
		'accent'         => $var( 'primary' ),
		'terracotta'     => $var( 'primary' ),
		'white'          => '#ffffff',
	);

	// A slug must never be mapped onto itself (base → base would be a cycle).
	foreach ( $map as $slug => $value ) {
		if ( isset( $defined[ $slug ] ) || $value === $var( $slug ) ) {
			unset( $map[ $slug ] );
		}
	}

	return $map;
}

/**
 * The CSS for a fallback map: the variables, then the colour classes.
 *
 * @param string[] $map CSS value per slug.
 * @return string CSS, or '' for an empty map.
 */
function aludra_palette_fallback_css( $map ) {
	if ( empty( $map ) ) {
		return '';
	}

	$vars    = '';
	$classes = '';
	foreach ( $map as $slug => $value ) {
		$slug = sanitize_key( $slug );
		$ref  = 'var(--wp--preset--color--' . $slug . ')';

		$vars    .= '--wp--preset--color--' . $slug . ':' . $value . ';';
		$classes .= '.has-' . $slug . '-color{color:' . $ref . ' !important;}';
		$classes .= '.has-' . $slug . '-background-color{background-color:' . $ref . ' !important;}';
		$classes .= '.has-' . $slug . '-border-color{border-color:' . $ref . ' !important;}';
	}

	return ':root{' . $vars . '}' . $classes;
}

/**
 * Option holding the brand colour chosen on the Start tab, per theme: an array
 * of stylesheet => palette slug. Per theme, because palettes differ per theme;
 * a slug rather than a colour, so the choice follows the theme's style
 * variations.
 */
const ALUDRA_BRAND_OPTION = 'aludra_brand_color';

/**
 * The site's palettes.
 *
 * @return array[] `own`: the theme's palette, or the user's when they edited it
 *                 in the Site Editor (that is what replaces it); `all`: every
 *                 entry from every origin, core's defaults included.
 */
function aludra_palette_site_palettes() {
	$all     = array();
	$origins = wp_get_global_settings( array( 'color', 'palette' ) );
	foreach ( array( 'default', 'theme', 'custom' ) as $origin ) {
		if ( ! empty( $origins[ $origin ] ) && is_array( $origins[ $origin ] ) ) {
			$all = array_merge( $all, $origins[ $origin ] );
		}
	}

	return array(
		'own' => ! empty( $origins['custom'] ) ? $origins['custom'] : ( $origins['theme'] ?? array() ),
		'all' => $all,
	);
}

/**
 * The brand colour chosen on the Start tab for the active theme.
 *
 * @return string Palette slug, or '' for automatic.
 */
function aludra_get_brand_override() {
	$choices = get_option( ALUDRA_BRAND_OPTION, array() );
	$slug    = is_array( $choices ) ? ( $choices[ get_stylesheet() ] ?? '' ) : '';

	return is_string( $slug ) ? $slug : '';
}

/**
 * Merge a Start tab brand choice into the stored option.
 *
 * Pure function, so it can be tested without WordPress.
 *
 * @param mixed    $stored     The option as stored.
 * @param mixed    $input      Submitted form data (`form` marker plus `slug`), or
 *                             an already stored value passed back through
 *                             sanitization by update_option().
 * @param string   $stylesheet The active theme.
 * @param string[] $slugs      Slugs in the active theme's palette.
 * @return string[] Stylesheet => palette slug.
 */
function aludra_merge_brand_choice( $stored, $input, $stylesheet, $slugs ) {
	$stored = is_array( $stored ) ? $stored : array();

	// Not a form submission: an already stored value. Keep string entries only.
	if ( ! is_array( $input ) || empty( $input['form'] ) ) {
		return is_array( $input ) ? array_filter( $input, 'is_string' ) : $stored;
	}

	$slug = isset( $input['slug'] ) && is_string( $input['slug'] ) ? $input['slug'] : '';
	if ( '' !== $slug && in_array( $slug, $slugs, true ) ) {
		$stored[ $stylesheet ] = $slug;
	} else {
		unset( $stored[ $stylesheet ] );
	}

	return $stored;
}

/**
 * What the Start tab shows about the brand colour.
 *
 * @return array `theme_primary`: whether the theme defines `primary` itself;
 *               `palette`: the theme's own palette entries; `auto`: the slug
 *               Aludra would pick (null for the text colour); `override`: the
 *               saved choice, '' for automatic; `base`: the page background RGB.
 */
function aludra_palette_brand_status() {
	$palettes = aludra_palette_site_palettes();
	$slugs    = wp_list_pluck( $palettes['own'], 'slug' );

	return array(
		'theme_primary' => in_array( 'primary', $slugs, true ),
		'palette'       => $palettes['own'],
		'auto'          => aludra_palette_pick_brand( $palettes['own'], aludra_palette_base_rgb( $palettes['own'] ) ),
		'override'      => aludra_get_brand_override(),
		'base'          => aludra_palette_base_rgb( $palettes['own'] ),
	);
}

/**
 * Print the fallbacks for the active theme, in the editor and on the front end.
 */
function aludra_enqueue_palette_fallbacks() {
	$palettes = aludra_palette_site_palettes();
	$palette  = $palettes['all'];

	// Pick base, contrast and brand from the theme's (or the user's) own
	// colours, never from core's default palette of named vivid colours.
	$map = aludra_palette_fallback_map( $palettes['own'], aludra_get_brand_override() );

	// Slugs defined only by core's default palette (e.g. `white`) count as defined.
	foreach ( $palette as $entry ) {
		unset( $map[ $entry['slug'] ?? '' ] );
	}

	/**
	 * Filters the colour slugs Aludra defines for a theme that lacks them.
	 * Runs after the Start tab's brand colour choice is applied.
	 *
	 * @param string[] $map     CSS value per missing slug.
	 * @param array[]  $palette Every palette entry the site defines.
	 */
	$map = apply_filters( 'aludra_palette_fallbacks', $map, $palette );
	$css = aludra_palette_fallback_css( (array) $map );

	if ( '' === $css ) {
		return;
	}

	wp_register_style( 'aludra-palette-fallbacks', false, array(), ALUDRA_VERSION );
	wp_add_inline_style( 'aludra-palette-fallbacks', $css );
	wp_enqueue_style( 'aludra-palette-fallbacks' );
}
add_action( 'enqueue_block_assets', 'aludra_enqueue_palette_fallbacks' );
