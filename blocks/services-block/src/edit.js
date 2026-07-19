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
 * Build the markup for an icon image using the aludra/icon binding.
 *
 * @param {string} path Icon filename, resolved via the aludra/icon binding.
 * @param {string} alt  Accessible label for the icon image.
 * @return {Array} Block template tuple for a core/image block.
 */
function iconImage( path, alt ) {
	return [
		'core/image',
		{
			url: icons[ path ] ?? '',
			alt,
			width: 26,
			height: 26,
			sizeSlug: 'full',
			linkDestination: 'none',
			metadata: {
				bindings: {
					url: { source: 'aludra/icon', args: { path } },
				},
			},
		},
	];
}

/**
 * Build a single service card: icon badge, heading, and body text.
 *
 * @param {string} iconPath Icon filename.
 * @param {string} alt      Accessible label for the icon.
 * @param {string} title    Card heading.
 * @param {string} text     Card body copy.
 * @return {Array} Block template tuple for InnerBlocks.
 */
const serviceItem = ( iconPath, alt, title, text ) => [
	'core/group',
	{
		className: 'services-block__card',
		layout: {
			type: 'flex',
			orientation: 'horizontal',
			verticalAlignment: 'top',
			flexWrap: 'nowrap',
		},
	},
	[
		[
			'core/group',
			{
				className: 'services-block__icon',
				layout: {
					type: 'flex',
					justifyContent: 'center',
					verticalAlignment: 'center',
				},
			},
			[ iconImage( iconPath, alt ) ],
		],
		[
			'core/group',
			{
				className: 'services-block__content',
				layout: { type: 'flex', orientation: 'vertical' },
			},
			[
				[
					'core/heading',
					{
						level: 3,
						content: title,
						style: { typography: { fontWeight: '600' } },
					},
				],
				[ 'core/paragraph', { content: text } ],
			],
		],
	],
];

const TEMPLATE = [
	[
		'core/group',
		{
			className: 'services-block__header',
			layout: {
				type: 'flex',
				orientation: 'vertical',
				justifyContent: 'center',
			},
		},
		[
			[
				'core/heading',
				{
					level: 2,
					content: 'Our Services',
					textAlign: 'center',
					style: { typography: { fontWeight: '700' } },
				},
			],
			[
				'core/paragraph',
				{
					content:
						'A quick look at what we do and how it helps your business grow.',
					align: 'center',
					className: 'services-block__lead',
				},
			],
		],
	],
	[
		'core/group',
		{ className: 'services-block__grid', layout: { type: 'default' } },
		[
			serviceItem(
				'icon-performance.svg',
				'Performance icon',
				'Performance Optimization',
				'Faster load times through image optimization, caching, and render-blocking fixes.'
			),
			serviceItem(
				'icon-shield.svg',
				'Security icon',
				'Security & Maintenance',
				'Ongoing updates, monitoring, and hardening to keep your site safe and reliable.'
			),
			serviceItem(
				'icon-code.svg',
				'Code icon',
				'Custom Development',
				'Bespoke features and integrations built to match the way your business works.'
			),
			serviceItem(
				'icon-chat.svg',
				'Chat icon',
				'Ongoing Support',
				'Friendly, responsive help whenever you need a hand with your site.'
			),
		],
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-services-block',
	} );

	return (
		<div { ...blockProps }>
			<div className="services-block__inner">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
