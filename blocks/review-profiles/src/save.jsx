import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save( { className: 'wp-block-aludra-review-profiles' } );

	return (
		<div { ...blockProps }>
			<div className="review-profiles__content">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
