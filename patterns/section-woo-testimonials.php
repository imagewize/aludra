<?php
/**
 * Title: Section: Store Testimonials
 * Slug: aludra/section-woo-testimonials
 * Categories: aludra-store
 * Description: Three customer review cards with a five-star rating, quote and attribution. Three cards render as a static grid; add a fourth to turn it into a carousel. Registered only when WooCommerce is active.
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/testimonial-grid -->
<div class="wp-block-aludra-testimonial-grid alignfull" style="margin-top:0;margin-bottom:0" data-slick="{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;adaptiveHeight&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}" data-dots-bottom="-45px" data-slide-spacing="12" data-arrow-color="#1a1a1a" data-arrow-background="#d4ecf5" data-arrow-hover-color="#000000" data-arrow-hover-background="#d4ecf5"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontWeight":"700","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"3rem"}}},"textColor":"contrast","fontSize":"3xl","fontFamily":"montserrat"} -->
<h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-montserrat-font-family has-3-xl-font-size" style="margin-bottom:3rem;font-weight:700;line-height:1.3">Loved by our customers</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"testimonial-grid__card","style":{"spacing":{"padding":{"top":"2.5rem","right":"2.5rem","bottom":"2.5rem","left":"2.5rem"}},"border":{"radius":"12px"}},"backgroundColor":"base"} -->
<div class="wp-block-group testimonial-grid__card has-base-background-color has-background" style="border-radius:12px;padding-top:2.5rem;padding-right:2.5rem;padding-bottom:2.5rem;padding-left:2.5rem"><!-- wp:paragraph {"className":"testimonial-grid__stars","style":{"spacing":{"margin":{"bottom":"1rem"}},"typography":{"letterSpacing":"0.15em"}},"textColor":"accent","fontSize":"lg"} -->
<p class="testimonial-grid__stars has-accent-color has-text-color has-lg-font-size" style="margin-bottom:1rem;letter-spacing:0.15em"><span class="screen-reader-text">Rated 5 out of 5 stars</span><span aria-hidden="true">★★★★★</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__quote","style":{"typography":{"fontStyle":"italic","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"base-accent","fontSize":"lg","fontFamily":"open-sans"} -->
<p class="testimonial-grid__quote has-base-accent-color has-text-color has-open-sans-font-family has-lg-font-size" style="margin-bottom:1.5rem;font-style:italic;line-height:1.6">Beautifully made and exactly as described. It arrived quickly and I have used it every day since.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__author","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"bottom":"0.25rem"}}},"textColor":"primary","fontSize":"base","fontFamily":"montserrat"} -->
<p class="testimonial-grid__author has-primary-color has-text-color has-montserrat-font-family has-base-font-size" style="margin-bottom:0.25rem;font-weight:600;line-height:1.4">Verified buyer</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__company","style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"secondary","fontSize":"sm","fontFamily":"open-sans"} -->
<p class="testimonial-grid__company has-secondary-color has-text-color has-open-sans-font-family has-sm-font-size" style="margin-bottom:0;line-height:1.4">London</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"testimonial-grid__card","style":{"spacing":{"padding":{"top":"2.5rem","right":"2.5rem","bottom":"2.5rem","left":"2.5rem"}},"border":{"radius":"12px"}},"backgroundColor":"base"} -->
<div class="wp-block-group testimonial-grid__card has-base-background-color has-background" style="border-radius:12px;padding-top:2.5rem;padding-right:2.5rem;padding-bottom:2.5rem;padding-left:2.5rem"><!-- wp:paragraph {"className":"testimonial-grid__stars","style":{"spacing":{"margin":{"bottom":"1rem"}},"typography":{"letterSpacing":"0.15em"}},"textColor":"accent","fontSize":"lg"} -->
<p class="testimonial-grid__stars has-accent-color has-text-color has-lg-font-size" style="margin-bottom:1rem;letter-spacing:0.15em"><span class="screen-reader-text">Rated 5 out of 5 stars</span><span aria-hidden="true">★★★★★</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__quote","style":{"typography":{"fontStyle":"italic","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"base-accent","fontSize":"lg","fontFamily":"open-sans"} -->
<p class="testimonial-grid__quote has-base-accent-color has-text-color has-open-sans-font-family has-lg-font-size" style="margin-bottom:1.5rem;font-style:italic;line-height:1.6">The quality is a step above anything else I have bought in this category. Easily worth the price.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__author","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"bottom":"0.25rem"}}},"textColor":"primary","fontSize":"base","fontFamily":"montserrat"} -->
<p class="testimonial-grid__author has-primary-color has-text-color has-montserrat-font-family has-base-font-size" style="margin-bottom:0.25rem;font-weight:600;line-height:1.4">Verified buyer</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__company","style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"secondary","fontSize":"sm","fontFamily":"open-sans"} -->
<p class="testimonial-grid__company has-secondary-color has-text-color has-open-sans-font-family has-sm-font-size" style="margin-bottom:0;line-height:1.4">Melbourne</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"testimonial-grid__card","style":{"spacing":{"padding":{"top":"2.5rem","right":"2.5rem","bottom":"2.5rem","left":"2.5rem"}},"border":{"radius":"12px"}},"backgroundColor":"base"} -->
<div class="wp-block-group testimonial-grid__card has-base-background-color has-background" style="border-radius:12px;padding-top:2.5rem;padding-right:2.5rem;padding-bottom:2.5rem;padding-left:2.5rem"><!-- wp:paragraph {"className":"testimonial-grid__stars","style":{"spacing":{"margin":{"bottom":"1rem"}},"typography":{"letterSpacing":"0.15em"}},"textColor":"accent","fontSize":"lg"} -->
<p class="testimonial-grid__stars has-accent-color has-text-color has-lg-font-size" style="margin-bottom:1rem;letter-spacing:0.15em"><span class="screen-reader-text">Rated 5 out of 5 stars</span><span aria-hidden="true">★★★★★</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__quote","style":{"typography":{"fontStyle":"italic","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"base-accent","fontSize":"lg","fontFamily":"open-sans"} -->
<p class="testimonial-grid__quote has-base-accent-color has-text-color has-open-sans-font-family has-lg-font-size" style="margin-bottom:1.5rem;font-style:italic;line-height:1.6">Great service from start to finish, and the packaging alone made it feel like a gift. I will be back.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__author","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"bottom":"0.25rem"}}},"textColor":"primary","fontSize":"base","fontFamily":"montserrat"} -->
<p class="testimonial-grid__author has-primary-color has-text-color has-montserrat-font-family has-base-font-size" style="margin-bottom:0.25rem;font-weight:600;line-height:1.4">Verified buyer</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__company","style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"secondary","fontSize":"sm","fontFamily":"open-sans"} -->
<p class="testimonial-grid__company has-secondary-color has-text-color has-open-sans-font-family has-sm-font-size" style="margin-bottom:0;line-height:1.4">Toronto</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/testimonial-grid -->
