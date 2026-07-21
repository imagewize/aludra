/**
 * React hook that is used to mark the block wrapper element.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @param {Object} props Block properties
 * @return {Element} Element to render.
 */
export default function save({ attributes }) {
	const { question, title, displayMode, openByDefault } = attributes;

	const blockProps = useBlockProps.save({
		className: 'faq-tab-answer',
		'data-question': question,
	});

	/**
	 * Native mode renders a real `<details>`/`<summary>` pair — open/close is
	 * the browser's job, so this markup carries no JS and no ARIA plumbing.
	 *
	 * `displayMode` is duplicated onto this child rather than read from the
	 * parent through block context because context is not available inside
	 * `save()`; the parent's `edit.js` keeps the copy in sync whenever its own
	 * mode changes.
	 *
	 * The summary shows `question`, not `title`: in tabs/accordion mode the
	 * question labels the tab and the title heads the answer pane, but a
	 * `<details>` has only one label, and it is the question the reader is
	 * scanning for.
	 */
	if (displayMode === 'native') {
		return (
			<details {...blockProps} open={openByDefault || undefined}>
				<summary>{question}</summary>
				<div className="faq-answer-content">
					<InnerBlocks.Content />
				</div>
			</details>
		);
	}

	return (
		<div {...blockProps}>
			<div className="faq-answer-header">
				<RichText.Content tagName="h3" className="faq-answer-title" value={title} />
			</div>
			<div className="faq-answer-content">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
