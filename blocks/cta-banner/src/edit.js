import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

const TEMPLATE = [
	[
		'core/heading',
		{
			level: 2,
			className: 'cta-banner__title',
			content: 'Ready to get started?',
			style: { typography: { lineHeight: '1.2' } },
		},
	],
	[
		'core/paragraph',
		{
			className: 'cta-banner__lead',
			content:
				"Tell us about your project and we'll get back to you within one business day.",
		},
	],
	[
		'core/buttons',
		{
			className: 'cta-banner__ctas',
			layout: { type: 'flex', justifyContent: 'center' },
		},
		[ [ 'core/button', { text: 'Get in Touch', url: '#' } ] ],
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-cta-banner',
	} );

	return (
		<div { ...blockProps }>
			<div className="cta-banner__content">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
