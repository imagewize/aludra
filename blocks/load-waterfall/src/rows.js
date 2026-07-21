/**
 * Fixed row geometry for the waterfall panel — offsets, widths, animation
 * delays, and bar colour variants, ported from the mockup
 * (designs/aviendha/aviendha-redesign.html, ~lines 375-389). These stay
 * structural constants rather than block attributes: only the row labels,
 * site URL, badge, and LCP label are editable (see block.json).
 *
 * The LCP marker always sits on the 5th row (cart.js in the mockup), at
 * that row's left offset.
 */
export const ROWS = [
	{ left: 0, width: 22, delay: 0.1, variant: 'is-doc' },
	{ left: 22, width: 14, delay: 0.25, variant: 'is-css' },
	{ left: 26, width: 26, delay: 0.4, variant: 'is-img' },
	{ left: 30, width: 18, delay: 0.55, variant: null },
	{ left: 52, width: 20, delay: 0.7, variant: null, hasLcpMarker: true },
	{ left: 72, width: 12, delay: 0.85, variant: null },
];
