<?php
/**
 * Title: Section: Before and After Icon Grids
 * Slug: aludra/section-icon-grid
 * Categories: aludra-features
 * Description: Two icon grids side by side inside a spine section — problems on the left with cross icons, the corresponding fixes on the right with check icons.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/spine-section -->
<div class="wp-block-aludra-spine-section alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label">Before and After</p><h2 class="spine-section__heading">You've Felt This Before.</h2><p class="spine-section__aside">Most sites we take over arrive with the same four problems. Here is what they look like on the way in, and on the way out.</p></div><div class="spine-section__content"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:aludra/icon-grid {"align":"","backgroundColor":"tertiary"} -->
<div class="wp-block-aludra-icon-grid has-tertiary-background-color has-background"><div class="icon-grid__inner"><!-- wp:heading {"level":3,"className":"icon-grid__title"} -->
<h3 class="wp-block-heading icon-grid__title">The Site We Inherit</h3>
<!-- /wp:heading -->

<!-- wp:group {"className":"icon-grid__grid"} -->
<div class="wp-block-group icon-grid__grid"><!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-x-circle.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Not included"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>Slow on Mobile:</strong> Ten seconds to first paint on a phone, because every page loads the full-size hero image and six plugin stylesheets.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-x-circle.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Not included"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>A Plugin Per Problem:</strong> Thirty-odd plugins, half of them abandoned, each added to solve one thing that was never revisited.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-x-circle.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Not included"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>No Staging Copy:</strong> Changes go straight to the live site on a Friday afternoon, and the only backup is whatever the host happened to keep.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-x-circle.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Not included"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>Nobody Owns It:</strong> Licences on a former freelancer's account, no documentation, and no one who can say why anything is configured the way it is.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/icon-grid --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:aludra/icon-grid {"align":"","backgroundColor":"primary-accent"} -->
<div class="wp-block-aludra-icon-grid has-primary-accent-background-color has-background"><div class="icon-grid__inner"><!-- wp:heading {"level":3,"className":"icon-grid__title"} -->
<h3 class="wp-block-heading icon-grid__title">The Site We Hand Back</h3>
<!-- /wp:heading -->

<!-- wp:group {"className":"icon-grid__grid"} -->
<div class="wp-block-group icon-grid__grid"><!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-check-circle.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Included"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>Under a Second:</strong> Images sized and converted, critical CSS inlined, and the render-blocking scripts moved out of the way.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-check-circle.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Included"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>Only What Earns Its Place:</strong> A short, current plugin list, with the rest replaced by a few lines of theme code you can actually read.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-check-circle.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Included"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>Staging First, Always:</strong> Every change is reviewed on a staging copy with its own URL, and backed up off-site before it ships.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-check-circle.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="Included"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>Documented and Yours:</strong> Licences in your name, credentials in your password manager, and a handover document that explains the setup.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/icon-grid --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div></div>
<!-- /wp:aludra/spine-section -->
