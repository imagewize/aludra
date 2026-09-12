/**
 * Instagram Embed Block - Frontend Functionality
 *
 * Consent-friendly loading: the rendered markup only contains a "Load feed"
 * button, never an iframe. Nothing is requested from instagram.com until a
 * visitor clicks it.
 */
( function () {
	'use strict';

	function initFrame( frame ) {
		const username = frame.dataset.username;
		const height = frame.dataset.height || '600';
		const btn = frame.querySelector( '.instagram-embed__load-btn' );

		if ( ! username || ! btn ) {
			return;
		}

		btn.addEventListener( 'click', function () {
			const iframe = document.createElement( 'iframe' );
			iframe.src =
				'https://www.instagram.com/' +
				encodeURIComponent( username ) +
				'/embed';
			iframe.width = '100%';
			iframe.height = height;
			iframe.frameBorder = '0';
			iframe.scrolling = 'no';
			iframe.setAttribute( 'allowtransparency', 'true' );
			iframe.setAttribute( 'loading', 'lazy' );
			iframe.title = 'Instagram feed for @' + username;

			// Drop only the placeholder, and reveal the profile link: instagram.com
			// refuses the frame for private or mistyped handles (and could retire
			// this undocumented endpoint outright), which fails silently and would
			// otherwise leave an empty box with no way out.
			const placeholder = frame.querySelector(
				'.instagram-embed__placeholder'
			);
			const fallback = frame.querySelector(
				'.instagram-embed__fallback'
			);

			if ( placeholder ) {
				placeholder.remove();
			}

			frame.appendChild( iframe );

			if ( fallback ) {
				fallback.hidden = false;
			}
		} );
	}

	function init() {
		document
			.querySelectorAll(
				'.wp-block-aludra-instagram-embed .instagram-embed__frame'
			)
			.forEach( initFrame );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
