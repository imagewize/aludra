import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save({ className: 'wp-block-aludra-icon-grid' });

	return (
		<div {...blockProps}>
			<div className="icon-grid__inner">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
