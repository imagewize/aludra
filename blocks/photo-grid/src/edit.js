import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

/**
 * Build a single square photo item.
 *
 * @return {Array} Block template tuple for InnerBlocks.
 */
const photoItem = () => [
	'core/image',
	{
		className: 'photo-grid__photo',
		url: '',
		alt: '',
		sizeSlug: 'large',
	},
];

const TEMPLATE = [
	[
		'core/heading',
		{
			level: 2,
			className: 'photo-grid__title',
			content: 'Follow the Studio',
			// Text alignment is a typography support, not an attribute — core
			// dropped `textAlign`/`align` from heading and paragraph, so the old
			// form is silently discarded by createBlock.
			style: { typography: { textAlign: 'center', fontWeight: '600' } },
		},
	],
	[
		'core/paragraph',
		{
			className: 'photo-grid__lead',
			content: 'Recent work and behind-the-scenes shots — @yourhandle',
			style: { typography: { textAlign: 'center' } },
		},
	],
	[
		'core/group',
		{ className: 'photo-grid__grid', layout: { type: 'default' } },
		[
			photoItem(),
			photoItem(),
			photoItem(),
			photoItem(),
			photoItem(),
			photoItem(),
		],
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-photo-grid',
	} );

	return (
		<div { ...blockProps }>
			<div className="photo-grid__content">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
