<?php
/**
 * Title: Pricing Page
 * Slug: aludra/page-pricing
 * Categories: aludra-pages
 * Block Types: core/post-content
 * Description: A pricing page — hero, fixed-price tiers, what every price includes, an FAQ, and a closing CTA band.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/hero-banner -->
<div class="wp-block-aludra-hero-banner alignfull" style="margin-top:0;margin-bottom:0"><div class="hero-banner__content"><!-- wp:group {"className":"hero-banner__eyebrow","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group hero-banner__eyebrow"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-bar-chart.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Pricing</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":1,"className":"hero-banner__title","style":{"typography":{"lineHeight":"1.15"}}} -->
<h1 class="wp-block-heading hero-banner__title" style="line-height:1.15">Fixed Prices, <em>Quoted Up Front</em></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-banner__lead"} -->
<p class="hero-banner__lead">Every engagement is quoted as a fixed price after a short review of your setup. No hourly billing, no scope creep, and no surprise invoice at the end.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-banner__ctas","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons hero-banner__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Get a Quote</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#plans">Compare Plans</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:aludra/hero-banner -->

<!-- wp:aludra/spine-section {"tint":true} -->
<div class="wp-block-aludra-spine-section is-tinted alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">Pricing</p><h2 class="spine-section__heading">Choose Your Plan</h2><p class="spine-section__aside">Select the perfect plan for your needs. Monthly, cancel whenever.</p></div><div class="spine-section__content"><!-- wp:aludra/pricing-tiers {"backgroundColor":"","className":"is-style-spec-sheet"} -->
<div class="wp-block-aludra-pricing-tiers is-style-spec-sheet alignfull" style="margin-top:0;margin-bottom:0"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Essential</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pricing-who"} -->
<p class="pricing-who">Perfect for small businesses</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-price"} -->
<p class="pricing-price">€59<span class="pricing-price__unit">/ month</span></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"pricing-features"} -->
<ul class="wp-block-list pricing-features"><!-- wp:list-item -->
<li>Basic monitoring</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Monthly updates</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Email support</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>1 hour response time</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"className":"pricing-cta"} -->
<div class="wp-block-buttons pricing-cta"><!-- wp:button {"backgroundColor":"primary","textColor":"white","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"pricing-featured-column"} -->
<div class="wp-block-column pricing-featured-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Business <span class="pricing-tag">Most popular</span></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pricing-who"} -->
<p class="pricing-who">For growing businesses</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-price"} -->
<p class="pricing-price">€99<span class="pricing-price__unit">/ month</span></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"pricing-features"} -->
<ul class="wp-block-list pricing-features"><!-- wp:list-item -->
<li>Advanced monitoring</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Weekly updates</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Priority support</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>30 min response time</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"className":"pricing-cta"} -->
<div class="wp-block-buttons pricing-cta"><!-- wp:button {"backgroundColor":"primary","textColor":"white","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Enterprise</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pricing-who"} -->
<p class="pricing-who">For large organizations</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-price"} -->
<p class="pricing-price">€199<span class="pricing-price__unit">/ month</span></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"pricing-features"} -->
<ul class="wp-block-list pricing-features"><!-- wp:list-item -->
<li>24/7 monitoring</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Daily updates</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Dedicated support</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>15 min response time</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"className":"pricing-cta"} -->
<div class="wp-block-buttons pricing-cta"><!-- wp:button {"backgroundColor":"primary","textColor":"white","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:aludra/pricing-tiers --></div></div></div>
<!-- /wp:aludra/spine-section -->

<!-- wp:aludra/spine-section {"tint":true} -->
<div class="wp-block-aludra-spine-section is-tinted alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">Included</p><h2 class="spine-section__heading">What Every Price Includes.</h2><p class="spine-section__aside">The same four things, whichever tier you pick.</p></div><div class="spine-section__content"><!-- wp:aludra/feature-list-grid {"className":""} -->
<div class="wp-block-aludra-feature-list-grid alignwide"><!-- wp:columns {"className":"feature-list-grid__columns"} -->
<div class="wp-block-columns feature-list-grid__columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"feature-list-grid__card","style":{"spacing":{"margin":{"bottom":"2rem"}}}} -->
<div class="wp-block-group feature-list-grid__card" style="margin-bottom:2rem"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Fixed-Price Quotes</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We quote a fixed price up front, based on a short review of your setup. You know what it costs before anything starts.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"feature-list-grid__list"} -->
<ul class="wp-block-list feature-list-grid__list"><!-- wp:list-item -->
<li>No scope creep</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>No surprise invoices</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Deliverables agreed in writing</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-list-grid__card"} -->
<div class="wp-block-group feature-list-grid__card"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Staging First, Always</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Nothing reaches your live site until it has been built somewhere else, tested there, and signed off by you.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"feature-list-grid__list"} -->
<ul class="wp-block-list feature-list-grid__list"><!-- wp:list-item -->
<li>Full backup before every change</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Sign-off before deployment</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>A rollback plan for every release</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"feature-list-grid__card","style":{"spacing":{"margin":{"bottom":"2rem"}}}} -->
<div class="wp-block-group feature-list-grid__card" style="margin-bottom:2rem"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Specialists, Not Generalists</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is the work we do every week, on the same stack, for the same kinds of businesses. That is why the estimates hold.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"feature-list-grid__list"} -->
<ul class="wp-block-list feature-list-grid__list"><!-- wp:list-item -->
<li>One stack, known deeply</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Server-level work, not just plugins</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Documented, repeatable process</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-list-grid__card"} -->
<div class="wp-block-group feature-list-grid__card"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">White-Label Available</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We work behind the scenes for agencies. Your client gets the result, you keep the relationship and the credit.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"feature-list-grid__list"} -->
<ul class="wp-block-list feature-list-grid__list"><!-- wp:list-item -->
<li>Discreet, unbranded delivery</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Reports written for your clients</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Partner rates for ongoing work</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:aludra/feature-list-grid --></div></div></div>
<!-- /wp:aludra/spine-section -->

<!-- wp:aludra/spine-section {"tint":true} -->
<div class="wp-block-aludra-spine-section is-tinted alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">Questions</p><h2 class="spine-section__heading">Before You Write In.</h2><p class="spine-section__aside"></p></div><div class="spine-section__content"><!-- wp:aludra/faq-tabs {"displayMode":"native"} -->
<div class="wp-block-aludra-faq-tabs alignwide faq-tabs-wrapper is-display-mode-native" data-display-mode="native"><div class="faq-native"><!-- wp:aludra/faq-tab-answer {"question":"What services do you offer?","title":"Our Comprehensive Services","displayMode":"native","openByDefault":true} -->
<details class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="What services do you offer?" open><summary>What services do you offer?</summary><div class="faq-answer-content"><!-- wp:paragraph -->
<p>We provide a comprehensive range of professional services tailored to meet your specific needs. Our experienced team specializes in delivering high-quality solutions that drive results and exceed expectations.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Whether you're looking for strategic consulting, creative design, technical development, or ongoing support, we have the expertise and resources to help you succeed.</p>
<!-- /wp:paragraph --></div></details>
<!-- /wp:aludra/faq-tab-answer -->

<!-- wp:aludra/faq-tab-answer {"question":"How long does a typical project take?","title":"Project Timeline & Process","displayMode":"native"} -->
<details class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="How long does a typical project take?"><summary>How long does a typical project take?</summary><div class="faq-answer-content"><!-- wp:paragraph -->
<p>Project timelines vary depending on scope and complexity, but most engagements follow a structured process designed for efficiency and quality. We typically divide projects into clear phases with defined milestones.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>During our initial consultation, we assess your requirements and provide a detailed timeline estimate. We maintain transparent communication throughout the project to ensure deadlines are met and expectations are exceeded.</p>
<!-- /wp:paragraph --></div></details>
<!-- /wp:aludra/faq-tab-answer -->

<!-- wp:aludra/faq-tab-answer {"question":"What makes your approach different?","title":"Our Unique Approach","displayMode":"native"} -->
<details class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="What makes your approach different?"><summary>What makes your approach different?</summary><div class="faq-answer-content"><!-- wp:paragraph -->
<p>Our approach combines industry best practices with innovative thinking and personalized attention. We take the time to understand your business goals, challenges, and vision to create solutions that truly fit your needs.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>We believe in collaborative partnerships, transparent communication, and continuous improvement. This client-centered methodology ensures that every project delivers measurable value and long-term success.</p>
<!-- /wp:paragraph --></div></details>
<!-- /wp:aludra/faq-tab-answer -->

<!-- wp:aludra/faq-tab-answer {"question":"Do you offer ongoing support after launch?","title":"Ongoing Support","displayMode":"native"} -->
<details class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="Do you offer ongoing support after launch?"><summary>Do you offer ongoing support after launch?</summary><div class="faq-answer-content"><!-- wp:paragraph -->
<p>Yes. Every engagement includes a support window after launch, and we offer ongoing maintenance plans for clients who want continued monitoring, updates, and improvements.</p>
<!-- /wp:paragraph --></div></details>
<!-- /wp:aludra/faq-tab-answer --></div></div>
<!-- /wp:aludra/faq-tabs --></div></div></div>
<!-- /wp:aludra/spine-section -->

<!-- wp:aludra/cta-banner -->
<div class="wp-block-aludra-cta-banner alignfull" style="margin-top:0;margin-bottom:0"><div class="cta-banner__content"><!-- wp:heading {"className":"cta-banner__title","style":{"typography":{"lineHeight":"1.2"}}} -->
<h2 class="wp-block-heading cta-banner__title" style="line-height:1.2">Ready to get started?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"cta-banner__lead"} -->
<p class="cta-banner__lead">Tell us about your project and we'll get back to you within one business day.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"cta-banner__ctas","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons cta-banner__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Get in Touch</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:aludra/cta-banner -->
