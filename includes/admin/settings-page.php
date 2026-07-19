<?php
/**
 * Admin Settings Page for Aludra
 *
 * Provides an admin interface to selectively enable/disable individual blocks,
 * rendered as a categorized grid of block cards.
 *
 * @package Aludra
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the settings page in WordPress admin.
 */
function aludra_add_settings_page() {
	add_options_page(
		__( 'Aludra Settings', 'aludra' ),
		__( 'Aludra', 'aludra' ),
		'manage_options',
		'aludra',
		'aludra_settings_page_html'
	);
}
add_action( 'admin_menu', 'aludra_add_settings_page' );

/**
 * Register the setting with the WordPress Settings API.
 *
 * The page renders its own fields (see aludra_settings_page_html), so only the
 * option itself is registered here — that is what allows options.php to accept
 * and sanitize the submitted `aludra_enabled` array.
 */
function aludra_register_settings() {
	register_setting(
		'aludra_settings',
		'aludra_enabled',
		array(
			'type'              => 'array',
			'sanitize_callback' => 'aludra_sanitize_settings',
			'default'           => aludra_get_default_settings(),
		)
	);
}
add_action( 'admin_init', 'aludra_register_settings' );

/**
 * Get default settings (all blocks enabled).
 *
 * @return array Default settings with all blocks enabled.
 */
function aludra_get_default_settings() {
	return array(
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
	);
}

/**
 * Get the ordered list of block categories.
 *
 * @return array Category slug => label.
 */
function aludra_get_block_categories() {
	return array(
		'carousel'    => __( 'Carousel', 'aludra' ),
		'interactive' => __( 'Interactive', 'aludra' ),
		'marketing'   => __( 'Marketing & Content', 'aludra' ),
	);
}

/**
 * Get available blocks with metadata.
 *
 * @return array Block configuration data keyed by block slug.
 */
function aludra_get_available_blocks() {
	return array(
		'carousel'               => array(
			'label'       => __( 'Carousel', 'aludra' ),
			'description' => __( 'Create responsive image and content carousels with Slick Carousel.', 'aludra' ),
			'category'    => 'carousel',
		),
		'slide'                  => array(
			'label'       => __( 'Slide', 'aludra' ),
			'description' => __( 'Individual slides placed inside a Carousel block.', 'aludra' ),
			'category'    => 'carousel',
			'parent'      => 'carousel',
		),
		'mega-menu'              => array(
			'label'       => __( 'Mega Menu', 'aludra' ),
			'description' => __( 'Add expandable mega menus to a navigation block.', 'aludra' ),
			'category'    => 'interactive',
		),
		'faq-tabs'               => array(
			'label'       => __( 'FAQ Tabs', 'aludra' ),
			'description' => __( 'Interactive FAQ with vertical tabs and content panels.', 'aludra' ),
			'category'    => 'interactive',
		),
		'faq-tab-answer'         => array(
			'label'       => __( 'FAQ Tab Answer', 'aludra' ),
			'description' => __( 'A single question and answer inside FAQ Tabs.', 'aludra' ),
			'category'    => 'interactive',
			'parent'      => 'faq-tabs',
		),
		'search-overlay-trigger' => array(
			'label'       => __( 'Search Overlay Trigger', 'aludra' ),
			'description' => __( 'A search icon that opens a full-screen search overlay.', 'aludra' ),
			'category'    => 'interactive',
		),
		'feature-cards'          => array(
			'label'       => __( 'Feature Cards', 'aludra' ),
			'description' => __( 'Responsive grid of feature highlight cards with icons.', 'aludra' ),
			'category'    => 'marketing',
		),
		'icon-grid'              => array(
			'label'       => __( 'Icon Grid', 'aludra' ),
			'description' => __( 'Auto-fit grid of icon and text items with a section header.', 'aludra' ),
			'category'    => 'marketing',
		),
		'trust-bar'              => array(
			'label'       => __( 'Trust Bar', 'aludra' ),
			'description' => __( 'Inline bar of trust-signal items with icons.', 'aludra' ),
			'category'    => 'marketing',
		),
		'pricing-tiers'          => array(
			'label'       => __( 'Pricing Tiers', 'aludra' ),
			'description' => __( 'Three-column pricing table with a featured tier.', 'aludra' ),
			'category'    => 'marketing',
		),
		'testimonial-grid'       => array(
			'label'       => __( 'Testimonial Grid', 'aludra' ),
			'description' => __( 'Customer testimonials with metrics; carousels on larger sets.', 'aludra' ),
			'category'    => 'marketing',
		),
		'cta-columns'            => array(
			'label'       => __( 'CTA Columns', 'aludra' ),
			'description' => __( 'Dual call-to-action cards with headings, text, and buttons.', 'aludra' ),
			'category'    => 'marketing',
		),
		'feature-list-grid'      => array(
			'label'       => __( 'Feature List Grid', 'aludra' ),
			'description' => __( 'Two-column grid of features with checkmarks and hover effects.', 'aludra' ),
			'category'    => 'marketing',
		),
		'contact-section'        => array(
			'label'       => __( 'Contact Section', 'aludra' ),
			'description' => __( 'Dark contact section with an info column and Contact Form 7 form card.', 'aludra' ),
			'category'    => 'marketing',
		),
		'hero-banner'            => array(
			'label'       => __( 'Hero Banner', 'aludra' ),
			'description' => __( 'Dark full-width hero with an eyebrow badge, heading, lead text, and dual CTA buttons.', 'aludra' ),
			'category'    => 'marketing',
		),
		'cta-banner'             => array(
			'label'       => __( 'CTA Banner', 'aludra' ),
			'description' => __( 'Full-width call-to-action band with heading, lead text, and button; colours adapt to the active theme.', 'aludra' ),
			'category'    => 'marketing',
		),
		'about'                  => array(
			'label'       => __( 'About Section', 'aludra' ),
			'description' => __( 'Full-width about/value-proposition section with heading, lead text, an offer list, and closing copy.', 'aludra' ),
			'category'    => 'marketing',
		),
		'services-block'         => array(
			'label'       => __( 'Services Block', 'aludra' ),
			'description' => __( 'Section header with a two-per-row grid of icon, heading, and text service cards.', 'aludra' ),
			'category'    => 'marketing',
		),
	);
}

/**
 * Sanitize and validate settings before saving.
 *
 * @param array $input Raw input from settings form.
 * @return array Sanitized and validated settings.
 */
function aludra_sanitize_settings( $input ) {
	$sanitized = array();
	$defaults  = aludra_get_default_settings();

	// Sanitize each block setting.
	foreach ( $defaults as $block_slug => $default_value ) {
		$sanitized[ $block_slug ] = isset( $input[ $block_slug ] ) && '1' === $input[ $block_slug ];
	}

	// Validate dependencies.
	$sanitized = aludra_validate_dependencies( $sanitized );

	return $sanitized;
}

/**
 * Validate parent-child block dependencies.
 *
 * @param array $settings Block settings.
 * @return array Validated settings with dependencies enforced.
 */
function aludra_validate_dependencies( $settings ) {
	// If Carousel is disabled, auto-disable Slide.
	if ( empty( $settings['carousel'] ) ) {
		$settings['slide'] = false;
	}

	// If FAQ Tabs is disabled, auto-disable FAQ Tab Answer.
	if ( empty( $settings['faq-tabs'] ) ) {
		$settings['faq-tab-answer'] = false;
	}

	return $settings;
}

/**
 * Return the inline SVG glyph for a block, keyed by slug.
 *
 * Glyphs are decorative; each is a simple line mark hinting at the block layout.
 *
 * @param string $slug Block slug.
 * @return string SVG markup (already safe, hard-coded).
 */
function aludra_get_block_glyph( $slug ) {
	$glyphs = array(
		'carousel'               => '<rect x="6" y="5" width="12" height="14" rx="1.5"/><path d="M3 9v6M21 9v6" stroke-linecap="round"/>',
		'slide'                  => '<rect x="4" y="6" width="16" height="12" rx="1.5"/><path d="M8 18v-3M12 18v-3M16 18v-3" stroke-linecap="round"/>',
		'mega-menu'              => '<path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round"/><rect x="9" y="9" width="11" height="9" rx="1"/>',
		'faq-tabs'               => '<rect x="4" y="5" width="6" height="14" rx="1"/><path d="M13 8h7M13 12h7M13 16h4" stroke-linecap="round"/>',
		'faq-tab-answer'         => '<path d="M5 6h14v9H9l-4 3z" stroke-linejoin="round"/>',
		'search-overlay-trigger' => '<circle cx="11" cy="11" r="6"/><path d="m20 20-4-4" stroke-linecap="round"/>',
		'feature-cards'          => '<rect x="4" y="5" width="7" height="7" rx="1"/><rect x="13" y="5" width="7" height="7" rx="1"/><rect x="4" y="14" width="7" height="5" rx="1"/><rect x="13" y="14" width="7" height="5" rx="1"/>',
		'icon-grid'              => '<circle cx="7" cy="7" r="2.5"/><circle cx="7" cy="17" r="2.5"/><circle cx="17" cy="7" r="2.5"/><circle cx="17" cy="17" r="2.5"/>',
		'trust-bar'              => '<rect x="3" y="9" width="18" height="6" rx="2"/><path d="M7 12h.01M11 12h.01M15 12h.01" stroke-linecap="round"/>',
		'pricing-tiers'          => '<rect x="4" y="6" width="4.5" height="13" rx="1"/><rect x="9.75" y="4" width="4.5" height="15" rx="1"/><rect x="15.5" y="8" width="4.5" height="11" rx="1"/>',
		'testimonial-grid'       => '<path d="M5 5h14v9H12l-3 3v-3H5z" stroke-linejoin="round"/><path d="M8 9h8M8 11.5h5" stroke-linecap="round"/>',
		'cta-columns'            => '<rect x="3" y="7" width="8" height="10" rx="1.5"/><rect x="13" y="7" width="8" height="10" rx="1.5"/>',
		'feature-list-grid'      => '<path d="M5 7l1.5 1.5L9 6M5 13l1.5 1.5L9 12M5 19l1.5 1.5L9 18" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 7h8M12 13h8M12 19h6" stroke-linecap="round"/>',
		'contact-section'        => '<rect x="3" y="5" width="18" height="14" rx="1.5"/><path d="M3 8l9 6 9-6" stroke-linecap="round" stroke-linejoin="round"/>',
		'hero-banner'            => '<rect x="3" y="4" width="18" height="16" rx="1.5"/><path d="M7 9h6M7 12.5h10M7 16h4" stroke-linecap="round"/>',
		'cta-banner'             => '<rect x="3" y="7" width="18" height="10" rx="1.5"/><path d="M8 12h5" stroke-linecap="round"/><rect x="15" y="10.5" width="3" height="3" rx="0.5"/>',
		'about'                  => '<rect x="3" y="4" width="18" height="16" rx="1.5"/><path d="M7 8h10M7 11h10" stroke-linecap="round"/><circle cx="8.5" cy="15" r="0.9"/><circle cx="8.5" cy="18" r="0.9"/><path d="M11 15h6M11 18h6" stroke-linecap="round"/>',
		'services-block'         => '<rect x="3" y="4" width="8" height="7" rx="1.5"/><rect x="13" y="4" width="8" height="7" rx="1.5"/><rect x="3" y="13" width="8" height="7" rx="1.5"/><rect x="13" y="13" width="8" height="7" rx="1.5"/>',
	);

	$path = isset( $glyphs[ $slug ] ) ? $glyphs[ $slug ] : '<rect x="5" y="5" width="14" height="14" rx="2"/>';

	return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">' . $path . '</svg>';
}

/**
 * Render the four-point "spark" star mark used in the header and category ticks.
 *
 * @param string $css_class CSS class for the SVG element.
 * @return string SVG markup.
 */
function aludra_star_svg( $css_class ) {
	return '<svg class="' . esc_attr( $css_class ) . '" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0c.6 6 5.4 10.8 11.4 11.4v.2C17.4 12.2 12.6 17 12 23c-.6-6-5.4-10.8-11.4-11.4v-.2C6.6 10.8 11.4 6 12 0Z"/></svg>';
}

/**
 * Render a single block card.
 *
 * @param string $slug           Block slug.
 * @param array  $block          Block metadata.
 * @param bool   $enabled        Whether the block is currently enabled.
 * @param array  $enabled_blocks Full enabled-state map (used to resolve parent state).
 */
function aludra_render_block_card( $slug, $block, $enabled, $enabled_blocks ) {
	$parent          = isset( $block['parent'] ) ? $block['parent'] : null;
	$parent_disabled = $parent && empty( $enabled_blocks[ $parent ] );
	$state_class     = $enabled ? 'is-on' : 'is-off';
	$checkbox_id     = 'aludra_' . $slug;
	?>
	<article class="aludra-card <?php echo esc_attr( $state_class ); ?>">
		<div class="aludra-card-top">
			<span class="aludra-glyph"><?php echo aludra_get_block_glyph( $slug ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- hard-coded SVG markup. ?></span>
			<div class="aludra-card-heading">
				<h3 class="aludra-card-title"><?php echo esc_html( $block['label'] ); ?></h3>
				<span class="aludra-card-slug">aludra/<?php echo esc_html( $slug ); ?></span>
			</div>
			<label class="aludra-toggle">
				<input
					type="checkbox"
					name="aludra_enabled[<?php echo esc_attr( $slug ); ?>]"
					value="1"
					id="<?php echo esc_attr( $checkbox_id ); ?>"
					class="aludra-block-checkbox"
					<?php echo $parent ? 'data-parent="' . esc_attr( $parent ) . '"' : ''; ?>
					<?php checked( $enabled ); ?>
					<?php disabled( $parent_disabled ); ?>
				/>
				<span class="aludra-track" aria-hidden="true"></span>
				<span class="screen-reader-text">
					<?php
					/* translators: %s: block name */
					printf( esc_html__( 'Enable %s block', 'aludra' ), esc_html( $block['label'] ) );
					?>
				</span>
			</label>
		</div>
		<p class="aludra-card-desc"><?php echo esc_html( $block['description'] ); ?></p>
		<?php if ( $parent ) : ?>
			<?php $blocks = aludra_get_available_blocks(); ?>
			<span class="aludra-dep">
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 12h6M12 9v6" stroke-linecap="round"/><circle cx="12" cy="12" r="9"/></svg>
				<?php
				/* translators: %s: parent block name */
				printf( esc_html__( 'Requires %s', 'aludra' ), esc_html( $blocks[ $parent ]['label'] ) );
				?>
			</span>
		<?php endif; ?>
	</article>
	<?php
}

/**
 * Render the settings page HTML.
 */
function aludra_settings_page_html() {
	// Check user capabilities.
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Render the "Settings saved." notice queued by the Settings API on save.
	// We deliberately do not add our own message here — options.php already
	// queues one, and adding a second causes a duplicate notice.
	settings_errors();

	$blocks         = aludra_get_available_blocks();
	$categories     = aludra_get_block_categories();
	$enabled_blocks = get_option( 'aludra_enabled', aludra_get_default_settings() );

	$total_count   = count( $blocks );
	$enabled_count = 0;
	foreach ( $blocks as $slug => $block ) {
		if ( ! empty( $enabled_blocks[ $slug ] ) ) {
			++$enabled_count;
		}
	}
	?>
	<div class="wrap aludra-settings">

		<header class="aludra-head">
			<div class="aludra-wordmark">
				<?php echo aludra_star_svg( 'aludra-star' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- hard-coded SVG markup. ?>
				<div>
					<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
					<span class="sub">
						<?php
						/* translators: %d: total number of blocks */
						printf( esc_html__( 'Block library · %d blocks for Imagewize themes', 'aludra' ), (int) $total_count );
						?>
					</span>
				</div>
			</div>

			<div class="aludra-summary">
				<div class="aludra-count" aria-live="polite">
					<span class="dot"></span>
					<b class="aludra-count-num"><?php echo (int) $enabled_count; ?></b>
					<span class="of">/ <?php echo (int) $total_count; ?></span>
					<span class="lbl"><?php esc_html_e( 'enabled', 'aludra' ); ?></span>
				</div>
				<div class="aludra-bulk">
					<button type="button" class="button" id="aludra-enable-all"><?php esc_html_e( 'Enable all', 'aludra' ); ?></button>
					<button type="button" class="button" id="aludra-disable-all"><?php esc_html_e( 'Disable all', 'aludra' ); ?></button>
				</div>
			</div>
		</header>

		<form action="options.php" method="post">
			<?php settings_fields( 'aludra_settings' ); ?>

			<?php foreach ( $categories as $cat_slug => $cat_label ) : ?>
				<?php
				$cat_blocks = array_filter(
					$blocks,
					function ( $block ) use ( $cat_slug ) {
						return isset( $block['category'] ) && $cat_slug === $block['category'];
					}
				);

				if ( empty( $cat_blocks ) ) {
					continue;
				}
				?>
				<section class="aludra-cat">
					<div class="aludra-cat-head">
						<span class="aludra-cat-eyebrow">
							<?php echo aludra_star_svg( 'tick' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- hard-coded SVG markup. ?>
							<?php echo esc_html( $cat_label ); ?>
						</span>
						<span class="aludra-cat-rule"></span>
						<span class="aludra-cat-count">
							<?php
							/* translators: %d: number of blocks in category */
							printf( esc_html( _n( '%d block', '%d blocks', count( $cat_blocks ), 'aludra' ) ), (int) count( $cat_blocks ) );
							?>
						</span>
					</div>
					<div class="aludra-grid">
						<?php
						foreach ( $cat_blocks as $slug => $block ) {
							aludra_render_block_card( $slug, $block, ! empty( $enabled_blocks[ $slug ] ), $enabled_blocks );
						}
						?>
					</div>
				</section>
			<?php endforeach; ?>

			<div class="aludra-save">
				<?php submit_button( __( 'Save changes', 'aludra' ), 'primary', 'submit', false ); ?>
				<span class="hint"><?php esc_html_e( 'Disabled blocks are hidden from the inserter and their assets stop loading.', 'aludra' ); ?></span>
			</div>
		</form>
	</div>
	<?php
}

/**
 * Enqueue admin assets for settings page.
 *
 * @param string $hook The current admin page hook.
 */
function aludra_enqueue_admin_assets( $hook ) {
	// Only load on our settings page.
	if ( 'settings_page_aludra' !== $hook ) {
		return;
	}

	wp_enqueue_style(
		'aludra-admin',
		ALUDRA_PLUGIN_URL . 'assets/admin/admin-settings.css',
		array(),
		ALUDRA_VERSION
	);

	wp_enqueue_script(
		'aludra-admin',
		ALUDRA_PLUGIN_URL . 'assets/admin/admin-settings.js',
		array( 'jquery' ),
		ALUDRA_VERSION,
		true
	);
}
add_action( 'admin_enqueue_scripts', 'aludra_enqueue_admin_assets' );
