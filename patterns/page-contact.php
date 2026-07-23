<?php
/**
 * Title: Contact Page
 * Slug: aludra/page-contact
 * Categories: aludra
 * Block Types: core/post-content
 * Description: A contact page — dark contact section with an intro, contact details with icons, an availability badge, and a Contact Form 7 form card.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/contact-section -->
<div class="wp-block-aludra-contact-section alignfull" style="margin-top:0;margin-bottom:0"><div class="contact-section__inner"><!-- wp:group {"className":"contact-section__intro","style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group contact-section__intro"><!-- wp:paragraph {"className":"contact-section__label"} -->
<p class="contact-section__label">Contact us</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"contact-section__heading"} -->
<h2 class="wp-block-heading contact-section__heading">Let's build something <em>fast &amp; scalable.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"contact-section__sub"} -->
<p class="contact-section__sub">Tell us what you have in mind — a new site, a store, a speed problem, or ongoing maintenance. We read every message and reply personally.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact-section__grid","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group contact-section__grid"><!-- wp:group {"className":"contact-section__info","style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group contact-section__info"><!-- wp:heading {"level":3,"className":"contact-section__info-heading"} -->
<h3 class="wp-block-heading contact-section__info-heading">Talk to an expert,<br>not a salesperson.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"contact-section__info-text"} -->
<p class="contact-section__info-text">Send us a message and one of our specialists will get back to you within one business day. No call centres, no hand-offs — you speak to the people who do the work.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"contact-section__details","style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group contact-section__details"><!-- wp:group {"className":"cs-detail","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group cs-detail"><!-- wp:group {"className":"cs-detail__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-mail.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Email"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail__body","style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cs-detail__body"><!-- wp:paragraph {"className":"cs-detail__label"} -->
<p class="cs-detail__label">Email</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"cs-detail__value"} -->
<p class="cs-detail__value">hello@example.com</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group cs-detail"><!-- wp:group {"className":"cs-detail__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-clock.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Response time"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail__body","style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cs-detail__body"><!-- wp:paragraph {"className":"cs-detail__label"} -->
<p class="cs-detail__label">Response time</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"cs-detail__value"} -->
<p class="cs-detail__value">Within 1 business day</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group cs-detail"><!-- wp:group {"className":"cs-detail__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-map.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Location"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail__body","style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cs-detail__body"><!-- wp:paragraph {"className":"cs-detail__label"} -->
<p class="cs-detail__label">Based in</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"cs-detail__value"} -->
<p class="cs-detail__value">Your city or region</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-badge","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group cs-badge"><!-- wp:paragraph {"className":"cs-badge__text"} -->
<p class="cs-badge__text">Available for new projects</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact-section__card","layout":{"type":"constrained"}} -->
<div class="wp-block-group contact-section__card"><!-- wp:shortcode -->
[contact-form-7 id="FORM_ID" title="Contact form 1"]
<!-- /wp:shortcode --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/contact-section -->
