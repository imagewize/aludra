import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

const TEMPLATE = [
	[
		'core/paragraph',
		{
			content:
				'A short introduction to the service you offer — what you do, who you do it for, and why it matters. Keep it focused on the outcome your customer cares about most.',
		},
	],
	[
		'core/paragraph',
		{
			content:
				'Whether it is a one-time engagement or ongoing support, explain how you work end-to-end so visitors know what to expect before they reach out.',
		},
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-service-intro',
	} );

	return (
		<div { ...blockProps }>
			<div className="service-intro__inner">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
