import { useBlockProps, RichText } from '@wordpress/block-editor';

import { ROWS } from './rows';

export default function save( { attributes } ) {
	const { siteUrl, badge, rowLabels, lcpLabel } = attributes;

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
				{ ROWS.map( ( row, index ) => (
					<div className="wf-row" key={ index }>
						<RichText.Content tagName="span" value={ rowLabels[ index ] } />
						<div className="wf-track">
							<i
								className={ `wf-bar${ row.variant ? ` ${ row.variant }` : '' }` }
								style={ { left: `${ row.left }%`, width: `${ row.width }%`, animationDelay: `${ row.delay }s` } }
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
}
