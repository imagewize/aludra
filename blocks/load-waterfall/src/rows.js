/**
 * Row geometry for the waterfall panel — offsets, widths and bar colour
 * variants, the first six ported from the mockup
 * (designs/aviendha/aviendha-redesign.html, ~lines 375-389). These stay
 * structural constants rather than block attributes: only the row labels, site
 * URL, badge and LCP label are editable (see block.json).
 *
 * The staggered animation delay is not here: it lives in style.scss, keyed on
 * the row's position. As an inline `animation-delay` it was stripped by KSES
 * (`safecss_filter_attr()` does not allow the property) whenever someone
 * without `unfiltered_html` saved the post — every role below super admin on
 * a multisite — which broke block validation and made all bars grow at once.
 * `left` and `width` are on the KSES allow list and stay inline.
 *
 * How many rows render is driven by how many labels `rowLabels` carries, up to
 * MAX_ROWS. The panel was previously hardcoded to exactly six — save() mapped
 * over this array and indexed `rowLabels[ index ]` — so a shorter `rowLabels`
 * left trailing rows with empty labels and a longer one silently dropped the
 * surplus. The rows past the mockup's six continue its cascade by hand rather
 * than by formula, so a longer panel still reads as a designed artifact: each
 * stage starts later and runs shorter, the way a real tail of requests does.
 *
 * The LCP marker sits on the 5th row, at that row's left offset. A panel of
 * fewer than five rows therefore shows no marker — deliberate, since the marker
 * marks a moment partway through the cascade and has nothing to mark in a
 * three-row panel.
 */
export const ROWS = [
	{ left: 0, width: 22, variant: 'is-doc' },
	{ left: 22, width: 14, variant: 'is-css' },
	{ left: 26, width: 26, variant: 'is-img' },
	{ left: 30, width: 18, variant: null },
	{ left: 52, width: 20, variant: null, hasLcpMarker: true },
	{ left: 72, width: 12, variant: null },
	{ left: 78, width: 10, variant: null },
	{ left: 82, width: 9, variant: null },
	{ left: 84, width: 8, variant: null },
	{ left: 86, width: 7, variant: null },
	{ left: 88, width: 6, variant: null },
	{ left: 90, width: 6, variant: null },
];

/**
 * Largest panel the authored geometry covers. Labels beyond this are ignored
 * rather than rendered against invented offsets.
 */
export const MAX_ROWS = ROWS.length;

/**
 * Rows rendered when `rowLabels` is missing or empty — the mockup's panel, so a
 * block saved before the count meant anything renders exactly as it always did.
 */
export const DEFAULT_ROWS = 6;

/**
 * Resolve how many rows to render for a given set of labels.
 *
 * @param {Array|undefined} rowLabels The block's row labels.
 * @return {number} Row count, between 1 and MAX_ROWS.
 */
export function rowCount( rowLabels ) {
	if ( ! Array.isArray( rowLabels ) || 0 === rowLabels.length ) {
		return DEFAULT_ROWS;
	}

	return Math.min( rowLabels.length, MAX_ROWS );
}
