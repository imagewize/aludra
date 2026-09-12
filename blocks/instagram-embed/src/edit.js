import { __ } from '@wordpress/i18n';
import { useState } from '@wordpress/element';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	PanelRow,
	TextControl,
	RangeControl,
	Placeholder,
	Button,
} from '@wordpress/components';

import './editor.scss';

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

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Instagram Settings', 'aludra' ) } initialOpen={ true }>
					<PanelRow>
						<TextControl
							__nextHasNoMarginBottom
							label={ __( 'Instagram username', 'aludra' ) }
							placeholder="yourhandle"
							value={ username }
							onChange={ ( value ) =>
								setAttributes( { username: value.replace( /^@/, '' ).trim() } )
							}
							help={ __(
								'Public account only — private accounts will not load.',
								'aludra'
							) }
						/>
					</PanelRow>
					<PanelRow>
						<RangeControl
							__nextHasNoMarginBottom
							label={ __( 'Feed height (px)', 'aludra' ) }
							value={ height }
							onChange={ ( value ) => setAttributes( { height: value } ) }
							min={ 300 }
							max={ 1200 }
							step={ 10 }
						/>
					</PanelRow>
					<p className="instagram-embed__inspector-note">
						{ __(
							'Uses Instagram’s public profile embed (instagram.com/username/embed) — no developer app or API key. This is an unofficial, undocumented endpoint: Meta could change or remove it without notice, the way it did the old oEmbed API in October 2020. Keep a plain link to the profile as a fallback.',
							'aludra'
						) }
					</p>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				{ ! username ? (
					<Placeholder
						icon="instagram"
						label={ __( 'Instagram Embed', 'aludra' ) }
						instructions={ __(
							'Enter a public Instagram username in the block settings to preview the feed.',
							'aludra'
						) }
					/>
				) : ! previewLoaded ? (
					<div className="instagram-embed__placeholder">
						<Button
							variant="secondary"
							onClick={ () => setPreviewLoaded( true ) }
						>
							{ __( 'Load Instagram feed', 'aludra' ) }
						</Button>
						<p className="instagram-embed__hint">
							{ sprintfUsername( username ) }
						</p>
					</div>
				) : (
					<div className="instagram-embed__frame">
						<iframe
							src={ `https://www.instagram.com/${ username }/embed` }
							width="100%"
							height={ height }
							frameBorder="0"
							scrolling="no"
							allowTransparency="true"
							title={ __( 'Instagram feed preview', 'aludra' ) }
						/>
					</div>
				) }
			</div>
		</>
	);
}

/**
 * @param {string} username Instagram username.
 * @return {string} Hint copy for the placeholder state.
 */
function sprintfUsername( username ) {
	return `Loads content from instagram.com — @${ username }`;
}
