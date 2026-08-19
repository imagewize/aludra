import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	InspectorControls,
	PanelColorSettings,
	useSettings,
	getColorObjectByColorValue,
	getColorObjectByAttributeValues,
} from '@wordpress/block-editor';
import { PanelBody, SelectControl, ToggleControl } from '@wordpress/components';

import { getStatColorProps, getNumberTagName } from './colors';
import './editor.scss';

const LEVEL_OPTIONS = [
	{ label: __( 'None (plain text)', 'aludra' ), value: 0 },
	{ label: __( 'Heading 1', 'aludra' ), value: 1 },
	{ label: __( 'Heading 2', 'aludra' ), value: 2 },
	{ label: __( 'Heading 3', 'aludra' ), value: 3 },
	{ label: __( 'Heading 4', 'aludra' ), value: 4 },
	{ label: __( 'Heading 5', 'aludra' ), value: 5 },
	{ label: __( 'Heading 6', 'aludra' ), value: 6 },
];

export default function Edit( { attributes, setAttributes } ) {
	const {
		number,
		caption,
		good,
		level,
		numberColor,
		customNumberColor,
		captionColor,
		customCaptionColor,
	} = attributes;

	const [ palette = [] ] = useSettings( 'color.palette' );

	/**
	 * Store a chosen colour as a palette slug wherever the theme has one, and
	 * only fall back to a custom value when it doesn't: a slug follows the
	 * theme and survives a style variation swapping the palette underneath it,
	 * a literal hex does not.
	 *
	 * @param {string} slugKey   Attribute holding the palette slug.
	 * @param {string} customKey Attribute holding a custom CSS colour.
	 * @return {Function} Change handler for a PanelColorSettings entry.
	 */
	const setColor = ( slugKey, customKey ) => ( value ) => {
		const preset = value
			? getColorObjectByColorValue( palette, value )
			: undefined;

		setAttributes( {
			[ slugKey ]: preset ? preset.slug : undefined,
			[ customKey ]: ! value || preset ? undefined : value,
		} );
	};

	const blockProps = useBlockProps( {
		className: `stat-rail__item${ good ? ' is-good' : '' }`,
	} );

	const NumberTagName = getNumberTagName( level );
	const numberProps = getStatColorProps(
		'stat-rail__num',
		numberColor,
		customNumberColor
	);
	const captionProps = getStatColorProps(
		'stat-rail__cap',
		captionColor,
		customCaptionColor
	);

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Stat', 'aludra' ) }>
					<ToggleControl
						__nextHasNoMarginBottom
						label={ __( 'Highlight (accent color)', 'aludra' ) }
						checked={ good }
						onChange={ ( value ) =>
							setAttributes( { good: value } )
						}
						help={ __(
							'Reserve this for the one standout stat in the rail. A number color set below overrides it.',
							'aludra'
						) }
					/>
					<SelectControl
						__nextHasNoMarginBottom
						label={ __( 'Number heading level', 'aludra' ) }
						value={ level }
						options={ LEVEL_OPTIONS }
						onChange={ ( value ) =>
							setAttributes( { level: parseInt( value, 10 ) } )
						}
						help={ __(
							'Leave this as plain text unless the rail is a real section of the page — headings appear in the document outline and in screen reader navigation.',
							'aludra'
						) }
					/>
				</PanelBody>
				<PanelColorSettings
					title={ __( 'Color', 'aludra' ) }
					initialOpen={ false }
					colorSettings={ [
						{
							label: __( 'Number', 'aludra' ),
							value: getColorObjectByAttributeValues(
								palette,
								numberColor,
								customNumberColor
							).color,
							onChange: setColor(
								'numberColor',
								'customNumberColor'
							),
						},
						{
							label: __( 'Caption', 'aludra' ),
							value: getColorObjectByAttributeValues(
								palette,
								captionColor,
								customCaptionColor
							).color,
							onChange: setColor(
								'captionColor',
								'customCaptionColor'
							),
						},
					] }
				/>
			</InspectorControls>
			<div { ...blockProps }>
				<RichText
					tagName={ NumberTagName }
					className={ numberProps.className }
					style={ numberProps.style }
					value={ number }
					onChange={ ( value ) => setAttributes( { number: value } ) }
					allowedFormats={ [] }
					placeholder={ __( '0.9s', 'aludra' ) }
				/>
				<RichText
					tagName="div"
					className={ captionProps.className }
					style={ captionProps.style }
					value={ caption }
					onChange={ ( value ) =>
						setAttributes( { caption: value } )
					}
					allowedFormats={ [] }
					placeholder={ __( 'Caption…', 'aludra' ) }
				/>
			</div>
		</>
	);
}
