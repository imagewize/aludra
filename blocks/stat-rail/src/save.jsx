import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save() {
	const blockProps = useBlockProps.save( {
		className: 'wp-block-aludra-stat-rail',
	} );

	return (
		<div { ...blockProps }>
			<div className="stat-rail__shell">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
