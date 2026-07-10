import { __ } from '@wordpress/i18n';
import {
	BaseControl,
	Button,
	ButtonGroup,
	ColorPalette,
	RangeControl,
	ToggleControl,
} from '@wordpress/components';

/**
 * StylePanel Component
 *
 * Provides styling controls for the mega menu panel container effects.
 *
 * @param {Object} props Component props
 * @param {Object} props.attributes Block attributes
 * @param {Function} props.setAttributes Attribute setter function
 * @param {string} props.layoutMode Current layout mode (dropdown, overlay)
 */
export default function StylePanel({ attributes, setAttributes, layoutMode }) {
	const {
		panelBoxShadow,
		panelBorderRadius,
		panelBorderWidth,
		panelBorderColor,
		panelBackdropBlur,
	} = attributes;

	return (
		<>
				<BaseControl
					label={__('Box Shadow', 'aludra')}
					help={__('Add depth to the panel container', 'aludra')}
				>
					<ButtonGroup>
						<Button
							variant={panelBoxShadow === 'none' ? 'primary' : 'secondary'}
							onClick={() => setAttributes({ panelBoxShadow: 'none' })}
						>
							{__('None', 'aludra')}
						</Button>
						<Button
							variant={panelBoxShadow === 'small' ? 'primary' : 'secondary'}
							onClick={() => setAttributes({ panelBoxShadow: 'small' })}
						>
							{__('Small', 'aludra')}
						</Button>
						<Button
							variant={panelBoxShadow === 'medium' ? 'primary' : 'secondary'}
							onClick={() => setAttributes({ panelBoxShadow: 'medium' })}
						>
							{__('Medium', 'aludra')}
						</Button>
						<Button
							variant={panelBoxShadow === 'large' ? 'primary' : 'secondary'}
							onClick={() => setAttributes({ panelBoxShadow: 'large' })}
						>
							{__('Large', 'aludra')}
						</Button>
					</ButtonGroup>
				</BaseControl>

				<RangeControl
					label={__('Border Radius (px)', 'aludra')}
					value={panelBorderRadius}
					onChange={(value) => setAttributes({ panelBorderRadius: value })}
					min={0}
					max={50}
					step={1}
				/>

				<RangeControl
					label={__('Border Width (px)', 'aludra')}
					value={panelBorderWidth}
					onChange={(value) => setAttributes({ panelBorderWidth: value })}
					min={0}
					max={10}
					step={1}
				/>

				{panelBorderWidth > 0 && (
					<BaseControl label={__('Border Color', 'aludra')}>
						<ColorPalette
							value={panelBorderColor}
							onChange={(value) => setAttributes({ panelBorderColor: value })}
						/>
					</BaseControl>
				)}

				{layoutMode === 'overlay' && (
					<ToggleControl
						label={__('Backdrop Blur', 'aludra')}
						help={__('Add a blur effect to the panel background', 'aludra')}
						checked={panelBackdropBlur}
						onChange={(value) => setAttributes({ panelBackdropBlur: value })}
					/>
				)}
		</>
	);
}
