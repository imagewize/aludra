import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

/**
 * Build a single review item: round avatar photo and a centred quote.
 *
 * @param {string} quote Review quote text.
 * @return {Array} Block template tuple for InnerBlocks.
 */
const reviewItem = ( quote ) => [
	'core/group',
	{
		className: 'review-profiles__item',
		layout: {
			type: 'flex',
			orientation: 'vertical',
			justifyContent: 'center',
		},
	},
	[
		[
			'core/image',
			{
				className: 'review-profiles__avatar',
				url: '',
				alt: '',
				width: 95,
				style: { border: { radius: '100px' } },
			},
		],
		[
			'core/paragraph',
			{
				className: 'review-profiles__quote',
				content: quote,
				align: 'center',
			},
		],
	],
];

const TEMPLATE = [
	[
		'core/heading',
		{
			level: 2,
			className: 'review-profiles__title',
			content: 'Client Reviews',
			textAlign: 'center',
			style: { typography: { fontWeight: '600' } },
		},
	],
	[
		'core/group',
		{ className: 'review-profiles__grid', layout: { type: 'default' } },
		[
			reviewItem(
				'“Working with this team made a real difference — they delivered on time and communicated clearly throughout the whole project.”'
			),
			reviewItem(
				'“Great communication, strong technical skills, and a genuine understanding of what our business needed. We’ll be back for future projects.”'
			),
			reviewItem(
				'“Couldn’t have done this without them. Our site is faster and easier to manage than ever. Would definitely hire again.”'
			),
		],
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-review-profiles',
	} );

	return (
		<div { ...blockProps }>
			<div className="review-profiles__content">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
