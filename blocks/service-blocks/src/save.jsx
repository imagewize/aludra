import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save( { className: 'wp-block-aludra-service-blocks' } );

	return (
		<div { ...blockProps }>
			<div className="service-blocks__inner">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
