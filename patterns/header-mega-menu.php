<?php
/**
 * Title: Header: Mega Menu
 * Slug: aludra/header-mega-menu
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Logo and site title, a navigation with a mega menu item, and a call-to-action button that is hidden on phones. Pick the mega menu's template part in the block settings.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:group {"tagName":"header","metadata":{"name":"Header"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|border-light","width":"1px"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull has-base-background-color has-background" style="border-bottom-color:var(--wp--preset--color--border-light);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":40} /-->

<!-- wp:site-title {"level":0,"fontSize":"medium"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:navigation {"overlayMenu":"mobile","icon":"menu","layout":{"type":"flex","justifyContent":"right"}} -->
<!-- wp:aludra/mega-menu {"label":"Services","description":"Our services","useFullWidth":true} /-->

<!-- wp:navigation-link {"label":"About","url":"#"} /-->

<!-- wp:navigation-link {"label":"Contact","url":"#"} /-->
<!-- /wp:navigation -->

<!-- wp:buttons {"metadata":{"blockVisibility":{"viewport":{"mobile":false}}}} -->
<div class="wp-block-buttons"><!-- wp:button {"fontSize":"small"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" href="#">Get in touch</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
