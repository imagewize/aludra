<?php
/**
 * PHPUnit bootstrap.
 *
 * These are plain unit tests, not WordPress integration tests: the plugin has
 * no wordpress-develop dependency, so instead of booting WordPress we define
 * the handful of functions `includes/admin/settings-page.php` touches at
 * include time and stay on the pure-PHP parts of the settings logic (the block
 * enumerations, sanitization and dependency rules). Anything that needs a real
 * database or the block registry belongs in an integration suite, not here.
 *
 * @package Aludra
 */

define( 'ALUDRA_TESTS_ROOT', dirname( __DIR__, 2 ) );

require_once ALUDRA_TESTS_ROOT . '/vendor/autoload.php';

if ( ! defined( 'ABSPATH' ) ) {
	// settings-page.php exits unless this is set; the value is never used.
	define( 'ABSPATH', ALUDRA_TESTS_ROOT . '/' );
}

require_once __DIR__ . '/stubs.php';

require_once ALUDRA_TESTS_ROOT . '/includes/admin/settings-page.php';
