<?php
/**
 * Title: Hero Carousel
 * Slug: aludra/hero-carousel
 * Categories: aludra-carousel
 * Description: Full-width hero carousel with autoplay and fade transition.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/carousel {"slidesToShow":1,"slidesToScroll":1,"infinite":true,"autoplay":true,"autoplaySpeed":5000,"speed":1000,"arrows":true,"dots":true} -->
<div class="wp-block-aludra-carousel slick-slider cb-single-slide cb-padding cb-arrow-style-arrow cb-arrow-bg-none" data-slick="{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:true,&quot;autoplaySpeed&quot;:5000,&quot;speed&quot;:1000,&quot;rtl&quot;:false,&quot;adaptiveHeight&quot;:false,&quot;centerMode&quot;:false,&quot;centerPadding&quot;:&quot;50px&quot;,&quot;variableWidth&quot;:false,&quot;lazyLoad&quot;:&quot;ondemand&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;centerMode&quot;:false,&quot;variableWidth&quot;:false}}]}" data-dots-top="0px" data-dots-bottom="0px" data-arrow-color="#000000" data-arrow-background="transparent" data-arrow-hover-color="#000000" data-arrow-hover-background="transparent" data-arrow-style="arrow" data-arrow-background-style="none" data-arrow-size="40"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:cover {"url":"<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/image.svg' ); ?>","dimRatio":50,"minHeight":500,"minHeightUnit":"px","contentPosition":"center center"} -->
<div class="wp-block-cover" style="min-height:500px"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/image.svg' ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1} -->
<h1 class="wp-block-heading has-text-align-center">Welcome to Our Site</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Discover amazing content</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:cover {"url":"<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/image.svg' ); ?>","dimRatio":50,"minHeight":500,"minHeightUnit":"px","contentPosition":"center center"} -->
<div class="wp-block-cover" style="min-height:500px"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/image.svg' ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1} -->
<h1 class="wp-block-heading has-text-align-center">Premium Services</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Quality you can trust</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:cover {"url":"<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/image.svg' ); ?>","dimRatio":50,"minHeight":500,"minHeightUnit":"px","contentPosition":"center center"} -->
<div class="wp-block-cover" style="min-height:500px"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/image.svg' ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1} -->
<h1 class="wp-block-heading has-text-align-center">Get Started Today</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Join thousands of satisfied customers</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel -->
