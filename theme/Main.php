<?php

namespace DevTemplates;

use Amostajo\WPPluginCore\Plugin as Theme;

/**
 * Configuration class.
 * Registers HOOKS and FILTERS used within the theme.
 * Acts like a bridge or router of actions between Wordpress and the theme.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */
class Main extends Theme
{
	/**
	 * Identification KEY for header menu.
	 * @since 1.0.0
	 * @var string
	 */
	const MENU_HEADER = 'devt_menu_header';

	/**
	 * Identification KEY for footer menu.
	 * @since 1.0.0
	 * @var string
	 */
	const MENU_FOOTER = 'devt_menu_footer';
	
	/**
	 * Identification KEY for documentation menu.
	 * @since 1.0.0
	 * @var string
	 */
	const MENU_DOCUMENTATION = 'devt_menu_documentation';

	/**
	 * Constructor.
	 * Declares HOOKS and FILTERS.
	 * @since 1.0.0
	 */
	public function init()
	{
		add_action( 'init', [ &$this, 'start' ] );
		add_action( 'wp_enqueue_scripts', [ &$this, 'enqueue' ] );
		add_filter('body_class', [ &$this, 'body_class' ] );
	}

	/**
	 * Inits theme on Wordpress.
	 * @since 1.0.0
	 */
	public function start()
	{
		$this->mvc->call( 'ConfigController@start' );
	}

	/**
	 * Enqueues and registers scripts.
	 * @since 1.0.0
	 */
	public function enqueue()
	{
		$this->mvc->call( 'ConfigController@enqueue', $this->config );
	}

	/**
	 * Filters the classes to add extra from template.
	 * @since 1.0.0
	 *
	 * @param array $classes All body classes.
	 *
	 * @return array
	 */
	public function body_class($classes)
	{
		return $this->mvc->action( 'ConfigController@body_class', $classes );
	}

	/**
	 * Displays a wordpress menu.
	 * @since 1.0.0
	 *
	 * @param string $key Key name of the menu.
	 */
	public function nav($key)
	{
		$this->mvc->call( 'ConfigController@nav', $key );
	}
}