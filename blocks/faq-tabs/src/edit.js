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
	BlockControls,
	InspectorControls,
} from '@wordpress/block-editor';

import {
	PanelBody,
	ToolbarGroup,
	ToolbarButton,
	// eslint-disable-next-line @wordpress/no-unsafe-wp-apis
	__experimentalToggleGroupControl as ToggleGroupControl,
	// eslint-disable-next-line @wordpress/no-unsafe-wp-apis
	__experimentalToggleGroupControlOption as ToggleGroupControlOption,
} from '@wordpress/components';

import { useSelect, useDispatch } from '@wordpress/data';
import { useState, useEffect } from '@wordpress/element';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @param {Object}   root0               Block properties
 * @param {string}   root0.clientId      Block client ID
 * @param {Object}   root0.attributes    Block attributes
 * @param {Function} root0.setAttributes Setter for block attributes
 * @return {Element} Element to render.
 */
export default function Edit( { clientId, attributes, setAttributes } ) {
	const [ activeTab, setActiveTab ] = useState( 0 );
	const { align, displayMode } = attributes;

	const blockProps = useBlockProps( {
		className: `faq-tabs-wrapper is-display-mode-${ displayMode }`,
	} );

	const { updateBlockAttributes } = useDispatch( 'core/block-editor' );

	// Get inner blocks (FAQ tab answers)
	const { innerBlocks } = useSelect(
		( select ) => {
			const { getBlock } = select( 'core/block-editor' );
			const block = getBlock( clientId );
			return {
				innerBlocks: block?.innerBlocks || [],
			};
		},
		[ clientId ]
	);

	// Set default alignment on block insertion (mount only).
	useEffect( () => {
		if ( align === undefined ) {
			setAttributes( { align: 'wide' } );
		}
		// eslint-disable-next-line react-hooks/exhaustive-deps
	}, [] );

	// Adjust active tab if it's out of bounds
	useEffect( () => {
		if ( activeTab >= innerBlocks.length && innerBlocks.length > 0 ) {
			setActiveTab( innerBlocks.length - 1 );
		}
	}, [ innerBlocks.length, activeTab ] );

	/**
	 * Mirror the display mode onto every answer child.
	 *
	 * The children need it in their own `save()` — native mode changes their
	 * markup from a div/heading pair to `<details>`/`<summary>` — and block
	 * context is not passed to `save()`, so it has to live on each child as a
	 * real attribute. The equality check keeps this from looping: it only
	 * dispatches for children whose copy is actually stale.
	 */
	useEffect( () => {
		innerBlocks.forEach( ( block ) => {
			if ( block.attributes.displayMode !== displayMode ) {
				updateBlockAttributes( block.clientId, { displayMode } );
			}
		} );
	}, [ displayMode, innerBlocks, updateBlockAttributes ] );

	const isNative = displayMode === 'native';

	// Handle question text change
	const handleQuestionChange = ( newQuestion, blockId ) => {
		updateBlockAttributes( blockId, { question: newQuestion } );
	};

	const TEMPLATE = [
		[
			'aludra/faq-tab-answer',
			{
				question: 'What services do you offer?',
				title: 'Our Comprehensive Services',
			},
			[
				[
					'core/paragraph',
					{
						content:
							'We provide a comprehensive range of professional services tailored to meet your specific needs. Our experienced team specializes in delivering high-quality solutions that drive results and exceed expectations.',
					},
				],
				[
					'core/paragraph',
					{
						content:
							"Whether you're looking for strategic consulting, creative design, technical development, or ongoing support, we have the expertise and resources to help you succeed.",
					},
				],
			],
		],
		[
			'aludra/faq-tab-answer',
			{
				question: 'How long does a typical project take?',
				title: 'Project Timeline & Process',
			},
			[
				[
					'core/paragraph',
					{
						content:
							'Project timelines vary depending on scope and complexity, but most engagements follow a structured process designed for efficiency and quality. We typically divide projects into clear phases with defined milestones.',
					},
				],
				[
					'core/paragraph',
					{
						content:
							'During our initial consultation, we assess your requirements and provide a detailed timeline estimate. We maintain transparent communication throughout the project to ensure deadlines are met and expectations are exceeded.',
					},
				],
			],
		],
		[
			'aludra/faq-tab-answer',
			{
				question: 'What makes your approach different?',
				title: 'Our Unique Approach',
			},
			[
				[
					'core/paragraph',
					{
						content:
							'Our approach combines industry best practices with innovative thinking and personalized attention. We take the time to understand your business goals, challenges, and vision to create solutions that truly fit your needs.',
					},
				],
				[
					'core/paragraph',
					{
						content:
							'We believe in collaborative partnerships, transparent communication, and continuous improvement. This client-centered methodology ensures that every project delivers measurable value and long-term success.',
					},
				],
			],
		],
	];

	return (
		<>
			<BlockControls>
				<ToolbarGroup>
					<ToolbarButton
						icon="columns"
						label={ __( 'Tabs', 'aludra' ) }
						isPressed={ displayMode === 'tabs' }
						onClick={ () =>
							setAttributes( { displayMode: 'tabs' } )
						}
					/>
					<ToolbarButton
						icon="menu"
						label={ __( 'Accordion', 'aludra' ) }
						isPressed={ displayMode === 'accordion' }
						onClick={ () =>
							setAttributes( { displayMode: 'accordion' } )
						}
					/>
					<ToolbarButton
						icon="editor-ul"
						label={ __( 'Native details', 'aludra' ) }
						isPressed={ isNative }
						onClick={ () =>
							setAttributes( { displayMode: 'native' } )
						}
					/>
				</ToolbarGroup>
			</BlockControls>
			<InspectorControls>
				<PanelBody title={ __( 'Display', 'aludra' ) }>
					<ToggleGroupControl
						label={ __( 'Display Mode', 'aludra' ) }
						value={ displayMode }
						onChange={ ( value ) =>
							setAttributes( { displayMode: value } )
						}
						isBlock
						help={ ( () => {
							if ( isNative ) {
								return __(
									'Native <details> elements — no JavaScript, works with the browser’s own find-in-page.',
									'aludra'
								);
							}
							return displayMode === 'accordion'
								? __(
										'Single-column accordion at every breakpoint.',
										'aludra'
								  )
								: __(
										'Two-column tabs on desktop, accordion on mobile.',
										'aludra'
								  );
						} )() }
					>
						<ToggleGroupControlOption
							value="tabs"
							label={ __( 'Tabs', 'aludra' ) }
						/>
						<ToggleGroupControlOption
							value="accordion"
							label={ __( 'Accordion', 'aludra' ) }
						/>
						<ToggleGroupControlOption
							value="native"
							label={ __( 'Native', 'aludra' ) }
						/>
					</ToggleGroupControl>
				</PanelBody>
			</InspectorControls>
			{ /* Native mode has no tab column to preview — the children render
			     themselves as summaries, so the parent is just a container. */ }
			{ isNative ? (
				<div { ...blockProps }>
					<div className="faq-native">
						<InnerBlocks
							allowedBlocks={ [ 'aludra/faq-tab-answer' ] }
							template={ TEMPLATE }
							renderAppender={ () => (
								<InnerBlocks.ButtonBlockAppender />
							) }
						/>
					</div>
				</div>
			) : (
			<div { ...blockProps }>
				<div className="wp-block-columns">
					<div
						className="wp-block-column faq-questions-column"
						style={ { flexBasis: '40%' } }
					>
						<div className="faq-vertical-tabs">
							{ innerBlocks.length === 0 && (
								<p className="faq-tabs-placeholder">
									{ __(
										'Add FAQ Tab Answer blocks to get started',
										'aludra'
									) }
								</p>
							) }
							{ innerBlocks.map( ( block, index ) => (
								<div
									key={ block.clientId }
									className={ `faq-tab-item ${
										activeTab === index ? 'active' : ''
									}` }
								>
									<RichText
										tagName="div"
										className="tab-question"
										value={
											block.attributes.question || ''
										}
										onChange={ ( newQuestion ) =>
											handleQuestionChange(
												newQuestion,
												block.clientId
											)
										}
										placeholder={ __(
											'Enter question…',
											'aludra'
										) }
										onClick={ () => setActiveTab( index ) }
										allowedFormats={ [] }
									/>
									<div
										className="tab-arrow-circle"
										role="button"
										tabIndex={ 0 }
										onClick={ () => setActiveTab( index ) }
										onKeyDown={ ( event ) => {
											if (
												event.key === 'Enter' ||
												event.key === ' '
											) {
												event.preventDefault();
												setActiveTab( index );
											}
										} }
										style={ { cursor: 'pointer' } }
									>
										<svg
											width="16"
											height="16"
											viewBox="0 0 16 16"
											fill="none"
											xmlns="http://www.w3.org/2000/svg"
										>
											<path
												d="M6 4L10 8L6 12"
												stroke="currentColor"
												strokeWidth="2"
												strokeLinecap="round"
												strokeLinejoin="round"
											/>
										</svg>
									</div>
								</div>
							) ) }
						</div>
					</div>

					<div
						className="wp-block-column faq-content-column"
						style={ { flexBasis: '60%' } }
					>
						<div className="faq-content-area">
							<InnerBlocks
								allowedBlocks={ [ 'aludra/faq-tab-answer' ] }
								template={ TEMPLATE }
								renderAppender={ () => (
									<InnerBlocks.ButtonBlockAppender />
								) }
							/>
						</div>
					</div>
				</div>
			</div>
			) }
		</>
	);
}
