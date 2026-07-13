<?php
/**
 * Admin Settings Page for Aludra
 *
 * Provides an admin interface to selectively enable/disable individual blocks.
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
 * Register settings with WordPress Settings API.
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

	add_settings_section(
		'aludra_main_section',
		__( 'Block Management', 'aludra' ),
		'aludra_settings_section_cb',
		'aludra'
	);

	// Get all available blocks.
	$blocks = aludra_get_available_blocks();

	foreach ( $blocks as $block_slug => $block_data ) {
		add_settings_field(
			'aludra_' . $block_slug,
			$block_data['label'],
			'aludra_settings_field_cb',
			'aludra',
			'aludra_main_section',
			array(
				'slug'        => $block_slug,
				'label'       => $block_data['label'],
				'description' => $block_data['description'],
				'parent'      => $block_data['parent'] ?? null,
			)
		);
	}
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
	);
}

/**
 * Get available blocks with metadata.
 *
 * @return array Block configuration data.
 */
function aludra_get_available_blocks() {
	return array(
		'carousel'               => array(
			'label'       => __( 'Carousel Block', 'aludra' ),
			'description' => __( 'Create responsive image/content carousels with Slick Carousel', 'aludra' ),
		),
		'slide'                  => array(
			'label'       => __( 'Slide Block', 'aludra' ),
			'description' => __( 'Individual slides for Carousel block', 'aludra' ),
			'parent'      => 'carousel',
		),
		'mega-menu'              => array(
			'label'       => __( 'Mega Menu Block', 'aludra' ),
			'description' => __( 'Add expandable mega menus to navigation', 'aludra' ),
		),
		'faq-tabs'               => array(
			'label'       => __( 'FAQ Tabs Block', 'aludra' ),
			'description' => __( 'Interactive FAQ with vertical tabs and content panels', 'aludra' ),
		),
		'faq-tab-answer'         => array(
			'label'       => __( 'FAQ Tab Answer Block', 'aludra' ),
			'description' => __( 'Individual FAQ answers', 'aludra' ),
			'parent'      => 'faq-tabs',
		),
		'search-overlay-trigger' => array(
			'label'       => __( 'Search Overlay Trigger Block', 'aludra' ),
			'description' => __( 'Full-screen search overlay with custom styling', 'aludra' ),
		),
		'feature-cards'          => array(
			'label'       => __( 'Feature Cards Block', 'aludra' ),
			'description' => __( 'Responsive grid of feature highlight cards with icons', 'aludra' ),
		),
		'icon-grid'              => array(
			'label'       => __( 'Icon Grid Block', 'aludra' ),
			'description' => __( 'Auto-fit grid of icon + text items with section header', 'aludra' ),
		),
		'trust-bar'              => array(
			'label'       => __( 'Trust Bar Block', 'aludra' ),
			'description' => __( 'Inline bar of trust-signal items with icons', 'aludra' ),
		),
		'pricing-tiers'          => array(
			'label'       => __( 'Pricing Tiers Block', 'aludra' ),
			'description' => __( 'Three-column pricing comparison table with featured tier highlighting', 'aludra' ),
		),
		'testimonial-grid'       => array(
			'label'       => __( 'Testimonial Grid Block', 'aludra' ),
			'description' => __( 'Customer testimonial grid with metrics, using Slick Carousel on larger sets', 'aludra' ),
		),
		'cta-columns'            => array(
			'label'       => __( 'CTA Columns Block', 'aludra' ),
			'description' => __( 'Dual call-to-action cards with headings, descriptions, and buttons', 'aludra' ),
		),
		'feature-list-grid'      => array(
			'label'       => __( 'Feature List Grid Block', 'aludra' ),
			'description' => __( 'Two-column grid of features with checkmarks and hover effects', 'aludra' ),
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
 * Settings section callback.
 */
function aludra_settings_section_cb() {
	echo '<p>' . esc_html__( 'Enable or disable individual blocks. Disabled blocks will not appear in the block inserter.', 'aludra' ) . '</p>';
}

/**
 * Settings field callback for each block checkbox.
 *
 * @param array $args Field arguments.
 */
function aludra_settings_field_cb( $args ) {
	$enabled_blocks = get_option( 'aludra_enabled', aludra_get_default_settings() );
	$slug           = $args['slug'];
	$checked        = ! empty( $enabled_blocks[ $slug ] );
	$parent         = $args['parent'] ?? null;

	echo '<label>';
	echo '<input type="checkbox" ';
	echo 'name="aludra_enabled[' . esc_attr( $slug ) . ']" ';
	echo 'value="1" ';
	echo 'id="aludra_' . esc_attr( $slug ) . '" ';
	echo 'class="aludra-block-checkbox" ';
	if ( $parent ) {
		echo 'data-parent="' . esc_attr( $parent ) . '" ';
	}
	checked( $checked, true );
	echo '/>';
	echo '</label>';

	if ( ! empty( $args['description'] ) ) {
		echo '<p class="description">' . esc_html( $args['description'] );
		if ( $parent ) {
			echo '<br><strong>' . esc_html__( 'Note:', 'aludra' ) . '</strong> ';
			/* translators: %s: parent block name */
			printf(
				/* translators: %s: parent block name */
				esc_html__( 'Requires %s to be enabled', 'aludra' ),
				esc_html( aludra_get_available_blocks()[ $parent ]['label'] )
			);
		}
		echo '</p>';
	}
}

/**
 * Render the settings page HTML.
 */
function aludra_settings_page_html() {
	// Check user capabilities.
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Add error/success messages.
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- WordPress Settings API handles nonce verification.
	if ( isset( $_GET['settings-updated'] ) ) {
		add_settings_error(
			'aludra_messages',
			'aludra_message',
			__( 'Settings saved successfully.', 'aludra' ),
			'success'
		);
	}

	settings_errors( 'aludra_messages' );
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

		<form action="options.php" method="post">
			<?php
			settings_fields( 'aludra_settings' );
			do_settings_sections( 'aludra' );
			?>

			<div class="aludra-bulk-actions">
				<button type="button" class="button" id="aludra-enable-all">
					<?php esc_html_e( 'Enable All', 'aludra' ); ?>
				</button>
				<button type="button" class="button" id="aludra-disable-all">
					<?php esc_html_e( 'Disable All', 'aludra' ); ?>
				</button>
			</div>

			<?php submit_button( __( 'Save Changes', 'aludra' ) ); ?>
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
