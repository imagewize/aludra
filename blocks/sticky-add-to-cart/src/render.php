<?php
/**
 * Sticky add to cart bar.
 *
 * @package Aludra
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block content.
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'wc_get_product' ) ) {
	return;
}

$aludra_stc_product = wc_get_product( $block->context['postId'] ?? get_the_ID() );

if ( ! $aludra_stc_product || ! $aludra_stc_product->is_purchasable() || ! $aludra_stc_product->is_in_stock() ) {
	return;
}

$aludra_stc_label   = $aludra_stc_product->is_type( 'simple' )
	? __( 'Add to cart', 'aludra' )
	: __( 'Choose options', 'aludra' );
$aludra_stc_wrapper = get_block_wrapper_attributes(
	array(
		'class'  => 'aludra-sticky-cart',
		'hidden' => true,
	)
);
?>
<div <?php echo $aludra_stc_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>
	<div class="aludra-sticky-cart__inner">
		<p class="aludra-sticky-cart__title"><?php echo esc_html( $aludra_stc_product->get_name() ); ?></p>
		<span class="aludra-sticky-cart__price"><?php echo wp_kses_post( $aludra_stc_product->get_price_html() ); ?></span>
		<button type="button" class="wp-element-button aludra-sticky-cart__button"><?php echo esc_html( $aludra_stc_label ); ?></button>
	</div>
</div>
