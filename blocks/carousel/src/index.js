/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Internal dependencies
 */
import metadata from './block.json';
import Edit from './edit';
import Save from './save';
import './editor.scss';
import './style.scss';

/**
 * Register the block
 */
registerBlockType( metadata.name, {
	...metadata,
	edit: Edit,
	save: Save,
	/*
	 * New carousels start on the zero-JS rail engine. This is done with a
	 * default variation, not by changing the `engine` default in block.json:
	 * carousels saved before rail existed carry no `engine` attribute, and they
	 * must keep parsing as Slick — both for block validation and for the
	 * `render_block` filter in aludra.php, which reads a missing `engine` as
	 * Slick when deciding whether to enqueue jQuery and Slick. The variation
	 * writes `"engine":"rail"` into the block comment explicitly instead.
	 */
	variations: [
		{
			name: 'rail',
			title: metadata.title,
			description: metadata.description,
			icon: metadata.icon,
			isDefault: true,
			scope: [ 'inserter' ],
			attributes: { engine: 'rail' },
		},
	],
} );
