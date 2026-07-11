import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

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
 * Save function that defines output on the frontend
 *
 * @param {Object} props            Block properties
 * @param {Object} props.attributes Block attributes
 * @return {Element} Element to render.
 */
export default function Save( { attributes } ) {
	const { colorVariant } = attributes;

	const blockProps = useBlockProps.save( {
		className: `cta-columns ${ getBackgroundClass( colorVariant ) }`.trim(),
	} );

	return (
		<div { ...blockProps }>
			<InnerBlocks.Content />
		</div>
	);
}
