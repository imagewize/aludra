import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save( { className: 'wp-block-aludra-service-intro' } );

	return (
		<div { ...blockProps }>
			<div className="service-intro__inner">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
