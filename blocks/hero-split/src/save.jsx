import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save( { className: 'wp-block-aludra-hero-split' } );

	return (
		<div { ...blockProps }>
			<div className="hero-split__inner">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
