<?php
/**
 * Server-side render for the Free Shipping Progress block.
 *
 * Rendered in PHP for the first paint (and so the message is translatable);
 * view.js keeps it in step with the cart through the Store API.
 *
 * @package Aludra
 *
 * @var array $attributes Block attributes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
	return;
}

$aludra_fsb_threshold = isset( $attributes['threshold'] ) ? (float) $attributes['threshold'] : 0;

if ( $aludra_fsb_threshold <= 0 ) {
	$aludra_fsb_threshold = \Aludra\aludra_free_shipping_threshold();
}

if ( $aludra_fsb_threshold <= 0 ) {
	return;
}

$aludra_fsb_subtotal  = (float) WC()->cart->get_subtotal() - (float) WC()->cart->get_discount_total();
$aludra_fsb_remaining = max( 0, $aludra_fsb_threshold - $aludra_fsb_subtotal );
$aludra_fsb_progress  = min( 100, round( $aludra_fsb_subtotal / $aludra_fsb_threshold * 100 ) );

$aludra_fsb_messages = array(
	/* translators: %s: order total needed for free shipping. */
	'empty'   => sprintf( __( 'Free shipping on orders over %s', 'aludra' ), '{amount}' ),
	/* translators: %s: amount left to spend to get free shipping. */
	'partial' => sprintf( __( 'You are %s away from free shipping', 'aludra' ), '{amount}' ),
	'reached' => __( 'You have unlocked free shipping', 'aludra' ),
);

if ( $aludra_fsb_subtotal <= 0 ) {
	$aludra_fsb_message = $aludra_fsb_messages['empty'];
	$aludra_fsb_amount  = $aludra_fsb_threshold;
} elseif ( $aludra_fsb_remaining > 0 ) {
	$aludra_fsb_message = $aludra_fsb_messages['partial'];
	$aludra_fsb_amount  = $aludra_fsb_remaining;
} else {
	$aludra_fsb_message = $aludra_fsb_messages['reached'];
	$aludra_fsb_amount  = 0;
}

$aludra_fsb_money = html_entity_decode( wp_strip_all_tags( wc_price( $aludra_fsb_amount ) ), ENT_QUOTES, 'UTF-8' );

$aludra_fsb_wrapper = get_block_wrapper_attributes(
	array(
		'class'          => 'aludra-free-shipping-bar',
		'data-endpoint'  => esc_url( rest_url( 'wc/store/v1/cart' ) ),
		'data-threshold' => (string) $aludra_fsb_threshold,
		'data-messages'  => wp_json_encode( $aludra_fsb_messages ),
	)
);
?>
<div <?php echo wp_kses_data( $aludra_fsb_wrapper ); ?>>
	<p class="aludra-free-shipping-bar__text" role="status"><?php echo esc_html( str_replace( '{amount}', $aludra_fsb_money, $aludra_fsb_message ) ); ?></p>
	<div class="aludra-free-shipping-bar__track" aria-hidden="true">
		<div class="aludra-free-shipping-bar__fill" style="width:<?php echo esc_attr( (string) $aludra_fsb_progress ); ?>%"></div>
	</div>
</div>
