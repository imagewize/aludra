<?php
/**
 * Plugin Name: Aludra
 * Plugin URI: https://github.com/imagewize/aludra
 * Description: Shared custom block library for Imagewize block themes (Elayne, Aviendha) — Mega Menu, Carousel, FAQ Tabs, and content blocks (Feature Cards, Pricing Tiers, Testimonial Grid, Contact Section, Hero Banner, and more). Built with React, block.json, and @wordpress/scripts.
 * Version: 2.19.0
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

define( 'ALUDRA_VERSION', '2.19.0' );
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
 * Enqueue Slick Carousel assets conditionally.
 *
 * Shared between the carousel and testimonial-grid blocks, both of which use
 * Slick for their frontend slider behaviour.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
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
			)
		);

		$carousel_active         = ! empty( $enabled_blocks['carousel'] ) && has_block( 'aludra/carousel' );
		$testimonial_grid_active = ! empty( $enabled_blocks['testimonial-grid'] ) && has_block( 'aludra/testimonial-grid' );

		// Only load Slick assets if a block that needs them is being used.
		if ( $carousel_active || $testimonial_grid_active ) {
			// Enqueue Slick Carousel CSS.
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

			// Enqueue Slick Carousel JS.
			wp_enqueue_script(
				'slick-carousel',
				ALUDRA_PLUGIN_URL . 'blocks/carousel/slick/slick.min.js',
				array( 'jquery' ),
				'1.8.1',
				true
			);

			// Localize script to provide plugin URL for arrow SVGs.
			wp_localize_script(
				'slick-carousel',
				'aludraBlocksData',
				array(
					'pluginUrl' => ALUDRA_PLUGIN_URL,
				)
			);
		}
	}
);

/**
 * Enqueue the shared scroll-reveal utility conditionally.
 *
 * Vanilla IntersectionObserver script (assets/js/scroll-reveal.js) that toggles
 * `.is-revealed` on elements carrying `data-aludra-reveal`. Only enqueued on
 * pages that actually contain a block with its `revealOnScroll` attribute set
 * to true, so it never loads on pages that don't use it. See
 * docs/CARD-EFFECTS-AND-SCROLL-ANIMATIONS.md for the full design.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		$post = get_post();

		if ( ! $post || ! has_blocks( $post->post_content ) ) {
			return;
		}

		if ( ! aludra_blocks_have_reveal_on_scroll( parse_blocks( $post->post_content ) ) ) {
			return;
		}

		wp_enqueue_script(
			'aludra-scroll-reveal',
			ALUDRA_PLUGIN_URL . 'assets/js/scroll-reveal.js',
			array(),
			ALUDRA_VERSION,
			true
		);
	}
);

/**
 * Recursively check parsed blocks for a `revealOnScroll` attribute set to true.
 *
 * @param array $blocks Parsed blocks, as returned by parse_blocks().
 * @return bool
 */
function aludra_blocks_have_reveal_on_scroll( array $blocks ) {
	foreach ( $blocks as $block ) {
		if ( ! empty( $block['attrs']['revealOnScroll'] ) ) {
			return true;
		}

		if ( ! empty( $block['innerBlocks'] ) && aludra_blocks_have_reveal_on_scroll( $block['innerBlocks'] ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Register a dedicated "Aludra" block category.
 *
 * All aludra/* blocks previously shared the built-in "design"/"widgets"
 * categories alongside core blocks, which buried them in the inserter.
 * Grouping them under one plugin-owned category makes them easy to find.
 */
add_filter(
	'block_categories_all',
	function ( $categories ) {
		return array_merge(
			array(
				array(
					'slug'  => 'aludra',
					'title' => __( 'Aludra', 'aludra' ),
					'icon'  => 'layout',
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
 * Register full-page patterns (patterns/page-*.php).
 *
 * These appear in the Site Editor's "choose a pattern" picker when creating a
 * new page (blockTypes: core/post-content), in addition to the inserter.
 */
add_action(
	'init',
	function () {
		if ( function_exists( 'register_block_pattern' ) ) {
			$patterns_dir = ALUDRA_PLUGIN_DIR . 'patterns';

			if ( is_dir( $patterns_dir ) ) {
				$page_pattern_files = glob( $patterns_dir . '/page-*.php' );

				foreach ( $page_pattern_files as $pattern_file ) {
					$headers = get_file_data(
						$pattern_file,
						array(
							'title'       => 'Title',
							'slug'        => 'Slug',
							'description' => 'Description',
						)
					);

					ob_start();
					include $pattern_file;
					$content = ob_get_clean();

					$slug = ! empty( $headers['slug'] )
						? $headers['slug']
						: 'aludra/' . basename( $pattern_file, '.php' );

					register_block_pattern(
						$slug,
						array(
							'title'       => ! empty( $headers['title'] ) ? $headers['title'] : basename( $pattern_file, '.php' ),
							'description' => ! empty( $headers['description'] ) ? $headers['description'] : '',
							'content'     => $content,
							'categories'  => array( 'aludra' ),
							'blockTypes'  => array( 'core/post-content' ),
						)
					);
				}
			}
		}
	},
	10
);

/**
 * Register block patterns category and load pattern files
 */
add_action(
	'init',
	function () {
		// Register pattern categories.
		if ( function_exists( 'register_block_pattern_category' ) ) {
			// Aludra category for carousel patterns.
			register_block_pattern_category(
				'aludra',
				array(
					'label'       => __( 'Aludra', 'aludra' ),
					'description' => __( 'Pre-configured patterns for Aludra carousel.', 'aludra' ),
				)
			);

			// Menus category for mega menu patterns.
			register_block_pattern_category(
				'menus',
				array(
					'label'       => __( 'Menus', 'aludra' ),
					'description' => __( 'Mega menu patterns for navigation template parts.', 'aludra' ),
				)
			);
		}

		// Note: Mega menu patterns (mega-menu-*.php) are registered separately with 'menus' category.
		// This section is reserved for future non-template-part patterns.

		// Pattern 1: Hero Carousel.
		if ( function_exists( 'register_block_pattern' ) ) {
			register_block_pattern(
				'aludra/hero-carousel',
				array(
					'title'       => __( 'Hero Carousel', 'aludra' ),
					'description' => __( 'Full-width hero carousel with autoplay and fade transition.', 'aludra' ),
					'categories'  => array( 'aludra' ),
					'content'     => '<!-- wp:aludra/carousel {"slidesToShow":1,"slidesToScroll":1,"infinite":true,"autoplay":true,"autoplaySpeed":5000,"speed":1000,"arrows":true,"dots":true} -->
<div class="wp-block-aludra-carousel slick-slider cb-single-slide cb-padding cb-arrow-style-arrow cb-arrow-bg-none" data-slick="{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:true,&quot;autoplaySpeed&quot;:5000,&quot;speed&quot;:1000,&quot;rtl&quot;:false,&quot;adaptiveHeight&quot;:false,&quot;centerMode&quot;:false,&quot;centerPadding&quot;:&quot;50px&quot;,&quot;variableWidth&quot;:false,&quot;lazyLoad&quot;:&quot;ondemand&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;centerMode&quot;:false,&quot;variableWidth&quot;:false}}]}" data-dots-top="0px" data-dots-bottom="0px" data-arrow-color="#000000" data-arrow-background="transparent" data-arrow-hover-color="#000000" data-arrow-hover-background="transparent" data-arrow-style="arrow" data-arrow-background-style="none" data-arrow-size="40"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:cover {"url":"https://images.unsplash.com/photo-1557683316-973673baf926","dimRatio":50,"minHeight":500,"minHeightUnit":"px","contentPosition":"center center"} -->
<div class="wp-block-cover" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="https://images.unsplash.com/photo-1557683316-973673baf926" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1} -->
<h1 class="wp-block-heading has-text-align-center">Welcome to Our Site</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Discover amazing content</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:cover {"url":"https://images.unsplash.com/photo-1558618666-fcd25c85cd64","dimRatio":50,"minHeight":500,"minHeightUnit":"px","contentPosition":"center center"} -->
<div class="wp-block-cover" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1} -->
<h1 class="wp-block-heading has-text-align-center">Premium Services</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Quality you can trust</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:cover {"url":"https://images.unsplash.com/photo-1519389950473-47ba0277781c","dimRatio":50,"minHeight":500,"minHeightUnit":"px","contentPosition":"center center"} -->
<div class="wp-block-cover" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="https://images.unsplash.com/photo-1519389950473-47ba0277781c" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1} -->
<h1 class="wp-block-heading has-text-align-center">Get Started Today</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Join thousands of satisfied customers</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel -->',
				)
			);

			// Pattern 2: Testimonial Carousel.
			register_block_pattern(
				'aludra/testimonial-carousel',
				array(
					'title'       => __( 'Testimonial Carousel', 'aludra' ),
					'description' => __( 'Center mode carousel with 3 slides visible, perfect for testimonials.', 'aludra' ),
					'categories'  => array( 'aludra' ),
					'content'     => '<!-- wp:aludra/carousel {"slidesToShow":1,"slidesToScroll":1,"infinite":true,"centerMode":true,"centerPadding":"100px","arrows":true,"dots":true} -->
<div class="wp-block-aludra-carousel slick-slider cb-single-slide cb-padding cb-center-mode cb-arrow-style-arrow cb-arrow-bg-none" data-slick="{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;rtl&quot;:false,&quot;adaptiveHeight&quot;:false,&quot;centerMode&quot;:true,&quot;centerPadding&quot;:&quot;100px&quot;,&quot;variableWidth&quot;:false,&quot;lazyLoad&quot;:&quot;ondemand&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;centerMode&quot;:false,&quot;variableWidth&quot;:false}}]}" data-dots-top="0px" data-dots-bottom="0px" data-arrow-color="#000000" data-arrow-background="transparent" data-arrow-hover-color="#000000" data-arrow-hover-background="transparent" data-arrow-style="arrow" data-arrow-background-style="none" data-arrow-size="40"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"8px"}},"backgroundColor":"base"} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">"This product changed my life! Highly recommended to everyone."</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4} -->
<h4 class="wp-block-heading has-text-align-center">Sarah Johnson</h4>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"8px"}},"backgroundColor":"base"} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">"Excellent service and support. Will definitely use again!"</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4} -->
<h4 class="wp-block-heading has-text-align-center">Michael Chen</h4>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"8px"}},"backgroundColor":"base"} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">"Best decision I made for my business this year."</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4} -->
<h4 class="wp-block-heading has-text-align-center">Emma Davis</h4>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel -->',
				)
			);

			// Pattern 3: Product Gallery with Thumbnails.
			register_block_pattern(
				'aludra/product-gallery',
				array(
					'title'       => __( 'Product Gallery with Thumbnails', 'aludra' ),
					'description' => __( 'Image carousel with thumbnail navigation below, perfect for product galleries.', 'aludra' ),
					'categories'  => array( 'aludra' ),
					'content'     => '<!-- wp:aludra/carousel {"slidesToShow":1,"slidesToScroll":1,"infinite":true,"enableThumbnails":true,"thumbnailsToShow":4,"thumbnailPosition":"below","arrows":true,"dots":false} -->
<div class="wp-block-aludra-carousel slick-slider cb-single-slide cb-padding cb-thumbnails cb-arrow-style-arrow cb-arrow-bg-none" data-slick="{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:false,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;rtl&quot;:false,&quot;adaptiveHeight&quot;:false,&quot;centerMode&quot;:false,&quot;centerPadding&quot;:&quot;50px&quot;,&quot;variableWidth&quot;:false,&quot;lazyLoad&quot;:&quot;ondemand&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;centerMode&quot;:false,&quot;variableWidth&quot;:false}}]}" data-dots-top="0px" data-dots-bottom="0px" data-arrow-color="#000000" data-arrow-background="transparent" data-arrow-hover-color="#000000" data-arrow-hover-background="transparent" data-thumbnails="true" data-thumbnails-to-show="4" data-thumbnail-position="below" data-thumbnail-spacing="30px" data-arrow-style="arrow" data-arrow-background-style="none" data-arrow-size="40"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" alt="Product view 1"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f" alt="Product view 2"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e" alt="Product view 3"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1560343090-f0409e92791a" alt="Product view 4"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel -->',
				)
			);

			// Pattern 4: Portfolio Showcase.
			register_block_pattern(
				'aludra/portfolio-showcase',
				array(
					'title'       => __( 'Portfolio Showcase', 'aludra' ),
					'description' => __( 'Variable width carousel for displaying portfolio items with different sizes.', 'aludra' ),
					'categories'  => array( 'aludra' ),
					'content'     => '<!-- wp:aludra/carousel {"slidesToShow":3,"slidesToScroll":1,"infinite":true,"variableWidth":true,"arrows":true,"dots":true} -->
<div class="wp-block-aludra-carousel slick-slider cb-padding cb-variable-width cb-arrow-style-arrow cb-arrow-bg-none" data-slick="{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;rtl&quot;:false,&quot;adaptiveHeight&quot;:false,&quot;centerMode&quot;:false,&quot;centerPadding&quot;:&quot;50px&quot;,&quot;variableWidth&quot;:true,&quot;lazyLoad&quot;:&quot;ondemand&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;centerMode&quot;:false,&quot;variableWidth&quot;:false}}]}" data-dots-top="0px" data-dots-bottom="0px" data-arrow-color="#000000" data-arrow-background="transparent" data-arrow-hover-color="#000000" data-arrow-hover-background="transparent" data-arrow-style="arrow" data-arrow-background-style="none" data-arrow-size="40"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"300px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085" alt="Project 1" style="width:300px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Web Design</h3>
<!-- /wp:heading --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"400px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f" alt="Project 2" style="width:400px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">App Development</h3>
<!-- /wp:heading --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"350px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="https://images.unsplash.com/photo-1551650975-87deedd944c3" alt="Project 3" style="width:350px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Branding</h3>
<!-- /wp:heading --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel -->',
				)
			);

			// Pattern 5: Team Members.
			register_block_pattern(
				'aludra/team-members',
				array(
					'title'       => __( 'Team Members Carousel', 'aludra' ),
					'description' => __( 'Multi-slide carousel with adaptive height for team member profiles.', 'aludra' ),
					'categories'  => array( 'aludra' ),
					'content'     => '<!-- wp:aludra/carousel {"slidesToShow":3,"slidesToScroll":1,"infinite":true,"adaptiveHeight":true,"arrows":true,"dots":true,"responsiveSlides":1} -->
<div class="wp-block-aludra-carousel slick-slider cb-padding cb-arrow-style-arrow cb-arrow-bg-none" data-slick="{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;rtl&quot;:false,&quot;adaptiveHeight&quot;:true,&quot;centerMode&quot;:false,&quot;centerPadding&quot;:&quot;50px&quot;,&quot;variableWidth&quot;:false,&quot;lazyLoad&quot;:&quot;ondemand&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;centerMode&quot;:false,&quot;variableWidth&quot;:false}}]}" data-dots-top="0px" data-dots-bottom="0px" data-arrow-color="#000000" data-arrow-background="transparent" data-arrow-hover-color="#000000" data-arrow-hover-background="transparent" data-arrow-style="arrow" data-arrow-background-style="none" data-arrow-size="40"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"align":"center","width":"150px","height":"150px","sizeSlug":"large","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Team member 1" style="width:150px;height:150px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Jane Smith</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>CEO &amp; Founder</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Leading our team with vision and passion for excellence.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"align":"center","width":"150px","height":"150px","sizeSlug":"large","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="Team member 2" style="width:150px;height:150px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">John Doe</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Creative Director</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Crafting beautiful designs that inspire and engage.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"align":"center","width":"150px","height":"150px","sizeSlug":"large","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2" alt="Team member 3" style="width:150px;height:150px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Sarah Wilson</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Head of Marketing</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Connecting with audiences and building meaningful relationships.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel -->',
				)
			);
		}
	},
	15
);

/**
 * Allow SVG and WebP uploads to the media library.
 *
 * @param array $mimes Allowed MIME types.
 * @return array Modified MIME types array.
 */
function aludra_allow_additional_mime_types( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter( 'upload_mimes', __NAMESPACE__ . '\\aludra_allow_additional_mime_types' );

/**
 * Fix SVG and WebP display in media library.
 */
function aludra_fix_media_display() {
	echo '<style>
		.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
			width: 100% !important;
			height: auto !important;
		}
		.media-icon img[src$=".webp"], img[src$=".webp"].attachment-post-thumbnail {
			width: 100% !important;
			height: auto !important;
		}
	</style>';
}
add_action( 'admin_head', __NAMESPACE__ . '\\aludra_fix_media_display' );
