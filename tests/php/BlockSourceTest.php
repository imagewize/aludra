<?php
/**
 * Static checks on the block editor sources.
 *
 * Both bugs found while testing against WordPress 7.2 RC3 were visible in the
 * source and invisible to every other check (build, lint, Sentinel on patterns):
 * a template image with numeric `width`/`height`, which saves fine but fails
 * block validation on reload, and an import of a component that
 * `@wordpress/components` only exports as `__experimental*`, which crashes the
 * Inspector panel at render. These tests read `blocks/*\/src` and need no
 * WordPress or node_modules.
 *
 * @package Aludra
 */

use PHPUnit\Framework\TestCase;

/**
 * Guards block source files against known editor-breaking patterns.
 */
class BlockSourceTest extends TestCase {

	/**
	 * Components that `@wordpress/components` exports only with an
	 * `__experimental` prefix. Importing the bare name gives `undefined`.
	 * List checked against WordPress 7.2 RC3's `components.js`; a name that becomes
	 * stable must be removed. Add a name here when one bites.
	 */
	const EXPERIMENTAL_ONLY_COMPONENTS = array(
		'NumberControl',
		'ToggleGroupControlOption',
		'ToggleGroupControlOptionIcon',
		'UnitControl',
		'HStack',
		'VStack',
		'Text',
		'Heading',
		'Spacer',
		'Truncate',
	);

	/**
	 * Every JS/JSX source file under blocks/<name>/src.
	 *
	 * @return string[] Absolute paths.
	 */
	private function block_sources() {
		$files = array();
		foreach ( glob( ALUDRA_TESTS_ROOT . '/blocks/*/src/*.{js,jsx}', GLOB_BRACE ) as $file ) {
			$files[] = $file;
		}
		return $files;
	}

	/**
	 * Path relative to the plugin root, for readable failures.
	 *
	 * @param string $file Absolute path.
	 * @return string
	 */
	private function rel( $file ) {
		return substr( $file, strlen( ALUDRA_TESTS_ROOT ) + 1 );
	}

	/**
	 * The scan has to find something, or the tests below prove nothing.
	 */
	public function test_block_sources_are_found() {
		$this->assertGreaterThan( 30, count( $this->block_sources() ) );
	}

	/**
	 * A template `core/image` must give width/height as CSS strings ('95px').
	 *
	 * Core stores a number as `"width":95` in the comment but renders
	 * `width:95px` in the style, so the saved block fails validation the next
	 * time the editor opens it ("Attempt block recovery").
	 */
	public function test_template_images_use_string_dimensions() {
		$offenders = array();
		foreach ( $this->block_sources() as $file ) {
			$source = file_get_contents( $file ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Local source file.
			if ( ! preg_match_all( '/[\'"]core\/image[\'"]\s*,\s*\{(.*?)\}/s', $source, $matches ) ) {
				continue;
			}
			foreach ( $matches[1] as $attributes ) {
				if ( preg_match( '/\b(width|height)\s*:\s*\d+\s*[,}\n]/', $attributes . "\n", $found ) ) {
					$offenders[] = $this->rel( $file ) . ' (' . $found[1] . ' is a number)';
				}
			}
		}
		$this->assertSame( array(), $offenders, "Use '28px'-style strings for core/image width/height in templates:\n" . implode( "\n", $offenders ) );
	}

	/**
	 * Components imported from `@wordpress/components` must exist under that name.
	 */
	public function test_no_experimental_only_components_imported_by_bare_name() {
		$offenders = array();
		foreach ( $this->block_sources() as $file ) {
			$source = file_get_contents( $file ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Local source file.
			if ( ! preg_match_all( '/import\s*\{([^}]*)\}\s*from\s*[\'"]@wordpress\/components[\'"]/s', $source, $imports ) ) {
				continue;
			}
			foreach ( $imports[1] as $list ) {
				foreach ( explode( ',', $list ) as $item ) {
					$name = trim( preg_split( '/\s+as\s+/', trim( $item ) )[0] );
					if ( in_array( $name, self::EXPERIMENTAL_ONLY_COMPONENTS, true ) ) {
						$offenders[] = $this->rel( $file ) . ' imports ' . $name;
					}
				}
			}
		}
		$this->assertSame( array(), $offenders, "These are only exported as __experimental<Name>:\n" . implode( "\n", $offenders ) );
	}
}
