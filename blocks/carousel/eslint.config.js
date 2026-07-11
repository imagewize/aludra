/**
 * ESLint flat config for the carousel block.
 *
 * Extends the @wordpress/scripts default config and globally excludes the
 * vendored, minified Slick Carousel library from linting — it is bundled
 * third-party code, not ours to lint or reformat.
 */
const wpDefaultConfig = require( '@wordpress/scripts/config/eslint.config.cjs' );

module.exports = [
	...wpDefaultConfig,
	{
		ignores: [ 'slick/**' ],
	},
];
