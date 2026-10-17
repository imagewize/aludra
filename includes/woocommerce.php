<?php
/**
 * WooCommerce helpers for Aludra's store blocks.
 *
 * @package Aludra
 */

namespace Aludra;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blocks that only make sense with WooCommerce active.
 *
 * @return string[] Block slugs, without the `aludra/` prefix.
 */
function aludra_woocommerce_blocks() {
	return array( 'free-shipping-bar', 'sticky-add-to-cart' );
}

/**
 * Minimum cart amount for free shipping, from the shipping zone matching the
 * customer's location.
 *
 * @return float Threshold, or 0 when no free shipping method with a minimum applies.
 */
function aludra_free_shipping_threshold() {
	if ( ! function_exists( 'WC' ) || ! function_exists( 'wc_get_customer_default_location' ) ) {
		return 0.0;
	}

	$location = wc_get_customer_default_location();
	$customer = WC()->customer;

	$zone = \WC_Shipping_Zones::get_zone_matching_package(
		array(
			'destination' => array(
				'country'  => $customer && $customer->get_shipping_country() ? $customer->get_shipping_country() : $location['country'],
				'state'    => $customer && $customer->get_shipping_state() ? $customer->get_shipping_state() : $location['state'],
				'postcode' => $customer ? $customer->get_shipping_postcode() : '',
			),
		)
	);

	$threshold = 0;

	foreach ( $zone->get_shipping_methods( true ) as $method ) {
		if ( 'free_shipping' !== $method->id || ! in_array( $method->requires, array( 'min_amount', 'either', 'both' ), true ) ) {
			continue;
		}

		$amount = (float) $method->min_amount;

		if ( $amount > 0 && ( 0 === $threshold || $amount < $threshold ) ) {
			$threshold = $amount;
		}
	}

	/**
	 * Filters the free shipping threshold shown by the Free Shipping Progress block.
	 *
	 * @param float $threshold Minimum cart amount, or 0 to hide the block.
	 */
	return (float) apply_filters( 'aludra_free_shipping_threshold', $threshold );
}
