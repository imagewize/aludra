import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

/**
 * The media pane's share of the row is published as a custom property rather
 * than as an inline `grid-template-columns`, so the collapse media query in
 * style.scss can still win on narrow screens — an inline declaration would
 * beat it on the same property and strand the panes side by side on a phone.
 *
 * Nothing is written at the default, so ordinary markup carries no inline
 * style at all and the stylesheet's even split applies.
 *
 * @param {number} mediaWidth Media pane width, as a percentage of the row.
 * @return {Object|undefined} Style object, or undefined at the default width.
 */
export function panesStyle( mediaWidth ) {
	return 50 === mediaWidth
		? undefined
		: { '--aludra-split-media': `${ mediaWidth }%` };
}

export default function save( { attributes } ) {
	const { label, heading, lead, reversed, mediaWidth, tint } = attributes;

	const blockProps = useBlockProps.save( {
		className: [
			'wp-block-aludra-split-section',
			tint ? 'is-tinted' : '',
			reversed ? 'is-reversed' : '',
		]
			.filter( Boolean )
			.join( ' ' ),
	} );

	return (
		<div { ...blockProps }>
			<div className="split-section__shell">
				<div className="split-section__header">
					<RichText.Content
						tagName="p"
						className="split-section__label"
						value={ label }
					/>
					<RichText.Content
						tagName="h2"
						className="split-section__heading"
						value={ heading }
					/>
					<RichText.Content
						tagName="p"
						className="split-section__lead"
						value={ lead }
					/>
				</div>
				<div
					className="split-section__panes"
					style={ panesStyle( mediaWidth ) }
				>
					<InnerBlocks.Content />
				</div>
			</div>
		</div>
	);
}
