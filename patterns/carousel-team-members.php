<?php
/**
 * Title: Team Members Carousel
 * Slug: aludra/team-members
 * Categories: aludra-carousel
 * Description: Multi-slide carousel with adaptive height for team member profiles.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/carousel {"slidesToShow":3,"slidesToScroll":1,"infinite":true,"adaptiveHeight":true,"arrows":true,"dots":true,"responsiveSlides":1} -->
<div class="wp-block-aludra-carousel slick-slider cb-padding cb-arrow-style-arrow cb-arrow-bg-none" data-slick="{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;rtl&quot;:false,&quot;adaptiveHeight&quot;:true,&quot;centerMode&quot;:false,&quot;centerPadding&quot;:&quot;50px&quot;,&quot;variableWidth&quot;:false,&quot;lazyLoad&quot;:&quot;ondemand&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;centerMode&quot;:false,&quot;variableWidth&quot;:false}}]}" data-dots-top="0px" data-dots-bottom="0px" data-arrow-color="#000000" data-arrow-background="transparent" data-arrow-hover-color="#000000" data-arrow-hover-background="transparent" data-arrow-style="arrow" data-arrow-background-style="none" data-arrow-size="40"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"align":"center","width":"150px","height":"150px","sizeSlug":"large","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/avatar.svg' ); ?>" alt="Team member 1" style="width:150px;height:150px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Jane Smith</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>CEO &amp; Founder</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Leading our team with vision and passion for excellence.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"align":"center","width":"150px","height":"150px","sizeSlug":"large","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/avatar.svg' ); ?>" alt="Team member 2" style="width:150px;height:150px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">John Doe</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Creative Director</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Crafting beautiful designs that inspire and engage.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"align":"center","width":"150px","height":"150px","sizeSlug":"large","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="<?php echo esc_url( ALUDRA_PLUGIN_URL . 'assets/placeholders/avatar.svg' ); ?>" alt="Team member 3" style="width:150px;height:150px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Sarah Wilson</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Head of Marketing</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Connecting with audiences and building meaningful relationships.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel -->
