<?php
/**
 * Title: Store Homepage
 * Slug: aludra/page-store-home
 * Categories: aludra-pages
 * Block Types: core/post-content
 * Description: A full store homepage — hero, trust bar, shop categories, newest products, brand story with stats, customer reviews and a closing call to action. Registered only when WooCommerce is active.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/hero-split {"className":"is-style-night"} -->
<div class="wp-block-aludra-hero-split alignfull is-style-night" style="margin-top:0;margin-bottom:0"><div class="hero-split__inner"><!-- wp:group {"className":"hero-split__content","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group hero-split__content"><!-- wp:paragraph {"className":"hero-split__eyebrow"} -->
<p class="hero-split__eyebrow">New collection</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"hero-split__title","style":{"typography":{"lineHeight":"1.15"}}} -->
<h1 class="wp-block-heading hero-split__title" style="line-height:1.15">Refined <em>Elegance</em> Defined</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-split__lead"} -->
<p class="hero-split__lead">Premium accessories crafted for the discerning practitioner, where function meets uncompromising aesthetics.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-split__ctas","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons hero-split__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Shop collection</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#">Discover more</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"hero-split__trust"} -->
<p class="hero-split__trust"><span class="hero-split__check">✓</span> Free shipping over $100&nbsp;&nbsp;·&nbsp;&nbsp;<span class="hero-split__check">✓</span> 30-day returns</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"hero-split__media"} -->
<div class="wp-block-group hero-split__media"><!-- wp:cover {"overlayColor":"primary","isUserOverlayColor":true,"minHeight":480,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Handmade since 2018</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/hero-split -->

<!-- wp:aludra/trust-bar -->
<div class="wp-block-aludra-trust-bar alignfull"><div class="trust-bar__inner"><!-- wp:group {"className":"trust-bar__items","style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"flex","flexWrap":"wrap","alignItems":"center","justifyContent":"center"}} -->
<div class="wp-block-group trust-bar__items"><!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-clock.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Building since 2009</p>
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
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-performance.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Consistently fast, stable builds</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-bar-chart.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Clear rates, quoted up front</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/trust-bar -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"},"blockGap":"48px"}},"backgroundColor":"tertiary","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:24px;padding-bottom:80px;padding-left:24px"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Shop by category</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textColor":"contrast"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color">Curated for the <em>professional</em></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"grid","minimumColumnWidth":"16rem"}} -->
<div class="wp-block-group"><!-- wp:cover {"overlayColor":"main","isUserOverlayColor":true,"minHeight":360,"minHeightUnit":"px","contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px;min-height:360px"><span aria-hidden="true" class="wp-block-cover__background has-main-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Collection</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"base"} -->
<h3 class="wp-block-heading has-base-color has-text-color">Writing instruments</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size"><a href="#">Explore →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"overlayColor":"primary","isUserOverlayColor":true,"minHeight":360,"minHeightUnit":"px","contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px;min-height:360px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">New arrivals</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"base"} -->
<h3 class="wp-block-heading has-base-color has-text-color">Desk accessories</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size"><a href="#">Explore →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"overlayColor":"primary-alt","isUserOverlayColor":true,"minHeight":360,"minHeightUnit":"px","contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px;min-height:360px"><span aria-hidden="true" class="wp-block-cover__background has-primary-alt-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Collection</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"base"} -->
<h3 class="wp-block-heading has-base-color has-text-color">Leather portfolios</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size"><a href="#">Explore →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"overlayColor":"secondary","isUserOverlayColor":true,"minHeight":360,"minHeightUnit":"px","contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px;min-height:360px"><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Gifting</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"base"} -->
<h3 class="wp-block-heading has-base-color has-text-color">Corporate sets</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size"><a href="#">Explore →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"},"blockGap":"48px"}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:24px;padding-bottom:80px;padding-left:24px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Best sellers</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textColor":"contrast"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color">Signature <em>pieces</em></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#">View all</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:woocommerce/product-collection {"queryId":1,"query":{"perPage":4,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill","fixedWidth":""},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."}} -->
<div class="wp-block-woocommerce-product-collection"><!-- wp:woocommerce/product-template -->
<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"aspectRatio":"3/4"} -->
<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"fontSize":"x-small","align":"left"} /-->
<!-- /wp:woocommerce/product-image -->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"medium"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"left","fontSize":"small"} /-->
<!-- /wp:woocommerce/product-template -->

<!-- wp:woocommerce/product-collection-no-results -->
<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"textColor":"secondary"} -->
<p class="has-text-align-center has-secondary-color has-text-color">No products yet. Add some in WooCommerce to fill this band.</p>
<!-- /wp:paragraph -->
<!-- /wp:woocommerce/product-collection-no-results --></div>
<!-- /wp:woocommerce/product-collection --></div>
<!-- /wp:group -->

<!-- wp:aludra/split-section {"revealOnScroll":true} -->
<div class="wp-block-aludra-split-section alignfull" data-aludra-reveal="true" style="margin-top:0;margin-bottom:0"><div class="split-section__shell"><div class="split-section__header"><p class="split-section__label">Our story</p><h2 class="split-section__heading">Crafted with <em>purpose</em></h2><p class="split-section__lead">Every piece starts as a question: what would we want to own for ten years?</p></div><div class="split-section__panes"><!-- wp:group {"className":"split-section__media"} -->
<div class="wp-block-group split-section__media"><!-- wp:cover {"overlayColor":"primary","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Handmade since 2018</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"split-section__content","style":{"spacing":{"padding":{"top":"2.5rem","right":"2.5rem","bottom":"2.5rem","left":"2.5rem"},"blockGap":"1.25rem"},"border":{"radius":"12px"}},"backgroundColor":"main","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group split-section__content has-base-color has-main-background-color has-text-color has-background" style="border-radius:12px;padding-top:2.5rem;padding-right:2.5rem;padding-bottom:2.5rem;padding-left:2.5rem"><!-- wp:paragraph -->
<p>We began with a small workshop and a short list of things we refused to compromise on: materials that last, makers who are paid fairly, and nothing in the box you would not keep.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Today the range is larger, but the rule is the same. If we would not use it ourselves, it does not ship.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"base","textColor":"main","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-main-color has-base-background-color has-text-color has-background wp-element-button" href="#">Read our story</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div></div>
<!-- /wp:aludra/split-section -->

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

<!-- wp:aludra/testimonial-grid -->
<div data-slick="{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;adaptiveHeight&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}" data-dots-bottom="-45px" data-slide-spacing="12" data-arrow-color="#1a1a1a" data-arrow-background="#d4ecf5" data-arrow-hover-color="#000000" data-arrow-hover-background="#d4ecf5" class="wp-block-aludra-testimonial-grid alignfull" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"style":{"typography":{"fontWeight":"700","lineHeight":"1.3","textAlign":"center"},"spacing":{"margin":{"bottom":"3rem"}}},"textColor":"contrast","fontSize":"3xl","fontFamily":"montserrat"} -->
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
