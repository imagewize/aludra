<?php
/**
 * Title: Section: Testimonial Grid
 * Slug: aludra/section-testimonials
 * Categories: aludra-proof
 * Description: Three testimonial cards in a row, each with a quote, an attribution and a result metric. Three cards render as a static grid; add a fourth to turn it into a carousel.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/testimonial-grid -->
<div class="wp-block-aludra-testimonial-grid alignfull" style="margin-top:0;margin-bottom:0" data-slick="{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;adaptiveHeight&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}" data-dots-bottom="-45px" data-slide-spacing="12" data-arrow-color="#1a1a1a" data-arrow-background="#d4ecf5" data-arrow-hover-color="#000000" data-arrow-hover-background="#d4ecf5"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontWeight":"700","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"3rem"}}},"textColor":"contrast","fontSize":"3xl","fontFamily":"montserrat"} -->
<h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-montserrat-font-family has-3-xl-font-size" style="margin-bottom:3rem;font-weight:700;line-height:1.3">What Clients Say After Launch</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"testimonial-grid__card","style":{"spacing":{"padding":{"top":"2.5rem","right":"2.5rem","bottom":"2.5rem","left":"2.5rem"}},"border":{"radius":"12px"}},"backgroundColor":"base"} -->
<div class="wp-block-group testimonial-grid__card has-base-background-color has-background" style="border-radius:12px;padding-top:2.5rem;padding-right:2.5rem;padding-bottom:2.5rem;padding-left:2.5rem"><!-- wp:paragraph {"className":"testimonial-grid__quote","style":{"typography":{"fontStyle":"italic","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"base-accent","fontSize":"lg","fontFamily":"open-sans"} -->
<p class="testimonial-grid__quote has-base-accent-color has-text-color has-open-sans-font-family has-lg-font-size" style="margin-bottom:1.5rem;font-style:italic;line-height:1.6">They found in an afternoon what two previous developers had missed. The store is quicker now than it was on the day we opened it.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__author","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"bottom":"0.25rem"}}},"textColor":"primary","fontSize":"base","fontFamily":"montserrat"} -->
<p class="testimonial-grid__author has-primary-color has-text-color has-montserrat-font-family has-base-font-size" style="margin-bottom:0.25rem;font-weight:600;line-height:1.4">Owner</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__company","style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"secondary","fontSize":"sm","fontFamily":"open-sans"} -->
<p class="testimonial-grid__company has-secondary-color has-text-color has-open-sans-font-family has-sm-font-size" style="margin-bottom:1rem;line-height:1.4">Independent retailer</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__metric","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"}},"textColor":"primary-alt","fontSize":"base","fontFamily":"montserrat"} -->
<p class="testimonial-grid__metric has-primary-alt-color has-text-color has-montserrat-font-family has-base-font-size" style="font-weight:600;line-height:1.4">Load time down from 6.4s to 0.9s</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"testimonial-grid__card","style":{"spacing":{"padding":{"top":"2.5rem","right":"2.5rem","bottom":"2.5rem","left":"2.5rem"}},"border":{"radius":"12px"}},"backgroundColor":"base"} -->
<div class="wp-block-group testimonial-grid__card has-base-background-color has-background" style="border-radius:12px;padding-top:2.5rem;padding-right:2.5rem;padding-bottom:2.5rem;padding-left:2.5rem"><!-- wp:paragraph {"className":"testimonial-grid__quote","style":{"typography":{"fontStyle":"italic","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"base-accent","fontSize":"lg","fontFamily":"open-sans"} -->
<p class="testimonial-grid__quote has-base-accent-color has-text-color has-open-sans-font-family has-lg-font-size" style="margin-bottom:1.5rem;font-style:italic;line-height:1.6">The staging-first process is the part I did not know I needed. Nothing has gone wrong on the live site in two years, because nothing reaches it unreviewed.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__author","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"bottom":"0.25rem"}}},"textColor":"primary","fontSize":"base","fontFamily":"montserrat"} -->
<p class="testimonial-grid__author has-primary-color has-text-color has-montserrat-font-family has-base-font-size" style="margin-bottom:0.25rem;font-weight:600;line-height:1.4">Operations lead</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__company","style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"secondary","fontSize":"sm","fontFamily":"open-sans"} -->
<p class="testimonial-grid__company has-secondary-color has-text-color has-open-sans-font-family has-sm-font-size" style="margin-bottom:1rem;line-height:1.4">Wholesale supplier</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__metric","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"}},"textColor":"primary-alt","fontSize":"base","fontFamily":"montserrat"} -->
<p class="testimonial-grid__metric has-primary-alt-color has-text-color has-montserrat-font-family has-base-font-size" style="font-weight:600;line-height:1.4">No unplanned downtime in two years</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"testimonial-grid__card","style":{"spacing":{"padding":{"top":"2.5rem","right":"2.5rem","bottom":"2.5rem","left":"2.5rem"}},"border":{"radius":"12px"}},"backgroundColor":"base"} -->
<div class="wp-block-group testimonial-grid__card has-base-background-color has-background" style="border-radius:12px;padding-top:2.5rem;padding-right:2.5rem;padding-bottom:2.5rem;padding-left:2.5rem"><!-- wp:paragraph {"className":"testimonial-grid__quote","style":{"typography":{"fontStyle":"italic","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"base-accent","fontSize":"lg","fontFamily":"open-sans"} -->
<p class="testimonial-grid__quote has-base-accent-color has-text-color has-open-sans-font-family has-lg-font-size" style="margin-bottom:1.5rem;font-style:italic;line-height:1.6">We own everything now — the hosting, the licences, the documentation. That turned out to be worth more than the redesign.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__author","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"bottom":"0.25rem"}}},"textColor":"primary","fontSize":"base","fontFamily":"montserrat"} -->
<p class="testimonial-grid__author has-primary-color has-text-color has-montserrat-font-family has-base-font-size" style="margin-bottom:0.25rem;font-weight:600;line-height:1.4">Managing director</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__company","style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"secondary","fontSize":"sm","fontFamily":"open-sans"} -->
<p class="testimonial-grid__company has-secondary-color has-text-color has-open-sans-font-family has-sm-font-size" style="margin-bottom:1rem;line-height:1.4">Private clinic</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__metric","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"}},"textColor":"primary-alt","fontSize":"base","fontFamily":"montserrat"} -->
<p class="testimonial-grid__metric has-primary-alt-color has-text-color has-montserrat-font-family has-base-font-size" style="font-weight:600;line-height:1.4">Every account transferred at handover</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/testimonial-grid -->
