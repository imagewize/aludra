import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save( { className: 'wp-block-aludra-photo-grid' } );

	return (
		<div { ...blockProps }>
			<div className="photo-grid__content">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
