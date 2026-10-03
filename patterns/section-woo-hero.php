<?php
/**
 * Title: Section: Store Hero
 * Slug: aludra/section-woo-hero
 * Categories: aludra-store
 * Description: A split store hero on the night style — eyebrow, headline, lead and two buttons on one side, a colour panel on the other that you replace with a product photo. Registered only when WooCommerce is active.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/hero-split {"className":"is-style-night"} -->
<div class="wp-block-aludra-hero-split alignfull is-style-night" style="margin-top:0;margin-bottom:0"><div class="hero-split__inner"><!-- wp:group {"className":"hero-split__content","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group hero-split__content"><!-- wp:paragraph {"className":"hero-split__eyebrow"} -->
<p class="hero-split__eyebrow">New collection</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"hero-split__title","style":{"typography":{"lineHeight":"1.15"}}} -->
<h1 class="wp-block-heading hero-split__title" style="line-height:1.15">Refined <em>Elegance</em> Defined</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-split__lead"} -->
<p class="hero-split__lead">Premium accessories crafted for the discerning practitioner, where function meets uncompromising aesthetics.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-split__ctas","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons hero-split__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Shop collection</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#">Discover more</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"hero-split__trust"} -->
<p class="hero-split__trust"><span class="hero-split__check">✓</span> Free shipping over $100&nbsp;&nbsp;·&nbsp;&nbsp;<span class="hero-split__check">✓</span> 30-day returns</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"hero-split__media"} -->
<div class="wp-block-group hero-split__media"><!-- wp:cover {"overlayColor":"primary","dimRatio":100,"minHeight":480,"minHeightUnit":"px","contentPosition":"bottom left","isDark":true,"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"textColor":"base","fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}}} -->
<p class="has-base-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Handmade since 2018</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/hero-split -->
