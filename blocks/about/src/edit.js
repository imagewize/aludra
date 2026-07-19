import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

const TEMPLATE = [
	[
		'core/heading',
		{
			level: 2,
			className: 'about-section__title',
			content: 'What We Do <br />And Why It Matters.',
			style: { typography: { lineHeight: '1.3' } },
		},
	],
	[
		'core/paragraph',
		{
			className: 'about-section__lead',
			content:
				'A short paragraph introducing what makes your business different, and why it matters to the people you serve.',
		},
	],
	[
		'core/paragraph',
		{
			className: 'about-section__list-intro',
			content: 'We offer:',
		},
	],
	[
		'core/list',
		{ className: 'about-section__list' },
		[
			[ 'core/list-item', { content: 'First benefit or service highlight' } ],
			[ 'core/list-item', { content: 'Second benefit or service highlight' } ],
			[ 'core/list-item', { content: 'Third benefit or service highlight' } ],
		],
	],
	[
		'core/paragraph',
		{
			className: 'about-section__closing',
			content:
				'A closing paragraph with more context — your company story, credibility, or a call back to your mission.',
		},
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-about',
	} );

	return (
		<div { ...blockProps }>
			<div className="about-section__content">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
