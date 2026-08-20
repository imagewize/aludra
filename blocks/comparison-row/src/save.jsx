import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { label, parameterKey, category } = attributes;

	const blockProps = useBlockProps.save( {
		className: 'comparison-row',
		/* Read by comparison-table's view.js to decide which rows a filter
		   pill shows. Omitted rather than empty-stringed when there is no
		   category, so "Full Spectrum" (which shows every row regardless)
		   stays the only pill an uncategorised row appears under. */
		'data-category': category || undefined,
	} );

	return (
		<div { ...blockProps }>
			<div className="comparison-row__param">
				<RichText.Content
					tagName="p"
					className="comparison-row__label"
					value={ label }
				/>
				<RichText.Content
					tagName="p"
					className="comparison-row__key"
					value={ parameterKey }
				/>
			</div>
			<InnerBlocks.Content />
		</div>
	);
}
