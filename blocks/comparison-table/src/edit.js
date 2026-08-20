import {
	useBlockProps,
	InnerBlocks,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import './editor.scss';

const CELL = ( heading, body ) => [
	'aludra/comparison-cell',
	{ heading, body },
];

const ROW = ( label, parameterKey, category, cells ) => [
	'aludra/comparison-row',
	{ label, parameterKey, category },
	cells,
];

const TEMPLATE = [
	ROW( 'Architecture', 'system.engine', 'Environments & Delivery', [
		CELL(
			'Git-Native, Zero Server',
			'Push a branch, get a URL. Build, release and health check run on our edge — nothing to patch.'
		),
		CELL(
			'A VM You Maintain',
			'Runners, agents and OS patches are your job, on a schedule that competes with everything else.'
		),
		CELL(
			'Proprietary Build Queue',
			"Deploys run on the vendor's own worker fleet, on their release cadence, not yours."
		),
		CELL(
			'Closed Visual Engine',
			'No build step to inspect. Output is whatever the drag-and-drop layer decided to emit.'
		),
	] ),
	ROW( 'Secrets & Access', 'audit.trail', 'Security & Access', [
		CELL(
			'Scoped, Short-Lived Tokens',
			'Every credential is scoped to one environment and expires — an audit trail answers "who changed this?" in one click.'
		),
		CELL(
			'Long-Lived Shared Keys',
			'One .env file, copied between machines, rotated only when someone remembers to.'
		),
		CELL(
			'Vendor-Held Secrets',
			"Stored in the platform's own vault, with export tooling that lags the import tooling by design."
		),
		CELL(
			'No Secrets Concept',
			'Credentials, if any, live in the same account as the site — no separation between build and runtime.'
		),
	] ),
];

export default function Edit( { attributes, setAttributes } ) {
	const {
		tint,
		eyebrow,
		heading,
		lead,
		paramColumnLabel,
		vendorOurs,
		vendorOne,
		vendorTwo,
		vendorThree,
	} = attributes;

	const blockProps = useBlockProps( {
		className: [
			'wp-block-aludra-comparison-table',
			tint ? 'is-tinted' : '',
		]
			.filter( Boolean )
			.join( ' ' ),
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Section', 'aludra' ) }>
					<ToggleControl
						label={ __( 'Tinted background', 'aludra' ) }
						help={ __(
							'Alternate sections use a tint so consecutive sections read as separate bands.',
							'aludra'
						) }
						checked={ tint }
						onChange={ ( value ) =>
							setAttributes( { tint: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				<div className="comparison-table__shell">
					<div className="comparison-table__header">
						<RichText
							tagName="p"
							className="comparison-table__eyebrow"
							value={ eyebrow }
							onChange={ ( value ) =>
								setAttributes( { eyebrow: value } )
							}
							allowedFormats={ [] }
							placeholder={ __( 'Eyebrow', 'aludra' ) }
						/>
						<RichText
							tagName="h2"
							className="comparison-table__heading"
							value={ heading }
							onChange={ ( value ) =>
								setAttributes( { heading: value } )
							}
							allowedFormats={ [ 'core/italic' ] }
							placeholder={ __( 'Section heading', 'aludra' ) }
						/>
						<RichText
							tagName="p"
							className="comparison-table__lead"
							value={ lead }
							onChange={ ( value ) =>
								setAttributes( { lead: value } )
							}
							allowedFormats={ [ 'core/italic', 'core/link' ] }
							placeholder={ __(
								'One or two sentences (optional)',
								'aludra'
							) }
						/>
					</div>

					<div className="comparison-table__pills">
						<p className="comparison-table__pills-note">
							{ __(
								'Filter pills are built on the front end from each row’s category, and every row stays visible here while editing.',
								'aludra'
							) }
						</p>
					</div>

					<div className="comparison-table__surface">
						<div className="comparison-table__row comparison-table__row--head">
							<RichText
								tagName="div"
								className="comparison-table__head-cell comparison-table__head-cell--param"
								value={ paramColumnLabel }
								onChange={ ( value ) =>
									setAttributes( {
										paramColumnLabel: value,
									} )
								}
								allowedFormats={ [] }
							/>
							<RichText
								tagName="div"
								className="comparison-table__head-cell comparison-table__head-cell--ours"
								value={ vendorOurs }
								onChange={ ( value ) =>
									setAttributes( { vendorOurs: value } )
								}
								allowedFormats={ [] }
							/>
							<RichText
								tagName="div"
								className="comparison-table__head-cell comparison-table__head-cell--v1"
								value={ vendorOne }
								onChange={ ( value ) =>
									setAttributes( { vendorOne: value } )
								}
								allowedFormats={ [] }
							/>
							<RichText
								tagName="div"
								className="comparison-table__head-cell comparison-table__head-cell--v2"
								value={ vendorTwo }
								onChange={ ( value ) =>
									setAttributes( { vendorTwo: value } )
								}
								allowedFormats={ [] }
							/>
							<RichText
								tagName="div"
								className="comparison-table__head-cell comparison-table__head-cell--v3"
								value={ vendorThree }
								onChange={ ( value ) =>
									setAttributes( { vendorThree: value } )
								}
								allowedFormats={ [] }
							/>
						</div>
						<InnerBlocks
							allowedBlocks={ [ 'aludra/comparison-row' ] }
							template={ TEMPLATE }
							templateLock={ false }
							renderAppender={ () => (
								<InnerBlocks.ButtonBlockAppender />
							) }
						/>
					</div>
				</div>
			</div>
		</>
	);
}
