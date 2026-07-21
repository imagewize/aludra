import {
	useBlockProps,
	InnerBlocks,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { label, heading, aside, tint } = attributes;

	const blockProps = useBlockProps( {
		className: [
			'wp-block-aludra-spine-section',
			tint ? 'is-tinted' : '',
		]
			.filter( Boolean )
			.join( ' ' ),
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Section', 'aludra' ) }>
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
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				<div className="spine-section__shell">
					<div className="spine-section__spine">
						<RichText
							tagName="p"
							className="spine-section__label"
							value={ label }
							onChange={ ( value ) =>
								setAttributes( { label: value } )
							}
							allowedFormats={ [] }
							placeholder={ __( 'Label', 'aludra' ) }
						/>
						<RichText
							tagName="h2"
							className="spine-section__heading"
							value={ heading }
							onChange={ ( value ) =>
								setAttributes( { heading: value } )
							}
							allowedFormats={ [ 'core/italic' ] }
							placeholder={ __( 'Section heading', 'aludra' ) }
						/>
						<RichText
							tagName="p"
							className="spine-section__aside"
							value={ aside }
							onChange={ ( value ) =>
								setAttributes( { aside: value } )
							}
							allowedFormats={ [ 'core/italic', 'core/link' ] }
							placeholder={ __(
								'One-line aside (optional)',
								'aludra'
							) }
						/>
					</div>
					<div className="spine-section__content">
						<InnerBlocks
							templateLock={ false }
							renderAppender={
								InnerBlocks.ButtonBlockAppender
							}
						/>
					</div>
				</div>
			</div>
		</>
	);
}
