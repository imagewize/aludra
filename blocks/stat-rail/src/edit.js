import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import './editor.scss';

const ALLOWED_BLOCKS = [ 'aludra/stat-item' ];

const TEMPLATE = [
	[
		'aludra/stat-item',
		{ number: '0.9s', caption: 'Median LCP after rebuild', good: true },
	],
	[
		'aludra/stat-item',
		{ number: '-71%', caption: 'Page weight, typical build' },
	],
	[
		'aludra/stat-item',
		{ number: '1 day', caption: 'Reply time on every enquiry' },
	],
];

export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-stat-rail',
	} );

	return (
		<div { ...blockProps }>
			<div className="stat-rail__shell">
				<InnerBlocks
					allowedBlocks={ ALLOWED_BLOCKS }
					template={ TEMPLATE }
					templateLock={ false }
					orientation="horizontal"
					renderAppender={ InnerBlocks.ButtonBlockAppender }
				/>
			</div>
		</div>
	);
}
