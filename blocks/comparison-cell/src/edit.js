import { useBlockProps, RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { heading, body } = attributes;

	const blockProps = useBlockProps( { className: 'comparison-cell' } );

	return (
		<div { ...blockProps }>
			<RichText
				tagName="p"
				className="comparison-cell__heading"
				value={ heading }
				onChange={ ( value ) => setAttributes( { heading: value } ) }
				allowedFormats={ [] }
				placeholder={ __( 'Short answer…', 'aludra' ) }
			/>
			<RichText
				tagName="p"
				className="comparison-cell__body"
				value={ body }
				onChange={ ( value ) => setAttributes( { body: value } ) }
				allowedFormats={ [ 'core/bold', 'core/italic' ] }
				placeholder={ __( 'One or two sentences…', 'aludra' ) }
			/>
		</div>
	);
}
