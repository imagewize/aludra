/**
 * Aludra scroll-reveal utility.
 *
 * Toggles `.is-revealed` on any element carrying `data-aludra-reveal` once it
 * crosses into the viewport. Plain IntersectionObserver, no framework/store —
 * blocks opt in via a `revealOnScroll` attribute; this script is only
 * enqueued on pages that actually contain such a block (see aludra.php).
 */
( function () {
	'use strict';

	var targets = document.querySelectorAll( '[data-aludra-reveal]' );

	if ( ! targets.length ) {
		return;
	}

	if ( ! ( 'IntersectionObserver' in window ) ) {
		targets.forEach( function ( el ) {
			el.classList.add( 'is-revealed' );
		} );
		return;
	}

	var observer = new IntersectionObserver(
		function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'is-revealed' );
					observer.unobserve( entry.target );
				}
			} );
		},
		{ threshold: 0.15, rootMargin: '0px 0px -10% 0px' }
	);

	targets.forEach( function ( el ) {
		observer.observe( el );
	} );
} )();
