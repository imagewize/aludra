<?php
/**
 * Title: Homepage
 * Slug: aludra/page-homepage
 * Categories: aludra
 * Block Types: core/post-content
 * Description: A full agency/service-business homepage — split hero, about section, client website carousel, CTA band, pricing tiers, services grid, client reviews, and an FAQ accordion.
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
<div class="wp-block-aludra-spine-section alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">What we do</p><h2 class="spine-section__heading">What We Do And Why It Matters.</h2><p class="spine-section__aside">A one-line aside that frames what follows.</p></div><div class="spine-section__content"><!-- wp:aludra/about -->
<div class="wp-block-aludra-about alignfull" style="margin-top:0;margin-bottom:0"><div class="about-section__content"><!-- wp:paragraph {"className":"about-section__lead"} -->
<p class="about-section__lead">A short paragraph introducing what makes your business different, and why it matters to the people you serve.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"about-section__list-intro"} -->
<p class="about-section__list-intro">We offer:</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"about-section__list"} -->
<ul class="wp-block-list about-section__list"><!-- wp:list-item -->
<li>First benefit or service highlight</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Second benefit or service highlight</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Third benefit or service highlight</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph {"className":"about-section__closing"} -->
<p class="about-section__closing">A closing paragraph with more context — your company story, credibility, or a call back to your mission.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:aludra/about --></div></div></div>
<!-- /wp:aludra/spine-section -->

<!-- wp:aludra/spine-section {"tint":true} -->
<div class="wp-block-aludra-spine-section is-tinted alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">Selected work</p><h2 class="spine-section__heading">Our Clients</h2><p class="spine-section__aside">A few of the sites we designed, built and shipped.</p></div><div class="spine-section__content"><!-- wp:aludra/carousel {"engine":"rail","arrows":false,"adaptiveHeight":true} -->
<div class="wp-block-aludra-carousel aludra-work-rail work-rail"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","align":"full"} -->
<figure class="wp-block-image alignfull size-full"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNDAwIDI4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8ZGVmcz4KICAgIDxjbGlwUGF0aCBpZD0ic3BhLWNsaXAiPjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjgwIiByeD0iMTQiLz48L2NsaXBQYXRoPgogICAgPGxpbmVhckdyYWRpZW50IGlkPSJzcGEtYmxvYiIgeDE9IjEwJSIgeTE9IjAlIiB4Mj0iOTAlIiB5Mj0iMTAwJSI+CiAgICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNFN0M5QkMiLz4KICAgICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjQjQ3ODVBIi8+CiAgICA8L2xpbmVhckdyYWRpZW50PgogIDwvZGVmcz4KICA8ZyBjbGlwLXBhdGg9InVybCgjc3BhLWNsaXApIj4KICAgIDxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjgwIiBmaWxsPSIjRjRFQUU0Ii8+CiAgICA8cmVjdCB3aWR0aD0iNDAwIiBoZWlnaHQ9IjQyIiBmaWxsPSIjRUNEOUQwIi8+CiAgICA8Y2lyY2xlIGN4PSIxOCIgY3k9IjIxIiByPSI0IiBmaWxsPSIjNEEzNDJDIiBvcGFjaXR5PSIuMjgiLz4KICAgIDxjaXJjbGUgY3g9IjM2IiBjeT0iMjEiIHI9IjQiIGZpbGw9IiM0QTM0MkMiIG9wYWNpdHk9Ii4yOCIvPgogICAgPGNpcmNsZSBjeD0iNTQiIGN5PSIyMSIgcj0iNCIgZmlsbD0iIzRBMzQyQyIgb3BhY2l0eT0iLjI4Ii8+CiAgICA8cmVjdCB4PSI3MCIgeT0iMTIiIHdpZHRoPSIzMDYiIGhlaWdodD0iMTgiIHJ4PSI5IiBmaWxsPSIjRkJGNkYxIiBzdHJva2U9IiMwMDAwMDAxNCIvPgogICAgPHRleHQgeD0iODAiIHk9IjI0LjUiIGZvbnQtZmFtaWx5PSJ1aS1tb25vc3BhY2UsIFNGTW9uby1SZWd1bGFyLCBNZW5sbywgbW9ub3NwYWNlIiBmb250LXNpemU9IjExIiBmaWxsPSIjNEEzNDJDIiBvcGFjaXR5PSIuNTUiPnNvbHN0aWNlLXJldHJlYXQuY29tPC90ZXh0PgoKICAgIDxwYXRoIGQ9Ik0yNiAxMDBDMjYgNzggNDQgNjQgNjYgNjdDODggNzAgMTAyIDg0IDk5IDEwNEM5NiAxMjQgNzggMTM2IDU4IDEzM0MzOCAxMzAgMjYgMTIwIDI2IDEwMFoiIGZpbGw9InVybCgjc3BhLWJsb2IpIi8+CgogICAgPHJlY3QgeD0iMjQiIHk9IjE1NiIgd2lkdGg9IjE3NiIgaGVpZ2h0PSIxMiIgcng9IjYiIGZpbGw9IiM0QTM0MkMiLz4KICAgIDxyZWN0IHg9IjI0IiB5PSIxNzgiIHdpZHRoPSIxMTIiIGhlaWdodD0iOSIgcng9IjQuNSIgZmlsbD0iIzRBMzQyQyIgb3BhY2l0eT0iLjQ1Ii8+CgogICAgPHJlY3QgeD0iMjQiIHk9IjIwNCIgd2lkdGg9IjE0OCIgaGVpZ2h0PSIzMCIgcng9IjE1IiBmaWxsPSIjQjQ3ODVBIi8+CiAgICA8dGV4dCB4PSI5OCIgeT0iMjIzLjUiIGZvbnQtZmFtaWx5PSItYXBwbGUtc3lzdGVtLCBCbGlua01hY1N5c3RlbUZvbnQsICdTZWdvZSBVSScsIFJvYm90bywgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxMi41IiBmb250LXdlaWdodD0iNzAwIiBmaWxsPSIjRkZGRkZGIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5Cb29rIGEgVHJlYXRtZW50PC90ZXh0PgogIDwvZz4KICA8cmVjdCB4PSIwLjUiIHk9IjAuNSIgd2lkdGg9IjM5OSIgaGVpZ2h0PSIyNzkiIHJ4PSIxMy41IiBmaWxsPSJub25lIiBzdHJva2U9IiNFN0Q1Q0IiLz4KPC9zdmc+Cg==" alt="Solstice Retreat — spa website, one of our client sites"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","align":"full"} -->
<figure class="wp-block-image alignfull size-full"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNDAwIDI4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8ZGVmcz4KICAgIDxjbGlwUGF0aCBpZD0iZWNvbS1jbGlwIj48cmVjdCB3aWR0aD0iNDAwIiBoZWlnaHQ9IjI4MCIgcng9IjE0Ii8+PC9jbGlwUGF0aD4KICA8L2RlZnM+CiAgPGcgY2xpcC1wYXRoPSJ1cmwoI2Vjb20tY2xpcCkiPgogICAgPHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSIyODAiIGZpbGw9IiNFRkVERTgiLz4KICAgIDxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iNDIiIGZpbGw9IiNFNEUxRDkiLz4KICAgIDxjaXJjbGUgY3g9IjE4IiBjeT0iMjEiIHI9IjQiIGZpbGw9IiMxRTNBNUYiIG9wYWNpdHk9Ii4yOCIvPgogICAgPGNpcmNsZSBjeD0iMzYiIGN5PSIyMSIgcj0iNCIgZmlsbD0iIzFFM0E1RiIgb3BhY2l0eT0iLjI4Ii8+CiAgICA8Y2lyY2xlIGN4PSI1NCIgY3k9IjIxIiByPSI0IiBmaWxsPSIjMUUzQTVGIiBvcGFjaXR5PSIuMjgiLz4KICAgIDxyZWN0IHg9IjcwIiB5PSIxMiIgd2lkdGg9IjI3NiIgaGVpZ2h0PSIxOCIgcng9IjkiIGZpbGw9IiNGOEY3RjMiIHN0cm9rZT0iIzAwMDAwMDE0Ii8+CiAgICA8dGV4dCB4PSI4MCIgeT0iMjQuNSIgZm9udC1mYW1pbHk9InVpLW1vbm9zcGFjZSwgU0ZNb25vLVJlZ3VsYXIsIE1lbmxvLCBtb25vc3BhY2UiIGZvbnQtc2l6ZT0iMTEiIGZpbGw9IiMxRTNBNUYiIG9wYWNpdHk9Ii41NSI+c2hvcGZyb250aWVyLmNvbTwvdGV4dD4KICAgIDxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDM1NCwxMykiIHN0cm9rZT0iIzFFM0E1RiIgc3Ryb2tlLXdpZHRoPSIxLjYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgZmlsbD0ibm9uZSIgb3BhY2l0eT0iLjciPgogICAgICA8Y2lyY2xlIGN4PSI2IiBjeT0iMTUuNSIgcj0iMS40IiBmaWxsPSIjMUUzQTVGIiBzdHJva2U9Im5vbmUiLz4KICAgICAgPGNpcmNsZSBjeD0iMTMuNSIgY3k9IjE1LjUiIHI9IjEuNCIgZmlsbD0iIzFFM0E1RiIgc3Ryb2tlPSJub25lIi8+CiAgICAgIDxwYXRoIGQ9Ik0xIDJoMmwxLjggOC40QTEuNSAxLjUgMCAwIDAgNi4zIDExLjZIMTVhMS41IDEuNSAwIDAgMCAxLjUtMS4yTDE3LjUgNEg0Ii8+CiAgICA8L2c+CgogICAgPHJlY3QgeD0iMjQiIHk9IjY2IiB3aWR0aD0iMTYwIiBoZWlnaHQ9IjEyIiByeD0iNiIgZmlsbD0iIzFFM0E1RiIvPgoKICAgIDxyZWN0IHg9IjI0IiB5PSI5NCIgd2lkdGg9Ijc2IiBoZWlnaHQ9Ijc2IiByeD0iOCIgZmlsbD0iI0M5RDZFMyIvPgogICAgPHJlY3QgeD0iMTEyIiB5PSI5NCIgd2lkdGg9Ijc2IiBoZWlnaHQ9Ijc2IiByeD0iOCIgZmlsbD0iI0I4QzlEQyIvPgogICAgPHJlY3QgeD0iMjAwIiB5PSI5NCIgd2lkdGg9Ijc2IiBoZWlnaHQ9Ijc2IiByeD0iOCIgZmlsbD0iI0E2QkJENCIvPgogICAgPHJlY3QgeD0iMjg4IiB5PSI5NCIgd2lkdGg9Ijc2IiBoZWlnaHQ9Ijc2IiByeD0iOCIgZmlsbD0iIzk0QURDQiIvPgoKICAgIDxyZWN0IHg9IjM2IiB5PSIxNzgiIHdpZHRoPSI1MiIgaGVpZ2h0PSI1IiByeD0iMi41IiBmaWxsPSIjMUUzQTVGIiBvcGFjaXR5PSIuMzUiLz4KICAgIDxyZWN0IHg9IjEyNCIgeT0iMTc4IiB3aWR0aD0iNTIiIGhlaWdodD0iNSIgcng9IjIuNSIgZmlsbD0iIzFFM0E1RiIgb3BhY2l0eT0iLjM1Ii8+CiAgICA8cmVjdCB4PSIyMTIiIHk9IjE3OCIgd2lkdGg9IjUyIiBoZWlnaHQ9IjUiIHJ4PSIyLjUiIGZpbGw9IiMxRTNBNUYiIG9wYWNpdHk9Ii4zNSIvPgogICAgPHJlY3QgeD0iMzAwIiB5PSIxNzgiIHdpZHRoPSI1MiIgaGVpZ2h0PSI1IiByeD0iMi41IiBmaWxsPSIjMUUzQTVGIiBvcGFjaXR5PSIuMzUiLz4KCiAgICA8cmVjdCB4PSIyNCIgeT0iMjA0IiB3aWR0aD0iMTI0IiBoZWlnaHQ9IjMwIiByeD0iMTUiIGZpbGw9IiMxRTNBNUYiLz4KICAgIDx0ZXh0IHg9Ijg2IiB5PSIyMjMuNSIgZm9udC1mYW1pbHk9Ii1hcHBsZS1zeXN0ZW0sIEJsaW5rTWFjU3lzdGVtRm9udCwgJ1NlZ29lIFVJJywgUm9ib3RvLCBIZWx2ZXRpY2EsIEFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyLjUiIGZvbnQtd2VpZ2h0PSI3MDAiIGZpbGw9IiNGRkZGRkYiIHRleHQtYW5jaG9yPSJtaWRkbGUiPkFkZCB0byBDYXJ0PC90ZXh0PgogIDwvZz4KICA8cmVjdCB4PSIwLjUiIHk9IjAuNSIgd2lkdGg9IjM5OSIgaGVpZ2h0PSIyNzkiIHJ4PSIxMy41IiBmaWxsPSJub25lIiBzdHJva2U9IiNEQUQ3Q0UiLz4KPC9zdmc+Cg==" alt="Shopfrontier — ecommerce website, one of our client sites"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","align":"full"} -->
<figure class="wp-block-image alignfull size-full"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNDAwIDI4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8ZGVmcz4KICAgIDxjbGlwUGF0aCBpZD0iYWdlbmN5LWNsaXAiPjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjgwIiByeD0iMTQiLz48L2NsaXBQYXRoPgogIDwvZGVmcz4KICA8ZyBjbGlwLXBhdGg9InVybCgjYWdlbmN5LWNsaXApIj4KICAgIDxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjgwIiBmaWxsPSIjMTYxODFDIi8+CiAgICA8cmVjdCB3aWR0aD0iNDAwIiBoZWlnaHQ9IjQyIiBmaWxsPSIjMUQxRjI0Ii8+CiAgICA8Y2lyY2xlIGN4PSIxOCIgY3k9IjIxIiByPSI0IiBmaWxsPSIjRjJGMUVFIiBvcGFjaXR5PSIuMjUiLz4KICAgIDxjaXJjbGUgY3g9IjM2IiBjeT0iMjEiIHI9IjQiIGZpbGw9IiNGMkYxRUUiIG9wYWNpdHk9Ii4yNSIvPgogICAgPGNpcmNsZSBjeD0iNTQiIGN5PSIyMSIgcj0iNCIgZmlsbD0iI0YyRjFFRSIgb3BhY2l0eT0iLjI1Ii8+CiAgICA8cmVjdCB4PSI3MCIgeT0iMTIiIHdpZHRoPSIzMDYiIGhlaWdodD0iMTgiIHJ4PSI5IiBmaWxsPSIjMjQyNjJCIiBzdHJva2U9IiMzNDM2M0MiLz4KICAgIDx0ZXh0IHg9IjgwIiB5PSIyNC41IiBmb250LWZhbWlseT0idWktbW9ub3NwYWNlLCBTRk1vbm8tUmVndWxhciwgTWVubG8sIG1vbm9zcGFjZSIgZm9udC1zaXplPSIxMSIgZmlsbD0iI0YyRjFFRSIgb3BhY2l0eT0iLjUiPmZvcm13b3JrLmRlc2lnbjwvdGV4dD4KCiAgICA8cmVjdCB4PSIyNCIgeT0iNjYiIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgcng9IjgiIGZpbGw9IiM2RDVERkMiLz4KICAgIDx0ZXh0IHg9IjQwIiB5PSI4OC41IiBmb250LWZhbWlseT0iR2VvcmdpYSwgJ1RpbWVzIE5ldyBSb21hbicsIHNlcmlmIiBmb250LXN0eWxlPSJpdGFsaWMiIGZvbnQtd2VpZ2h0PSI3MDAiIGZvbnQtc2l6ZT0iMTYiIGZpbGw9IiNGRkZGRkYiIHRleHQtYW5jaG9yPSJtaWRkbGUiPkY8L3RleHQ+CgogICAgPHJlY3QgeD0iMjQiIHk9IjExNCIgd2lkdGg9IjIyOCIgaGVpZ2h0PSIxMyIgcng9IjYuNSIgZmlsbD0iI0YyRjFFRSIvPgogICAgPHJlY3QgeD0iMjQiIHk9IjEzNiIgd2lkdGg9IjI3NiIgaGVpZ2h0PSI5IiByeD0iNC41IiBmaWxsPSIjRjJGMUVFIiBvcGFjaXR5PSIuNDUiLz4KCiAgICA8cmVjdCB4PSIyNCIgeT0iMTU2IiB3aWR0aD0iMTEwIiBoZWlnaHQ9IjgyIiByeD0iOCIgZmlsbD0iI0ZGRkZGRiIgb3BhY2l0eT0iLjA4Ii8+CiAgICA8cmVjdCB4PSIxNDQiIHk9IjE1NiIgd2lkdGg9IjExMCIgaGVpZ2h0PSI4MiIgcng9IjgiIGZpbGw9IiNGRkZGRkYiIG9wYWNpdHk9Ii4wOCIvPgogICAgPHJlY3QgeD0iMjY0IiB5PSIxNTYiIHdpZHRoPSIxMTAiIGhlaWdodD0iODIiIHJ4PSI4IiBmaWxsPSIjRkZGRkZGIiBvcGFjaXR5PSIuMDgiLz4KICA8L2c+CiAgPHJlY3QgeD0iMC41IiB5PSIwLjUiIHdpZHRoPSIzOTkiIGhlaWdodD0iMjc5IiByeD0iMTMuNSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMkEyQzMxIi8+Cjwvc3ZnPgo=" alt="Formwork — design agency website, one of our client sites"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","align":"full"} -->
<figure class="wp-block-image alignfull size-full"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNDAwIDI4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8ZGVmcz4KICAgIDxjbGlwUGF0aCBpZD0iYmlrZXMtY2xpcCI+PHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSIyODAiIHJ4PSIxNCIvPjwvY2xpcFBhdGg+CiAgPC9kZWZzPgogIDxnIGNsaXAtcGF0aD0idXJsKCNiaWtlcy1jbGlwKSI+CiAgICA8cmVjdCB3aWR0aD0iNDAwIiBoZWlnaHQ9IjI4MCIgZmlsbD0iI0VDRjFFQSIvPgogICAgPHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSI0MiIgZmlsbD0iI0UxRTlFMCIvPgogICAgPGNpcmNsZSBjeD0iMTgiIGN5PSIyMSIgcj0iNCIgZmlsbD0iIzMzNDEzQSIgb3BhY2l0eT0iLjI4Ii8+CiAgICA8Y2lyY2xlIGN4PSIzNiIgY3k9IjIxIiByPSI0IiBmaWxsPSIjMzM0MTNBIiBvcGFjaXR5PSIuMjgiLz4KICAgIDxjaXJjbGUgY3g9IjU0IiBjeT0iMjEiIHI9IjQiIGZpbGw9IiMzMzQxM0EiIG9wYWNpdHk9Ii4yOCIvPgogICAgPHJlY3QgeD0iNzAiIHk9IjEyIiB3aWR0aD0iMzA2IiBoZWlnaHQ9IjE4IiByeD0iOSIgZmlsbD0iI0Y3RkFGNiIgc3Ryb2tlPSIjMDAwMDAwMTQiLz4KICAgIDx0ZXh0IHg9IjgwIiB5PSIyNC41IiBmb250LWZhbWlseT0idWktbW9ub3NwYWNlLCBTRk1vbm8tUmVndWxhciwgTWVubG8sIG1vbm9zcGFjZSIgZm9udC1zaXplPSIxMSIgZmlsbD0iIzMzNDEzQSIgb3BhY2l0eT0iLjU1Ij53aGVlbGhvdXNlLWJpa2VzLmNvbTwvdGV4dD4KCiAgICA8IS0tICJiaWtlIiBpY29uIGJ5IFRhYmxlciBJY29ucywgdmlhIEJsYWRlIFVJIEtpdCAoYmxhZGUtaWNvbnMpIOKAlCBNSVQgTGljZW5zZSAtLT4KICAgIDxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI0LDY2KSBzY2FsZSgyLjUpIiBzdHJva2U9IiNDMjQxMEMiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBmaWxsPSJub25lIj4KICAgICAgPHBhdGggZD0iTTIgMThhMyAzIDAgMSAwIDYgMGEzIDMgMCAxIDAgLTYgMCIvPgogICAgICA8cGF0aCBkPSJNMTYgMThhMyAzIDAgMSAwIDYgMGEzIDMgMCAxIDAgLTYgMCIvPgogICAgICA8cGF0aCBkPSJNMTIgMTlsMCAtNGwtMyAtM2w1IC00bDIgM2wzIDAiLz4KICAgICAgPHBhdGggZD0iTTE2IDVhMSAxIDAgMSAwIDIgMGExIDEgMCAxIDAgLTIgMCIvPgogICAgPC9nPgoKICAgIDxyZWN0IHg9IjI0IiB5PSIxNDAiIHdpZHRoPSIxNDAiIGhlaWdodD0iMTIiIHJ4PSI2IiBmaWxsPSIjMzM0MTNBIi8+CgogICAgPHJlY3QgeD0iMjQiIHk9IjE2OCIgd2lkdGg9IjEyMCIgaGVpZ2h0PSIzMCIgcng9IjE1IiBmaWxsPSIjQzI0MTBDIi8+CiAgICA8dGV4dCB4PSI4NCIgeT0iMTg3LjUiIGZvbnQtZmFtaWx5PSItYXBwbGUtc3lzdGVtLCBCbGlua01hY1N5c3RlbUZvbnQsICdTZWdvZSBVSScsIFJvYm90bywgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxMi41IiBmb250LXdlaWdodD0iNzAwIiBmaWxsPSIjRkZGRkZGIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5TaG9wIEJpa2VzPC90ZXh0PgogIDwvZz4KICA8cmVjdCB4PSIwLjUiIHk9IjAuNSIgd2lkdGg9IjM5OSIgaGVpZ2h0PSIyNzkiIHJ4PSIxMy41IiBmaWxsPSJub25lIiBzdHJva2U9IiNEN0UyRDQiLz4KPC9zdmc+Cg==" alt="Wheelhouse Bikes — bike shop website, one of our client sites"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","align":"full"} -->
<figure class="wp-block-image alignfull size-full"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNDAwIDI4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8ZGVmcz4KICAgIDxjbGlwUGF0aCBpZD0icmVzdC1jbGlwIj48cmVjdCB3aWR0aD0iNDAwIiBoZWlnaHQ9IjI4MCIgcng9IjE0Ii8+PC9jbGlwUGF0aD4KICA8L2RlZnM+CiAgPGcgY2xpcC1wYXRoPSJ1cmwoI3Jlc3QtY2xpcCkiPgogICAgPHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSIyODAiIGZpbGw9IiNGNkVFRTEiLz4KICAgIDxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iNDIiIGZpbGw9IiNFRUUyQ0UiLz4KICAgIDxjaXJjbGUgY3g9IjE4IiBjeT0iMjEiIHI9IjQiIGZpbGw9IiM1QjNBMUUiIG9wYWNpdHk9Ii4yOCIvPgogICAgPGNpcmNsZSBjeD0iMzYiIGN5PSIyMSIgcj0iNCIgZmlsbD0iIzVCM0ExRSIgb3BhY2l0eT0iLjI4Ii8+CiAgICA8Y2lyY2xlIGN4PSI1NCIgY3k9IjIxIiByPSI0IiBmaWxsPSIjNUIzQTFFIiBvcGFjaXR5PSIuMjgiLz4KICAgIDxyZWN0IHg9IjcwIiB5PSIxMiIgd2lkdGg9IjMwNiIgaGVpZ2h0PSIxOCIgcng9IjkiIGZpbGw9IiNGQ0Y4RUYiIHN0cm9rZT0iIzAwMDAwMDE0Ii8+CiAgICA8dGV4dCB4PSI4MCIgeT0iMjQuNSIgZm9udC1mYW1pbHk9InVpLW1vbm9zcGFjZSwgU0ZNb25vLVJlZ3VsYXIsIE1lbmxvLCBtb25vc3BhY2UiIGZvbnQtc2l6ZT0iMTEiIGZpbGw9IiM1QjNBMUUiIG9wYWNpdHk9Ii41NSI+aGFydmVzdC10YWJsZS5jb208L3RleHQ+CgogICAgPCEtLSAicmVzdGF1cmFudC1ub29kbGUiIGljb24gYnkgTWFraSBJY29ucywgdmlhIEJsYWRlIFVJIEtpdCAoYmxhZGUtaWNvbnMpIOKAlCBNSVQgTGljZW5zZSAtLT4KICAgIDxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI0LDY2KSBzY2FsZSgyLjEzMzMpIiBmaWxsPSIjOEE0QjEyIj4KICAgICAgPHBhdGggZD0iTTQuNDU3LDExLjk4OTIsMSw4VjdIMTRWOGwtMy40OTYxLDMuOTg5MVpNMy45ODgyLDIuNWEuNS41LDAsMCwwLTEsMHYuNTY3MWwtMS43OTY5LjM2NzVhLjI1LjI1LDAsMSwwLC4wOTQuNDkxMWwxLjcwMjktLjI3NzZ2LjU2NjJsLTEuNzUuMDM1N2EuMjUuMjUsMCwwLDAsMCwuNWwxLjc1LjAzNTdWNS45OThoMVptOS41LDEuNS03LjUuMjYyNVYyLjk5NTFsNy41OTQtMS4wNzM3YS41LjUsMCwwLDAtLjE4ODEtLjk4MjJMNS45NzkyLDIuNDU1NWEuNDk2My40OTYzLDAsMCwwLS45OTEuMDQ0NXYuMjI3NmwtLjQ5My4xMDA5VjMuMThsLjQ5My0uMDhWNC4yOTc0bC0uNDkzLjAxdi40NjA4TDEzLjQ4ODIsNWEuNS41LDAsMCwwLDAtMVpNMTAsMTNINXYuNTc1N2g1WiIvPgogICAgPC9nPgoKICAgIDxyZWN0IHg9IjI0IiB5PSIxMDQiIHdpZHRoPSIxNTgiIGhlaWdodD0iMTMiIHJ4PSI2LjUiIGZpbGw9IiM1QjNBMUUiLz4KCiAgICA8cmVjdCB4PSIyNCIgeT0iMTMyIiB3aWR0aD0iMTYwIiBoZWlnaHQ9IjkiIHJ4PSI0LjUiIGZpbGw9IiM1QjNBMUUiIG9wYWNpdHk9Ii42Ii8+CiAgICA8cmVjdCB4PSIzMjgiIHk9IjEzMiIgd2lkdGg9IjI4IiBoZWlnaHQ9IjkiIHJ4PSI0LjUiIGZpbGw9IiM4QTRCMTIiIG9wYWNpdHk9Ii44NSIvPgoKICAgIDxyZWN0IHg9IjI0IiB5PSIxNTYiIHdpZHRoPSIxMjUiIGhlaWdodD0iOSIgcng9IjQuNSIgZmlsbD0iIzVCM0ExRSIgb3BhY2l0eT0iLjYiLz4KICAgIDxyZWN0IHg9IjMyOCIgeT0iMTU2IiB3aWR0aD0iMjgiIGhlaWdodD0iOSIgcng9IjQuNSIgZmlsbD0iIzhBNEIxMiIgb3BhY2l0eT0iLjg1Ii8+CgogICAgPHJlY3QgeD0iMjQiIHk9IjE4MCIgd2lkdGg9IjE0NSIgaGVpZ2h0PSI5IiByeD0iNC41IiBmaWxsPSIjNUIzQTFFIiBvcGFjaXR5PSIuNiIvPgogICAgPHJlY3QgeD0iMzI4IiB5PSIxODAiIHdpZHRoPSIyOCIgaGVpZ2h0PSI5IiByeD0iNC41IiBmaWxsPSIjOEE0QjEyIiBvcGFjaXR5PSIuODUiLz4KCiAgICA8cmVjdCB4PSIyNCIgeT0iMjA0IiB3aWR0aD0iMTU4IiBoZWlnaHQ9IjMwIiByeD0iMTUiIGZpbGw9IiM4QTRCMTIiLz4KICAgIDx0ZXh0IHg9IjEwMyIgeT0iMjIzLjUiIGZvbnQtZmFtaWx5PSItYXBwbGUtc3lzdGVtLCBCbGlua01hY1N5c3RlbUZvbnQsICdTZWdvZSBVSScsIFJvYm90bywgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxMi41IiBmb250LXdlaWdodD0iNzAwIiBmaWxsPSIjRkZGRkZGIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5SZXNlcnZlIGEgVGFibGU8L3RleHQ+CiAgPC9nPgogIDxyZWN0IHg9IjAuNSIgeT0iMC41IiB3aWR0aD0iMzk5IiBoZWlnaHQ9IjI3OSIgcng9IjEzLjUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iI0U5REJDMiIvPgo8L3N2Zz4K" alt="Harvest Table — restaurant website, one of our client sites"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel --></div></div></div>
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
