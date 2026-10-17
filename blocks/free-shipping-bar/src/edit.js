import { __, sprintf } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, NumberControl } from '@wordpress/components';

/**
 * Edit component.
 *
 * A static preview: the live amount depends on the visitor's shipping zone and
 * cart, which the editor has neither of.
 *
 * @param {Object}   root0               Block props.
 * @param {Object}   root0.attributes    Block attributes.
 * @param {Function} root0.setAttributes Attribute setter.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { threshold } = attributes;
	const blockProps = useBlockProps( {
		className: 'aludra-free-shipping-bar',
	} );

	const message = threshold
		? sprintf(
				/* translators: %s: order total needed for free shipping. */
				__( 'Free shipping on orders over %s', 'aludra' ),
				threshold
		  )
		: __(
				'Free shipping progress (amount set by your shipping zone)',
				'aludra'
		  );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Free shipping', 'aludra' ) }>
					<NumberControl
						label={ __( 'Threshold override', 'aludra' ) }
						help={ __(
							"Leave at 0 to use the minimum order amount of the free shipping method in the visitor's shipping zone.",
							'aludra'
						) }
						min={ 0 }
						value={ threshold }
						onChange={ ( value ) =>
							setAttributes( {
								threshold: parseFloat( value ) || 0,
							} )
						}
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps }>
				<p className="aludra-free-shipping-bar__text">{ message }</p>
				<div
					className="aludra-free-shipping-bar__track"
					aria-hidden="true"
				>
					<div
						className="aludra-free-shipping-bar__fill"
						style={ { width: '35%' } }
					/>
				</div>
			</div>
		</>
	);
}
