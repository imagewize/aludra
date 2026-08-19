import {
	useBlockProps,
	InnerBlocks,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, RangeControl, ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import { panesStyle } from './save';

import './editor.scss';

/**
 * Two panes, supplied as authored groups.
 *
 * `InnerBlocks.Content` can only appear once in a save, so the panes can't each
 * be their own InnerBlocks. They are ordinary core/group blocks carrying the
 * pane class names, and the stylesheet is keyed to those — the same shape
 * feature-cards, services-block and service-blocks already use for their grids.
 */
const TEMPLATE = [
	[
		'core/group',
		{ className: 'split-section__media' },
		[ [ 'core/image' ] ],
	],
	[ 'core/group', { className: 'split-section__content' }, [] ],
];

export default function Edit( { attributes, setAttributes } ) {
	const { label, heading, lead, reversed, mediaWidth, tint, revealOnScroll } =
		attributes;

	const blockProps = useBlockProps( {
		className: [
			'wp-block-aludra-split-section',
			tint ? 'is-tinted' : '',
			reversed ? 'is-reversed' : '',
		]
			.filter( Boolean )
			.join( ' ' ),
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Section', 'aludra' ) }>
					<ToggleControl
						label={ __( 'Media on the right', 'aludra' ) }
						help={ __(
							'Swaps the two panes. The header stays centred either way.',
							'aludra'
						) }
						checked={ reversed }
						onChange={ ( value ) =>
							setAttributes( { reversed: value } )
						}
					/>
					<RangeControl
						label={ __( 'Media width', 'aludra' ) }
						help={ __(
							'Share of the row given to the media pane. Both panes stack on narrow screens regardless.',
							'aludra'
						) }
						value={ mediaWidth }
						onChange={ ( value ) =>
							setAttributes( {
								mediaWidth: undefined === value ? 50 : value,
							} )
						}
						min={ 30 }
						max={ 70 }
						step={ 5 }
					/>
					<ToggleControl
						label={ __( 'Tinted background', 'aludra' ) }
						help={ __(
							'Alternate sections use a tint so consecutive sections read as separate bands.',
							'aludra'
						) }
						checked={ tint }
						onChange={ ( value ) =>
							setAttributes( { tint: value } )
						}
					/>
					<ToggleControl
						label={ __( 'Reveal on scroll', 'aludra' ) }
						help={ __(
							'The two panes travel in from opposite sides as the section enters the viewport. Front end only; respects reduced-motion.',
							'aludra'
						) }
						checked={ !! revealOnScroll }
						onChange={ ( value ) =>
							setAttributes( { revealOnScroll: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				<div className="split-section__shell">
					<div className="split-section__header">
						<RichText
							tagName="p"
							className="split-section__label"
							value={ label }
							onChange={ ( value ) =>
								setAttributes( { label: value } )
							}
							allowedFormats={ [] }
							placeholder={ __( 'Label', 'aludra' ) }
						/>
						<RichText
							tagName="h2"
							className="split-section__heading"
							value={ heading }
							onChange={ ( value ) =>
								setAttributes( { heading: value } )
							}
							allowedFormats={ [ 'core/italic' ] }
							placeholder={ __( 'Section heading', 'aludra' ) }
						/>
						<RichText
							tagName="p"
							className="split-section__lead"
							value={ lead }
							onChange={ ( value ) =>
								setAttributes( { lead: value } )
							}
							allowedFormats={ [ 'core/italic', 'core/link' ] }
							placeholder={ __(
								'One-line lead (optional)',
								'aludra'
							) }
						/>
					</div>
					<div
						className="split-section__panes"
						style={ panesStyle( mediaWidth ) }
					>
						<InnerBlocks
							template={ TEMPLATE }
							templateLock={ false }
							renderAppender={ false }
						/>
					</div>
				</div>
			</div>
		</>
	);
}
