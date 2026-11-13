<?php
/**
 * Title: Footer: Link Columns
 * Slug: aludra/footer-columns
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Dark footer with four columns of headed link lists and a bottom bar. The columns stack on phones.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:group {"tagName":"footer","metadata":{"name":"Footer"},"align":"full","className":"is-aludra-scheme-invert","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<footer class="wp-block-group alignfull is-aludra-scheme-invert" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--small)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.08em","fontWeight":"600"}},"fontSize":"small"} -->
<h2 class="wp-block-heading has-small-font-size" style="font-weight:600;letter-spacing:0.08em;text-transform:uppercase">Services</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#">Web design</a><br><a href="#">Development</a><br><a href="#">Maintenance</a><br><a href="#">Hosting</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.08em","fontWeight":"600"}},"fontSize":"small"} -->
<h2 class="wp-block-heading has-small-font-size" style="font-weight:600;letter-spacing:0.08em;text-transform:uppercase">Products</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#">Themes</a><br><a href="#">Plugins</a><br><a href="#">Demos</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.08em","fontWeight":"600"}},"fontSize":"small"} -->
<h2 class="wp-block-heading has-small-font-size" style="font-weight:600;letter-spacing:0.08em;text-transform:uppercase">Resources</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#">Blog</a><br><a href="#">Tutorials</a><br><a href="#">Documentation</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.08em","fontWeight":"600"}},"fontSize":"small"} -->
<h2 class="wp-block-heading has-small-font-size" style="font-weight:600;letter-spacing:0.08em;text-transform:uppercase">Company</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#">About</a><br><a href="#">Contact</a><br><a href="#">Privacy policy</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--medium)"><!-- wp:site-title {"level":0,"fontSize":"small"} /-->

<!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size">© Your Company. All rights reserved.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></footer>
<!-- /wp:group -->
