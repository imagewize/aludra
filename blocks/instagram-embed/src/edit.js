import { __, sprintf } from '@wordpress/i18n';
import { useState } from '@wordpress/element';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	TextControl,
	RangeControl,
	Placeholder,
	Button,
} from '@wordpress/components';

import './editor.scss';

/**
 * Build the profile embed URL.
 *
 * Kept in sync with view.js, which encodes the handle the same way — an
 * unencoded handle here would make the editor preview resolve to a different
 * URL than the frontend for anything containing `?`, `#` or `/`.
 *
 * @param {string} username Instagram username, without the leading @.
 * @return {string} Embed URL.
 */
function embedUrl( username ) {
	return `https://www.instagram.com/${ encodeURIComponent(
		username
	) }/embed`;
}

/**
 * Edit component.
 *
 * Mirrors the frontend's click-to-load gate rather than embedding a live
 * iframe by default — so what an editor sees while authoring matches what a
 * visitor gets, and the block doesn't fire a request to instagram.com just
 * because a page is open in the editor.
 *
 * @param {Object}   root0               Block props.
 * @param {Object}   root0.attributes    Block attributes.
 * @param {Function} root0.setAttributes Attribute setter.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { username, height } = attributes;
	const [ previewLoaded, setPreviewLoaded ] = useState( false );
	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-instagram-embed',
	} );

	// Named branches rather than a ternary chain: three distinct states, and
	// the editor mirrors the frontend's click-to-load gate for the last two.
	let preview;

	if ( ! username ) {
		preview = (
			<Placeholder
				icon="instagram"
				label={ __( 'Instagram Embed', 'aludra' ) }
				instructions={ __(
					'Enter a public Instagram username in the block settings to preview the feed.',
					'aludra'
				) }
			/>
		);
	} else if ( ! previewLoaded ) {
		preview = (
			<div className="instagram-embed__placeholder">
				<Button
					variant="secondary"
					onClick={ () => setPreviewLoaded( true ) }
				>
					{ __( 'Load Instagram feed', 'aludra' ) }
				</Button>
				<p className="instagram-embed__hint">
					{ sprintf(
						/* translators: %s: Instagram handle, without the leading @. */
						__(
							'Loads content from instagram.com — @%s',
							'aludra'
						),
						username
					) }
				</p>
			</div>
		);
	} else {
		preview = (
			// `allowtransparency` is omitted here: React rejects it as an unknown
			// DOM property, and it is a no-op in every current browser (view.js
			// still sets it on the frontend iframe, harmlessly).
			<div className="instagram-embed__frame">
				<iframe
					src={ embedUrl( username ) }
					width="100%"
					height={ height }
					frameBorder="0"
					scrolling="no"
					title={ __( 'Instagram feed preview', 'aludra' ) }
				/>
			</div>
		);
	}

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={ __( 'Instagram Settings', 'aludra' ) }
					initialOpen={ true }
				>
					<TextControl
						__nextHasNoMarginBottom
						label={ __( 'Instagram username', 'aludra' ) }
						placeholder="yourhandle"
						value={ username }
						onChange={ ( value ) =>
							// Trim first: the @ strip is anchored, so a pasted
							// " @handle" would keep its @ if trimmed afterwards.
							setAttributes( {
								username: value.trim().replace( /^@/, '' ),
							} )
						}
						help={ __(
							'Public account only — private accounts will not load.',
							'aludra'
						) }
					/>
					<RangeControl
						__nextHasNoMarginBottom
						label={ __( 'Feed height (px)', 'aludra' ) }
						value={ height }
						onChange={ ( value ) =>
							setAttributes( { height: value } )
						}
						min={ 300 }
						max={ 1200 }
						step={ 10 }
					/>
					<p className="instagram-embed__inspector-note">
						{ __(
							'Uses Instagram’s public profile embed (instagram.com/username/embed) — no developer app or API key. This is an unofficial, undocumented endpoint: Meta could change or remove it without notice, the way it did the old oEmbed API in October 2020. Keep a plain link to the profile as a fallback.',
							'aludra'
						) }
					</p>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>{ preview }</div>
		</>
	);
}
