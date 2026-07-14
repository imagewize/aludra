import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

/**
 * Icon URLs are resolved at render time via the aludra/icon block binding
 * (registered in aludra.php). window.aludraIcons — injected on
 * enqueue_block_editor_assets — provides the current plugin asset URLs so the
 * icon displays correctly inside the editor. The binding handles frontend
 * resolution regardless of the site URL, so no absolute path is baked into
 * saved content.
 */
const icons = window.aludraIcons ?? {};

const TEMPLATE = [
	[
		'core/group',
		{
			className: 'hero-banner__eyebrow',
			layout: { type: 'flex', alignItems: 'center', flexWrap: 'nowrap' },
			style: { spacing: { blockGap: '8px' } },
		},
		[
			[
				'core/image',
				{
					url: icons[ 'icon-search.svg' ] ?? '',
					alt: '',
					sizeSlug: 'full',
					linkDestination: 'none',
					metadata: {
						bindings: {
							url: {
								source: 'aludra/icon',
								args: { path: 'icon-search.svg' },
							},
						},
					},
				},
			],
			[ 'core/paragraph', { content: 'Eyebrow Label' } ],
		],
	],
	[
		'core/heading',
		{
			level: 1,
			className: 'hero-banner__title',
			content: 'A Bold Headline <em>That Converts</em>',
			style: { typography: { lineHeight: '1.15' } },
		},
	],
	[
		'core/paragraph',
		{
			className: 'hero-banner__lead',
			content:
				'Lead text that explains the value proposition in one or two sentences, giving visitors a reason to keep reading.',
		},
	],
	[
		'core/buttons',
		{
			className: 'hero-banner__ctas',
			layout: { type: 'flex', flexWrap: 'wrap' },
		},
		[
			[ 'core/button', { text: 'Primary Action', url: '#' } ],
			[
				'core/button',
				{
					text: 'Secondary Action',
					url: '#',
					className: 'is-style-outline',
				},
			],
		],
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-hero-banner',
	} );

	return (
		<div { ...blockProps }>
			<div className="hero-banner__content">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
