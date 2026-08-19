import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';

import './editor.scss';
import { ROWS, MAX_ROWS, rowCount } from './rows';

export default function Edit( { attributes, setAttributes } ) {
	const { siteUrl, badge, rowLabels, lcpLabel } = attributes;

	const count = rowCount( rowLabels );
	const rows = ROWS.slice( 0, count );

	const blockProps = useBlockProps( {
		className: 'wp-block-aludra-load-waterfall',
		'aria-label': `${ __(
			'Load waterfall for',
			'aludra'
		) } ${ siteUrl }: ${ lcpLabel }`,
	} );

	const setRowLabel = ( index, value ) => {
		const next = rowLabels.slice();
		next[ index ] = value;
		setAttributes( { rowLabels: next } );
	};

	/* Resizing the panel resizes the labels, because the label count is what
	   drives the row count — see rows.js. Growing pads with a placeholder
	   rather than an empty string, so a new row is visible instead of being a
	   blank gap the author has to hunt for. */
	const setRowCount = ( next ) => {
		const target = Math.min( Math.max( next || 1, 1 ), MAX_ROWS );
		const labels = ( rowLabels || [] ).slice( 0, target );

		while ( labels.length < target ) {
			labels.push( __( 'stage', 'aludra' ) );
		}

		setAttributes( { rowLabels: labels } );
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Panel', 'aludra' ) }>
					<RangeControl
						label={ __( 'Rows', 'aludra' ) }
						help={ __(
							'How many stages the waterfall lists. The LCP marker sits on the 5th row, so panels shorter than that show no marker.',
							'aludra'
						) }
						value={ count }
						onChange={ setRowCount }
						min={ 1 }
						max={ MAX_ROWS }
					/>
				</PanelBody>
			</InspectorControls>

			<figure { ...blockProps }>
				<figcaption className="wf-head">
					<RichText
						tagName="span"
						className="wf-url"
						value={ siteUrl }
						onChange={ ( value ) =>
							setAttributes( { siteUrl: value } )
						}
						allowedFormats={ [] }
						placeholder={ __( 'site url…', 'aludra' ) }
					/>
					<RichText
						tagName="span"
						className="wf-badge"
						value={ badge }
						onChange={ ( value ) =>
							setAttributes( { badge: value } )
						}
						allowedFormats={ [] }
						placeholder={ __( 'badge…', 'aludra' ) }
					/>
				</figcaption>

				<div className="wf-rows">
					{ rows.map( ( row, index ) => (
						<div className="wf-row" key={ index }>
							<RichText
								tagName="span"
								value={ rowLabels[ index ] }
								onChange={ ( value ) =>
									setRowLabel( index, value )
								}
								allowedFormats={ [] }
								placeholder={ __( 'row label…', 'aludra' ) }
							/>
							<div className="wf-track">
								<i
									className={ `wf-bar${
										row.variant ? ` ${ row.variant }` : ''
									}` }
									style={ {
										left: `${ row.left }%`,
										width: `${ row.width }%`,
										animationDelay: `${ row.delay }s`,
									} }
								/>
								{ row.hasLcpMarker && (
									<b
										className="wf-lcp"
										style={ { left: `${ row.left }%` } }
									>
										<RichText
											tagName="span"
											value={ lcpLabel }
											onChange={ ( value ) =>
												setAttributes( {
													lcpLabel: value,
												} )
											}
											allowedFormats={ [] }
											placeholder={ __(
												'LCP label…',
												'aludra'
											) }
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
		</>
	);
}
