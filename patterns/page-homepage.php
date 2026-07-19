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
<div class="wp-block-aludra-slide"><!-- wp:image {"width":320,"height":224,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNDAwIDI4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8ZGVmcz4KICAgIDxjbGlwUGF0aCBpZD0ic3BhLWNsaXAiPjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjgwIiByeD0iMTQiLz48L2NsaXBQYXRoPgogICAgPGxpbmVhckdyYWRpZW50IGlkPSJzcGEtYmxvYiIgeDE9IjEwJSIgeTE9IjAlIiB4Mj0iOTAlIiB5Mj0iMTAwJSI+CiAgICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNFN0M5QkMiLz4KICAgICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjQjQ3ODVBIi8+CiAgICA8L2xpbmVhckdyYWRpZW50PgogIDwvZGVmcz4KICA8ZyBjbGlwLXBhdGg9InVybCgjc3BhLWNsaXApIj4KICAgIDxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjgwIiBmaWxsPSIjRjRFQUU0Ii8+CiAgICA8cmVjdCB3aWR0aD0iNDAwIiBoZWlnaHQ9IjQyIiBmaWxsPSIjRUNEOUQwIi8+CiAgICA8Y2lyY2xlIGN4PSIxOCIgY3k9IjIxIiByPSI0IiBmaWxsPSIjNEEzNDJDIiBvcGFjaXR5PSIuMjgiLz4KICAgIDxjaXJjbGUgY3g9IjM2IiBjeT0iMjEiIHI9IjQiIGZpbGw9IiM0QTM0MkMiIG9wYWNpdHk9Ii4yOCIvPgogICAgPGNpcmNsZSBjeD0iNTQiIGN5PSIyMSIgcj0iNCIgZmlsbD0iIzRBMzQyQyIgb3BhY2l0eT0iLjI4Ii8+CiAgICA8cmVjdCB4PSI3MCIgeT0iMTIiIHdpZHRoPSIzMDYiIGhlaWdodD0iMTgiIHJ4PSI5IiBmaWxsPSIjRkJGNkYxIiBzdHJva2U9IiMwMDAwMDAxNCIvPgogICAgPHRleHQgeD0iODAiIHk9IjI0LjUiIGZvbnQtZmFtaWx5PSJ1aS1tb25vc3BhY2UsIFNGTW9uby1SZWd1bGFyLCBNZW5sbywgbW9ub3NwYWNlIiBmb250LXNpemU9IjExIiBmaWxsPSIjNEEzNDJDIiBvcGFjaXR5PSIuNTUiPnNvbHN0aWNlLXJldHJlYXQuY29tPC90ZXh0PgoKICAgIDxwYXRoIGQ9Ik0yNiAxMDBDMjYgNzggNDQgNjQgNjYgNjdDODggNzAgMTAyIDg0IDk5IDEwNEM5NiAxMjQgNzggMTM2IDU4IDEzM0MzOCAxMzAgMjYgMTIwIDI2IDEwMFoiIGZpbGw9InVybCgjc3BhLWJsb2IpIi8+CgogICAgPHJlY3QgeD0iMjQiIHk9IjE1NiIgd2lkdGg9IjE3NiIgaGVpZ2h0PSIxMiIgcng9IjYiIGZpbGw9IiM0QTM0MkMiLz4KICAgIDxyZWN0IHg9IjI0IiB5PSIxNzgiIHdpZHRoPSIxMTIiIGhlaWdodD0iOSIgcng9IjQuNSIgZmlsbD0iIzRBMzQyQyIgb3BhY2l0eT0iLjQ1Ii8+CgogICAgPHJlY3QgeD0iMjQiIHk9IjIwNCIgd2lkdGg9IjE0OCIgaGVpZ2h0PSIzMCIgcng9IjE1IiBmaWxsPSIjQjQ3ODVBIi8+CiAgICA8dGV4dCB4PSI5OCIgeT0iMjIzLjUiIGZvbnQtZmFtaWx5PSItYXBwbGUtc3lzdGVtLCBCbGlua01hY1N5c3RlbUZvbnQsICdTZWdvZSBVSScsIFJvYm90bywgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxMi41IiBmb250LXdlaWdodD0iNzAwIiBmaWxsPSIjRkZGRkZGIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5Cb29rIGEgVHJlYXRtZW50PC90ZXh0PgogIDwvZz4KICA8cmVjdCB4PSIwLjUiIHk9IjAuNSIgd2lkdGg9IjM5OSIgaGVpZ2h0PSIyNzkiIHJ4PSIxMy41IiBmaWxsPSJub25lIiBzdHJva2U9IiNFN0Q1Q0IiLz4KPC9zdmc+Cg==" alt="Solstice Retreat — spa website, one of our client sites" width="320" height="224" style="width:100%;height:auto"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":320,"height":224,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNDAwIDI4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8ZGVmcz4KICAgIDxjbGlwUGF0aCBpZD0iZWNvbS1jbGlwIj48cmVjdCB3aWR0aD0iNDAwIiBoZWlnaHQ9IjI4MCIgcng9IjE0Ii8+PC9jbGlwUGF0aD4KICA8L2RlZnM+CiAgPGcgY2xpcC1wYXRoPSJ1cmwoI2Vjb20tY2xpcCkiPgogICAgPHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSIyODAiIGZpbGw9IiNFRkVERTgiLz4KICAgIDxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iNDIiIGZpbGw9IiNFNEUxRDkiLz4KICAgIDxjaXJjbGUgY3g9IjE4IiBjeT0iMjEiIHI9IjQiIGZpbGw9IiMxRTNBNUYiIG9wYWNpdHk9Ii4yOCIvPgogICAgPGNpcmNsZSBjeD0iMzYiIGN5PSIyMSIgcj0iNCIgZmlsbD0iIzFFM0E1RiIgb3BhY2l0eT0iLjI4Ii8+CiAgICA8Y2lyY2xlIGN4PSI1NCIgY3k9IjIxIiByPSI0IiBmaWxsPSIjMUUzQTVGIiBvcGFjaXR5PSIuMjgiLz4KICAgIDxyZWN0IHg9IjcwIiB5PSIxMiIgd2lkdGg9IjI3NiIgaGVpZ2h0PSIxOCIgcng9IjkiIGZpbGw9IiNGOEY3RjMiIHN0cm9rZT0iIzAwMDAwMDE0Ii8+CiAgICA8dGV4dCB4PSI4MCIgeT0iMjQuNSIgZm9udC1mYW1pbHk9InVpLW1vbm9zcGFjZSwgU0ZNb25vLVJlZ3VsYXIsIE1lbmxvLCBtb25vc3BhY2UiIGZvbnQtc2l6ZT0iMTEiIGZpbGw9IiMxRTNBNUYiIG9wYWNpdHk9Ii41NSI+c2hvcGZyb250aWVyLmNvbTwvdGV4dD4KICAgIDxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDM1NCwxMykiIHN0cm9rZT0iIzFFM0E1RiIgc3Ryb2tlLXdpZHRoPSIxLjYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgZmlsbD0ibm9uZSIgb3BhY2l0eT0iLjciPgogICAgICA8Y2lyY2xlIGN4PSI2IiBjeT0iMTUuNSIgcj0iMS40IiBmaWxsPSIjMUUzQTVGIiBzdHJva2U9Im5vbmUiLz4KICAgICAgPGNpcmNsZSBjeD0iMTMuNSIgY3k9IjE1LjUiIHI9IjEuNCIgZmlsbD0iIzFFM0E1RiIgc3Ryb2tlPSJub25lIi8+CiAgICAgIDxwYXRoIGQ9Ik0xIDJoMmwxLjggOC40QTEuNSAxLjUgMCAwIDAgNi4zIDExLjZIMTVhMS41IDEuNSAwIDAgMCAxLjUtMS4yTDE3LjUgNEg0Ii8+CiAgICA8L2c+CgogICAgPHJlY3QgeD0iMjQiIHk9IjY2IiB3aWR0aD0iMTYwIiBoZWlnaHQ9IjEyIiByeD0iNiIgZmlsbD0iIzFFM0E1RiIvPgoKICAgIDxyZWN0IHg9IjI0IiB5PSI5NCIgd2lkdGg9Ijc2IiBoZWlnaHQ9Ijc2IiByeD0iOCIgZmlsbD0iI0M5RDZFMyIvPgogICAgPHJlY3QgeD0iMTEyIiB5PSI5NCIgd2lkdGg9Ijc2IiBoZWlnaHQ9Ijc2IiByeD0iOCIgZmlsbD0iI0I4QzlEQyIvPgogICAgPHJlY3QgeD0iMjAwIiB5PSI5NCIgd2lkdGg9Ijc2IiBoZWlnaHQ9Ijc2IiByeD0iOCIgZmlsbD0iI0E2QkJENCIvPgogICAgPHJlY3QgeD0iMjg4IiB5PSI5NCIgd2lkdGg9Ijc2IiBoZWlnaHQ9Ijc2IiByeD0iOCIgZmlsbD0iIzk0QURDQiIvPgoKICAgIDxyZWN0IHg9IjM2IiB5PSIxNzgiIHdpZHRoPSI1MiIgaGVpZ2h0PSI1IiByeD0iMi41IiBmaWxsPSIjMUUzQTVGIiBvcGFjaXR5PSIuMzUiLz4KICAgIDxyZWN0IHg9IjEyNCIgeT0iMTc4IiB3aWR0aD0iNTIiIGhlaWdodD0iNSIgcng9IjIuNSIgZmlsbD0iIzFFM0E1RiIgb3BhY2l0eT0iLjM1Ii8+CiAgICA8cmVjdCB4PSIyMTIiIHk9IjE3OCIgd2lkdGg9IjUyIiBoZWlnaHQ9IjUiIHJ4PSIyLjUiIGZpbGw9IiMxRTNBNUYiIG9wYWNpdHk9Ii4zNSIvPgogICAgPHJlY3QgeD0iMzAwIiB5PSIxNzgiIHdpZHRoPSI1MiIgaGVpZ2h0PSI1IiByeD0iMi41IiBmaWxsPSIjMUUzQTVGIiBvcGFjaXR5PSIuMzUiLz4KCiAgICA8cmVjdCB4PSIyNCIgeT0iMjA0IiB3aWR0aD0iMTI0IiBoZWlnaHQ9IjMwIiByeD0iMTUiIGZpbGw9IiMxRTNBNUYiLz4KICAgIDx0ZXh0IHg9Ijg2IiB5PSIyMjMuNSIgZm9udC1mYW1pbHk9Ii1hcHBsZS1zeXN0ZW0sIEJsaW5rTWFjU3lzdGVtRm9udCwgJ1NlZ29lIFVJJywgUm9ib3RvLCBIZWx2ZXRpY2EsIEFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyLjUiIGZvbnQtd2VpZ2h0PSI3MDAiIGZpbGw9IiNGRkZGRkYiIHRleHQtYW5jaG9yPSJtaWRkbGUiPkFkZCB0byBDYXJ0PC90ZXh0PgogIDwvZz4KICA8cmVjdCB4PSIwLjUiIHk9IjAuNSIgd2lkdGg9IjM5OSIgaGVpZ2h0PSIyNzkiIHJ4PSIxMy41IiBmaWxsPSJub25lIiBzdHJva2U9IiNEQUQ3Q0UiLz4KPC9zdmc+Cg==" alt="Shopfrontier — ecommerce website, one of our client sites" width="320" height="224" style="width:100%;height:auto"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":320,"height":224,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNDAwIDI4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8ZGVmcz4KICAgIDxjbGlwUGF0aCBpZD0iYWdlbmN5LWNsaXAiPjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjgwIiByeD0iMTQiLz48L2NsaXBQYXRoPgogIDwvZGVmcz4KICA8ZyBjbGlwLXBhdGg9InVybCgjYWdlbmN5LWNsaXApIj4KICAgIDxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjgwIiBmaWxsPSIjMTYxODFDIi8+CiAgICA8cmVjdCB3aWR0aD0iNDAwIiBoZWlnaHQ9IjQyIiBmaWxsPSIjMUQxRjI0Ii8+CiAgICA8Y2lyY2xlIGN4PSIxOCIgY3k9IjIxIiByPSI0IiBmaWxsPSIjRjJGMUVFIiBvcGFjaXR5PSIuMjUiLz4KICAgIDxjaXJjbGUgY3g9IjM2IiBjeT0iMjEiIHI9IjQiIGZpbGw9IiNGMkYxRUUiIG9wYWNpdHk9Ii4yNSIvPgogICAgPGNpcmNsZSBjeD0iNTQiIGN5PSIyMSIgcj0iNCIgZmlsbD0iI0YyRjFFRSIgb3BhY2l0eT0iLjI1Ii8+CiAgICA8cmVjdCB4PSI3MCIgeT0iMTIiIHdpZHRoPSIzMDYiIGhlaWdodD0iMTgiIHJ4PSI5IiBmaWxsPSIjMjQyNjJCIiBzdHJva2U9IiMzNDM2M0MiLz4KICAgIDx0ZXh0IHg9IjgwIiB5PSIyNC41IiBmb250LWZhbWlseT0idWktbW9ub3NwYWNlLCBTRk1vbm8tUmVndWxhciwgTWVubG8sIG1vbm9zcGFjZSIgZm9udC1zaXplPSIxMSIgZmlsbD0iI0YyRjFFRSIgb3BhY2l0eT0iLjUiPmZvcm13b3JrLmRlc2lnbjwvdGV4dD4KCiAgICA8cmVjdCB4PSIyNCIgeT0iNjYiIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgcng9IjgiIGZpbGw9IiM2RDVERkMiLz4KICAgIDx0ZXh0IHg9IjQwIiB5PSI4OC41IiBmb250LWZhbWlseT0iR2VvcmdpYSwgJ1RpbWVzIE5ldyBSb21hbicsIHNlcmlmIiBmb250LXN0eWxlPSJpdGFsaWMiIGZvbnQtd2VpZ2h0PSI3MDAiIGZvbnQtc2l6ZT0iMTYiIGZpbGw9IiNGRkZGRkYiIHRleHQtYW5jaG9yPSJtaWRkbGUiPkY8L3RleHQ+CgogICAgPHJlY3QgeD0iMjQiIHk9IjExNCIgd2lkdGg9IjIyOCIgaGVpZ2h0PSIxMyIgcng9IjYuNSIgZmlsbD0iI0YyRjFFRSIvPgogICAgPHJlY3QgeD0iMjQiIHk9IjEzNiIgd2lkdGg9IjI3NiIgaGVpZ2h0PSI5IiByeD0iNC41IiBmaWxsPSIjRjJGMUVFIiBvcGFjaXR5PSIuNDUiLz4KCiAgICA8cmVjdCB4PSIyNCIgeT0iMTU2IiB3aWR0aD0iMTEwIiBoZWlnaHQ9IjgyIiByeD0iOCIgZmlsbD0iI0ZGRkZGRiIgb3BhY2l0eT0iLjA4Ii8+CiAgICA8cmVjdCB4PSIxNDQiIHk9IjE1NiIgd2lkdGg9IjExMCIgaGVpZ2h0PSI4MiIgcng9IjgiIGZpbGw9IiNGRkZGRkYiIG9wYWNpdHk9Ii4wOCIvPgogICAgPHJlY3QgeD0iMjY0IiB5PSIxNTYiIHdpZHRoPSIxMTAiIGhlaWdodD0iODIiIHJ4PSI4IiBmaWxsPSIjRkZGRkZGIiBvcGFjaXR5PSIuMDgiLz4KICA8L2c+CiAgPHJlY3QgeD0iMC41IiB5PSIwLjUiIHdpZHRoPSIzOTkiIGhlaWdodD0iMjc5IiByeD0iMTMuNSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMkEyQzMxIi8+Cjwvc3ZnPgo=" alt="Formwork — design agency website, one of our client sites" width="320" height="224" style="width:100%;height:auto"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":320,"height":224,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNDAwIDI4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8ZGVmcz4KICAgIDxjbGlwUGF0aCBpZD0iYmlrZXMtY2xpcCI+PHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSIyODAiIHJ4PSIxNCIvPjwvY2xpcFBhdGg+CiAgPC9kZWZzPgogIDxnIGNsaXAtcGF0aD0idXJsKCNiaWtlcy1jbGlwKSI+CiAgICA8cmVjdCB3aWR0aD0iNDAwIiBoZWlnaHQ9IjI4MCIgZmlsbD0iI0VDRjFFQSIvPgogICAgPHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSI0MiIgZmlsbD0iI0UxRTlFMCIvPgogICAgPGNpcmNsZSBjeD0iMTgiIGN5PSIyMSIgcj0iNCIgZmlsbD0iIzMzNDEzQSIgb3BhY2l0eT0iLjI4Ii8+CiAgICA8Y2lyY2xlIGN4PSIzNiIgY3k9IjIxIiByPSI0IiBmaWxsPSIjMzM0MTNBIiBvcGFjaXR5PSIuMjgiLz4KICAgIDxjaXJjbGUgY3g9IjU0IiBjeT0iMjEiIHI9IjQiIGZpbGw9IiMzMzQxM0EiIG9wYWNpdHk9Ii4yOCIvPgogICAgPHJlY3QgeD0iNzAiIHk9IjEyIiB3aWR0aD0iMzA2IiBoZWlnaHQ9IjE4IiByeD0iOSIgZmlsbD0iI0Y3RkFGNiIgc3Ryb2tlPSIjMDAwMDAwMTQiLz4KICAgIDx0ZXh0IHg9IjgwIiB5PSIyNC41IiBmb250LWZhbWlseT0idWktbW9ub3NwYWNlLCBTRk1vbm8tUmVndWxhciwgTWVubG8sIG1vbm9zcGFjZSIgZm9udC1zaXplPSIxMSIgZmlsbD0iIzMzNDEzQSIgb3BhY2l0eT0iLjU1Ij53aGVlbGhvdXNlLWJpa2VzLmNvbTwvdGV4dD4KCiAgICA8IS0tICJiaWtlIiBpY29uIGJ5IFRhYmxlciBJY29ucywgdmlhIEJsYWRlIFVJIEtpdCAoYmxhZGUtaWNvbnMpIOKAlCBNSVQgTGljZW5zZSAtLT4KICAgIDxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI0LDY2KSBzY2FsZSgyLjUpIiBzdHJva2U9IiNDMjQxMEMiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBmaWxsPSJub25lIj4KICAgICAgPHBhdGggZD0iTTIgMThhMyAzIDAgMSAwIDYgMGEzIDMgMCAxIDAgLTYgMCIvPgogICAgICA8cGF0aCBkPSJNMTYgMThhMyAzIDAgMSAwIDYgMGEzIDMgMCAxIDAgLTYgMCIvPgogICAgICA8cGF0aCBkPSJNMTIgMTlsMCAtNGwtMyAtM2w1IC00bDIgM2wzIDAiLz4KICAgICAgPHBhdGggZD0iTTE2IDVhMSAxIDAgMSAwIDIgMGExIDEgMCAxIDAgLTIgMCIvPgogICAgPC9nPgoKICAgIDxyZWN0IHg9IjI0IiB5PSIxNDAiIHdpZHRoPSIxNDAiIGhlaWdodD0iMTIiIHJ4PSI2IiBmaWxsPSIjMzM0MTNBIi8+CgogICAgPHJlY3QgeD0iMjQiIHk9IjE2OCIgd2lkdGg9IjEyMCIgaGVpZ2h0PSIzMCIgcng9IjE1IiBmaWxsPSIjQzI0MTBDIi8+CiAgICA8dGV4dCB4PSI4NCIgeT0iMTg3LjUiIGZvbnQtZmFtaWx5PSItYXBwbGUtc3lzdGVtLCBCbGlua01hY1N5c3RlbUZvbnQsICdTZWdvZSBVSScsIFJvYm90bywgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxMi41IiBmb250LXdlaWdodD0iNzAwIiBmaWxsPSIjRkZGRkZGIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5TaG9wIEJpa2VzPC90ZXh0PgogIDwvZz4KICA8cmVjdCB4PSIwLjUiIHk9IjAuNSIgd2lkdGg9IjM5OSIgaGVpZ2h0PSIyNzkiIHJ4PSIxMy41IiBmaWxsPSJub25lIiBzdHJva2U9IiNEN0UyRDQiLz4KPC9zdmc+Cg==" alt="Wheelhouse Bikes — bike shop website, one of our client sites" width="320" height="224" style="width:100%;height:auto"/></figure>
<!-- /wp:image --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":320,"height":224,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNDAwIDI4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8ZGVmcz4KICAgIDxjbGlwUGF0aCBpZD0icmVzdC1jbGlwIj48cmVjdCB3aWR0aD0iNDAwIiBoZWlnaHQ9IjI4MCIgcng9IjE0Ii8+PC9jbGlwUGF0aD4KICA8L2RlZnM+CiAgPGcgY2xpcC1wYXRoPSJ1cmwoI3Jlc3QtY2xpcCkiPgogICAgPHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSIyODAiIGZpbGw9IiNGNkVFRTEiLz4KICAgIDxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iNDIiIGZpbGw9IiNFRUUyQ0UiLz4KICAgIDxjaXJjbGUgY3g9IjE4IiBjeT0iMjEiIHI9IjQiIGZpbGw9IiM1QjNBMUUiIG9wYWNpdHk9Ii4yOCIvPgogICAgPGNpcmNsZSBjeD0iMzYiIGN5PSIyMSIgcj0iNCIgZmlsbD0iIzVCM0ExRSIgb3BhY2l0eT0iLjI4Ii8+CiAgICA8Y2lyY2xlIGN4PSI1NCIgY3k9IjIxIiByPSI0IiBmaWxsPSIjNUIzQTFFIiBvcGFjaXR5PSIuMjgiLz4KICAgIDxyZWN0IHg9IjcwIiB5PSIxMiIgd2lkdGg9IjMwNiIgaGVpZ2h0PSIxOCIgcng9IjkiIGZpbGw9IiNGQ0Y4RUYiIHN0cm9rZT0iIzAwMDAwMDE0Ii8+CiAgICA8dGV4dCB4PSI4MCIgeT0iMjQuNSIgZm9udC1mYW1pbHk9InVpLW1vbm9zcGFjZSwgU0ZNb25vLVJlZ3VsYXIsIE1lbmxvLCBtb25vc3BhY2UiIGZvbnQtc2l6ZT0iMTEiIGZpbGw9IiM1QjNBMUUiIG9wYWNpdHk9Ii41NSI+aGFydmVzdC10YWJsZS5jb208L3RleHQ+CgogICAgPCEtLSAicmVzdGF1cmFudC1ub29kbGUiIGljb24gYnkgTWFraSBJY29ucywgdmlhIEJsYWRlIFVJIEtpdCAoYmxhZGUtaWNvbnMpIOKAlCBNSVQgTGljZW5zZSAtLT4KICAgIDxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI0LDY2KSBzY2FsZSgyLjEzMzMpIiBmaWxsPSIjOEE0QjEyIj4KICAgICAgPHBhdGggZD0iTTQuNDU3LDExLjk4OTIsMSw4VjdIMTRWOGwtMy40OTYxLDMuOTg5MVpNMy45ODgyLDIuNWEuNS41LDAsMCwwLTEsMHYuNTY3MWwtMS43OTY5LjM2NzVhLjI1LjI1LDAsMSwwLC4wOTQuNDkxMWwxLjcwMjktLjI3NzZ2LjU2NjJsLTEuNzUuMDM1N2EuMjUuMjUsMCwwLDAsMCwuNWwxLjc1LjAzNTdWNS45OThoMVptOS41LDEuNS03LjUuMjYyNVYyLjk5NTFsNy41OTQtMS4wNzM3YS41LjUsMCwwLDAtLjE4ODEtLjk4MjJMNS45NzkyLDIuNDU1NWEuNDk2My40OTYzLDAsMCwwLS45OTEuMDQ0NXYuMjI3NmwtLjQ5My4xMDA5VjMuMThsLjQ5My0uMDhWNC4yOTc0bC0uNDkzLjAxdi40NjA4TDEzLjQ4ODIsNWEuNS41LDAsMCwwLDAtMVpNMTAsMTNINXYuNTc1N2g1WiIvPgogICAgPC9nPgoKICAgIDxyZWN0IHg9IjI0IiB5PSIxMDQiIHdpZHRoPSIxNTgiIGhlaWdodD0iMTMiIHJ4PSI2LjUiIGZpbGw9IiM1QjNBMUUiLz4KCiAgICA8cmVjdCB4PSIyNCIgeT0iMTMyIiB3aWR0aD0iMTYwIiBoZWlnaHQ9IjkiIHJ4PSI0LjUiIGZpbGw9IiM1QjNBMUUiIG9wYWNpdHk9Ii42Ii8+CiAgICA8cmVjdCB4PSIzMjgiIHk9IjEzMiIgd2lkdGg9IjI4IiBoZWlnaHQ9IjkiIHJ4PSI0LjUiIGZpbGw9IiM4QTRCMTIiIG9wYWNpdHk9Ii44NSIvPgoKICAgIDxyZWN0IHg9IjI0IiB5PSIxNTYiIHdpZHRoPSIxMjUiIGhlaWdodD0iOSIgcng9IjQuNSIgZmlsbD0iIzVCM0ExRSIgb3BhY2l0eT0iLjYiLz4KICAgIDxyZWN0IHg9IjMyOCIgeT0iMTU2IiB3aWR0aD0iMjgiIGhlaWdodD0iOSIgcng9IjQuNSIgZmlsbD0iIzhBNEIxMiIgb3BhY2l0eT0iLjg1Ii8+CgogICAgPHJlY3QgeD0iMjQiIHk9IjE4MCIgd2lkdGg9IjE0NSIgaGVpZ2h0PSI5IiByeD0iNC41IiBmaWxsPSIjNUIzQTFFIiBvcGFjaXR5PSIuNiIvPgogICAgPHJlY3QgeD0iMzI4IiB5PSIxODAiIHdpZHRoPSIyOCIgaGVpZ2h0PSI5IiByeD0iNC41IiBmaWxsPSIjOEE0QjEyIiBvcGFjaXR5PSIuODUiLz4KCiAgICA8cmVjdCB4PSIyNCIgeT0iMjA0IiB3aWR0aD0iMTU4IiBoZWlnaHQ9IjMwIiByeD0iMTUiIGZpbGw9IiM4QTRCMTIiLz4KICAgIDx0ZXh0IHg9IjEwMyIgeT0iMjIzLjUiIGZvbnQtZmFtaWx5PSItYXBwbGUtc3lzdGVtLCBCbGlua01hY1N5c3RlbUZvbnQsICdTZWdvZSBVSScsIFJvYm90bywgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxMi41IiBmb250LXdlaWdodD0iNzAwIiBmaWxsPSIjRkZGRkZGIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5SZXNlcnZlIGEgVGFibGU8L3RleHQ+CiAgPC9nPgogIDxyZWN0IHg9IjAuNSIgeT0iMC41IiB3aWR0aD0iMzk5IiBoZWlnaHQ9IjI3OSIgcng9IjEzLjUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iI0U5REJDMiIvPgo8L3N2Zz4K" alt="Harvest Table — restaurant website, one of our client sites" width="320" height="224" style="width:100%;height:auto"/></figure>
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
