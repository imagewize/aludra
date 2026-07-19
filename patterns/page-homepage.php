<?php
/**
 * Title: Homepage
 * Slug: aludra/page-homepage
 * Categories: aludra
 * Block Types: core/post-content
 * Description: A full agency/service-business homepage — split hero, about section, client logo carousel, CTA band, pricing tiers, services grid, client reviews, and an FAQ accordion.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/hero-split -->
<div class="wp-block-aludra-hero-split alignfull" style="margin-top:0;margin-bottom:0">
<div class="hero-split__inner">
<!-- wp:group {"className":"hero-split__content","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group hero-split__content"><!-- wp:heading {"level":1,"className":"hero-split__title","style":{"typography":{"lineHeight":"1.15"}}} -->
<h1 class="wp-block-heading hero-split__title" style="line-height:1.15">Fast Sites. Real Results.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-split__lead"} -->
<p class="hero-split__lead">Custom WordPress and WooCommerce development for businesses that need their site to work as hard as they do.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-split__ctas","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons hero-split__ctas"><!-- wp:button {"url":"#"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Get in Touch</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"hero-split__media"} -->
<div class="wp-block-group hero-split__media"><!-- wp:image {"className":"hero-split__image hero-split__image--desktop","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large hero-split__image hero-split__image--desktop"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSIzMDAiIHJ4PSIxNiIgZmlsbD0iI0YzRjRGNiIvPgogIDxyZWN0IHg9IjMyIiB5PSIyOCIgd2lkdGg9IjMzNiIgaGVpZ2h0PSIyMjgiIHJ4PSIxMiIgZmlsbD0iI0ZGRkZGRiIgc3Ryb2tlPSIjRTVFN0VCIiBzdHJva2Utd2lkdGg9IjIiLz4KICA8Y2lyY2xlIGN4PSI1NCIgY3k9IjUwIiByPSI0IiBmaWxsPSIjRDFENURCIi8+CiAgPGNpcmNsZSBjeD0iNzAiIGN5PSI1MCIgcj0iNCIgZmlsbD0iI0QxRDVEQiIvPgogIDxjaXJjbGUgY3g9Ijg2IiBjeT0iNTAiIHI9IjQiIGZpbGw9IiNEMUQ1REIiLz4KICA8cmVjdCB4PSIxMTAiIHk9IjQ0IiB3aWR0aD0iMjIwIiBoZWlnaHQ9IjEyIiByeD0iNiIgZmlsbD0iI0U1RTdFQiIvPgogIDxyZWN0IHg9IjU2IiB5PSI5MCIgd2lkdGg9IjE4MCIgaGVpZ2h0PSIxNiIgcng9IjgiIGZpbGw9IiMzNzQxNTEiLz4KICA8cmVjdCB4PSI1NiIgeT0iMTIwIiB3aWR0aD0iMjUwIiBoZWlnaHQ9IjEwIiByeD0iNSIgZmlsbD0iIzlDQTNBRiIvPgogIDxyZWN0IHg9IjU2IiB5PSIxMzgiIHdpZHRoPSIxNjAiIGhlaWdodD0iMTAiIHJ4PSI1IiBmaWxsPSIjOUNBM0FGIi8+CiAgPHJlY3QgeD0iNTYiIHk9IjE2NiIgd2lkdGg9IjEwMCIgaGVpZ2h0PSIyMiIgcng9IjExIiBmaWxsPSIjNkI3MjgwIi8+CiAgPGNpcmNsZSBjeD0iNDAiIGN5PSIzNiIgcj0iMjQiIGZpbGw9IiMzNzQxNTEiIHN0cm9rZT0iI0YzRjRGNiIgc3Ryb2tlLXdpZHRoPSI0Ii8+CiAgPHBhdGggZD0iTTQyLjcgMjIuOEwyOC45IDQwLjhIMzcuNEwzNS4xIDUxLjhMNTAuMyAzMkg0MS40TDQyLjcgMjIuOFoiIGZpbGw9IiNGOUZBRkIiLz4KICA8cmVjdCB4PSIzMTYiIHk9IjIxMCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjU2IiByeD0iMTAiIGZpbGw9IiMzNzQxNTEiIHN0cm9rZT0iI0YzRjRGNiIgc3Ryb2tlLXdpZHRoPSI0Ii8+CiAgPHJlY3QgeD0iMzI4IiB5PSIyNDQiIHdpZHRoPSI4IiBoZWlnaHQ9IjE0IiByeD0iMiIgZmlsbD0iIzlDQTNBRiIgZmlsbC1vcGFjaXR5PSIwLjYiLz4KICA8cmVjdCB4PSIzNDAiIHk9IjIzNiIgd2lkdGg9IjgiIGhlaWdodD0iMjIiIHJ4PSIyIiBmaWxsPSIjOUNBM0FGIiBmaWxsLW9wYWNpdHk9IjAuOCIvPgogIDxyZWN0IHg9IjM1MiIgeT0iMjI2IiB3aWR0aD0iOCIgaGVpZ2h0PSIzMiIgcng9IjIiIGZpbGw9IiNGOUZBRkIiLz4KPC9zdmc+Cg==" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"className":"hero-split__image hero-split__image--mobile","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large hero-split__image hero-split__image--mobile"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSIzMDAiIHJ4PSIxNiIgZmlsbD0iI0YzRjRGNiIvPgogIDxyZWN0IHg9IjMyIiB5PSIyOCIgd2lkdGg9IjMzNiIgaGVpZ2h0PSIyMjgiIHJ4PSIxMiIgZmlsbD0iI0ZGRkZGRiIgc3Ryb2tlPSIjRTVFN0VCIiBzdHJva2Utd2lkdGg9IjIiLz4KICA8Y2lyY2xlIGN4PSI1NCIgY3k9IjUwIiByPSI0IiBmaWxsPSIjRDFENURCIi8+CiAgPGNpcmNsZSBjeD0iNzAiIGN5PSI1MCIgcj0iNCIgZmlsbD0iI0QxRDVEQiIvPgogIDxjaXJjbGUgY3g9Ijg2IiBjeT0iNTAiIHI9IjQiIGZpbGw9IiNEMUQ1REIiLz4KICA8cmVjdCB4PSIxMTAiIHk9IjQ0IiB3aWR0aD0iMjIwIiBoZWlnaHQ9IjEyIiByeD0iNiIgZmlsbD0iI0U1RTdFQiIvPgogIDxyZWN0IHg9IjU2IiB5PSI5MCIgd2lkdGg9IjE4MCIgaGVpZ2h0PSIxNiIgcng9IjgiIGZpbGw9IiMzNzQxNTEiLz4KICA8cmVjdCB4PSI1NiIgeT0iMTIwIiB3aWR0aD0iMjUwIiBoZWlnaHQ9IjEwIiByeD0iNSIgZmlsbD0iIzlDQTNBRiIvPgogIDxyZWN0IHg9IjU2IiB5PSIxMzgiIHdpZHRoPSIxNjAiIGhlaWdodD0iMTAiIHJ4PSI1IiBmaWxsPSIjOUNBM0FGIi8+CiAgPHJlY3QgeD0iNTYiIHk9IjE2NiIgd2lkdGg9IjEwMCIgaGVpZ2h0PSIyMiIgcng9IjExIiBmaWxsPSIjNkI3MjgwIi8+CiAgPGNpcmNsZSBjeD0iNDAiIGN5PSIzNiIgcj0iMjQiIGZpbGw9IiMzNzQxNTEiIHN0cm9rZT0iI0YzRjRGNiIgc3Ryb2tlLXdpZHRoPSI0Ii8+CiAgPHBhdGggZD0iTTQyLjcgMjIuOEwyOC45IDQwLjhIMzcuNEwzNS4xIDUxLjhMNTAuMyAzMkg0MS40TDQyLjcgMjIuOFoiIGZpbGw9IiNGOUZBRkIiLz4KICA8cmVjdCB4PSIzMTYiIHk9IjIxMCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjU2IiByeD0iMTAiIGZpbGw9IiMzNzQxNTEiIHN0cm9rZT0iI0YzRjRGNiIgc3Ryb2tlLXdpZHRoPSI0Ii8+CiAgPHJlY3QgeD0iMzI4IiB5PSIyNDQiIHdpZHRoPSI4IiBoZWlnaHQ9IjE0IiByeD0iMiIgZmlsbD0iIzlDQTNBRiIgZmlsbC1vcGFjaXR5PSIwLjYiLz4KICA8cmVjdCB4PSIzNDAiIHk9IjIzNiIgd2lkdGg9IjgiIGhlaWdodD0iMjIiIHJ4PSIyIiBmaWxsPSIjOUNBM0FGIiBmaWxsLW9wYWNpdHk9IjAuOCIvPgogIDxyZWN0IHg9IjM1MiIgeT0iMjI2IiB3aWR0aD0iOCIgaGVpZ2h0PSIzMiIgcng9IjIiIGZpbGw9IiNGOUZBRkIiLz4KPC9zdmc+Cg==" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
</div>
<!-- /wp:aludra/hero-split -->

<!-- wp:aludra/about -->
<div class="wp-block-aludra-about alignfull" style="margin-top:0;margin-bottom:0">
<div class="about-section__content"><!-- wp:heading {"level":2,"className":"about-section__title","style":{"typography":{"lineHeight":"1.3"}}} -->
<h2 class="wp-block-heading about-section__title" style="line-height:1.3">What We Do<br/>And Why It Matters.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"about-section__lead"} -->
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
<!-- /wp:paragraph --></div>
</div>
<!-- /wp:aludra/about -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Our Clients</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"30px"} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:aludra/carousel {"slidesToShow":3,"slidesToScroll":1,"arrows":false,"dots":true,"infinite":true,"adaptiveHeight":true,"align":"full"} -->
<div class="wp-block-aludra-carousel alignfull slick-slider cb-padding cb-arrow-style-arrow cb-arrow-bg-none" data-slick="{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:false,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;rtl&quot;:false,&quot;adaptiveHeight&quot;:true,&quot;centerMode&quot;:false,&quot;centerPadding&quot;:&quot;50px&quot;,&quot;variableWidth&quot;:false,&quot;lazyLoad&quot;:&quot;ondemand&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;centerMode&quot;:false,&quot;variableWidth&quot;:false}}]}" data-dots-top="0px" data-dots-bottom="0px" data-arrow-color="#000000" data-arrow-background="transparent" data-arrow-hover-color="#000000" data-arrow-hover-background="transparent" data-arrow-style="arrow" data-arrow-background-style="none" data-arrow-size="40"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":80,"height":80,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml;base64,PHN2ZyBjbGFzcz0idy02NCBoLTY0IiB2aWV3Qm94PSIwIDAgNDggNDgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPGcgZmlsbD0iI0Q5NzcwNiI+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgwIDI0IDI0KSIvPgogICAgPHBhdGggZD0iTTI0IDI0QzIwIDIwIDIwIDggMjQgNEMyOCA4IDI4IDIwIDI0IDI0WiIgdHJhbnNmb3JtPSJyb3RhdGUoNjAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgxMjAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgxODAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgyNDAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgzMDAgMjQgMjQpIi8+CiAgPC9nPgogIDxjaXJjbGUgY3g9IjI0IiBjeT0iMjQiIHI9IjMiIGZpbGw9IiNEOTc3MDYiLz4KPC9zdmc+Cg==" alt="Client 1 logo" width="80" height="80"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":80,"height":80,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml;base64,PHN2ZyBjbGFzcz0idy02NCBoLTY0IiB2aWV3Qm94PSIwIDAgNDggNDgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPGcgZmlsbD0iI0Y1OUUwQiI+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgwIDI0IDI0KSIvPgogICAgPHBhdGggZD0iTTI0IDI0QzIwIDIwIDIwIDggMjQgNEMyOCA4IDI4IDIwIDI0IDI0WiIgdHJhbnNmb3JtPSJyb3RhdGUoNjAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgxMjAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgxODAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgyNDAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgzMDAgMjQgMjQpIi8+CiAgPC9nPgogIDxjaXJjbGUgY3g9IjI0IiBjeT0iMjQiIHI9IjMiIGZpbGw9IiNGNTlFMEIiLz4KPC9zdmc+Cg==" alt="Client 2 logo" width="80" height="80"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":80,"height":80,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml;base64,PHN2ZyBjbGFzcz0idy02NCBoLTY0IiB2aWV3Qm94PSIwIDAgNDggNDgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPGcgZmlsbD0iI0VBNTgwQyI+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgwIDI0IDI0KSIvPgogICAgPHBhdGggZD0iTTI0IDI0QzIwIDIwIDIwIDggMjQgNEMyOCA4IDI4IDIwIDI0IDI0WiIgdHJhbnNmb3JtPSJyb3RhdGUoNjAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgxMjAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgxODAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgyNDAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgzMDAgMjQgMjQpIi8+CiAgPC9nPgogIDxjaXJjbGUgY3g9IjI0IiBjeT0iMjQiIHI9IjMiIGZpbGw9IiNFQTU4MEMiLz4KPC9zdmc+Cg==" alt="Client 3 logo" width="80" height="80"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":80,"height":80,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml;base64,PHN2ZyBjbGFzcz0idy02NCBoLTY0IiB2aWV3Qm94PSIwIDAgNDggNDgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPGRlZnM+CiAgICA8bGluZWFyR3JhZGllbnQgaWQ9Im5pZ2h0Zmxvd2VyR29sZEdyYWRpZW50IiB4MT0iMTAlIiB5MT0iMCUiIHgyPSI5MCUiIHkyPSIxMDAlIj4KICAgICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3R5bGU9InN0b3AtY29sb3I6I0Y4QjM0MjtzdG9wLW9wYWNpdHk6MSIgLz4KICAgICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdHlsZT0ic3RvcC1jb2xvcjojRDk3NzA2O3N0b3Atb3BhY2l0eToxIiAvPgogICAgPC9saW5lYXJHcmFkaWVudD4KICA8L2RlZnM+CiAgPGcgZmlsbD0idXJsKCNuaWdodGZsb3dlckdvbGRHcmFkaWVudCkiPgogICAgPHBhdGggZD0iTTI0IDI0QzIwIDIwIDIwIDggMjQgNEMyOCA4IDI4IDIwIDI0IDI0WiIgdHJhbnNmb3JtPSJyb3RhdGUoMCAyNCAyNCkiLz4KICAgIDxwYXRoIGQ9Ik0yNCAyNEMyMCAyMCAyMCA4IDI0IDRDMjggOCAyOCAyMCAyNCAyNFoiIHRyYW5zZm9ybT0icm90YXRlKDYwIDI0IDI0KSIvPgogICAgPHBhdGggZD0iTTI0IDI0QzIwIDIwIDIwIDggMjQgNEMyOCA4IDI4IDIwIDI0IDI0WiIgdHJhbnNmb3JtPSJyb3RhdGUoMTIwIDI0IDI0KSIvPgogICAgPHBhdGggZD0iTTI0IDI0QzIwIDIwIDIwIDggMjQgNEMyOCA4IDI4IDIwIDI0IDI0WiIgdHJhbnNmb3JtPSJyb3RhdGUoMTgwIDI0IDI0KSIvPgogICAgPHBhdGggZD0iTTI0IDI0QzIwIDIwIDIwIDggMjQgNEMyOCA4IDI4IDIwIDI0IDI0WiIgdHJhbnNmb3JtPSJyb3RhdGUoMjQwIDI0IDI0KSIvPgogICAgPHBhdGggZD0iTTI0IDI0QzIwIDIwIDIwIDggMjQgNEMyOCA4IDI4IDIwIDI0IDI0WiIgdHJhbnNmb3JtPSJyb3RhdGUoMzAwIDI0IDI0KSIvPgogIDwvZz4KICA8Y2lyY2xlIGN4PSIyNCIgY3k9IjI0IiByPSIzIiBmaWxsPSJ1cmwoI25pZ2h0Zmxvd2VyR29sZEdyYWRpZW50KSIvPgo8L3N2Zz4K" alt="Client 4 logo" width="80" height="80"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":80,"height":80,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml;base64,PHN2ZyBjbGFzcz0idy02NCBoLTY0IiB2aWV3Qm94PSIwIDAgNDggNDgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPGRlZnM+CiAgICA8bGluZWFyR3JhZGllbnQgaWQ9Im5pZ2h0Zmxvd2VyRW1iZXJHcmFkaWVudCIgeDE9IjEwJSIgeTE9IjAlIiB4Mj0iOTAlIiB5Mj0iMTAwJSI+CiAgICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0eWxlPSJzdG9wLWNvbG9yOiNGQjkyM0M7c3RvcC1vcGFjaXR5OjEiIC8+CiAgICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3R5bGU9InN0b3AtY29sb3I6I0MyNDEwQztzdG9wLW9wYWNpdHk6MSIgLz4KICAgIDwvbGluZWFyR3JhZGllbnQ+CiAgPC9kZWZzPgogIDxnIGZpbGw9InVybCgjbmlnaHRmbG93ZXJFbWJlckdyYWRpZW50KSI+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgwIDI0IDI0KSIvPgogICAgPHBhdGggZD0iTTI0IDI0QzIwIDIwIDIwIDggMjQgNEMyOCA4IDI4IDIwIDI0IDI0WiIgdHJhbnNmb3JtPSJyb3RhdGUoNjAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgxMjAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgxODAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgyNDAgMjQgMjQpIi8+CiAgICA8cGF0aCBkPSJNMjQgMjRDMjAgMjAgMjAgOCAyNCA0QzI4IDggMjggMjAgMjQgMjRaIiB0cmFuc2Zvcm09InJvdGF0ZSgzMDAgMjQgMjQpIi8+CiAgPC9nPgogIDxjaXJjbGUgY3g9IjI0IiBjeT0iMjQiIHI9IjMiIGZpbGw9InVybCgjbmlnaHRmbG93ZXJFbWJlckdyYWRpZW50KSIvPgo8L3N2Zz4K" alt="Client 5 logo" width="80" height="80"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel -->

<!-- wp:aludra/cta-banner -->
<div class="wp-block-aludra-cta-banner alignfull" style="margin-top:0;margin-bottom:0">
<div class="cta-banner__content"><!-- wp:heading {"level":2,"className":"cta-banner__title","style":{"typography":{"lineHeight":"1.2"}}} -->
<h2 class="wp-block-heading cta-banner__title" style="line-height:1.2">Ready to get started?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"cta-banner__lead"} -->
<p class="cta-banner__lead">Tell us about your project and we'll get back to you within one business day.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"cta-banner__ctas","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons cta-banner__ctas"><!-- wp:button {"url":"#"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Get in Touch</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
</div>
<!-- /wp:aludra/cta-banner -->

<!-- wp:aludra/pricing-tiers -->
<div class="wp-block-aludra-pricing-tiers alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0">
<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","level":2,"className":"pricing-main-title","fontSize":"3xl","fontFamily":"open-sans"} -->
<h2 class="wp-block-heading has-text-align-center pricing-main-title has-open-sans-font-family has-3-xl-font-size">Choose Your Plan</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"pricing-main-subtitle","textColor":"secondary","fontSize":"lg"} -->
<p class="has-text-align-center pricing-main-subtitle has-secondary-color has-text-color has-lg-font-size">Select the perfect plan for your needs</p>
<!-- /wp:paragraph -->

<!-- wp:group {"align":"full","backgroundColor":"base","layout":{"type":"constrained","contentSize":"64rem"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background">
<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"2rem","left":"2rem"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"backgroundColor":"white","style":{"border":{"width":"1px","color":"#cbcbcb","radius":"0.5rem"},"spacing":{"padding":{"top":"2rem","right":"2rem","bottom":"2rem","left":"2rem"}}}} -->
<div class="wp-block-column has-border-color has-white-background-color has-background" style="border-color:#cbcbcb;border-width:1px;border-radius:0.5rem;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":3,"textAlign":"center"} -->
<h3 class="wp-block-heading has-text-align-center">Essential</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"secondary","fontSize":"lg"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-lg-font-size">Perfect for small businesses</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"textAlign":"center"} -->
<h4 class="wp-block-heading has-text-align-center"><strong>€59</strong> <span style="font-weight:normal;font-size:1rem;color:#98999a">per month</span></h4>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"1rem"} -->
<div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"pricing-feature-item","textColor":"secondary","style":{"spacing":{"padding":{"bottom":"1rem"},"margin":{"bottom":"1rem"}},"border":{"bottom":{"width":"2px","style":"dotted","color":"rgba(0,0,0,0.1)"}}}} -->
<p class="pricing-feature-item has-secondary-color has-text-color" style="border-bottom-color:rgba(0,0,0,0.1);border-bottom-style:dotted;border-bottom-width:2px;margin-bottom:1rem;padding-bottom:1rem">✓ Basic monitoring</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-feature-item","textColor":"secondary","style":{"spacing":{"padding":{"bottom":"1rem"},"margin":{"bottom":"1rem"}},"border":{"bottom":{"width":"2px","style":"dotted","color":"rgba(0,0,0,0.1)"}}}} -->
<p class="pricing-feature-item has-secondary-color has-text-color" style="border-bottom-color:rgba(0,0,0,0.1);border-bottom-style:dotted;border-bottom-width:2px;margin-bottom:1rem;padding-bottom:1rem">✓ Monthly updates</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-feature-item","textColor":"secondary","style":{"spacing":{"padding":{"bottom":"1rem"},"margin":{"bottom":"1rem"}},"border":{"bottom":{"width":"2px","style":"dotted","color":"rgba(0,0,0,0.1)"}}}} -->
<p class="pricing-feature-item has-secondary-color has-text-color" style="border-bottom-color:rgba(0,0,0,0.1);border-bottom-style:dotted;border-bottom-width:2px;margin-bottom:1rem;padding-bottom:1rem">✓ Email support</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color">✓ 1 hour response time</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"1rem"} -->
<div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"1rem"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:1rem"><!-- wp:button {"url":"#","backgroundColor":"primary","textColor":"white","className":"is-style-fill","style":{"border":{"radius":"0.5rem"}}} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#" style="border-radius:0.5rem">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"pricing-featured-column","backgroundColor":"primary-accent","style":{"border":{"width":"2px","color":"var(--wp--preset--color--primary)","radius":"0.5rem"},"spacing":{"padding":{"top":"2rem","right":"2rem","bottom":"2rem","left":"2rem"}}}} -->
<div class="wp-block-column pricing-featured-column has-border-color has-primary-accent-background-color has-background" style="border-color:var(--wp--preset--color--primary);border-width:2px;border-radius:0.5rem;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":3,"textAlign":"center"} -->
<h3 class="wp-block-heading has-text-align-center">Business <span class="has-primary-color has-text-color has-background has-xs-font-size" style="border-radius:1rem;background-color:#ffffff;padding:0.5rem 1rem;font-size:0.75rem;margin-left:0.5rem"><strong>MOST POPULAR</strong></span></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"main","fontSize":"lg"} -->
<p class="has-text-align-center has-main-color has-text-color has-lg-font-size">For growing businesses</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"textAlign":"center"} -->
<h4 class="wp-block-heading has-text-align-center"><strong>€99</strong> <span style="font-weight:normal;font-size:1rem;color:#98999a">per month</span></h4>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"1rem"} -->
<div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"pricing-feature-item","textColor":"main","style":{"spacing":{"padding":{"bottom":"1rem"},"margin":{"bottom":"1rem"}},"border":{"bottom":{"width":"2px","style":"dotted","color":"rgba(1,124,182,0.3)"}}}} -->
<p class="pricing-feature-item has-main-color has-text-color" style="border-bottom-color:rgba(1,124,182,0.3);border-bottom-style:dotted;border-bottom-width:2px;margin-bottom:1rem;padding-bottom:1rem">✓ Advanced monitoring</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-feature-item","textColor":"main","style":{"spacing":{"padding":{"bottom":"1rem"},"margin":{"bottom":"1rem"}},"border":{"bottom":{"width":"2px","style":"dotted","color":"rgba(1,124,182,0.3)"}}}} -->
<p class="pricing-feature-item has-main-color has-text-color" style="border-bottom-color:rgba(1,124,182,0.3);border-bottom-style:dotted;border-bottom-width:2px;margin-bottom:1rem;padding-bottom:1rem">✓ Weekly updates</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-feature-item","textColor":"main","style":{"spacing":{"padding":{"bottom":"1rem"},"margin":{"bottom":"1rem"}},"border":{"bottom":{"width":"2px","style":"dotted","color":"rgba(1,124,182,0.3)"}}}} -->
<p class="pricing-feature-item has-main-color has-text-color" style="border-bottom-color:rgba(1,124,182,0.3);border-bottom-style:dotted;border-bottom-width:2px;margin-bottom:1rem;padding-bottom:1rem">✓ Priority support</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"main"} -->
<p class="has-main-color has-text-color">✓ 30 min response time</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"1rem"} -->
<div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"1rem"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:1rem"><!-- wp:button {"url":"#","backgroundColor":"primary","textColor":"white","className":"is-style-fill","style":{"border":{"radius":"0.5rem"}}} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#" style="border-radius:0.5rem">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"backgroundColor":"white","style":{"border":{"width":"1px","color":"#cbcbcb","radius":"0.5rem"},"spacing":{"padding":{"top":"2rem","right":"2rem","bottom":"2rem","left":"2rem"}}}} -->
<div class="wp-block-column has-border-color has-white-background-color has-background" style="border-color:#cbcbcb;border-width:1px;border-radius:0.5rem;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":3,"textAlign":"center"} -->
<h3 class="wp-block-heading has-text-align-center">Enterprise</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"secondary","fontSize":"lg"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-lg-font-size">For large organizations</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"textAlign":"center"} -->
<h4 class="wp-block-heading has-text-align-center"><strong>€199</strong> <span style="font-weight:normal;font-size:1rem;color:#98999a">per month</span></h4>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"1rem"} -->
<div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"pricing-feature-item","textColor":"secondary","style":{"spacing":{"padding":{"bottom":"1rem"},"margin":{"bottom":"1rem"}},"border":{"bottom":{"width":"2px","style":"dotted","color":"rgba(0,0,0,0.1)"}}}} -->
<p class="pricing-feature-item has-secondary-color has-text-color" style="border-bottom-color:rgba(0,0,0,0.1);border-bottom-style:dotted;border-bottom-width:2px;margin-bottom:1rem;padding-bottom:1rem">✓ 24/7 monitoring</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-feature-item","textColor":"secondary","style":{"spacing":{"padding":{"bottom":"1rem"},"margin":{"bottom":"1rem"}},"border":{"bottom":{"width":"2px","style":"dotted","color":"rgba(0,0,0,0.1)"}}}} -->
<p class="pricing-feature-item has-secondary-color has-text-color" style="border-bottom-color:rgba(0,0,0,0.1);border-bottom-style:dotted;border-bottom-width:2px;margin-bottom:1rem;padding-bottom:1rem">✓ Daily updates</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricing-feature-item","textColor":"secondary","style":{"spacing":{"padding":{"bottom":"1rem"},"margin":{"bottom":"1rem"}},"border":{"bottom":{"width":"2px","style":"dotted","color":"rgba(0,0,0,0.1)"}}}} -->
<p class="pricing-feature-item has-secondary-color has-text-color" style="border-bottom-color:rgba(0,0,0,0.1);border-bottom-style:dotted;border-bottom-width:2px;margin-bottom:1rem;padding-bottom:1rem">✓ Dedicated support</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color">✓ 15 min response time</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"1rem"} -->
<div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"1rem"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:1rem"><!-- wp:button {"url":"#","backgroundColor":"primary","textColor":"white","className":"is-style-fill","style":{"border":{"radius":"0.5rem"}}} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#" style="border-radius:0.5rem">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/pricing-tiers -->

<!-- wp:aludra/services-block -->
<div class="wp-block-aludra-services-block alignfull" style="margin-top:0;margin-bottom:0">
<div class="services-block__inner"><!-- wp:group {"className":"services-block__header","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group services-block__header"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"700"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-weight:700">Our Services</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"services-block__lead"} -->
<p class="services-block__lead has-text-align-center">A quick look at what we do and how it helps your business grow.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"services-block__grid"} -->
<div class="wp-block-group services-block__grid"><!-- wp:group {"className":"services-block__card","layout":{"type":"flex","orientation":"horizontal","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group services-block__card"><!-- wp:group {"className":"services-block__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group services-block__icon"><!-- wp:image {"width":26,"height":26,"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-performance.svg"}}}}} -->
<figure class="wp-block-image size-full is-resized"><img src="" alt="Performance icon" width="26" height="26"/></figure>
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
<div class="wp-block-group services-block__icon"><!-- wp:image {"width":26,"height":26,"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-shield.svg"}}}}} -->
<figure class="wp-block-image size-full is-resized"><img src="" alt="Security icon" width="26" height="26"/></figure>
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
<div class="wp-block-group services-block__icon"><!-- wp:image {"width":26,"height":26,"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-code.svg"}}}}} -->
<figure class="wp-block-image size-full is-resized"><img src="" alt="Code icon" width="26" height="26"/></figure>
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
<div class="wp-block-group services-block__icon"><!-- wp:image {"width":26,"height":26,"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-chat.svg"}}}}} -->
<figure class="wp-block-image size-full is-resized"><img src="" alt="Chat icon" width="26" height="26"/></figure>
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
<!-- /wp:group --></div>
</div>
<!-- /wp:aludra/services-block -->

<!-- wp:aludra/review-profiles -->
<div class="wp-block-aludra-review-profiles alignfull" style="margin-top:0;margin-bottom:0">
<div class="review-profiles__content"><!-- wp:heading {"level":2,"textAlign":"center","className":"review-profiles__title","style":{"typography":{"fontWeight":"600"}}} -->
<h2 class="wp-block-heading has-text-align-center review-profiles__title" style="font-weight:600">Client Reviews</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"review-profiles__grid"} -->
<div class="wp-block-group review-profiles__grid"><!-- wp:group {"className":"review-profiles__item","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group review-profiles__item"><!-- wp:image {"className":"review-profiles__avatar","width":95,"style":{"border":{"radius":"100px"}}} -->
<figure class="wp-block-image is-resized review-profiles__avatar has-custom-border"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iOTYiIGhlaWdodD0iOTYiIHZpZXdCb3g9IjAgMCA5NiA5NiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8Y2lyY2xlIGN4PSI0OCIgY3k9IjQ4IiByPSI0OCIgZmlsbD0iI2U1ZTdlYiIvPgogIDxjaXJjbGUgY3g9IjQ4IiBjeT0iMzgiIHI9IjE2IiBzdHJva2U9IiM5Y2EzYWYiIHN0cm9rZS13aWR0aD0iNSIvPgogIDxwYXRoIGQ9Ik0xOCA4MkMyMiA2MiAzNCA1NCA0OCA1NEM2MiA1NCA3NCA2MiA3OCA4MiIgc3Ryb2tlPSIjOWNhM2FmIiBzdHJva2Utd2lkdGg9IjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPgo8L3N2Zz4K" alt="" style="border-radius:100px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","className":"review-profiles__quote"} -->
<p class="review-profiles__quote has-text-align-center">"Working with this team made a real difference — they delivered on time and communicated clearly throughout the whole project."</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"review-profiles__item","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group review-profiles__item"><!-- wp:image {"className":"review-profiles__avatar","width":95,"style":{"border":{"radius":"100px"}}} -->
<figure class="wp-block-image is-resized review-profiles__avatar has-custom-border"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iOTYiIGhlaWdodD0iOTYiIHZpZXdCb3g9IjAgMCA5NiA5NiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8Y2lyY2xlIGN4PSI0OCIgY3k9IjQ4IiByPSI0OCIgZmlsbD0iI2U1ZTdlYiIvPgogIDxjaXJjbGUgY3g9IjQ4IiBjeT0iMzgiIHI9IjE2IiBzdHJva2U9IiM5Y2EzYWYiIHN0cm9rZS13aWR0aD0iNSIvPgogIDxwYXRoIGQ9Ik0xOCA4MkMyMiA2MiAzNCA1NCA0OCA1NEM2MiA1NCA3NCA2MiA3OCA4MiIgc3Ryb2tlPSIjOWNhM2FmIiBzdHJva2Utd2lkdGg9IjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPgo8L3N2Zz4K" alt="" style="border-radius:100px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","className":"review-profiles__quote"} -->
<p class="review-profiles__quote has-text-align-center">"Great communication, strong technical skills, and a genuine understanding of what our business needed. We'll be back for future projects."</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"review-profiles__item","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group review-profiles__item"><!-- wp:image {"className":"review-profiles__avatar","width":95,"style":{"border":{"radius":"100px"}}} -->
<figure class="wp-block-image is-resized review-profiles__avatar has-custom-border"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iOTYiIGhlaWdodD0iOTYiIHZpZXdCb3g9IjAgMCA5NiA5NiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8Y2lyY2xlIGN4PSI0OCIgY3k9IjQ4IiByPSI0OCIgZmlsbD0iI2U1ZTdlYiIvPgogIDxjaXJjbGUgY3g9IjQ4IiBjeT0iMzgiIHI9IjE2IiBzdHJva2U9IiM5Y2EzYWYiIHN0cm9rZS13aWR0aD0iNSIvPgogIDxwYXRoIGQ9Ik0xOCA4MkMyMiA2MiAzNCA1NCA0OCA1NEM2MiA1NCA3NCA2MiA3OCA4MiIgc3Ryb2tlPSIjOWNhM2FmIiBzdHJva2Utd2lkdGg9IjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPgo8L3N2Zz4K" alt="" style="border-radius:100px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","className":"review-profiles__quote"} -->
<p class="review-profiles__quote has-text-align-center">"Couldn't have done this without them. Our site is faster and easier to manage than ever. Would definitely hire again."</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
</div>
<!-- /wp:aludra/review-profiles -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Frequently Asked Questions</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"30px"} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:aludra/faq-tabs {"displayMode":"accordion"} -->
<div class="wp-block-aludra-faq-tabs alignwide faq-tabs-wrapper is-display-mode-accordion" data-display-mode="accordion">
<div class="wp-block-columns"><div class="wp-block-column faq-questions-column" style="flex-basis:40%"><div class="faq-vertical-tabs"></div></div>

<div class="wp-block-column faq-content-column" style="flex-basis:60%"><div class="faq-content-area"><!-- wp:aludra/faq-tab-answer {"question":"What services do you offer?","title":"Our Comprehensive Services"} -->
<div class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="What services do you offer?"><div class="faq-answer-header"><h3 class="faq-answer-title">Our Comprehensive Services</h3></div><div class="faq-answer-content"><!-- wp:paragraph -->
<p>We provide a comprehensive range of professional services tailored to meet your specific needs. Our experienced team specializes in delivering high-quality solutions that drive results and exceed expectations.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Whether you're looking for strategic consulting, creative design, technical development, or ongoing support, we have the expertise and resources to help you succeed.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:aludra/faq-tab-answer -->

<!-- wp:aludra/faq-tab-answer {"question":"How long does a typical project take?","title":"Project Timeline & Process"} -->
<div class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="How long does a typical project take?"><div class="faq-answer-header"><h3 class="faq-answer-title">Project Timeline &amp; Process</h3></div><div class="faq-answer-content"><!-- wp:paragraph -->
<p>Project timelines vary depending on scope and complexity, but most engagements follow a structured process designed for efficiency and quality. We typically divide projects into clear phases with defined milestones.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>During our initial consultation, we assess your requirements and provide a detailed timeline estimate. We maintain transparent communication throughout the project to ensure deadlines are met and expectations are exceeded.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:aludra/faq-tab-answer -->

<!-- wp:aludra/faq-tab-answer {"question":"What makes your approach different?","title":"Our Unique Approach"} -->
<div class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="What makes your approach different?"><div class="faq-answer-header"><h3 class="faq-answer-title">Our Unique Approach</h3></div><div class="faq-answer-content"><!-- wp:paragraph -->
<p>Our approach combines industry best practices with innovative thinking and personalized attention. We take the time to understand your business goals, challenges, and vision to create solutions that truly fit your needs.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>We believe in collaborative partnerships, transparent communication, and continuous improvement. This client-centered methodology ensures that every project delivers measurable value and long-term success.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:aludra/faq-tab-answer -->

<!-- wp:aludra/faq-tab-answer {"question":"Do you offer ongoing support after launch?","title":"Ongoing Support"} -->
<div class="wp-block-aludra-faq-tab-answer faq-tab-answer" data-question="Do you offer ongoing support after launch?"><div class="faq-answer-header"><h3 class="faq-answer-title">Ongoing Support</h3></div><div class="faq-answer-content"><!-- wp:paragraph -->
<p>Yes. Every engagement includes a support window after launch, and we offer ongoing maintenance plans for clients who want continued monitoring, updates, and improvements.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:aludra/faq-tab-answer --></div></div></div>
</div>
<!-- /wp:aludra/faq-tabs -->
