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
 * Build a detail item with icon, label, and value.
 *
 * @param {string} iconPath Icon filename.
 * @param {string} iconAlt  Accessible label for the icon.
 * @param {string} label    Detail label.
 * @param {string} value    Detail value.
 * @return {Array} Block template tuple for a detail item group.
 */
function detailItem( iconPath, iconAlt, label, value ) {
	return [
		'core/group',
		{
			className: 'cs-detail',
			layout: {
				type: 'flex',
				orientation: 'horizontal',
				flexWrap: 'nowrap',
				verticalAlignment: 'top',
			},
		},
		[
			[
				'core/group',
				{
					className: 'cs-detail__icon',
					layout: {
						type: 'flex',
						justifyContent: 'center',
						verticalAlignment: 'center',
					},
				},
				[ iconImage( iconPath, iconAlt ) ],
			],
			[
				'core/group',
				{
					className: 'cs-detail__body',
					layout: { type: 'constrained' },
					style: { spacing: { blockGap: '4px' } },
				},
				[
					[
						'core/paragraph',
						{ className: 'cs-detail__label', content: label },
					],
					[
						'core/paragraph',
						{ className: 'cs-detail__value', content: value },
					],
				],
			],
		],
	];
}

const TEMPLATE = [
	// ─── INTRO ────────────────────────────────────────────────────────────
	[
		'core/group',
		{
			className: 'contact-section__intro',
			layout: { type: 'constrained' },
			style: { spacing: { blockGap: '16px' } },
		},
		[
			[
				'core/paragraph',
				{ className: 'contact-section__label', content: 'Contact us' },
			],
			[
				'core/heading',
				{
					level: 2,
					className: 'contact-section__heading',
					content:
						"Let's build something <em>fast &amp; scalable.</em>",
				},
			],
			[
				'core/paragraph',
				{
					className: 'contact-section__sub',
					content:
						"Whether you need a powerful WordPress site, WooCommerce store, speed optimisation, or ongoing maintenance — we're here to help.",
				},
			],
		],
	],

	// ─── TWO-COLUMN GRID ─────────────────────────────────────────────────
	[
		'core/group',
		{
			className: 'contact-section__grid',
			layout: {
				type: 'flex',
				orientation: 'horizontal',
				flexWrap: 'nowrap',
				verticalAlignment: 'top',
			},
		},
		[
			// LEFT: contact info
			[
				'core/group',
				{
					className: 'contact-section__info',
					layout: { type: 'constrained' },
					style: { spacing: { blockGap: '16px' } },
				},
				[
					[
						'core/heading',
						{
							level: 3,
							className: 'contact-section__info-heading',
							content: 'Talk to an expert,<br>not a salesperson.',
						},
					],
					[
						'core/paragraph',
						{
							className: 'contact-section__info-text',
							content:
								'Send us a message and one of our specialists will get back to you within one business day.',
						},
					],
					// Detail items with theme-icon SVGs
					[
						'core/group',
						{
							className: 'contact-section__details',
							layout: { type: 'flex', orientation: 'vertical' },
							style: { spacing: { blockGap: '20px' } },
						},
						[
							detailItem(
								'icon-mail.svg',
								'Email',
								'Email',
								'hello@example.com'
							),
							detailItem(
								'icon-clock.svg',
								'Response time',
								'Response time',
								'Within 1 business day'
							),
							detailItem(
								'icon-map.svg',
								'Location',
								'Based in',
								'Your city or region'
							),
						],
					],
					// "Available for new projects" badge — dot rendered via CSS ::before
					[
						'core/group',
						{
							className: 'cs-badge',
							layout: {
								type: 'flex',
								orientation: 'horizontal',
								flexWrap: 'nowrap',
								verticalAlignment: 'center',
							},
						},
						[
							[
								'core/paragraph',
								{
									className: 'cs-badge__text',
									content: 'Available for new projects',
								},
							],
						],
					],
				],
			],

			// RIGHT: CF7 form card
			[
				'core/group',
				{
					className: 'contact-section__card',
					layout: { type: 'constrained' },
				},
				[
					[
						'core/shortcode',
						{
							text: '[contact-form-7 id="FORM_ID" title="Contact form 1"]',
						},
					],
				],
			],
		],
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-contact-section',
	} );

	return (
		<div { ...blockProps }>
			<div className="contact-section__inner">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
