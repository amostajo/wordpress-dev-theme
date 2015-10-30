<?php

use Amostajo\WPPluginCore\Config;

/**
 * This file will load configuration file and init Main class.
 */

$config = include( __DIR__ . '/../config/theme.php' );

$theme_namespace = $config['namespace'];

$theme_class = $theme_namespace . '\Main';

$theme = new $theme_class( new Amostajo\WPPluginCore\Config( $config ) );

//--- INIT
$theme->autoload_init();

//--- ON ADMIN
if ( is_admin() ) {

	$theme->autoload_on_admin();

}

// Add theme_view function
if ( ! function_exists( 'theme_view' ) ) {
	/**
	 * Displays view with the parameters passed by.
	 *
	 * @param string $view   Name and location of the view within "theme/views" path.
	 * @param array  $params View parameters passed by.
	 */
	function theme_view ( $view, $params = array() )
	{
		global $theme;

		$theme->view( $view, $params );
	}
}

// Unset
unset($config);
unset($theme_namespace);
unset($theme_class);
