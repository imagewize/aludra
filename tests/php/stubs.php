<?php
/**
 * Minimal WordPress stubs for the unit suite.
 *
 * Only what `includes/admin/settings-page.php` calls while being included, or
 * from the functions under test. Each is guarded so that running this suite
 * inside a real WordPress test bootstrap would use WordPress's own versions.
 *
 * phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound
 *
 * @package Aludra
 */

if ( ! function_exists( 'add_action' ) ) {
	/**
	 * Stub for add_action().
	 *
	 * @return bool Always true.
	 */
	function add_action() {
		return true;
	}
}

if ( ! function_exists( 'add_options_page' ) ) {
	/**
	 * Stub for add_options_page().
	 *
	 * @return string Empty hook suffix.
	 */
	function add_options_page() {
		return '';
	}
}

if ( ! function_exists( 'register_setting' ) ) {
	/**
	 * Stub for register_setting().
	 *
	 * @return void
	 */
	function register_setting() {}
}

if ( ! function_exists( '__' ) ) {
	/**
	 * Stub for __(): no translation in the unit suite.
	 *
	 * @param string $text Text to translate.
	 * @return string The text unchanged.
	 */
	function __( $text ) {
		return $text;
	}
}

if ( ! function_exists( 'esc_html__' ) ) {
	/**
	 * Stub for esc_html__(): no translation or escaping needed here.
	 *
	 * @param string $text Text to translate and escape.
	 * @return string The text unchanged.
	 */
	function esc_html__( $text ) {
		return $text;
	}
}

if ( ! function_exists( '_n' ) ) {
	/**
	 * Stub for _n(): picks a form without a translation backend.
	 *
	 * @param string $single Singular form.
	 * @param string $plural Plural form.
	 * @param int    $number Count deciding the form.
	 * @return string The chosen form.
	 */
	function _n( $single, $plural, $number ) {
		return 1 === (int) $number ? $single : $plural;
	}
}

if ( ! function_exists( 'wp_parse_args' ) ) {
	/**
	 * Stub for wp_parse_args(), limited to the array form used here.
	 *
	 * @param array $args     Values to merge over the defaults.
	 * @param array $defaults Default values.
	 * @return array Merged arguments.
	 */
	function wp_parse_args( $args, $defaults = array() ) {
		return array_merge( $defaults, (array) $args );
	}
}
