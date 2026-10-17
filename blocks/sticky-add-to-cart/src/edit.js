import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Edit component.
 *
 * The bar is fixed to the viewport on the frontend, so the editor shows an
 * in-flow preview instead of pinning it over the canvas.
 */
export default function Edit() {
	const blockProps = useBlockProps( {
		className: 'aludra-sticky-cart aludra-sticky-cart--preview',
	} );

	return (
		<div { ...blockProps }>
			<div className="aludra-sticky-cart__inner">
				<p className="aludra-sticky-cart__title">
					{ __( 'Product name', 'aludra' ) }
				</p>
				<span className="aludra-sticky-cart__price">$0.00</span>
				<span className="wp-element-button aludra-sticky-cart__button">
					{ __( 'Add to cart', 'aludra' ) }
				</span>
			</div>
			<p className="aludra-sticky-cart__note">
				{ __(
					'Shown at the bottom of the screen once the add to cart form scrolls out of view.',
					'aludra'
				) }
			</p>
		</div>
	);
}
