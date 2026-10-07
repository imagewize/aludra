<?php
/**
 * Plugin Name: Aludra
 * Plugin URI: https://github.com/imagewize/aludra
 * Description: A page builder made of real blocks — 32 blocks, 21 section patterns and 8 page layouts for everything between the header and the footer. Native block editor, no shortcodes, no proprietary markup. Built alongside the Aviendha starter theme; works with any theme.
 * Version: 2.38.2
 * Requires at least: 6.9
 * Requires PHP: 7.4
 * Author: Jasper Frumau
 * Author URI: https://github.com/imagewize
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: aludra
 * Domain Path: /languages
 *
 * @package Aludra
 */

namespace Aludra;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ALUDRA_VERSION', '2.38.2' );
define( 'ALUDRA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ALUDRA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Load admin settings page.
if ( is_admin() ) {
	require_once ALUDRA_PLUGIN_DIR . 'includes/admin/settings-page.php';
}

/**
 * Register the aludra/icon block binding source.
 *
 * Blocks that render SVG icons (feature-cards, and future icon-grid, trust-bar,
 * contact-section, service-hero, expect-list) store a binding reference with an
 * icon filename instead of a hard-coded URL, so the correct plugin asset URL is
 * resolved at render time and survives site moves / rebuilds.
 *
 * Usage in a block template:
 *   metadata: { bindings: { url: { source: 'aludra/icon', args: { path: 'icon-fse.svg' } } } }
 *
 * Paths are relative to assets/icons/.
 */
add_action(
	'init',
	function () {
		if ( ! function_exists( 'register_block_bindings_source' ) ) {
			return;
		}

		register_block_bindings_source(
			'aludra/icon',
			array(
				'label'              => __( 'Aludra Icon', 'aludra' ),
				'get_value_callback' => function ( $source_args, $block_instance, $attribute_name ) {
					if ( 'url' !== $attribute_name || empty( $source_args['path'] ) ) {
						return null;
					}

					$icon_path = ltrim( str_replace( '..', '', $source_args['path'] ), '/' );

					if ( ! file_exists( ALUDRA_PLUGIN_DIR . 'assets/icons/' . $icon_path ) ) {
						return null;
					}

					return ALUDRA_PLUGIN_URL . 'assets/icons/' . $icon_path;
				},
			)
		);
	}
);

/**
 * Expose plugin icon URLs to the block editor as window.aludraIcons.
 *
 * Block edit.js templates use these as the initial `url` on core/image so icons
 * display while editing; the aludra/icon binding resolves the frontend URL.
 */
add_action(
	'enqueue_block_editor_assets',
	function () {
		$icons      = array();
		$icon_files = glob( ALUDRA_PLUGIN_DIR . 'assets/icons/*.svg' );

		if ( $icon_files ) {
			foreach ( $icon_files as $file ) {
				$name           = basename( $file );
				$icons[ $name ] = ALUDRA_PLUGIN_URL . 'assets/icons/' . $name;
			}
		}

		wp_add_inline_script(
			'wp-blocks',
			'window.aludraIcons = ' . wp_json_encode( $icons ) . ';',
			'before'
		);

		// Resolves the aludra/icon binding editor-side, so icons saved in
		// pattern markup (`<img src="" />` plus a binding) render while editing
		// instead of falling back to core/image's full-size placeholder. Depends
		// on wp-blocks so it loads after the map printed above.
		wp_enqueue_script(
			'aludra-editor-icon-binding',
			ALUDRA_PLUGIN_URL . 'assets/js/editor-icon-binding.js',
			array( 'wp-blocks' ),
			ALUDRA_VERSION,
			true
		);
	}
);

/**
 * Register custom blocks with conditional registration based on settings.
 */
add_action(
	'init',
	function () {
		$blocks_dir = ALUDRA_PLUGIN_DIR . 'blocks';

		if ( ! is_dir( $blocks_dir ) ) {
			return;
		}

		// Get enabled blocks from settings.
		$enabled_blocks = get_option(
			'aludra_enabled',
			array(
				'carousel'               => true,
				'slide'                  => true,
				'mega-menu'              => true,
				'faq-tabs'               => true,
				'faq-tab-answer'         => true,
				'search-overlay-trigger' => true,
				'feature-cards'          => true,
				'icon-grid'              => true,
				'trust-bar'              => true,
				'pricing-tiers'          => true,
				'testimonial-grid'       => true,
				'cta-columns'            => true,
				'feature-list-grid'      => true,
				'contact-section'        => true,
				'hero-banner'            => true,
				'cta-banner'             => true,
				'about'                  => true,
				'services-block'         => true,
				'review-profiles'        => true,
				'hero-split'             => true,
				'service-intro'          => true,
				'service-blocks'         => true,
				'load-waterfall'         => true,
				'stat-rail'              => true,
				'stat-item'              => true,
				'spine-section'          => true,
				'split-section'          => true,
				'comparison-table'       => true,
				'comparison-row'         => true,
				'comparison-cell'        => true,
				'photo-grid'             => true,
				'instagram-embed'        => true,
			)
		);

		$block_folders = scandir( $blocks_dir );

		foreach ( $block_folders as $folder ) {
			if ( '.' === $folder || '..' === $folder ) {
				continue;
			}

			$block_json_path = $blocks_dir . '/' . $folder . '/build/block.json';

			if ( file_exists( $block_json_path ) ) {
				// Skip if block is disabled in settings.
				if ( isset( $enabled_blocks[ $folder ] ) && ! $enabled_blocks[ $folder ] ) {
					continue;
				}

				register_block_type( $block_json_path );
			}
		}
	},
	10
);

/**
 * Whether a block is enabled in Settings → Aludra.
 *
 * Mirrors the settings page's default: before anything is saved the option is
 * absent and every block is on; once saved, only keys set to true are.
 *
 * @param string $block Block slug, without the `aludra/` prefix.
 * @return bool
 */
function aludra_is_block_enabled( $block ) {
	$enabled = get_option( 'aludra_enabled' );

	return false === $enabled || ! empty( $enabled[ $block ] );
}

/**
 * Enqueue the Slick Carousel vendor assets.
 *
 * Shared by the carousel and testimonial-grid blocks, both of which use Slick
 * for their frontend slider behaviour. Safe to call once per block: it returns
 * early if Slick is already enqueued, so the localized data is added only once.
 */
function aludra_enqueue_slick_assets() {
	if ( wp_script_is( 'slick-carousel', 'enqueued' ) ) {
		return;
	}

	wp_enqueue_style(
		'slick-carousel',
		ALUDRA_PLUGIN_URL . 'blocks/carousel/slick/slick.css',
		array(),
		'1.8.1'
	);

	wp_enqueue_style(
		'slick-carousel-theme',
		ALUDRA_PLUGIN_URL . 'blocks/carousel/slick/slick-theme.css',
		array( 'slick-carousel' ),
		'1.8.1'
	);

	wp_enqueue_script(
		'slick-carousel',
		ALUDRA_PLUGIN_URL . 'blocks/carousel/slick/slick.min.js',
		array( 'jquery' ),
		'1.8.1',
		true
	);

	// Provide the plugin URL for arrow SVGs.
	wp_localize_script(
		'slick-carousel',
		'aludraBlocksData',
		array(
			'pluginUrl' => ALUDRA_PLUGIN_URL,
		)
	);
}

/**
 * Enqueue Slick and the carousel's own script when a block that needs them renders.
 *
 * Hooked to `render_block` rather than scanning the current post's content:
 * blocks that reach the page through a pattern reference, a template, a
 * template part or a synced pattern are not in `post_content`, so a content
 * scan misses them and the slider never initialises. Rendering is the one
 * point every path goes through. Block themes render the template before
 * `wp_head`, so the stylesheets still land in the head.
 *
 * Rail-mode carousels (`engine: 'rail'`) are a pure CSS scroll-snap track and
 * load nothing, which keeps the rail-mode promise of zero JS.
 *
 * The carousel's own script is enqueued here rather than declared as
 * `viewScript` in block.json, because core enqueues a viewScript whenever the
 * block appears on the page — it has no way to know the block came in rail
 * mode. view.js opens with `( function ( $ ) { … } )( jQuery )`, so on a page
 * whose only carousel is a rail it threw "Can't find variable: jQuery" before
 * ever reaching its own rail guard, and jQuery wasn't loaded because the
 * generated view.asset.php declared no dependencies.
 *
 * It lives in blocks/carousel/js/ rather than src/ because dropping viewScript
 * from block.json also drops it as a webpack entry point — and it needs no
 * bundling: hand-written jQuery, no imports.
 */
add_filter(
	'render_block',
	function ( $block_content, $block ) {
		$name = $block['blockName'] ?? '';

		if ( 'aludra/carousel' === $name
			&& 'rail' !== ( $block['attrs']['engine'] ?? 'slick' )
			&& aludra_is_block_enabled( 'carousel' )
		) {
			aludra_enqueue_slick_assets();

			wp_enqueue_script(
				'aludra-carousel-view',
				ALUDRA_PLUGIN_URL . 'blocks/carousel/js/view.js',
				array( 'jquery', 'slick-carousel' ),
				ALUDRA_VERSION,
				true
			);
		} elseif ( 'aludra/testimonial-grid' === $name && aludra_is_block_enabled( 'testimonial-grid' ) ) {
			aludra_enqueue_slick_assets();
		}

		return $block_content;
	},
	10,
	2
);

/**
 * Enqueue the shared scroll-reveal utility when a reveal block renders.
 *
 * Vanilla IntersectionObserver script (assets/js/scroll-reveal.js) that toggles
 * `.is-revealed` on elements carrying `data-aludra-reveal`. Hooked to
 * `render_block` rather than scanning the current post's content: blocks that
 * reach the page through a pattern reference, a template, a template part or a
 * synced pattern are not in `post_content`, so a content scan misses them and
 * leaves their panes at opacity 0 for good. Rendering is the one point every
 * path goes through, and it runs before the footer scripts print, so the script
 * still loads in the footer and never loads on pages without a reveal block.
 */
add_filter(
	'render_block',
	function ( $block_content, $block ) {
		if ( ! empty( $block['attrs']['revealOnScroll'] ) ) {
			wp_enqueue_script(
				'aludra-scroll-reveal',
				ALUDRA_PLUGIN_URL . 'assets/js/scroll-reveal.js',
				array(),
				ALUDRA_VERSION,
				true
			);
		}

		return $block_content;
	},
	10,
	2
);

/**
 * Register the Aludra block categories.
 *
 * All aludra/* blocks originally shared the built-in "design"/"widgets"
 * categories alongside core blocks, then a single plugin-owned "aludra"
 * category. At thirty blocks that one category is its own haystack, so they
 * are split into six sections instead.
 *
 * The order below is the order the inserter renders them in, and it is
 * deliberately the order a page gets built in — hero, proof, what you do,
 * layout scaffolding, the ask — so the panel reads as a sequence rather than
 * an alphabetised inventory. Navigation sits last because those two blocks
 * belong to a header, not to a page.
 */
add_filter(
	'block_categories_all',
	function ( $categories ) {
		return array_merge(
			array(
				array(
					'slug'  => 'aludra-hero',
					'title' => __( 'Aludra: Heroes', 'aludra' ),
					'icon'  => 'cover-image',
				),
				array(
					'slug'  => 'aludra-proof',
					'title' => __( 'Aludra: Proof', 'aludra' ),
					'icon'  => 'chart-bar',
				),
				array(
					'slug'  => 'aludra-features',
					'title' => __( 'Aludra: Features & Services', 'aludra' ),
					'icon'  => 'screenoptions',
				),
				array(
					'slug'  => 'aludra-layout',
					'title' => __( 'Aludra: Layout', 'aludra' ),
					'icon'  => 'layout',
				),
				array(
					'slug'  => 'aludra-convert',
					'title' => __( 'Aludra: Convert', 'aludra' ),
					'icon'  => 'megaphone',
				),
				array(
					'slug'  => 'aludra-navigation',
					'title' => __( 'Aludra: Navigation', 'aludra' ),
					'icon'  => 'menu',
				),
			),
			$categories
		);
	}
);

/**
 * Register menu template part area for mega menu support.
 * This allows template parts with area 'menu' to be created and used with the mega menu block.
 */
add_filter(
	'default_wp_template_part_areas',
	function ( $areas ) {
		$areas[] = array(
			'area'        => 'menu',
			'area_tag'    => 'div',
			'label'       => __( 'Menus', 'aludra' ),
			'description' => __( 'Template parts for navigation and mega menu content', 'aludra' ),
			'icon'        => 'menu',
		);
		return $areas;
	}
);

/**
 * Register mega menu patterns
 */
add_action(
	'init',
	function () {
		// Register mega menu template parts as patterns.
		if ( function_exists( 'register_block_pattern' ) ) {
			$template_parts_dir = ALUDRA_PLUGIN_DIR . 'patterns';

			if ( is_dir( $template_parts_dir ) ) {
				$template_part_files = glob( $template_parts_dir . '/mega-menu-*.php' );

				foreach ( $template_part_files as $template_file ) {
					$headers = get_file_data(
						$template_file,
						array(
							'title'       => 'Title',
							'slug'        => 'Slug',
							'description' => 'Description',
						)
					);

					// Get the content.
					ob_start();
					include $template_file;
					$content = ob_get_clean();

					$slug = ! empty( $headers['slug'] )
						? $headers['slug']
						: 'aludra/' . basename( $template_file, '.php' );

					// Register as block pattern for menu template parts.
					register_block_pattern(
						$slug,
						array(
							'title'       => ! empty( $headers['title'] ) ? $headers['title'] : basename( $template_file, '.php' ),
							'description' => ! empty( $headers['description'] ) ? $headers['description'] : '',
							'content'     => $content,
							'categories'  => array( 'menus' ),
							'blockTypes'  => array( 'core/template-part/menu' ),
						)
					);
				}
			}
		}
	},
	10
);

/**
 * Whether WooCommerce is active.
 *
 * @return bool
 */
function aludra_woocommerce_active() {
	return class_exists( 'WooCommerce' );
}

/**
 * Whether a pattern file is a store pattern.
 *
 * Store patterns (`section-woo-*.php`, `page-store-*.php`) are built from
 * `woocommerce/*` blocks, which render as invalid-block placeholders on a site
 * without WooCommerce. Aludra works with any theme, so they are registered only
 * when WooCommerce is active.
 *
 * @param string $pattern_file Path or basename of a pattern file.
 * @return bool
 */
function aludra_is_store_pattern_file( $pattern_file ) {
	$name = basename( $pattern_file );

	return 0 === strpos( $name, 'section-woo-' ) || 0 === strpos( $name, 'page-store-' );
}

/**
 * Register file-based patterns matching a glob, honouring their own headers.
 *
 * Shared by the full-page patterns (patterns/page-*.php) and the section
 * patterns (patterns/section-*.php). Both read Categories and Block Types out
 * of the file's own header rather than having them hardcoded per loader, so a
 * new pattern file needs no change here to land in the right place.
 *
 * @param string $pattern_glob Glob relative to the patterns directory.
 * @return void
 */
function aludra_register_pattern_files( $pattern_glob ) {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	$patterns_dir = ALUDRA_PLUGIN_DIR . 'patterns';

	if ( ! is_dir( $patterns_dir ) ) {
		return;
	}

	$pattern_files = glob( $patterns_dir . '/' . $pattern_glob );

	if ( ! $pattern_files ) {
		return;
	}

	foreach ( $pattern_files as $pattern_file ) {
		if ( aludra_is_store_pattern_file( $pattern_file ) && ! aludra_woocommerce_active() ) {
			continue;
		}

		$headers = get_file_data(
			$pattern_file,
			array(
				'title'       => 'Title',
				'slug'        => 'Slug',
				'description' => 'Description',
				'categories'  => 'Categories',
				'block_types' => 'Block Types',
			)
		);

		ob_start();
		include $pattern_file;
		$content = ob_get_clean();

		$slug = ! empty( $headers['slug'] )
			? $headers['slug']
			: 'aludra/' . basename( $pattern_file, '.php' );

		$args = array(
			'title'       => ! empty( $headers['title'] ) ? $headers['title'] : basename( $pattern_file, '.php' ),
			'description' => ! empty( $headers['description'] ) ? $headers['description'] : '',
			'content'     => $content,
			'categories'  => ! empty( $headers['categories'] )
				? array_map( 'trim', explode( ',', $headers['categories'] ) )
				: array( 'aludra-pages' ),
		);

		/*
		 * Only the page patterns declare Block Types (core/post-content), which
		 * is what puts them in the Site Editor's "choose a pattern" picker for
		 * a new page. Section patterns must NOT declare it — a blockTypes entry
		 * would hijack that same picker and bury the four real page layouts
		 * among fourteen fragments.
		 */
		if ( ! empty( $headers['block_types'] ) ) {
			$args['blockTypes'] = array_map( 'trim', explode( ',', $headers['block_types'] ) );
		}

		register_block_pattern( $slug, $args );
	}
}

/**
 * Register full-page patterns (patterns/page-*.php) and section patterns
 * (patterns/section-*.php).
 *
 * Page patterns assemble a whole page and appear in the Site Editor's "choose
 * a pattern" picker when creating one. Section patterns are the single bands a
 * page is built from — a hero, a stat rail, a pricing table — each pre-filled
 * with plausible copy and the right style variation, so the unit a user picks
 * up from the inserter is a finished section rather than an empty block.
 */
add_action(
	'init',
	function () {
		aludra_register_pattern_files( 'page-*.php' );
		aludra_register_pattern_files( 'section-*.php' );
		aludra_register_pattern_files( 'carousel-*.php' );
	},
	10
);

/**
 * Register block patterns category and load pattern files
 */
add_action(
	'init',
	function () {
		/*
		 * Register pattern categories.
		 *
		 * These mirror the block categories registered above, so a section a
		 * user finds in the inserter's Patterns tab sits under the same heading
		 * as the block it is built from. The single "aludra" category that
		 * previously held carousel demos and whole page layouts together is
		 * split into "Full Pages" and "Carousels".
		 */
		if ( function_exists( 'register_block_pattern_category' ) ) {
			$pattern_categories = array(
				'aludra-pages'    => array(
					__( 'Aludra: Full Pages', 'aludra' ),
					__( 'Complete page layouts assembled from Aludra sections.', 'aludra' ),
				),
				'aludra-hero'     => array(
					__( 'Aludra: Heroes', 'aludra' ),
					__( 'Opening sections for a page.', 'aludra' ),
				),
				'aludra-proof'    => array(
					__( 'Aludra: Proof', 'aludra' ),
					__( 'Stats, trust signals, reviews and comparisons.', 'aludra' ),
				),
				'aludra-features' => array(
					__( 'Aludra: Features & Services', 'aludra' ),
					__( 'Sections describing what you do.', 'aludra' ),
				),
				'aludra-layout'   => array(
					__( 'Aludra: Layout', 'aludra' ),
					__( 'Structural sections and content bands.', 'aludra' ),
				),
				'aludra-convert'  => array(
					__( 'Aludra: Convert', 'aludra' ),
					__( 'Pricing, FAQ, contact and call-to-action sections.', 'aludra' ),
				),
				'aludra-carousel' => array(
					__( 'Aludra: Carousels', 'aludra' ),
					__( 'Pre-configured Aludra carousel setups.', 'aludra' ),
				),
				'menus'           => array(
					__( 'Menus', 'aludra' ),
					__( 'Mega menu patterns for navigation template parts.', 'aludra' ),
				),
			);

			// Store sections are only offered where WooCommerce can render them.
			if ( aludra_woocommerce_active() ) {
				$pattern_categories['aludra-store'] = array(
					__( 'Aludra: Store', 'aludra' ),
					__( 'WooCommerce sections: product grids and category showcases.', 'aludra' ),
				);
			}

			foreach ( $pattern_categories as $category_slug => $category ) {
				register_block_pattern_category(
					$category_slug,
					array(
						'label'       => $category[0],
						'description' => $category[1],
					)
				);
			}
		}

		// Every pattern is file-based: page-*, section-* and carousel-* are registered by
		// aludra_register_pattern_files(), mega-menu-* separately with the 'menus' category.
	},
	15
);
