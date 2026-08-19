import { useBlockProps, RichText } from '@wordpress/block-editor';

import { getStatColorProps, getNumberTagName } from './colors';

export default function save( { attributes } ) {
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

	const blockProps = useBlockProps.save( {
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
		<div { ...blockProps }>
			<RichText.Content
				tagName={ NumberTagName }
				className={ numberProps.className }
				style={ numberProps.style }
				value={ number }
			/>
			<RichText.Content
				tagName="div"
				className={ captionProps.className }
				style={ captionProps.style }
				value={ caption }
			/>
		</div>
	);
}
