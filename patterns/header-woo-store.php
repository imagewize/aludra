<?php
/**
 * Title: Header: Store
 * Slug: aludra/header-woo-store
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Shop header with a slim top bar, then logo, navigation, account and mini cart. The top bar's contact line is hidden on phones; the offer stays.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:group {"tagName":"header","metadata":{"name":"Header"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0"><!-- wp:group {"align":"full","className":"is-aludra-scheme-invert","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-aludra-scheme-invert" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size">Free shipping on orders over €50</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"metadata":{"blockVisibility":{"viewport":{"mobile":false}}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size">Questions? <a href="#">Contact us</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}},"border":{"bottom":{"color":"var:preset|color|border-light","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="border-bottom-color:var(--wp--preset--color--border-light);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":40} /-->

<!-- wp:site-title {"level":0,"fontSize":"medium"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:navigation {"icon":"menu","layout":{"type":"flex","justifyContent":"right"}} /-->

<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only"} /-->

<!-- wp:woocommerce/mini-cart /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
