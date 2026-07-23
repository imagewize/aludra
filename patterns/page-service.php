<?php
/**
 * Title: Service Page
 * Slug: aludra/page-service
 * Categories: aludra
 * Block Types: core/post-content
 * Description: A full service/landing page — hero with dual CTAs, trust bar, capability cards, why-us cards, fixed-price tiers, an FAQ accordion, and a closing CTA band.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/hero-banner -->
<div class="wp-block-aludra-hero-banner alignfull" style="margin-top:0;margin-bottom:0"><div class="hero-banner__content"><!-- wp:group {"className":"hero-banner__eyebrow","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group hero-banner__eyebrow"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-search.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>What we offer</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":1,"className":"hero-banner__title","style":{"typography":{"lineHeight":"1.15"}}} -->
<h1 class="wp-block-heading hero-banner__title" style="line-height:1.15">Expert Service, <em>Delivered Properly</em></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-banner__lead"} -->
<p class="hero-banner__lead">A short paragraph explaining what this service is, who it is for, and the outcome a client walks away with. Fixed-price quotes, clear timelines, no surprises.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-banner__ctas","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons hero-banner__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Get a Free Quote</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#pricing">See Pricing</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:aludra/hero-banner -->

<!-- wp:aludra/trust-bar -->
<div class="wp-block-aludra-trust-bar alignfull"><div class="trust-bar__inner"><!-- wp:group {"className":"trust-bar__items","style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"flex","flexWrap":"wrap","alignItems":"center","justifyContent":"center"}} -->
<div class="wp-block-group trust-bar__items"><!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-performance.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Measurable results</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-bar-chart.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Before-and-after reporting</p>
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
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-clock.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Delivered in days, not months</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/trust-bar -->

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
<div class="wp-block-aludra-spine-section is-tinted alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">Why us</p><h2 class="spine-section__heading">Why Clients Stay.</h2><p class="spine-section__aside">Four reasons the work holds up long after the invoice is paid.</p></div><div class="spine-section__content"><!-- wp:aludra/feature-list-grid {"className":""} -->
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

<!-- wp:aludra/spine-section -->
<div class="wp-block-aludra-spine-section alignfull" id="pricing" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">Pricing</p><h2 class="spine-section__heading">Simple, Fixed Pricing.</h2><p class="spine-section__aside">Every engagement opens with a short audit — credited toward the work if you go ahead.</p></div><div class="spine-section__content"><!-- wp:aludra/pricing-tiers {"backgroundColor":"","className":"is-style-spec-sheet"} -->
<div class="wp-block-aludra-pricing-tiers is-style-spec-sheet alignfull" style="margin-top:0;margin-bottom:0"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Audit</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pricing-who"} -->
<p class="pricing-who">A full diagnosis, written up</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-price"} -->
<p class="pricing-price">€149<span class="pricing-price__unit">fixed price</span></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"pricing-features"} -->
<ul class="wp-block-list pricing-features"><!-- wp:list-item -->
<li>Full technical review</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Prioritised action list</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Effort and impact per item</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Credited toward the work</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"className":"pricing-cta"} -->
<div class="wp-block-buttons pricing-cta"><!-- wp:button {"backgroundColor":"primary","textColor":"white","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#">Request an Audit</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"pricing-featured-column"} -->
<div class="wp-block-column pricing-featured-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Full Service <span class="pricing-tag">Most popular</span></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pricing-who"} -->
<p class="pricing-who">The complete engagement</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-price"} -->
<p class="pricing-price">€350<span class="pricing-price__unit">fixed price</span></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"pricing-features"} -->
<ul class="wp-block-list pricing-features"><!-- wp:list-item -->
<li>Everything in the audit</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Every fix implemented</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Before-and-after report</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Two weeks of aftercare</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"className":"pricing-cta"} -->
<div class="wp-block-buttons pricing-cta"><!-- wp:button {"backgroundColor":"primary","textColor":"white","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#">Get a Free Quote</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Ecommerce</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pricing-who"} -->
<p class="pricing-who">For stores, with more moving parts</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-price"} -->
<p class="pricing-price">€450<span class="pricing-price__unit">fixed price</span></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"pricing-features"} -->
<ul class="wp-block-list pricing-features"><!-- wp:list-item -->
<li>Everything in Full Service</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Cart and checkout tuning</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Catalogue and search work</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Session and cache handling</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"className":"pricing-cta"} -->
<div class="wp-block-buttons pricing-cta"><!-- wp:button {"backgroundColor":"primary","textColor":"white","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#">Talk to Us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:aludra/pricing-tiers --></div></div></div>
<!-- /wp:aludra/spine-section -->

<!-- wp:aludra/spine-section {"tint":true} -->
<div class="wp-block-aludra-spine-section is-tinted alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">Questions</p><h2 class="spine-section__heading">Before You Get In Touch.</h2><p class="spine-section__aside"></p></div><div class="spine-section__content"><!-- wp:aludra/faq-tabs {"displayMode":"native"} -->
<div class="wp-block-aludra-faq-tabs alignwide faq-tabs-wrapper is-display-mode-native" data-display-mode="native"><div class="faq-native"><!-- wp:aludra/faq-tab-answer {"question":"How long does the work take?","title":"Timelines","displayMode":"native","openByDefault":true} -->
<details class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="How long does the work take?" open><summary>How long does the work take?</summary><div class="faq-answer-content"><!-- wp:paragraph -->
<p>Most engagements are finished within a week of starting; an audit on its own usually takes a day or two. Larger or more complex projects take longer, and we say so before you commit.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>You get a timeline with your quote, and we tell you as soon as anything looks like moving.</p>
<!-- /wp:paragraph --></div></details>
<!-- /wp:aludra/faq-tab-answer -->

<!-- wp:aludra/faq-tab-answer {"question":"Will this change how my site looks?","title":"Design and content","displayMode":"native"} -->
<details class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="Will this change how my site looks?"><summary>Will this change how my site looks?</summary><div class="faq-answer-content"><!-- wp:paragraph -->
<p>Not unless you ask us to. The work happens at the configuration and code layer; your design, content, and day-to-day workflow stay exactly as they are.</p>
<!-- /wp:paragraph --></div></details>
<!-- /wp:aludra/faq-tab-answer -->

<!-- wp:aludra/faq-tab-answer {"question":"What if the result falls short?","title":"If we miss the target","displayMode":"native"} -->
<details class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="What if the result falls short?"><summary>What if the result falls short?</summary><div class="faq-answer-content"><!-- wp:paragraph -->
<p>We keep going until it does. There are edge cases where a theoretical maximum is out of reach — heavy third-party embeds, for instance — and we flag those in the audit, before you commit to anything.</p>
<!-- /wp:paragraph --></div></details>
<!-- /wp:aludra/faq-tab-answer -->

<!-- wp:aludra/faq-tab-answer {"question":"Do you work with any host?","title":"Hosting","displayMode":"native"} -->
<details class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="Do you work with any host?"><summary>Do you work with any host?</summary><div class="faq-answer-content"><!-- wp:paragraph -->
<p>Yes — managed platforms, standard shared hosting, and self-managed servers alike. Some work is limited by what a managed host allows, and we tell you exactly what is possible on yours before we quote.</p>
<!-- /wp:paragraph --></div></details>
<!-- /wp:aludra/faq-tab-answer -->

<!-- wp:aludra/faq-tab-answer {"question":"Do you offer ongoing support afterwards?","title":"After the project","displayMode":"native"} -->
<details class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="Do you offer ongoing support afterwards?"><summary>Do you offer ongoing support afterwards?</summary><div class="faq-answer-content"><!-- wp:paragraph -->
<p>Every engagement includes a support window after handover, and there are monthly plans for clients who would rather we kept an eye on things permanently.</p>
<!-- /wp:paragraph --></div></details>
<!-- /wp:aludra/faq-tab-answer --></div></div>
<!-- /wp:aludra/faq-tabs --></div></div></div>
<!-- /wp:aludra/spine-section -->

<!-- wp:aludra/cta-banner -->
<div class="wp-block-aludra-cta-banner alignfull" style="margin-top:0;margin-bottom:0"><div class="cta-banner__content"><!-- wp:heading {"className":"cta-banner__title","style":{"typography":{"lineHeight":"1.2"}}} -->
<h2 class="wp-block-heading cta-banner__title" style="line-height:1.2">Ready to get started?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"cta-banner__lead"} -->
<p class="cta-banner__lead">Tell us what you need and we will send a fixed-price quote within one business day.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"cta-banner__ctas","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons cta-banner__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Get a Free Quote</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:aludra/cta-banner -->
