import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

/**
 * Icon URLs are resolved at render time via the aludra/icon block binding
 * (registered in aludra.php). window.aludraIcons provides the editor-time URLs.
 */
const icons = window.aludraIcons ?? {};

const iconImage = ( path ) => [
	'core/image',
	{
		url: icons[ path ] ?? '',
		alt: '',
		sizeSlug: 'full',
		linkDestination: 'none',
		metadata: {
			bindings: {
				url: { source: 'aludra/icon', args: { path } },
			},
		},
	},
];

/**
 * Trust-signal items: bound SVG icon + short label.
 */
const ITEMS = [
	{ icon: 'icon-shield.svg', text: 'Secure &amp; reliable' },
	{ icon: 'icon-code.svg', text: 'Developer-first approach' },
	{ icon: 'icon-users.svg', text: 'Trusted across Europe' },
	{ icon: 'icon-clock.svg', text: 'Fast turnaround' },
];

const TEMPLATE = [
	[
		'core/group',
		{
			className: 'trust-bar__items',
			layout: {
				type: 'flex',
				flexWrap: 'wrap',
				alignItems: 'center',
				justifyContent: 'center',
			},
			style: { spacing: { blockGap: '32px' } },
		},
		ITEMS.map( ( { icon, text } ) => [
			'core/group',
			{
				className: 'trust-item',
				layout: {
					type: 'flex',
					alignItems: 'center',
					flexWrap: 'nowrap',
				},
				style: { spacing: { blockGap: '8px' } },
			},
			[ iconImage( icon ), [ 'core/paragraph', { content: text } ] ],
		] ),
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-trust-bar',
	} );

	return (
		<div { ...blockProps }>
			<div className="trust-bar__inner">
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</div>
	);
}
