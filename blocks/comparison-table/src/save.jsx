import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const {
		tint,
		eyebrow,
		heading,
		lead,
		paramColumnLabel,
		vendorOurs,
		vendorOne,
		vendorTwo,
		vendorThree,
	} = attributes;

	const blockProps = useBlockProps.save( {
		className: [
			'wp-block-aludra-comparison-table',
			tint ? 'is-tinted' : '',
		]
			.filter( Boolean )
			.join( ' ' ),
	} );

	return (
		<div { ...blockProps }>
			<div className="comparison-table__shell">
				<div className="comparison-table__header">
					<RichText.Content
						tagName="p"
						className="comparison-table__eyebrow"
						value={ eyebrow }
					/>
					<RichText.Content
						tagName="h2"
						className="comparison-table__heading"
						value={ heading }
					/>
					<RichText.Content
						tagName="p"
						className="comparison-table__lead"
						value={ lead }
					/>
				</div>

				{ /* Empty on purpose — view.js builds the pill bar from each
				     row's data-category. Left as the un-enhanced state's
				     "Full Spectrum" table (every row, no controls) if
				     JavaScript never runs. */ }
				<div className="comparison-table__pills" />

				<div className="comparison-table__surface">
					<div className="comparison-table__row comparison-table__row--head">
						<RichText.Content
							tagName="div"
							className="comparison-table__head-cell comparison-table__head-cell--param"
							value={ paramColumnLabel }
						/>
						<RichText.Content
							tagName="div"
							className="comparison-table__head-cell comparison-table__head-cell--ours"
							value={ vendorOurs }
						/>
						<RichText.Content
							tagName="div"
							className="comparison-table__head-cell comparison-table__head-cell--v1"
							value={ vendorOne }
						/>
						<RichText.Content
							tagName="div"
							className="comparison-table__head-cell comparison-table__head-cell--v2"
							value={ vendorTwo }
						/>
						<RichText.Content
							tagName="div"
							className="comparison-table__head-cell comparison-table__head-cell--v3"
							value={ vendorThree }
						/>
					</div>
					<InnerBlocks.Content />
				</div>
			</div>
		</div>
	);
}
