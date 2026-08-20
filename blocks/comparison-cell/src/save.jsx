import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { heading, body } = attributes;

	const blockProps = useBlockProps.save( { className: 'comparison-cell' } );

	return (
		<div { ...blockProps }>
			<RichText.Content
				tagName="p"
				className="comparison-cell__heading"
				value={ heading }
			/>
			<RichText.Content
				tagName="p"
				className="comparison-cell__body"
				value={ body }
			/>
		</div>
	);
}
