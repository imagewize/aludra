import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

/**
 * Service Blocks InnerBlocks template.
 *
 * Structure:
 *  - Eyebrow paragraph     → section label
 *  - H2 heading            → section title
 *  - Lead paragraph        → section lead text
 *  - Service list group    → vertical stack of service cards
 *    - 3 × service card group
 *      - Header group      → number + service title (h3)
 *      - Body group        → description paragraph + checklist
 */

const SERVICES = [
	{
		num: '01',
		title: 'Discovery & Planning',
		description:
			'We start by understanding your goals and constraints, so every recommendation is grounded in what actually matters for your business.',
		items: [
			'Requirements gathering focused on real business outcomes',
			'Technical audit of your current setup',
			'Clear scope and timeline before any work begins',
			'Prioritized roadmap based on impact and effort',
		],
	},
	{
		num: '02',
		title: 'Implementation',
		description:
			'This is where hands-on expertise matters most. We build and configure the solution ourselves, rather than outsourcing to generic templates.',
		items: [
			'Custom development matched to your exact requirements',
			'Integration with your existing tools and workflows',
			'Testing across devices and real-world conditions',
			'Documentation so your team can maintain what we build',
		],
	},
	{
		num: '03',
		title: 'Ongoing Support',
		description:
			'Launch is the beginning, not the end. We stay involved to keep things running smoothly as your needs change.',
		items: [
			'Regular maintenance and monitoring',
			'Fast response when something needs attention',
			'Periodic reviews to catch issues before they grow',
		],
	},
];

const TEMPLATE = [
	[
		'core/paragraph',
		{
			className: 'service-blocks__label',
			content: 'What We Offer',
		},
	],
	[
		'core/heading',
		{
			level: 2,
			className: 'service-blocks__title',
			content: 'Our Service Approach',
		},
	],
	[
		'core/paragraph',
		{
			className: 'service-blocks__lead',
			content:
				'Three areas where we make the biggest difference for your business.',
		},
	],
	[
		'core/group',
		{ className: 'service-blocks__list' },
		SERVICES.map( ( { num, title, description, items } ) => [
			'core/group',
			{ className: 'service-block' },
			[
				[
					'core/group',
					{ className: 'service-block__header' },
					[
						[
							'core/paragraph',
							{
								className: 'service-block__num',
								content: num,
							},
						],
						[
							'core/heading',
							{
								level: 3,
								className: 'service-block__title',
								content: title,
							},
						],
					],
				],
				[
					'core/group',
					{ className: 'service-block__body' },
					[
						[
							'core/paragraph',
							{
								className: 'service-block__desc',
								content: description,
							},
						],
						[
							'core/list',
							{
								className: 'service-block__checklist',
								ordered: false,
								values: items
									.map( ( item ) => `<li>${ item }</li>` )
									.join( '' ),
							},
						],
					],
				],
			],
		] ),
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-service-blocks',
	} );

	return (
		<div { ...blockProps }>
			<div className="service-blocks__inner">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
