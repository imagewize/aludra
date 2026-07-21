/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import {
	useBlockProps,
	InnerBlocks,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';

import { PanelBody, TextControl, ToggleControl } from '@wordpress/components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 * @param {Object}   props               Block properties
 * @param {Object}   props.attributes    Block attributes
 * @param {Function} props.setAttributes Setter for block attributes
 * @return {Element} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { question, title, displayMode, openByDefault } = attributes;

	// Kept in sync by the parent faq-tabs block; see its edit.js.
	const isNative = displayMode === 'native';

	const blockProps = useBlockProps( {
		className: 'faq-tab-answer-editor',
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Tab Settings', 'aludra' ) }>
					<TextControl
						label={ __( 'Question Text', 'aludra' ) }
						value={ question }
						onChange={ ( value ) =>
							setAttributes( { question: value } )
						}
						help={
							isNative
								? __(
										'The question shown in the summary line',
										'aludra'
								  )
								: __(
										'The question shown in the tab navigation',
										'aludra'
								  )
						}
					/>
					{ isNative && (
						<ToggleControl
							label={ __( 'Open by default', 'aludra' ) }
							help={ __(
								'Renders this entry expanded on page load. Usually reserved for the first question.',
								'aludra'
							) }
							checked={ openByDefault }
							onChange={ ( value ) =>
								setAttributes( { openByDefault: value } )
							}
						/>
					) }
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				{ /* Native mode has one label per entry and it is the
				     question, so the separate answer title is not shown. */ }
				{ ! isNative && (
					<div className="faq-answer-header">
						<RichText
							tagName="h3"
							className="faq-answer-title"
							value={ title }
							onChange={ ( value ) =>
								setAttributes( { title: value } )
							}
							placeholder={ __(
								'Enter answer title…',
								'aludra'
							) }
						/>
					</div>
				) }
				{ isNative && (
					<div className="faq-answer-header">
						<RichText
							tagName="div"
							className="faq-answer-summary"
							value={ question }
							onChange={ ( value ) =>
								setAttributes( { question: value } )
							}
							allowedFormats={ [] }
							placeholder={ __( 'Enter question…', 'aludra' ) }
						/>
					</div>
				) }
				<div className="faq-answer-content">
					<InnerBlocks
						template={ [
							[
								'core/paragraph',
								{
									content: __(
										'We provide a comprehensive range of professional services tailored to meet your specific needs. Our experienced team specializes in delivering high-quality solutions that drive results and exceed expectations.',
										'aludra'
									),
								},
							],
							[
								'core/paragraph',
								{
									content: __(
										"Whether you're looking for strategic consulting, creative design, technical development, or ongoing support, we have the expertise and resources to help you succeed.",
										'aludra'
									),
								},
							],
						] }
					/>
				</div>
			</div>
		</>
	);
}
