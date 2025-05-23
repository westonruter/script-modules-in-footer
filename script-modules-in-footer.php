<?php
/**
 * Plugin Name: Script Modules in Footer
 * Plugin URI: https://gist.github.com/westonruter/5acba7cb904b546fad41f5ca741ecf31
 * Description: Prints script modules at <code>wp_footer</code> instead of at <code>wp_head</code> to improve performance by reducing network contention for the critical rendering path. This can be used with <a href="...">Script Fetch Priority Low</a> to improve performance even more. Only relevant for block themes.
 * Requires at least: 6.5
 * Requires PHP: 7.2
 * Version: 0.1.0
 * Author: Weston Ruter
 * Author URI: https://weston.ruter.net/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Update URI: https://gist.github.com/westonruter/5acba7cb904b546fad41f5ca741ecf31
 * Gist Plugin URI: https://gist.github.com/westonruter/5acba7cb904b546fad41f5ca741ecf31
 * Primary Branch: main
 *
 * @package ScriptModulesInFooter
 */

namespace ScriptModulesInFooter;

// Short-circuit functionality to facilitate benchmarking performance impact.
if ( isset( $_GET['disable_print_script_modules_in_footer'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	return;
}

// Note that WP_Script_Modules::add_hooks() is called at after_setup_theme priority 10, so this is why priority 11 is used.
add_action(
	'after_setup_theme',
	static function () {
		// Only relevant for block themes.
		if ( ! wp_is_block_theme() ) {
			return;
		}

		foreach ( array( 'print_import_map', 'print_enqueued_script_modules', 'print_script_module_preloads' ) as $method ) {
			$priority = has_action( 'wp_head', array( wp_script_modules(), $method ) );
			if ( is_int( $priority ) ) {
				remove_action( 'wp_head', array( wp_script_modules(), $method ), $priority );
				add_action( 'wp_footer', array( wp_script_modules(), $method ), $priority );
			}
		}
	},
	11
);
