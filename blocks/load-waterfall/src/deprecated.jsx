/**
 * Deprecations for aludra/load-waterfall.
 *
 * v1 (block 1.1.0 and earlier) wrote each bar's stagger as an inline
 * `animation-delay`. KSES strips that property for users without
 * unfiltered_html, so the delay moved to style.scss. Markup that still carries
 * it parses through this entry and re-saves without it. Markup that KSES
 * already stripped needs no entry: it matches the current save() as it is.
 *
 * The delays are a frozen copy of the values the old save() wrote — a
 * deprecation must reproduce old output byte for byte, so they are not derived.
 */
import { useBlockProps, RichText } from '@wordpress/block-editor';

import { ROWS, rowCount } from './rows';
import metadata from './block.json';

const V1_DELAYS = [ 0.1, 0.25, 0.4, 0.55, 0.7, 0.85, 1, 1.15, 1.3, 1.45, 1.6, 1.75 ];

const v1 = {
	attributes: metadata.attributes,
	supports: metadata.supports,
	save( { attributes } ) {
		const { siteUrl, badge, rowLabels, lcpLabel } = attributes;
		const rows = ROWS.slice( 0, rowCount( rowLabels ) );

		const blockProps = useBlockProps.save( {
			className: 'wp-block-aludra-load-waterfall',
			'aria-label': `Load waterfall for ${ siteUrl }: ${ lcpLabel }`,
		} );

		return (
			<figure { ...blockProps }>
				<figcaption className="wf-head">
					<RichText.Content tagName="span" className="wf-url" value={ siteUrl } />
					<RichText.Content tagName="span" className="wf-badge" value={ badge } />
				</figcaption>

				<div className="wf-rows">
					{ rows.map( ( row, index ) => (
						<div className="wf-row" key={ index }>
							<RichText.Content tagName="span" value={ rowLabels[ index ] } />
							<div className="wf-track">
								<i
									className={ `wf-bar${ row.variant ? ` ${ row.variant }` : '' }` }
									style={ {
										left: `${ row.left }%`,
										width: `${ row.width }%`,
										animationDelay: `${ V1_DELAYS[ index ] }s`,
									} }
								/>
								{ row.hasLcpMarker && (
									<b className="wf-lcp" style={ { left: `${ row.left }%` } }>
										<RichText.Content tagName="span" value={ lcpLabel } />
									</b>
								) }
							</div>
						</div>
					) ) }
				</div>

				<div className="wf-axis">
					<span />
					<span className="wf-ticks">
						<span>0s</span>
						<span>0.5s</span>
						<span>1.0s</span>
						<span>1.5s</span>
					</span>
				</div>
			</figure>
		);
	},
};

export default [ v1 ];
