<?php
/**
 * Title: Portfolio Showcase
 * Slug: aludra/portfolio-showcase
 * Categories: aludra-carousel
 * Description: Variable width carousel for displaying portfolio items with different sizes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/carousel {"slidesToShow":3,"slidesToScroll":1,"infinite":true,"variableWidth":true,"arrows":true,"dots":true} -->
<div class="wp-block-aludra-carousel slick-slider cb-padding cb-variable-width cb-arrow-style-arrow cb-arrow-bg-none" data-slick="{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;rtl&quot;:false,&quot;adaptiveHeight&quot;:false,&quot;centerMode&quot;:false,&quot;centerPadding&quot;:&quot;50px&quot;,&quot;variableWidth&quot;:true,&quot;lazyLoad&quot;:&quot;ondemand&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;centerMode&quot;:false,&quot;variableWidth&quot;:false}}]}" data-dots-top="0px" data-dots-bottom="0px" data-arrow-color="#000000" data-arrow-background="transparent" data-arrow-hover-color="#000000" data-arrow-hover-background="transparent" data-arrow-style="arrow" data-arrow-background-style="none" data-arrow-size="40"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"300px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/image.svg' ); ?>" alt="Project 1" style="width:300px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Web Design</h3>
<!-- /wp:heading --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"400px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/image.svg' ); ?>" alt="Project 2" style="width:400px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">App Development</h3>
<!-- /wp:heading --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"350px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/image.svg' ); ?>" alt="Project 3" style="width:350px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Branding</h3>
<!-- /wp:heading --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel -->
