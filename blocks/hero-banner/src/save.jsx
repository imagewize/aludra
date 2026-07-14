import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save( { className: 'wp-block-aludra-hero-banner' } );

	return (
		<div { ...blockProps }>
			<div className="hero-banner__content">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
