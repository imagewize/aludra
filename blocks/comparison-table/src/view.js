/**
 * Comparison Table frontend functionality.
 *
 * Builds the filter-pill bar from each row's `data-category`, and shows/hides
 * `.comparison-row` elements on click. If this never runs, `.comparison-table__pills`
 * stays empty and every row stays visible — the correct "Full Spectrum" state,
 * so there is no broken un-enhanced state to guard against.
 */
document.addEventListener( 'DOMContentLoaded', function () {
	const tables = document.querySelectorAll(
		'.wp-block-aludra-comparison-table'
	);

	tables.forEach( ( table ) => {
		const pillsContainer = table.querySelector(
			'.comparison-table__pills'
		);
		const rows = table.querySelectorAll( '.comparison-row' );

		if ( ! pillsContainer || ! rows.length ) {
			return;
		}

		// Unique categories, in the order rows already appear, with the
		// always-present "clear the filter" pill first.
		const categories = [];
		rows.forEach( ( row ) => {
			const category = row.getAttribute( 'data-category' );
			if ( category && ! categories.includes( category ) ) {
				categories.push( category );
			}
		} );

		if ( ! categories.length ) {
			return; // No row opted into a category — nothing to filter.
		}

		function applyFilter( category ) {
			rows.forEach( ( row ) => {
				const matches =
					! category ||
					row.getAttribute( 'data-category' ) === category;
				row.style.display = matches ? '' : 'none';
			} );
		}

		function makePill( label, category ) {
			const button = document.createElement( 'button' );
			button.type = 'button';
			button.className = 'comparison-table__pill';
			button.textContent = label;
			button.setAttribute( 'aria-pressed', category ? 'false' : 'true' );

			button.addEventListener( 'click', function () {
				pillsContainer
					.querySelectorAll( '.comparison-table__pill' )
					.forEach( ( pill ) => {
						pill.classList.remove( 'is-active' );
						pill.setAttribute( 'aria-pressed', 'false' );
					} );
				button.classList.add( 'is-active' );
				button.setAttribute( 'aria-pressed', 'true' );
				applyFilter( category );
			} );

			return button;
		}

		const bar = document.createElement( 'div' );
		bar.className = 'comparison-table__pill-bar';
		bar.appendChild( makePill( 'Full Spectrum', '' ) );
		categories.forEach( ( category ) => {
			bar.appendChild( makePill( category, category ) );
		} );

		pillsContainer.appendChild( bar );
		bar.firstElementChild.classList.add( 'is-active' );
	} );
} );
