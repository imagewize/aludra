import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

/**
 * Two image blocks are seeded — desktop and mobile — so authors can supply
 * different art-directed crops per breakpoint. CSS toggles which one is
 * visible (see style.scss); both stay in saved markup so editors can swap
 * either image without losing the other's selection.
 */
const TEMPLATE = [
	[
		'core/group',
		{
			className: 'hero-split__content',
			layout: { type: 'flex', orientation: 'vertical' },
		},
		[
			[
				'core/paragraph',
				{
					className: 'hero-split__eyebrow',
					content: 'What You Do',
				},
			],
			[
				'core/heading',
				{
					level: 1,
					className: 'hero-split__title',
					content: 'A Headline That <em>Sets The Tone</em>',
					style: { typography: { lineHeight: '1.15' } },
				},
			],
			[
				'core/paragraph',
				{
					className: 'hero-split__lead',
					content:
						'A short line that captures what you do and why it matters, giving visitors a reason to keep reading.',
				},
			],
			[
				'core/buttons',
				{
					className: 'hero-split__ctas',
					layout: { type: 'flex', flexWrap: 'wrap' },
				},
				[
					[ 'core/button', { text: 'Get Started', url: '#' } ],
					[
						'core/button',
						{
							text: 'See Our Work',
							url: '#',
							className: 'is-style-outline',
						},
					],
				],
			],
			[
				'core/paragraph',
				{
					className: 'hero-split__trust',
					content:
						'<span class="hero-split__check">✓</span> First proof point&nbsp;&nbsp;·&nbsp;&nbsp;<span class="hero-split__check">✓</span> Second proof point',
				},
			],
		],
	],
	[
		'core/group',
		{
			className: 'hero-split__media',
			layout: { type: 'default' },
		},
		[
			[
				'core/image',
				{
					className: 'hero-split__image hero-split__image--desktop',
					url: '',
					alt: '',
					sizeSlug: 'large',
				},
			],
			[
				'core/image',
				{
					className: 'hero-split__image hero-split__image--mobile',
					url: '',
					alt: '',
					sizeSlug: 'large',
				},
			],
		],
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-hero-split',
	} );

	return (
		<div { ...blockProps }>
			<div className="hero-split__inner">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
