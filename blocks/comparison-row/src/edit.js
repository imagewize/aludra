import {
	useBlockProps,
	InnerBlocks,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import './editor.scss';

/**
 * Four fixed cells — yours, then three competitors — matching
 * comparison-table's own four-column header. `templateLock="all"` on the
 * InnerBlocks below is what actually enforces the count; this template only
 * supplies the starting content.
 */
const TEMPLATE = [
	[ 'aludra/comparison-cell', { heading: __( 'Our answer', 'aludra' ) } ],
	[ 'aludra/comparison-cell', { heading: __( 'Competitor', 'aludra' ) } ],
	[ 'aludra/comparison-cell', { heading: __( 'Competitor', 'aludra' ) } ],
	[ 'aludra/comparison-cell', { heading: __( 'Competitor', 'aludra' ) } ],
];

export default function Edit( { attributes, setAttributes } ) {
	const { label, parameterKey, category } = attributes;

	const blockProps = useBlockProps( { className: 'comparison-row' } );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Filter category', 'aludra' ) }>
					<TextControl
						label={ __( 'Category', 'aludra' ) }
						help={ __(
							'Which filter pill reveals this row. Reuse the exact same spelling across rows that should share a pill — case and wording must match. Leave blank and the row only ever shows under "Full Spectrum".',
							'aludra'
						) }
						value={ category }
						onChange={ ( value ) =>
							setAttributes( { category: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				<div className="comparison-row__param">
					<RichText
						tagName="p"
						className="comparison-row__label"
						value={ label }
						onChange={ ( value ) =>
							setAttributes( { label: value } )
						}
						allowedFormats={ [] }
						placeholder={ __( 'PARAMETER', 'aludra' ) }
					/>
					<RichText
						tagName="p"
						className="comparison-row__key"
						value={ parameterKey }
						onChange={ ( value ) =>
							setAttributes( { parameterKey: value } )
						}
						allowedFormats={ [] }
						placeholder={ __( 'key.name (optional)', 'aludra' ) }
					/>
				</div>
				<InnerBlocks
					allowedBlocks={ [ 'aludra/comparison-cell' ] }
					template={ TEMPLATE }
					templateLock="all"
				/>
			</div>
		</>
	);
}
