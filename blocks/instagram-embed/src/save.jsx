import { useBlockProps } from '@wordpress/block-editor';

/**
 * Static output: a placeholder + "Load feed" button only. The real iframe is
 * injected by view.js on click, so nothing from instagram.com loads (and no
 * consent question is raised) until a visitor opts in.
 *
 * @param {Object} root0            Block props.
 * @param {Object} root0.attributes Block attributes.
 */
export default function Save( { attributes } ) {
	const { username, height } = attributes;
	const blockProps = useBlockProps.save( { className: 'wp-block-aludra-instagram-embed' } );
	const profileUrl = username ? `https://www.instagram.com/${ username }/` : '';

	return (
		<div { ...blockProps }>
			<div
				className="instagram-embed__frame"
				data-username={ username }
				data-height={ height }
			>
				<div className="instagram-embed__placeholder">
					<button
						type="button"
						className="instagram-embed__load-btn"
						disabled={ ! username }
					>
						Load Instagram feed
					</button>
					<p className="instagram-embed__hint">
						Loads content from instagram.com
						{ username ? ` — @${ username }` : '' }
					</p>
				</div>
				{ profileUrl && (
					<noscript>
						<a href={ profileUrl }>View @{ username } on Instagram</a>
					</noscript>
				) }
			</div>
		</div>
	);
}
