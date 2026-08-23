<?php
/**
 * Title: Section: Split with Steps
 * Slug: aludra/section-split
 * Categories: aludra-layout
 * Description: A two-pane band — a load waterfall on one side, a numbered three-step process on the other, under a shared label, heading and lead. Reveals on scroll.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/split-section {"mediaWidth":46,"tint":true,"revealOnScroll":true} -->
<div class="wp-block-aludra-split-section alignfull is-tinted" data-aludra-reveal="true" style="margin-top:0;margin-bottom:0"><div class="split-section__shell"><div class="split-section__header"><p class="split-section__label">How It Works</p><h2 class="split-section__heading">From First Call to <em>Launch Day</em></h2><p class="split-section__lead">No open-ended hourly billing, no scope that quietly grows, and no week where you cannot tell what is happening.</p></div><div class="split-section__panes" style="--aludra-split-media:46%"><!-- wp:group {"className":"split-section__media"} -->
<div class="wp-block-group split-section__media"><!-- wp:aludra/load-waterfall -->
<figure class="wp-block-aludra-load-waterfall" aria-label="Load waterfall for harvest-table.com: LCP 0.9s"><figcaption class="wf-head"><span class="wf-url">harvest-table.com</span><span class="wf-badge">after rebuild</span></figcaption><div class="wf-rows"><div class="wf-row"><span>document</span><div class="wf-track"><i class="wf-bar is-doc" style="left:0%;width:22%;animation-delay:0.1s"></i></div></div><div class="wf-row"><span>critical.css</span><div class="wf-track"><i class="wf-bar is-css" style="left:22%;width:14%;animation-delay:0.25s"></i></div></div><div class="wf-row"><span>hero.webp</span><div class="wf-track"><i class="wf-bar is-img" style="left:26%;width:26%;animation-delay:0.4s"></i></div></div><div class="wf-row"><span>fonts</span><div class="wf-track"><i class="wf-bar" style="left:30%;width:18%;animation-delay:0.55s"></i></div></div><div class="wf-row"><span>cart.js</span><div class="wf-track"><i class="wf-bar" style="left:52%;width:20%;animation-delay:0.7s"></i><b class="wf-lcp" style="left:52%"><span>LCP 0.9s</span></b></div></div><div class="wf-row"><span>analytics</span><div class="wf-track"><i class="wf-bar" style="left:72%;width:12%;animation-delay:0.85s"></i></div></div></div><div class="wf-axis"><span></span><span class="wf-ticks"><span>0s</span><span>0.5s</span><span>1.0s</span><span>1.5s</span></span></div></figure>
<!-- /wp:aludra/load-waterfall -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size">Measured on a client store the week after rebuild, from request to largest contentful paint.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"split-section__content"} -->
<div class="wp-block-group split-section__content"><!-- wp:aludra/service-blocks {"className":"is-style-steps"} -->
<div class="wp-block-aludra-service-blocks alignwide is-style-steps" style="margin-top:0;margin-bottom:0"><div class="service-blocks__inner"><!-- wp:group {"className":"service-blocks__list"} -->
<div class="wp-block-group service-blocks__list"><!-- wp:group {"className":"service-block"} -->
<div class="wp-block-group service-block"><!-- wp:group {"className":"service-block__header"} -->
<div class="wp-block-group service-block__header"><!-- wp:paragraph {"className":"service-block__num"} -->
<p class="service-block__num">01</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"service-block__title"} -->
<h3 class="wp-block-heading service-block__title">Review What You Have</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block__body"} -->
<div class="wp-block-group service-block__body"><!-- wp:paragraph {"className":"service-block__desc"} -->
<p class="service-block__desc">We go through the site, the hosting and the plugin list, then come back with what is actually slowing it down and what it costs to fix. That review is yours whether or not you hire us.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block"} -->
<div class="wp-block-group service-block"><!-- wp:group {"className":"service-block__header"} -->
<div class="wp-block-group service-block__header"><!-- wp:paragraph {"className":"service-block__num"} -->
<p class="service-block__num">02</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"service-block__title"} -->
<h3 class="wp-block-heading service-block__title">Build It on Staging</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block__body"} -->
<div class="wp-block-group service-block__body"><!-- wp:paragraph {"className":"service-block__desc"} -->
<p class="service-block__desc">Every change lands on a staging copy first, with a link you can open and check for yourself. Nothing goes near the live site until you have signed it off.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block"} -->
<div class="wp-block-group service-block"><!-- wp:group {"className":"service-block__header"} -->
<div class="wp-block-group service-block__header"><!-- wp:paragraph {"className":"service-block__num"} -->
<p class="service-block__num">03</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"service-block__title"} -->
<h3 class="wp-block-heading service-block__title">Launch and Hand Over</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block__body"} -->
<div class="wp-block-group service-block__body"><!-- wp:paragraph {"className":"service-block__desc"} -->
<p class="service-block__desc">We deploy, watch the numbers for a week, and hand over documentation you own. Licences in your name, credentials in your password manager, nothing tied to us.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/service-blocks -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#">Book a Review</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div></div>
<!-- /wp:aludra/split-section -->
