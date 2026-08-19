/**
 * Editor-side resolver for the `aludra/icon` block binding.
 *
 * The binding is registered in PHP (see aludra.php) with a `get_value_callback`,
 * which resolves icon URLs when a block renders on the front end. The editor
 * cannot use that callback — it needs a JavaScript source of the same name, or
 * bound attributes stay empty while editing.
 *
 * That gap is visible in pattern markup, which saves icons as `<img src="" />`
 * plus the binding: with no editor-side resolver the `url` stays empty and
 * Gutenberg draws the core/image *placeholder* instead of an image. The
 * placeholder is a full-size box, and it is not an `<img>`, so the rules that
 * cap icons (`width: 14px`) do not apply to it — it inflates whatever contains
 * it, most visibly the hero eyebrow pill and the trust-bar and feature-card
 * icon chips.
 *
 * `window.aludraIcons`, printed on enqueue_block_editor_assets, already maps
 * icon filenames to their current plugin URLs, which is all this needs. Blocks
 * inserted fresh from the inserter were unaffected because their edit.js
 * templates seed `url` from that same map; only saved bindings needed resolving.
 */
( function ( wp ) {
	'use strict';

	if (
		! wp ||
		! wp.blocks ||
		typeof wp.blocks.registerBlockBindingsSource !== 'function'
	) {
		return;
	}

	try {
		wp.blocks.registerBlockBindingsSource( {
			name: 'aludra/icon',

			/**
			 * Resolve bound attributes to icon URLs.
			 *
			 * @param {Object} args          Source arguments supplied by the editor.
			 * @param {Object} args.bindings Bound attributes, keyed by attribute name.
			 * @return {Object} Resolved values, keyed by attribute name.
			 */
			getValues: function ( args ) {
				var bindings = ( args && args.bindings ) || {};
				var icons = window.aludraIcons || {};
				var values = {};

				Object.keys( bindings ).forEach( function ( attribute ) {
					var binding = bindings[ attribute ] || {};
					var path = binding.args && binding.args.path;

					if ( path && icons[ path ] ) {
						values[ attribute ] = icons[ path ];
					}
				} );

				return values;
			},
		} );
	} catch ( error ) {
		// A duplicate or unsupported registration must never take the editor
		// down with it — icons simply fall back to the placeholder.
		if ( window.console && window.console.warn ) {
			window.console.warn( '[aludra] icon binding not registered:', error );
		}
	}
} )( window.wp );
