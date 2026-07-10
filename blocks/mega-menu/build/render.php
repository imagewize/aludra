<?php
/**
 * Mega Menu Block Server-side Render
 *
 * @package Aludra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$aludra_label             = esc_html( $attributes['label'] ?? '' );
$aludra_label_color       = esc_attr( $attributes['labelColor'] ?? '' );
$aludra_description       = esc_html( $attributes['description'] ?? '' );
$aludra_menu_slug         = esc_attr( $attributes['menuSlug'] ?? '' );
$aludra_layout_mode       = esc_attr( $attributes['layoutMode'] ?? 'dropdown' );
$aludra_enable_animations = $attributes['enableAnimations'] ?? false;
$aludra_animation_type    = esc_attr( $attributes['animationType'] ?? 'fade' );
$aludra_animation_speed   = absint( $attributes['animationSpeed'] ?? 300 );
$aludra_enable_icon       = $attributes['enableIcon'] ?? false;
$aludra_icon_name         = esc_attr( $attributes['iconName'] ?? '' );
$aludra_icon_position     = esc_attr( $attributes['iconPosition'] ?? 'left' );
// Handle migration: old blocks may have 'auto', convert to 'left'.
$aludra_dropdown_alignment = esc_attr( $attributes['dropdownAlignment'] ?? 'left' );
if ( 'auto' === $aludra_dropdown_alignment ) {
	$aludra_dropdown_alignment = 'left';
}
$aludra_dropdown_spacing   = absint( $attributes['dropdownSpacing'] ?? 16 );
$aludra_dropdown_max_width = absint( $attributes['dropdownMaxWidth'] ?? 600 );
$aludra_use_full_width     = $attributes['useFullWidth'] ?? false;
$aludra_overlay_backdrop   = esc_attr( $attributes['overlayBackdropColor'] ?? 'rgba(0, 0, 0, 0.5)' );
$aludra_enable_hover       = $attributes['enableHoverActivation'] ?? false;
$aludra_backdrop_blur      = $attributes['backdropBlur'] ?? true;

// Panel styling attributes.
$aludra_panel_box_shadow    = esc_attr( $attributes['panelBoxShadow'] ?? 'default' );
$aludra_panel_border_radius = absint( $attributes['panelBorderRadius'] ?? 4 );
$aludra_panel_border_width  = absint( $attributes['panelBorderWidth'] ?? 0 );
$aludra_panel_border_color  = esc_attr( $attributes['panelBorderColor'] ?? '' );
$aludra_panel_backdrop_blur = $attributes['panelBackdropBlur'] ?? false;

// Build wrapper classes with layout mode.
$aludra_wrapper_classes   = array( 'wp-block-navigation-item' );
$aludra_wrapper_classes[] = 'wp-block-aludra-mega-menu--layout-' . $aludra_layout_mode;
$aludra_wrapper_classes[] = 'mm-layout-' . $aludra_layout_mode;

if ( $aludra_enable_animations ) {
	$aludra_wrapper_classes[] = 'mm-animations-enabled';
	$aludra_wrapper_classes[] = 'mm-animation-' . $aludra_animation_type;
}

if ( $aludra_enable_hover && 'dropdown' === $aludra_layout_mode ) {
	$aludra_wrapper_classes[] = 'has-hover-activation';
}

$aludra_wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class' => implode( ' ', $aludra_wrapper_classes ),
		'style' => '--mm-dropdown-spacing: ' . $aludra_dropdown_spacing . 'px; --mm-dropdown-max-width: ' . $aludra_dropdown_max_width . 'px',
	)
);

// Build context data for Interactivity API.
$aludra_context = array(
	'isOpen'                => false,
	'menuOpenedBy'          => array(),
	'layoutMode'            => $aludra_layout_mode,
	'dropdownAlignment'     => $aludra_dropdown_alignment,
	'enableHoverActivation' => $aludra_enable_hover,
	'animationSpeed'        => $aludra_animation_speed,
	'mobileBreakpoint'      => absint( $attributes['mobileBreakpoint'] ?? 768 ),
	'isMobile'              => false,
);

$aludra_close_icon  = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z"></path></svg>';
$aludra_toggle_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" width="12" height="12" aria-hidden="true" focusable="false" fill="none"><path d="M1.50002 4L6.00002 8L10.5 4" stroke-width="1.5" stroke="currentColor"></path></svg>';

// Build icon HTML.
$aludra_icon_html = '';
if ( $aludra_enable_icon && ! empty( $aludra_icon_name ) ) {
	$aludra_icon_class = 'dashicons dashicons-' . $aludra_icon_name;
	$aludra_icon_html  = '<span class="' . $aludra_icon_class . ' mm-menu-icon" aria-hidden="true"></span>';
}

$aludra_label_html     = '<span class="wp-block-navigation-item__label mm-label-text">' . $aludra_label . '</span>';
$aludra_button_content = '';

// Position icon based on setting.
switch ( $aludra_icon_position ) {
	case 'right':
		$aludra_button_content = $aludra_label_html . $aludra_icon_html;
		break;
	case 'top':
		$aludra_button_content = '<span class="mm-icon-above">' . $aludra_icon_html . $aludra_label_html . '</span>';
		break;
	default: // left.
		$aludra_button_content = $aludra_icon_html . $aludra_label_html;
		break;
}

$aludra_button_style = '';
if ( $aludra_label_color ) {
	$aludra_button_style = 'style="color:' . $aludra_label_color . '"';
}
?>

<li <?php echo $aludra_wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> data-wp-interactive="aludra/mega-menu" data-wp-context='<?php echo esc_attr( wp_json_encode( $aludra_context ) ); ?>' data-wp-on-document--keydown="actions.handleMenuKeydown" data-wp-on-document--click="actions.handleOutsideClick" data-wp-watch="callbacks.initMenu">

	<?php if ( 'overlay' === $aludra_layout_mode ) : ?>
		<div class="wp-block-aludra-mega-menu__backdrop mm-overlay-backdrop <?php echo $aludra_backdrop_blur ? 'mm-backdrop-blur' : ''; ?>" data-wp-class--is-visible="context.isOpen" data-wp-on--click="actions.closeMenu" 
		<?php
		if ( 'overlay' === $aludra_layout_mode ) :
			?>
			style="background: <?php echo esc_attr( $aludra_overlay_backdrop ); ?>"<?php endif; ?>></div>
	<?php endif; ?>

	<button class="wp-block-navigation-item__content wp-block-aludra-mega-menu__toggle wp-block-aludra-mega-menu__trigger mm-icon-position-<?php echo esc_attr( $aludra_icon_position ); ?>" data-wp-on--click="actions.toggleMenu" 
	<?php
	if ( $aludra_enable_hover ) :
		?>
		data-wp-on--mouseenter="actions.openMenu"<?php endif; ?> data-wp-bind--aria-expanded="context.isOpen" <?php echo $aludra_button_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php
	if ( $aludra_description ) :
		?>
		aria-describedby="menu-description-<?php echo esc_attr( $aludra_menu_slug ); ?>"
		<?php
	endif;
	?>
	>
		<?php echo $aludra_button_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<span class="wp-block-aludra-mega-menu__toggle-icon"><?php echo $aludra_toggle_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
	</button>

	<?php if ( $aludra_description ) : ?>
		<span id="menu-description-<?php echo esc_attr( $aludra_menu_slug ); ?>" class="screen-reader-text"><?php echo esc_html( $aludra_description ); ?></span>
	<?php endif; ?>

	<?php
	// Build panel classes with layout-specific classes.
	$aludra_panel_classes  = 'wp-block-aludra-mega-menu__panel';
	$aludra_panel_classes .= ' align-' . $aludra_dropdown_alignment;

	// Add box shadow class.
	$aludra_panel_classes .= ' mm-shadow-' . $aludra_panel_box_shadow;

	// Add backdrop blur class if enabled.
	if ( $aludra_panel_backdrop_blur ) {
		$aludra_panel_classes .= ' mm-backdrop-blur-enabled';
	}

	// Add full-width class if enabled.
	if ( $aludra_use_full_width && 'dropdown' === $aludra_layout_mode ) {
		$aludra_panel_classes .= ' mm-full-width';
	}

	// Build panel inline styles.
	$aludra_panel_styles = array();

	// Border radius.
	if ( $aludra_panel_border_radius > 0 ) {
		$aludra_panel_styles[] = 'border-radius: ' . $aludra_panel_border_radius . 'px';
	}

	// Border.
	if ( $aludra_panel_border_width > 0 ) {
		$aludra_border_color   = ! empty( $aludra_panel_border_color ) ? $aludra_panel_border_color : '#ddd';
		$aludra_panel_styles[] = 'border: ' . $aludra_panel_border_width . 'px solid ' . $aludra_border_color;
	}

	// Build style attribute.
	$aludra_panel_style = ! empty( $aludra_panel_styles )
		? 'style="' . esc_attr( implode( '; ', $aludra_panel_styles ) ) . '"'
		: '';
	?>
	<div class="<?php echo esc_attr( $aludra_panel_classes ); ?>" data-wp-class--is-open="context.isOpen" <?php echo $aludra_panel_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
		// Render template part if menuSlug is set.
		if ( ! empty( $aludra_menu_slug ) ) {
			if ( function_exists( 'block_template_part' ) ) {
				echo block_template_part( $aludra_menu_slug ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} else {
				// Fallback for older WordPress versions.
				$aludra_template_part = get_block_template( 'aludra//' . $aludra_menu_slug, 'wp_template_part' );
				if ( $aludra_template_part && $aludra_template_part->content ) {
					echo do_blocks( $aludra_template_part->content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}
		?>

		<button aria-label="<?php echo esc_attr( __( 'Close menu', 'aludra' ) ); ?>" class="menu-container__close-button" data-wp-on--click="actions.closeMenu" type="button">
			<?php echo $aludra_close_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</button>
	</div>

</li>