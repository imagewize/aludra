/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */
export default function save( { attributes } ) {
	const { displayMode } = attributes;

	/**
	 * Native mode drops the whole two-column scaffold: no tab-navigation
	 * column to populate, so no `.faq-vertical-tabs` and no columns wrapper.
	 * Each child saves itself as a `<details>` element, which needs no
	 * JavaScript at all — `view.js` bails out for this mode.
	 */
	if ( displayMode === 'native' ) {
		return (
			<div
				{ ...useBlockProps.save( {
					className: `faq-tabs-wrapper is-display-mode-${ displayMode }`,
					'data-display-mode': displayMode,
				} ) }
			>
				<div className="faq-native">
					<InnerBlocks.Content />
				</div>
			</div>
		);
	}

	return (
		<div
			{ ...useBlockProps.save( {
				className: `faq-tabs-wrapper is-display-mode-${ displayMode }`,
				'data-display-mode': displayMode,
			} ) }
		>
			<div className="wp-block-columns">
				<div
					className="wp-block-column faq-questions-column"
					style={ { flexBasis: '40%' } }
				>
					<div className="faq-vertical-tabs"></div>
				</div>

				<div
					className="wp-block-column faq-content-column"
					style={ { flexBasis: '60%' } }
				>
					<div className="faq-content-area">
						<InnerBlocks.Content />
					</div>
				</div>
			</div>
		</div>
	);
}
