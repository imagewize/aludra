import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, SelectControl, ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import './editor.scss';

/**
 * Block template structure - Simplified to just CTA cards
 */
const TEMPLATE = [
	// Optional section heading
	[
		'core/heading',
		{
			level: 2,
			content: 'Ready to Speed Up Your WordPress Site?',
			className: 'cta-columns__heading',
			textAlign: 'center',
			style: {
				typography: {
					fontSize: 'var(--wp--preset--font-size--2-xl)',
					fontWeight: '600',
					lineHeight: '1.3',
				},
				spacing: {
					margin: {
						bottom: '1.5rem',
					},
				},
			},
			textColor: 'main',
			fontFamily: 'montserrat',
		},
	],

	// Optional description paragraph
	[
		'core/paragraph',
		{
			content: 'Choose the option that works best for you.',
			className: 'cta-columns__description',
			align: 'center',
			style: {
				typography: {
					fontSize: 'var(--wp--preset--font-size--lg)',
					lineHeight: '1.7',
				},
				spacing: {
					margin: {
						bottom: '2rem',
					},
				},
			},
			textColor: 'secondary',
			fontFamily: 'open-sans',
		},
	],

	// CTA columns (2 columns with differentiated card styles)
	[
		'core/columns',
		{
			className: 'cta-columns__cards',
			style: {
				spacing: {
					blockGap: '2rem',
				},
			},
		},
		[
			// Column 1 - Dark blue card with bright accent button
			[
				'core/column',
				{
					backgroundColor: 'primary',
					style: {
						border: {
							radius: '0.5rem',
						},
						spacing: {
							padding: {
								top: '3rem',
								right: '2.75rem',
								bottom: '3rem',
								left: '2.75rem',
							},
						},
					},
				},
				[
					[
						'core/heading',
						{
							level: 3,
							content: 'Get Your Free Speed Audit',
							textAlign: 'center',
							style: {
								typography: {
									fontSize:
										'var(--wp--preset--font-size--3-xl)',
									fontWeight: '700',
									lineHeight: '1.2',
								},
								spacing: {
									margin: {
										bottom: '1.5rem',
									},
								},
							},
							textColor: 'base',
							fontFamily: 'montserrat',
						},
					],
					[
						'core/paragraph',
						{
							content:
								'Find out exactly how fast your site could be. No cost, no obligation',
							align: 'center',
							style: {
								typography: {
									fontSize:
										'var(--wp--preset--font-size--lg)',
									lineHeight: '1.7',
								},
								spacing: {
									margin: {
										bottom: '2rem',
									},
								},
							},
							textColor: 'base',
							fontFamily: 'open-sans',
						},
					],
					[
						'core/buttons',
						{
							className:
								'cta-columns__buttons cta-columns__buttons--accent',
							layout: {
								type: 'flex',
								justifyContent: 'center',
							},
						},
						[
							[
								'core/button',
								{
									text: 'Get Free Audit',
									url: '#',
									backgroundColor: 'primary-accent',
									textColor: 'main',
									className:
										'is-style-fill cta-columns__button--large',
									style: {
										border: {
											radius: '0.5rem',
										},
										typography: {
											fontSize:
												'var(--wp--preset--font-size--lg)',
											fontWeight: '600',
										},
										spacing: {
											padding: {
												top: '1rem',
												right: '2rem',
												bottom: '1rem',
												left: '2rem',
											},
										},
									},
								},
							],
						],
					],
				],
			],

			// Column 2 - Light background card with dark button
			[
				'core/column',
				{
					backgroundColor: 'base',
					style: {
						border: {
							radius: '0.5rem',
						},
						spacing: {
							padding: {
								top: '3rem',
								right: '2.75rem',
								bottom: '3rem',
								left: '2.75rem',
							},
						},
					},
				},
				[
					[
						'core/heading',
						{
							level: 3,
							content: 'Talk to a Speed Expert',
							textAlign: 'center',
							style: {
								typography: {
									fontSize:
										'var(--wp--preset--font-size--3-xl)',
									fontWeight: '700',
									lineHeight: '1.2',
								},
								spacing: {
									margin: {
										bottom: '1.5rem',
									},
								},
							},
							textColor: 'main',
							fontFamily: 'montserrat',
						},
					],
					[
						'core/paragraph',
						{
							content:
								"Discuss your site's performance with our technical team",
							align: 'center',
							style: {
								typography: {
									fontSize:
										'var(--wp--preset--font-size--lg)',
									lineHeight: '1.7',
								},
								spacing: {
									margin: {
										bottom: '2rem',
									},
								},
							},
							textColor: 'secondary',
							fontFamily: 'open-sans',
						},
					],
					[
						'core/buttons',
						{
							className:
								'cta-columns__buttons cta-columns__buttons--dark',
							layout: {
								type: 'flex',
								justifyContent: 'center',
							},
						},
						[
							[
								'core/button',
								{
									text: 'Schedule Call',
									url: '#',
									backgroundColor: 'primary',
									textColor: 'base',
									className:
										'is-style-fill cta-columns__button--large',
									style: {
										border: {
											radius: '0.5rem',
										},
										typography: {
											fontSize:
												'var(--wp--preset--font-size--lg)',
											fontWeight: '600',
										},
										spacing: {
											padding: {
												top: '1rem',
												right: '2rem',
												bottom: '1rem',
												left: '2rem',
											},
										},
									},
								},
							],
						],
					],
				],
			],
		],
	],
];

/**
 * Determine background color class based on variant.
 *
 * @param {string} colorVariant Selected color variant.
 * @return {string} Background class name, or an empty string for the default variant.
 */
function getBackgroundClass( colorVariant ) {
	switch ( colorVariant ) {
		case 'light-gray':
			return 'has-tertiary-background-color';
		case 'light-blue':
			return 'has-primary-accent-background-color';
		case 'dark':
			return 'has-main-background-color';
		default:
			return '';
	}
}

/**
 * Edit function that renders in the admin
 *
 * @param {Object}   props               Block properties
 * @param {Object}   props.attributes    Block attributes
 * @param {Function} props.setAttributes Setter for block attributes
 * @return {Element} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { colorVariant, revealOnScroll } = attributes;

	const blockProps = useBlockProps( {
		className: `cta-columns ${ getBackgroundClass( colorVariant ) }`.trim(),
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Appearance Settings', 'aludra' ) }>
					<SelectControl
						label={ __( 'Section Background Color', 'aludra' ) }
						value={ colorVariant }
						options={ [
							{
								label: __(
									'Default (White/Transparent)',
									'aludra'
								),
								value: 'default',
							},
							{
								label: __( 'Light Gray', 'aludra' ),
								value: 'light-gray',
							},
							{
								label: __( 'Light Blue', 'aludra' ),
								value: 'light-blue',
							},
							{ label: __( 'Dark', 'aludra' ), value: 'dark' },
						] }
						onChange={ ( value ) =>
							setAttributes( { colorVariant: value } )
						}
						help={ __(
							'Choose the background color for the entire CTA section (cards remain dark blue)',
							'aludra'
						) }
					/>
					<ToggleControl
						label={ __( 'Reveal on scroll', 'aludra' ) }
						checked={ !! revealOnScroll }
						onChange={ ( value ) =>
							setAttributes( { revealOnScroll: value } )
						}
						help={ __(
							'Fade and slide the section into view as it enters the viewport.',
							'aludra'
						) }
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				<InnerBlocks template={ TEMPLATE } templateLock={ false } />
			</div>
		</>
	);
}
