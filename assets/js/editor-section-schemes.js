/**
 * "Section colours": a colour scheme for a whole section, in the Styles tab.
 *
 * Writes one `is-aludra-scheme-*` class into the block's `className` and
 * nothing else; assets/css/section-schemes.css does the rest by swapping the
 * palette's custom properties inside the section. Because it is a class and
 * not a block style, it sits alongside a block's own styles (Cards / Spec
 * sheet, Avatars / Quote cards …) instead of replacing them, and because
 * `className` is saved by every block already, no block's save() changes:
 * existing content and patterns stay valid, and removing the class restores
 * the section exactly.
 *
 * Offered on section-level blocks that paint with the page's palette. The
 * blocks with their own Dark/Light block styles (stat rail, CTA banner,
 * contact, both heroes) are left out: their styles already are that choice.
 *
 * @param {Object} wp The global `wp` object.
 */
( function ( wp ) {
	'use strict';

	if (
		! wp ||
		! wp.hooks ||
		! wp.compose ||
		! wp.blockEditor ||
		! wp.components
	) {
		return;
	}

	const el = wp.element.createElement;
	const Fragment = wp.element.Fragment;
	const __ = wp.i18n.__;
	const InspectorControls = wp.blockEditor.InspectorControls;
	const PanelBody = wp.components.PanelBody;
	const ToggleGroupControl =
		wp.components.ToggleGroupControl ||
		wp.components.__experimentalToggleGroupControl;
	const ToggleGroupControlOption =
		wp.components.ToggleGroupControlOption ||
		wp.components.__experimentalToggleGroupControlOption;
	const SelectControl = wp.components.SelectControl;

	const PREFIX = 'is-aludra-scheme-';

	const BLOCKS = [
		'core/group',
		'aludra/spine-section',
		'aludra/split-section',
		'aludra/about',
		'aludra/service-intro',
		'aludra/services-block',
		'aludra/service-blocks',
		'aludra/feature-cards',
		'aludra/feature-list-grid',
		'aludra/icon-grid',
		'aludra/cta-columns',
		'aludra/pricing-tiers',
		'aludra/comparison-table',
		'aludra/faq-tabs',
		'aludra/trust-bar',
		'aludra/review-profiles',
		'aludra/testimonial-grid',
		'aludra/photo-grid',
		'aludra/instagram-embed',
	];

	const SCHEMES = [
		{ value: 'page', label: __( 'Page', 'aludra' ) },
		{ value: 'tint', label: __( 'Tint', 'aludra' ) },
		{ value: 'invert', label: __( 'Invert', 'aludra' ) },
		{ value: 'brand', label: __( 'Brand', 'aludra' ) },
	];

	const HELP = {
		page: __( 'The page colours, as the block is designed.', 'aludra' ),
		tint: __(
			'Page and tint colours swap places: a tinted band, or a plain one on a block that is tinted by default.',
			'aludra'
		),
		invert: __(
			'The page colours reversed: a dark band on a light theme, a light band on a dark style.',
			'aludra'
		),
		brand: __(
			'The brand colour as background, with light text and buttons.',
			'aludra'
		),
	};

	function getScheme( className ) {
		const classes = ( className || '' ).split( /\s+/ );
		for ( let i = 0; i < classes.length; i++ ) {
			if ( classes[ i ].indexOf( PREFIX ) === 0 ) {
				return classes[ i ].slice( PREFIX.length );
			}
		}
		// Not '': ToggleGroupControl shows an empty value as no selection.
		return 'page';
	}

	function setScheme( className, scheme ) {
		const classes = ( className || '' )
			.split( /\s+/ )
			.filter( function ( c ) {
				return c && c.indexOf( PREFIX ) !== 0;
			} );
		if ( scheme && scheme !== 'page' ) {
			classes.push( PREFIX + scheme );
		}
		return classes.length ? classes.join( ' ' ) : undefined;
	}

	function SchemeControl( props ) {
		const current = getScheme( props.attributes.className );
		const onChange = function ( value ) {
			props.setAttributes( {
				className: setScheme( props.attributes.className, value ),
			} );
		};

		const control = ToggleGroupControl
			? el(
					ToggleGroupControl,
					{
						label: __( 'Scheme', 'aludra' ),
						value: current,
						isBlock: true,
						onChange,
						help: HELP[ current ] || '',
						__nextHasNoMarginBottom: true,
						__next40pxDefaultSize: true,
					},
					SCHEMES.map( function ( s ) {
						return el( ToggleGroupControlOption, {
							key: s.value,
							value: s.value,
							label: s.label,
						} );
					} )
				)
			: el( SelectControl, {
					label: __( 'Scheme', 'aludra' ),
					value: current,
					options: SCHEMES,
					onChange,
					help: HELP[ current ] || '',
					__nextHasNoMarginBottom: true,
				} );

		return el(
			InspectorControls,
			{ group: 'styles' },
			el(
				PanelBody,
				{
					title: __( 'Section colours', 'aludra' ),
					initialOpen: current !== 'page',
				},
				control
			)
		);
	}

	const withSchemeControl = wp.compose.createHigherOrderComponent( function (
		BlockEdit
	) {
		return function ( props ) {
			if ( BLOCKS.indexOf( props.name ) === -1 || ! props.isSelected ) {
				return el( BlockEdit, props );
			}
			return el(
				Fragment,
				null,
				el( BlockEdit, props ),
				el( SchemeControl, props )
			);
		};
	}, 'withAludraSectionScheme' );

	wp.hooks.addFilter(
		'editor.BlockEdit',
		'aludra/section-scheme',
		withSchemeControl
	);
} )( window.wp );
