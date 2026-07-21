import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

import './editor.scss';
import { ROWS } from './rows';

export default function Edit( { attributes, setAttributes } ) {
	const { siteUrl, badge, rowLabels, lcpLabel } = attributes;

	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-load-waterfall',
		'aria-label': `${ __( 'Load waterfall for', 'aludra' ) } ${ siteUrl }: ${ lcpLabel }`,
	} );

	const setRowLabel = ( index, value ) => {
		const next = rowLabels.slice();
		next[ index ] = value;
		setAttributes( { rowLabels: next } );
	};

	return (
		<figure { ...blockProps }>
			<figcaption className="wf-head">
				<RichText
					tagName="span"
					className="wf-url"
					value={ siteUrl }
					onChange={ ( value ) => setAttributes( { siteUrl: value } ) }
					allowedFormats={ [] }
					placeholder={ __( 'site url…', 'aludra' ) }
				/>
				<RichText
					tagName="span"
					className="wf-badge"
					value={ badge }
					onChange={ ( value ) => setAttributes( { badge: value } ) }
					allowedFormats={ [] }
					placeholder={ __( 'badge…', 'aludra' ) }
				/>
			</figcaption>

			<div className="wf-rows">
				{ ROWS.map( ( row, index ) => (
					<div className="wf-row" key={ index }>
						<RichText
							tagName="span"
							value={ rowLabels[ index ] }
							onChange={ ( value ) => setRowLabel( index, value ) }
							allowedFormats={ [] }
							placeholder={ __( 'row label…', 'aludra' ) }
						/>
						<div className="wf-track">
							<i
								className={ `wf-bar${ row.variant ? ` ${ row.variant }` : '' }` }
								style={ { left: `${ row.left }%`, width: `${ row.width }%`, animationDelay: `${ row.delay }s` } }
							/>
							{ row.hasLcpMarker && (
								<b className="wf-lcp" style={ { left: `${ row.left }%` } }>
									<RichText
										tagName="span"
										value={ lcpLabel }
										onChange={ ( value ) => setAttributes( { lcpLabel: value } ) }
										allowedFormats={ [] }
										placeholder={ __( 'LCP label…', 'aludra' ) }
									/>
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
