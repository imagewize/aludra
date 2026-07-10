/**
 * Icon Picker Component
 *
 * Provides a visual interface for selecting Dashicons or uploading custom SVG icons.
 */
import { __ } from '@wordpress/i18n';
import {
	BaseControl,
	Button,
	ButtonGroup,
	Popover,
	TextControl,
	TextareaControl,
	SearchControl,
	__experimentalGrid as Grid,
} from '@wordpress/components';
import { Icon } from '@wordpress/icons';
import { useState } from '@wordpress/element';

/**
 * Popular Dashicons for menu navigation
 */
const DASHICONS = [
	{ name: 'menu', label: __( 'Menu (Hamburger)', 'aludra' ) },
	{ name: 'menu-alt', label: __( 'Menu Alt', 'aludra' ) },
	{ name: 'menu-alt2', label: __( 'Menu Alt 2', 'aludra' ) },
	{ name: 'menu-alt3', label: __( 'Menu Alt 3', 'aludra' ) },
	{ name: 'admin-site', label: __( 'Site', 'aludra' ) },
	{ name: 'admin-site-alt', label: __( 'Site Alt', 'aludra' ) },
	{ name: 'admin-site-alt2', label: __( 'Site Alt 2', 'aludra' ) },
	{ name: 'admin-site-alt3', label: __( 'Site Alt 3', 'aludra' ) },
	{ name: 'admin-home', label: __( 'Home', 'aludra' ) },
	{ name: 'building', label: __( 'Building', 'aludra' ) },
	{ name: 'store', label: __( 'Store', 'aludra' ) },
	{ name: 'cart', label: __( 'Cart', 'aludra' ) },
	{ name: 'products', label: __( 'Products', 'aludra' ) },
	{ name: 'portfolio', label: __( 'Portfolio', 'aludra' ) },
	{ name: 'book', label: __( 'Book', 'aludra' ) },
	{ name: 'book-alt', label: __( 'Book Alt', 'aludra' ) },
	{ name: 'lightbulb', label: __( 'Lightbulb', 'aludra' ) },
	{ name: 'heart', label: __( 'Heart', 'aludra' ) },
	{ name: 'star-filled', label: __( 'Star Filled', 'aludra' ) },
	{ name: 'star-empty', label: __( 'Star Empty', 'aludra' ) },
	{ name: 'flag', label: __( 'Flag', 'aludra' ) },
	{ name: 'location', label: __( 'Location', 'aludra' ) },
	{ name: 'phone', label: __( 'Phone', 'aludra' ) },
	{ name: 'email', label: __( 'Email', 'aludra' ) },
	{ name: 'admin-users', label: __( 'Users', 'aludra' ) },
	{ name: 'groups', label: __( 'Groups', 'aludra' ) },
	{ name: 'businessman', label: __( 'Businessman', 'aludra' ) },
	{ name: 'id', label: __( 'ID', 'aludra' ) },
	{ name: 'shield', label: __( 'Shield', 'aludra' ) },
	{ name: 'sos', label: __( 'SOS', 'aludra' ) },
	{ name: 'search', label: __( 'Search', 'aludra' ) },
	{ name: 'welcome-learn-more', label: __( 'Learn More', 'aludra' ) },
	{ name: 'info', label: __( 'Info', 'aludra' ) },
	{ name: 'megaphone', label: __( 'Megaphone', 'aludra' ) },
	{ name: 'chart-pie', label: __( 'Chart Pie', 'aludra' ) },
	{ name: 'chart-bar', label: __( 'Chart Bar', 'aludra' ) },
	{ name: 'analytics', label: __( 'Analytics', 'aludra' ) },
	{ name: 'money-alt', label: __( 'Money', 'aludra' ) },
	{ name: 'palmtree', label: __( 'Palmtree', 'aludra' ) },
	{ name: 'smiley', label: __( 'Smiley', 'aludra' ) },
];

/**
 * IconPicker Component
 *
 * @param {Object} props - Component props
 * @param {string} props.value - Current icon name or custom SVG
 * @param {Function} props.onChange - Callback when icon changes
 * @param {string} props.customSVG - Custom SVG code
 * @param {Function} props.onCustomSVGChange - Callback when custom SVG changes
 */
export default function IconPicker( {
	value,
	onChange,
	customSVG,
	onCustomSVGChange,
} ) {
	const [ showPicker, setShowPicker ] = useState( false );
	const [ iconType, setIconType ] = useState( customSVG ? 'custom' : 'dashicon' );
	const [ searchTerm, setSearchTerm ] = useState( '' );

	// Filter icons based on search
	const filteredIcons = DASHICONS.filter( ( icon ) =>
		icon.name.toLowerCase().includes( searchTerm.toLowerCase() ) ||
		icon.label.toLowerCase().includes( searchTerm.toLowerCase() )
	);

	return (
		<BaseControl
			label={ __( 'Icon', 'aludra' ) }
			help={ __( 'Choose a Dashicon or upload custom SVG', 'aludra' ) }
		>
			<ButtonGroup>
				<Button
					variant={ iconType === 'dashicon' ? 'primary' : 'secondary' }
					onClick={ () => setIconType( 'dashicon' ) }
				>
					{ __( 'Dashicon', 'aludra' ) }
				</Button>
				<Button
					variant={ iconType === 'custom' ? 'primary' : 'secondary' }
					onClick={ () => setIconType( 'custom' ) }
				>
					{ __( 'Custom SVG', 'aludra' ) }
				</Button>
			</ButtonGroup>

			{ iconType === 'dashicon' && (
				<div style={ { marginTop: '12px' } }>
					<Button
						variant="secondary"
						onClick={ () => setShowPicker( ! showPicker ) }
						style={ {
							display: 'flex',
							alignItems: 'center',
							gap: '8px',
							width: '100%',
							justifyContent: 'flex-start',
						} }
					>
						{ value && (
							<span
								className={ `dashicons dashicons-${ value }` }
								style={ { fontSize: '20px' } }
							/>
						) }
						<span>
							{ value
								? DASHICONS.find( ( i ) => i.name === value )
										?.label || value
								: __( 'Select Icon...', 'aludra' ) }
						</span>
					</Button>

					{ showPicker && (
						<Popover
							position="bottom left"
							onClose={ () => setShowPicker( false ) }
							style={ { width: '400px' } }
						>
							<div style={ { padding: '16px' } }>
								<SearchControl
									value={ searchTerm }
									onChange={ setSearchTerm }
									placeholder={ __(
										'Search icons...',
										'aludra'
									) }
								/>

								<div
									style={ {
										display: 'grid',
										gridTemplateColumns:
											'repeat(5, 1fr)',
										gap: '8px',
										marginTop: '12px',
										maxHeight: '300px',
										overflowY: 'auto',
									} }
								>
									{ filteredIcons.map( ( icon ) => (
										<Button
											key={ icon.name }
											variant={
												value === icon.name
													? 'primary'
													: 'secondary'
											}
											onClick={ () => {
												onChange( icon.name );
												onCustomSVGChange?.( '' );
												setShowPicker( false );
											} }
											style={ {
												height: '50px',
												display: 'flex',
												flexDirection: 'column',
												alignItems: 'center',
												justifyContent: 'center',
												padding: '8px',
											} }
											title={ icon.label }
										>
											<span
												className={ `dashicons dashicons-${ icon.name }` }
												style={ { fontSize: '24px' } }
											/>
										</Button>
									) ) }
								</div>

								{ filteredIcons.length === 0 && (
									<p
										style={ {
											textAlign: 'center',
											color: '#757575',
											marginTop: '16px',
										} }
									>
										{ __(
											'No icons found',
											'aludra'
										) }
									</p>
								) }
							</div>
						</Popover>
					) }

					{ value && (
						<Button
							variant="link"
							isDestructive
							onClick={ () => {
								onChange( '' );
								onCustomSVGChange?.( '' );
							} }
							style={ { marginTop: '8px' } }
						>
							{ __( 'Clear Icon', 'aludra' ) }
						</Button>
					) }
				</div>
			) }

			{ iconType === 'custom' && (
				<div style={ { marginTop: '12px' } }>
					<TextareaControl
						label={ __( 'Custom SVG Code', 'aludra' ) }
						value={ customSVG || '' }
						onChange={ ( svg ) => {
							onCustomSVGChange?.( svg );
							onChange( '' );
						} }
						placeholder={ __(
							'<svg>...</svg>',
							'aludra'
						) }
						help={ __(
							'Paste your custom SVG code here',
							'aludra'
						) }
						rows={ 6 }
					/>

					{ customSVG && (
						<div style={ { marginTop: '8px' } }>
							<p style={ { marginBottom: '4px', fontWeight: 600 } }>
								{ __( 'Preview:', 'aludra' ) }
							</p>
							<div
								style={ {
									padding: '12px',
									border: '1px solid #ddd',
									borderRadius: '4px',
									backgroundColor: '#f9f9f9',
								} }
								dangerouslySetInnerHTML={ {
									__html: customSVG,
								} }
							/>
						</div>
					) }
				</div>
			) }
		</BaseControl>
	);
}
