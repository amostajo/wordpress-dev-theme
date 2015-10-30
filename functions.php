<?php

//------------------------------------------------------------
//
// NOTE:
//
// Try NOT to add any code line in this file.
//
// Use "plugin\Theme.php" to add your hooks, filters and functions.
//
//------------------------------------------------------------

require_once( __DIR__ . '/vendor/autoload.php' );

//------------------------------------------------------------
//
// Loads and inits theme.
//
//------------------------------------------------------------

require_once( __DIR__ . '/boot/autoload.php' );

if ( ! function_exists( 'theme' ) ) {
	/**
	 * Enables theme variables for quick access on templates.
	 * @since 1.0.0
	 *
	 * @return object
	 */
	function theme() {
		global $theme;
		return $theme;
	}
}