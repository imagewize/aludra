<?php
/**
 * Title: Services Overview Page
 * Slug: aludra/page-services
 * Categories: aludra-pages
 * Block Types: core/post-content
 * Description: A services overview page — hero, trust bar, an intro, the service grid, capability cards, an FAQ, and a closing CTA band.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/hero-banner -->
<div class="wp-block-aludra-hero-banner alignfull" style="margin-top:0;margin-bottom:0"><div class="hero-banner__content"><!-- wp:group {"className":"hero-banner__eyebrow","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group hero-banner__eyebrow"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-list.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Services</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":1,"className":"hero-banner__title","style":{"typography":{"lineHeight":"1.15"}}} -->
<h1 class="wp-block-heading hero-banner__title" style="line-height:1.15">Everything We Do, <em>In One Place</em></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-banner__lead"} -->
<p class="hero-banner__lead">A full list of what we take on, what each engagement includes, and roughly what it costs. If the thing you need is not on this page, ask anyway.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-banner__ctas","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons hero-banner__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Get a Quote</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#pricing">See Pricing</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:aludra/hero-banner -->

<!-- wp:aludra/trust-bar -->
<div class="wp-block-aludra-trust-bar alignfull"><div class="trust-bar__inner"><!-- wp:group {"className":"trust-bar__items","style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"flex","flexWrap":"wrap","alignItems":"center","justifyContent":"center"}} -->
<div class="wp-block-group trust-bar__items"><!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-clock.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Building since 2009</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-users.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Hundreds of projects delivered</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-performance.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Consistently fast, stable builds</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-bar-chart.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Clear rates, quoted up front</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/trust-bar -->

<!-- wp:aludra/service-intro -->
<div class="wp-block-aludra-service-intro alignfull" style="margin-top:0;margin-bottom:0"><div class="service-intro__inner"><!-- wp:paragraph -->
<p>Most of what we do falls into four areas: building a site, making an existing one faster, keeping it running, and adding the features a business grows into. Every engagement starts the same way — a short review of what you already have, then a fixed price for the work.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Whether it is a one-off build or ongoing support, you get the same people, the same staging-first process, and documentation you own at the end. Nothing is locked to us.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:aludra/service-intro -->

<!-- wp:aludra/spine-section -->
<div class="wp-block-aludra-spine-section alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">Services</p><h2 class="spine-section__heading">Our Services</h2><p class="spine-section__aside">A quick look at what we do and how it helps your business grow.</p></div><div class="spine-section__content"><!-- wp:aludra/services-block {"className":"is-style-list"} -->
<div class="wp-block-aludra-services-block alignfull is-style-list" style="margin-top:0;margin-bottom:0"><div class="services-block__inner"><!-- wp:group {"className":"services-block__grid"} -->
<div class="wp-block-group services-block__grid"><!-- wp:group {"className":"services-block__card","layout":{"type":"flex","orientation":"horizontal","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group services-block__card"><!-- wp:group {"className":"services-block__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group services-block__icon"><!-- wp:image {"width":"26px","height":"26px","sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-performance.svg"}}}}} -->
<figure class="wp-block-image size-full is-resized"><img src="" alt="Performance icon" style="width:26px;height:26px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"services-block__content","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group services-block__content"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}}} -->
<h3 class="wp-block-heading" style="font-weight:600">Performance Optimization</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Faster load times through image optimization, caching, and render-blocking fixes.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"services-block__card","layout":{"type":"flex","orientation":"horizontal","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group services-block__card"><!-- wp:group {"className":"services-block__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group services-block__icon"><!-- wp:image {"width":"26px","height":"26px","sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-shield.svg"}}}}} -->
<figure class="wp-block-image size-full is-resized"><img src="" alt="Security icon" style="width:26px;height:26px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"services-block__content","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group services-block__content"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}}} -->
<h3 class="wp-block-heading" style="font-weight:600">Security &amp; Maintenance</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ongoing updates, monitoring, and hardening to keep your site safe and reliable.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"services-block__card","layout":{"type":"flex","orientation":"horizontal","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group services-block__card"><!-- wp:group {"className":"services-block__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group services-block__icon"><!-- wp:image {"width":"26px","height":"26px","sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-code.svg"}}}}} -->
<figure class="wp-block-image size-full is-resized"><img src="" alt="Code icon" style="width:26px;height:26px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"services-block__content","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group services-block__content"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}}} -->
<h3 class="wp-block-heading" style="font-weight:600">Custom Development</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Bespoke features and integrations built to match the way your business works.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"services-block__card","layout":{"type":"flex","orientation":"horizontal","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group services-block__card"><!-- wp:group {"className":"services-block__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group services-block__icon"><!-- wp:image {"width":"26px","height":"26px","sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-chat.svg"}}}}} -->
<figure class="wp-block-image size-full is-resized"><img src="" alt="Chat icon" style="width:26px;height:26px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"services-block__content","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group services-block__content"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}}} -->
<h3 class="wp-block-heading" style="font-weight:600">Ongoing Support</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Friendly, responsive help whenever you need a hand with your site.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/services-block --></div></div></div>
<!-- /wp:aludra/spine-section -->

<!-- wp:aludra/spine-section -->
<div class="wp-block-aludra-spine-section alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">What we do</p><h2 class="spine-section__heading">Everything The Job Needs.</h2><p class="spine-section__aside">Six areas we cover on every engagement, from the first audit to the final handover.</p></div><div class="spine-section__content"><!-- wp:aludra/feature-cards -->
<div class="wp-block-aludra-feature-cards alignfull"><div class="feature-cards__inner"><!-- wp:group {"className":"feature-cards__grid","layout":{"type":"default"}} -->
<div class="wp-block-group feature-cards__grid"><!-- wp:group {"className":"feature-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group feature-card"><!-- wp:group {"className":"feature-card__icon-wrap","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-card__icon-wrap"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-search.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Audit and diagnosis"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}}} -->
<h4 class="wp-block-heading" style="font-weight:700">Audit &amp; Diagnosis</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We start by measuring what is actually happening, so everything that follows is aimed at the things that move the needle.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group feature-card"><!-- wp:group {"className":"feature-card__icon-wrap","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-card__icon-wrap"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-performance.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Performance work"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}}} -->
<h4 class="wp-block-heading" style="font-weight:700">Performance Work</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Faster pages, lighter assets, and sensible caching — the difference visitors feel before they read a single word.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group feature-card"><!-- wp:group {"className":"feature-card__icon-wrap","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-card__icon-wrap"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-shield.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Security and hardening"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}}} -->
<h4 class="wp-block-heading" style="font-weight:700">Security &amp; Hardening</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Sensible defaults, current versions, and the quiet configuration work that keeps a site out of trouble.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group feature-card"><!-- wp:group {"className":"feature-card__icon-wrap","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-card__icon-wrap"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-code.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Technical implementation"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}}} -->
<h4 class="wp-block-heading" style="font-weight:700">Technical Implementation</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Clean, maintainable work at the code and configuration layer — not another stack of plugins papering over the problem.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group feature-card"><!-- wp:group {"className":"feature-card__icon-wrap","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-card__icon-wrap"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-link.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Integrations"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}}} -->
<h4 class="wp-block-heading" style="font-weight:700">Integrations</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Connecting the tools you already run so information flows where it needs to, without anyone re-typing it.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group feature-card"><!-- wp:group {"className":"feature-card__icon-wrap","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-card__icon-wrap"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-bar-chart.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Reporting and handover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}}} -->
<h4 class="wp-block-heading" style="font-weight:700">Reporting &amp; Handover</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A written account of what changed, what it achieved, and what to watch — plus what you need to keep it that way.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/feature-cards --></div></div></div>
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
