<?php
/**
 * Server-side render for the Instagram Embed block.
 *
 * Rendered in PHP rather than emitted from save(): the placeholder is the only
 * control a visitor ever sees, and strings baked into post_content by a static
 * save() have no translation path at all. Everything from instagram.com still
 * loads only after a click — view.js injects the iframe.
 *
 * @package Aludra
 *
 * @var array $attributes Block attributes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$aludra_ig_username = isset( $attributes['username'] ) ? trim( (string) $attributes['username'] ) : '';
$aludra_ig_height   = isset( $attributes['height'] ) ? (int) $attributes['height'] : 600;
$aludra_ig_profile  = $aludra_ig_username
	? 'https://www.instagram.com/' . rawurlencode( $aludra_ig_username ) . '/'
	: '';
?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes() ); ?>>
	<div
		class="instagram-embed__frame"
		data-username="<?php echo esc_attr( $aludra_ig_username ); ?>"
		data-height="<?php echo esc_attr( (string) $aludra_ig_height ); ?>"
	>
		<div class="instagram-embed__placeholder">
			<button
				type="button"
				class="instagram-embed__load-btn"
				<?php disabled( '', $aludra_ig_username ); ?>
			>
				<?php esc_html_e( 'Load Instagram feed', 'aludra' ); ?>
			</button>
			<p class="instagram-embed__hint">
				<?php
				if ( $aludra_ig_username ) {
					printf(
						/* translators: %s: Instagram handle, without the leading @. */
						esc_html__( 'Loads content from instagram.com — @%s', 'aludra' ),
						esc_html( $aludra_ig_username )
					);
				} else {
					esc_html_e( 'Loads content from instagram.com', 'aludra' );
				}
				?>
			</p>
		</div>
		<?php if ( $aludra_ig_profile ) : ?>
			<?php
			// Kept out of the placeholder so view.js can leave it standing once
			// the iframe is in: instagram.com refuses the frame for private or
			// mistyped accounts, and an embed that silently fails would
			// otherwise leave the visitor an empty box with no way out.
			?>
			<p class="instagram-embed__fallback" hidden>
				<a href="<?php echo esc_url( $aludra_ig_profile ); ?>" rel="noopener">
					<?php
					printf(
						/* translators: %s: Instagram handle, without the leading @. */
						esc_html__( 'View @%s on Instagram', 'aludra' ),
						esc_html( $aludra_ig_username )
					);
					?>
				</a>
			</p>
			<noscript>
				<a href="<?php echo esc_url( $aludra_ig_profile ); ?>" rel="noopener">
					<?php
					printf(
						/* translators: %s: Instagram handle, without the leading @. */
						esc_html__( 'View @%s on Instagram', 'aludra' ),
						esc_html( $aludra_ig_username )
					);
					?>
				</a>
			</noscript>
		<?php endif; ?>
	</div>
</div>
