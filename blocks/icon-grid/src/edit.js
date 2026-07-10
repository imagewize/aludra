import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

/**
 * Icon URLs are resolved at render time via the aludra/icon block binding
 * (registered in aludra.php). window.aludraIcons provides the editor-time URLs.
 */
const icons = window.aludraIcons ?? {};

/**
 * Item definitions: icon filename (resolved via aludra/icon), alt text, and body copy.
 */
const ITEMS = [
	{
		path: 'icon-link.svg',
		alt: 'Link icon',
		text: 'Fast, reliable performance built on a modern foundation',
	},
	{
		path: 'icon-copy.svg',
		alt: 'Copy icon',
		text: 'Reusable content blocks and patterns for every page',
	},
	{
		path: 'icon-x-circle.svg',
		alt: 'Check icon',
		text: 'No broken links, no dead ends — everything just works',
	},
	{
		path: 'icon-list.svg',
		alt: 'List icon',
		text: 'Clear structure with well-organised, scannable content',
	},
	{
		path: 'icon-bar-chart.svg',
		alt: 'Chart icon',
		text: 'Measurable results you can track and improve over time',
	},
	{
		path: 'icon-code.svg',
		alt: 'Code icon',
		text: 'Clean, standards-based markup that ages gracefully',
	},
	{
		path: 'icon-map.svg',
		alt: 'Map icon',
		text: 'Discoverable by search engines and easy to navigate',
	},
	{
		path: 'icon-chat.svg',
		alt: 'Chat icon',
		text: 'Friendly support and clear communication throughout',
	},
];

const iconImage = ( path, alt ) => [
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

const TEMPLATE = [
	[
		'core/paragraph',
		{ className: 'icon-grid__label', content: 'How it works' },
	],
	[
		'core/heading',
		{
			level: 2,
			className: 'icon-grid__title',
			content: 'Everything You Need',
		},
	],
	[
		'core/paragraph',
		{
			className: 'icon-grid__lead',
			content:
				'A clear, prioritised overview of what’s included — organised so you always know what you’re getting.',
		},
	],
	[
		'core/group',
		{ className: 'icon-grid__grid' },
		ITEMS.map( ( { path, alt, text } ) => [
			'core/group',
			{ className: 'icon-grid__item' },
			[
				[
					'core/group',
					{ className: 'icon-grid__icon' },
					[ iconImage( path, alt ) ],
				],
				[
					'core/paragraph',
					{ className: 'icon-grid__text', content: text },
				],
			],
		] ),
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-icon-grid',
	} );

	return (
		<div { ...blockProps }>
			<div className="icon-grid__inner">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
