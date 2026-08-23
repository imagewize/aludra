<?php
/**
 * Title: Landing Page
 * Slug: aludra/page-landing
 * Categories: aludra-pages
 * Block Types: core/post-content
 * Description: A conversion-focused landing page — split hero, stat rail, capability cards, pricing tiers, client reviews, an FAQ, and a closing CTA band.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/hero-split {"className":"is-style-night"} -->
<div class="wp-block-aludra-hero-split alignfull is-style-night" style="margin-top:0;margin-bottom:0"><div class="hero-split__inner"><!-- wp:group {"className":"hero-split__content","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group hero-split__content"><!-- wp:paragraph {"className":"hero-split__eyebrow"} -->
<p class="hero-split__eyebrow">WordPress &amp; WooCommerce</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"hero-split__title","style":{"typography":{"lineHeight":"1.15"}}} -->
<h1 class="wp-block-heading hero-split__title" style="line-height:1.15">Fast Sites. <em>Real Results.</em></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-split__lead"} -->
<p class="hero-split__lead">Custom WordPress and WooCommerce development for businesses that need their site to work as hard as they do.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-split__ctas","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons hero-split__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Get in Touch</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#">See Our Work</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"hero-split__trust"} -->
<p class="hero-split__trust"><span class="hero-split__check">✓</span> Performance-first builds&nbsp;&nbsp;·&nbsp;&nbsp;<span class="hero-split__check">✓</span> Roots.io stack</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"hero-split__media"} -->
<div class="wp-block-group hero-split__media"><!-- wp:aludra/load-waterfall -->
<figure class="wp-block-aludra-load-waterfall" aria-label="Load waterfall for harvest-table.com: LCP 0.9s"><figcaption class="wf-head"><span class="wf-url">harvest-table.com</span><span class="wf-badge">after rebuild</span></figcaption><div class="wf-rows"><div class="wf-row"><span>document</span><div class="wf-track"><i class="wf-bar is-doc" style="left:0%;width:22%;animation-delay:0.1s"></i></div></div><div class="wf-row"><span>critical.css</span><div class="wf-track"><i class="wf-bar is-css" style="left:22%;width:14%;animation-delay:0.25s"></i></div></div><div class="wf-row"><span>hero.webp</span><div class="wf-track"><i class="wf-bar is-img" style="left:26%;width:26%;animation-delay:0.4s"></i></div></div><div class="wf-row"><span>fonts</span><div class="wf-track"><i class="wf-bar" style="left:30%;width:18%;animation-delay:0.55s"></i></div></div><div class="wf-row"><span>cart.js</span><div class="wf-track"><i class="wf-bar" style="left:52%;width:20%;animation-delay:0.7s"></i><b class="wf-lcp" style="left:52%"><span>LCP 0.9s</span></b></div></div><div class="wf-row"><span>analytics</span><div class="wf-track"><i class="wf-bar" style="left:72%;width:12%;animation-delay:0.85s"></i></div></div></div><div class="wf-axis"><span></span><span class="wf-ticks"><span>0s</span><span>0.5s</span><span>1.0s</span><span>1.5s</span></span></div></figure>
<!-- /wp:aludra/load-waterfall --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/hero-split -->

<!-- wp:aludra/stat-rail -->
<div class="wp-block-aludra-stat-rail alignfull" style="margin-top:0;margin-bottom:0"><div class="stat-rail__shell"><!-- wp:aludra/stat-item {"number":"0.9s","caption":"Median LCP after rebuild","good":true} -->
<div class="wp-block-aludra-stat-item stat-rail__item is-good"><div class="stat-rail__num">0.9s</div><div class="stat-rail__cap">Median LCP after rebuild</div></div>
<!-- /wp:aludra/stat-item -->

<!-- wp:aludra/stat-item {"number":"-71%","caption":"Page weight, typical build"} -->
<div class="wp-block-aludra-stat-item stat-rail__item"><div class="stat-rail__num">-71%</div><div class="stat-rail__cap">Page weight, typical build</div></div>
<!-- /wp:aludra/stat-item -->

<!-- wp:aludra/stat-item {"number":"1 day","caption":"Reply time on every enquiry"} -->
<div class="wp-block-aludra-stat-item stat-rail__item"><div class="stat-rail__num">1 day</div><div class="stat-rail__cap">Reply time on every enquiry</div></div>
<!-- /wp:aludra/stat-item --></div></div>
<!-- /wp:aludra/stat-rail -->

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

<!-- wp:aludra/spine-section -->
<div class="wp-block-aludra-spine-section alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">Clients</p><h2 class="spine-section__heading">In Their Words.</h2><p class="spine-section__aside">Three of the last twelve projects.</p></div><div class="spine-section__content"><!-- wp:aludra/review-profiles {"className":"is-style-quotes"} -->
<div class="wp-block-aludra-review-profiles alignfull is-style-quotes" style="margin-top:0;margin-bottom:0"><div class="review-profiles__content"><!-- wp:group {"className":"review-profiles__grid"} -->
<div class="wp-block-group review-profiles__grid"><!-- wp:group {"className":"review-profiles__item","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group review-profiles__item"><!-- wp:paragraph {"className":"review-profiles__quote"} -->
<p class="review-profiles__quote">Working with this team made a real difference — they delivered on time and communicated clearly throughout the whole project.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"review-profiles__attribution"} -->
<p class="review-profiles__attribution"><strong>Operations lead</strong>Online retailer, Rotterdam</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"review-profiles__item","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group review-profiles__item"><!-- wp:paragraph {"className":"review-profiles__quote"} -->
<p class="review-profiles__quote">Great communication, strong technical skills, and a genuine understanding of what our business needed. We'll be back for future projects.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"review-profiles__attribution"} -->
<p class="review-profiles__attribution"><strong>Managing director</strong>Design studio, Berlin</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"review-profiles__item","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group review-profiles__item"><!-- wp:paragraph {"className":"review-profiles__quote"} -->
<p class="review-profiles__quote">Couldn't have done this without them. Our site is faster and easier to manage than ever. Would definitely hire again.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"review-profiles__attribution"} -->
<p class="review-profiles__attribution"><strong>Owner</strong>Restaurant group, Amsterdam</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/review-profiles --></div></div></div>
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
