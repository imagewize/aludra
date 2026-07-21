import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { label, heading, aside, tint } = attributes;

	const blockProps = useBlockProps.save( {
		className: [
			'wp-block-aludra-spine-section',
			tint ? 'is-tinted' : '',
		]
			.filter( Boolean )
			.join( ' ' ),
	} );

	return (
		<div { ...blockProps }>
			<div className="spine-section__shell">
				<div className="spine-section__spine">
					<RichText.Content
						tagName="p"
						className="spine-section__label"
						value={ label }
					/>
					<RichText.Content
						tagName="h2"
						className="spine-section__heading"
						value={ heading }
					/>
					<RichText.Content
						tagName="p"
						className="spine-section__aside"
						value={ aside }
					/>
				</div>
				<div className="spine-section__content">
					<InnerBlocks.Content />
				</div>
			</div>
		</div>
	);
}
