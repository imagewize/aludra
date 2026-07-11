import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

/**
 * Icon URLs are resolved at render time via the aludra/icon block binding
 * (registered in aludra.php). window.aludraIcons — injected on
 * enqueue_block_editor_assets — provides the current plugin asset URLs so the
 * icons display correctly inside the editor. The binding handles frontend
 * resolution regardless of the site URL, so no absolute path is baked into
 * saved content.
 */
const icons = window.aludraIcons ?? {};

/**
 * Build the markup for a single feature card.
 *
 * @param {string} iconPath Icon filename, resolved via the aludra/icon binding.
 * @param {string} alt      Accessible label for the icon image.
 * @param {string} title    Card heading.
 * @param {string} text     Card body copy.
 * @return {Array} Block template tuple for InnerBlocks.
 */
const card = ( iconPath, alt, title, text ) => [
	'core/group',
	{
		className: 'feature-card',
		layout: { type: 'flex', orientation: 'vertical' },
	},
	[
		[
			'core/group',
			{
				className: 'feature-card__icon-wrap',
				layout: {
					type: 'flex',
					justifyContent: 'center',
					verticalAlignment: 'center',
				},
			},
			[
				[
					'core/image',
					{
						url: icons[ iconPath ] ?? '',
						alt,
						width: 28,
						height: 28,
						sizeSlug: 'full',
						linkDestination: 'none',
						metadata: {
							bindings: {
								url: {
									source: 'aludra/icon',
									args: { path: iconPath },
								},
							},
						},
					},
				],
			],
		],
		[
			'core/heading',
			{
				level: 4,
				content: title,
				style: { typography: { fontWeight: '700' } },
			},
		],
		[ 'core/paragraph', { content: text } ],
	],
];

const TEMPLATE = [
	// Section header
	[
		'core/group',
		{
			className: 'feature-cards__header',
			layout: {
				type: 'flex',
				orientation: 'vertical',
				justifyContent: 'center',
			},
		},
		[
			[
				'core/paragraph',
				{
					content: 'Why choose us',
					className: 'feature-cards__eyebrow',
					align: 'center',
				},
			],
			[
				'core/heading',
				{
					level: 2,
					content: 'Everything You Need, Nothing You Don’t',
					textAlign: 'center',
					style: { typography: { fontWeight: '800' } },
				},
			],
			[
				'core/paragraph',
				{
					content:
						'Built for real business websites — with the tools professionals actually need.',
					align: 'center',
					className: 'feature-cards__lead',
				},
			],
		],
	],

	// Cards grid
	[
		'core/group',
		{ className: 'feature-cards__grid', layout: { type: 'default' } },
		[
			card(
				'icon-fse.svg',
				'Full Site Editing',
				'Full Site Editing',
				'Complete control over headers, footers, and every template — all through the WordPress block editor without touching code.'
			),
			card(
				'icon-performance.svg',
				'Performance-First',
				'Performance-First',
				'No jQuery, no bloat. Minimal CSS and JavaScript footprint for excellent Core Web Vitals scores straight out of the box.'
			),
			card(
				'icon-patterns.svg',
				'Block Patterns',
				'Block Patterns',
				'Ready-to-use patterns for hero sections, pricing tables, team grids, testimonials, CTAs, and more. One click to insert.'
			),
			card(
				'icon-plugin.svg',
				'Custom Blocks',
				'Custom Blocks',
				'A free companion plugin adds advanced custom blocks — carousels, pricing tiers, FAQ accordions, and more.'
			),
			card(
				'icon-responsive.svg',
				'Fully Responsive',
				'Fully Responsive',
				'Every pattern and template is built mobile-first with tested breakpoints across all screen sizes from 320px to 4K.'
			),
			card(
				'icon-accessible.svg',
				'Accessible by Default',
				'Accessible by Default',
				'WCAG 2.1 AA compliant colour contrast, semantic HTML structure, and keyboard-navigable components throughout.'
			),
		],
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-feature-cards',
	} );

	return (
		<div { ...blockProps }>
			<div className="feature-cards__inner">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
