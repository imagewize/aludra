import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	const blockProps = useBlockProps.save( { className: 'wp-block-aludra-about' } );

	return (
		<div { ...blockProps }>
			<div className="about-section__content">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
