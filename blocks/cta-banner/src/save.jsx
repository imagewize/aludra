import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save( { className: 'wp-block-aludra-cta-banner' } );

	return (
		<div { ...blockProps }>
			<div className="cta-banner__content">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
