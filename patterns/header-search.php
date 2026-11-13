<?php
/**
 * Title: Header: Search and Social
 * Slug: aludra/header-search
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Dark header with site title and navigation on the left, social icons and a full-screen search on the right. The social icons are hidden on phones and tablets; the search stays.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:group {"tagName":"header","metadata":{"name":"Header"},"align":"full","className":"is-aludra-scheme-invert","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull is-aludra-scheme-invert" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.05em"}},"fontSize":"medium"} /-->

<!-- wp:navigation {"icon":"menu","fontSize":"small","layout":{"type":"flex","justifyContent":"left"}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:social-links {"metadata":{"blockVisibility":{"viewport":{"mobile":false,"tablet":false}}}} -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"mastodon"} /-->

<!-- wp:social-link {"url":"#","service":"github"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:aludra/search-overlay-trigger -->
<div class="wp-block-aludra-search-overlay-trigger"><figure class="wp-block-image size-full is-resized search-overlay-trigger" data-overlay-bg-color="rgba(255, 255, 255, 0.95)" data-border-color="#cccccc" data-close-button-color="#000000"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" style="width:20px;height:20px"><g data-name="search"><path d="M20.71 19.29l-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z"></path></g></svg></figure></div>
<!-- /wp:aludra/search-overlay-trigger --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
