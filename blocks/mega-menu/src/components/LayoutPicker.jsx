/**
 * LayoutPicker Component
 *
 * Visual layout mode selector for the Mega Menu block.
 * Allows users to choose between 2 distinct layout modes:
 * - Dropdown: Classic mega menu below trigger
 * - Overlay: Full-screen overlay with backdrop
 */

import { Button, ButtonGroup, Tooltip } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { Icon, arrowDown, cover } from '@wordpress/icons';

/**
 * LayoutPicker component
 *
 * @param {Object} props - Component props
 * @param {string} props.value - Currently selected layout mode
 * @param {Function} props.onChange - Callback when layout mode changes
 */
export default function LayoutPicker({ value, onChange }) {
	const layouts = [
		{
			value: 'dropdown',
			label: __('Dropdown', 'aludra'),
			icon: arrowDown,
			description: __('Classic dropdown below trigger', 'aludra'),
		},
		{
			value: 'overlay',
			label: __('Overlay', 'aludra'),
			icon: cover,
			description: __('Full-screen overlay', 'aludra'),
		},
	];

	return (
		<div className="layout-picker">
			<label className="components-base-control__label">
				{__('Layout Mode', 'aludra')}
			</label>
			<ButtonGroup className="layout-picker__buttons">
				{layouts.map((layout) => (
					<Tooltip key={layout.value} text={layout.description}>
						<Button
							isPressed={value === layout.value}
							onClick={() => onChange(layout.value)}
							className="layout-picker__button"
							aria-label={layout.description}
						>
							<Icon icon={layout.icon} />
							<span>{layout.label}</span>
						</Button>
					</Tooltip>
				))}
			</ButtonGroup>
		</div>
	);
}
