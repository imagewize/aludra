import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save( { className: 'wp-block-aludra-services-block' } );

	return (
		<div { ...blockProps }>
			<div className="services-block__inner">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
