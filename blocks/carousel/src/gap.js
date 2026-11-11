/**
 * Block spacing (gap between slides) for aludra/carousel.
 *
 * Core only turns `style.spacing.blockGap` into CSS for blocks with layout
 * support, which the carousel does not have, so it publishes the value itself
 * as the `--aludra-carousel-gap` custom property: the rail uses it as its grid
 * gap, Slick splits it into each slide's inline padding, and the editor's
 * slide row uses it as its flex gap. A custom property, rather than a `gap`
 * declaration, because KSES keeps `--*` properties for users without
 * unfiltered_html and Slick needs the value on the slides, not the root.
 *
 * Returns nothing when no gap is set, so carousels saved before this support
 * existed serialize byte-identically and need no deprecation.
 *
 * @param {Object} attributes Block attributes.
 * @return {Object|undefined} Inline style object, or undefined.
 */
export function gapStyle( attributes ) {
	const gap = attributes?.style?.spacing?.blockGap;

	if ( typeof gap !== 'string' || '' === gap ) {
		return undefined;
	}

	const preset = gap.match( /^var:preset\|spacing\|(.+)$/ );
	const value = preset ? `var(--wp--preset--spacing--${ preset[ 1 ] })` : gap;

	return { '--aludra-carousel-gap': value };
}
