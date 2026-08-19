/**
 * Shared colour-attribute handling for aludra/stat-item.
 *
 * The number and the caption each carry the pair WordPress core uses for a
 * colour control — a palette `slug` and a `custom` CSS value, only ever one of
 * them set. A slug renders as core's `has-{slug}-color` class so the colour
 * follows the theme's palette (and any style variation that redefines it); a
 * custom value renders inline. Both beat the band's own rules in
 * blocks/stat-rail/src/style.scss, which is what makes the override work
 * without any `!important` here.
 *
 * Edit and save both import this so the editor preview and the saved markup
 * cannot drift — a mismatch there is a block-validation error, not a cosmetic
 * bug.
 */

import { getColorClassName } from '@wordpress/block-editor';

/**
 * Build the class name and inline style for one coloured element.
 *
 * @param {string}           baseClass Element's own class, e.g. 'stat-rail__num'.
 * @param {string|undefined} slug      Palette colour slug, if a preset is chosen.
 * @param {string|undefined} custom    Custom CSS colour, if no preset is chosen.
 * @return {{className: string, style: Object|undefined}} Props to spread onto the element.
 */
export function getStatColorProps( baseClass, slug, custom ) {
	const classNames = [ baseClass ];

	if ( slug || custom ) {
		classNames.push( 'has-text-color' );
	}

	if ( slug ) {
		classNames.push( getColorClassName( 'color', slug ) );
	}

	return {
		className: classNames.join( ' ' ),
		style: custom ? { color: custom } : undefined,
	};
}

/**
 * Tag name for the stat's number.
 *
 * Level 0 — the default — keeps the number a plain `div`: a stat rail is
 * usually a decorative band under a hero, and turning three big figures into
 * headings puts them in the document outline and in the screen-reader heading
 * list, which is rarely what the page means. Levels 1-6 are there for the case
 * where the rail genuinely is the section's structure.
 *
 * @param {number} level Heading level, or 0 for no heading.
 * @return {string} Tag name.
 */
export function getNumberTagName( level ) {
	return level >= 1 && level <= 6 ? `h${ level }` : 'div';
}
