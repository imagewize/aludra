import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';

import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { number, caption, good } = attributes;

	const blockProps = useBlockProps( {
		className: `stat-rail__item${ good ? ' is-good' : '' }`,
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Stat', 'aludra' ) }>
					<ToggleControl
						label={ __( 'Highlight (accent color)', 'aludra' ) }
						checked={ good }
						onChange={ ( value ) => setAttributes( { good: value } ) }
						help={ __(
							'Reserve this for the one standout stat in the rail.',
							'aludra'
						) }
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps }>
				<RichText
					tagName="div"
					className="stat-rail__num"
					value={ number }
					onChange={ ( value ) => setAttributes( { number: value } ) }
					allowedFormats={ [] }
					placeholder={ __( '0.9s', 'aludra' ) }
				/>
				<RichText
					tagName="div"
					className="stat-rail__cap"
					value={ caption }
					onChange={ ( value ) => setAttributes( { caption: value } ) }
					allowedFormats={ [] }
					placeholder={ __( 'Caption…', 'aludra' ) }
				/>
			</div>
		</>
	);
}
