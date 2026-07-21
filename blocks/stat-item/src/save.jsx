import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { number, caption, good } = attributes;

	const blockProps = useBlockProps.save( {
		className: `stat-rail__item${ good ? ' is-good' : '' }`,
	} );

	return (
		<div { ...blockProps }>
			<RichText.Content tagName="div" className="stat-rail__num" value={ number } />
			<RichText.Content tagName="div" className="stat-rail__cap" value={ caption } />
		</div>
	);
}
