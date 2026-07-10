import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save({ className: 'wp-block-aludra-trust-bar' });

	return (
		<div {...blockProps}>
			<div className="trust-bar__inner">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
