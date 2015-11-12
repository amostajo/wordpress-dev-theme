<?php

namespace DevTemplates;

use Amostajo\LightweightMVC\Request;
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
	 * Identification KEY for admin settings menu.
	 * @since 1.0.0
	 * @var string
	 */
	const ADMIN_MENU_SETTINGS = 'devt_admin_menu_settings';

	/**
	 * Constructor.
	 * Declares HOOKS and FILTERS.
	 * @since 1.0.0
	 */
	public function init()
	{
		add_action( 'init', [ &$this, 'start' ] );
		add_action( 'wp_enqueue_scripts', [ &$this, 'enqueue' ] );
		add_action( 'after_switch_theme', 'flush_rewrite_rules' );
		add_filter( 'body_class', [ &$this, 'body_class' ] );
		add_filter( 'getarchives_where', [ &$this, 'getarchives_where' ], 10, 2);
	}

	/**
	 * Admin Constructor.
	 * Declares HOOKS and FILTERS.
	 * @since 1.0.0
	 */
	public function on_admin()
	{
		add_action( 'admin_init', [ &$this, 'admin_start' ] );
		add_action( 'admin_menu', [ &$this, 'admin_menu' ] );
		add_action( 'save_post', [ &$this, 'save_post' ], 10, 2 );
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
	 * Activates the theme.
	 * @since 1.0.0
	 */
	public function activation()
	{
		$this->mvc->call( 'ConfigController@activation' );
	}

	/**
	 * Inits Wordpress admin dashboard.
	 * @since 1.0.0
	 */
	public function admin_start()
	{
		$this->mvc->call( 'AdminController@start' );
	}

	/**
	 * Registers admin menu.
	 * @since 1.0.0
	 */
	public function admin_menu()
	{
		$this->mvc->call( 'AdminController@menu' );
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
	public function body_class( $classes )
	{
		return $this->mvc->action( 'ConfigController@body_class', $classes );
	}

	/**
	 * Filters the query for archives.
	 * @since 1.0.0
	 *
	 * @param string $where Where SQL clause.
	 * @param array  $args  Query arguments.
	 *
	 * @return string
	 */
	public function getarchives_where( $where, $args )
	{
		return $this->mvc->action( 'ConfigController@getarchives_where',  $where, $args );
	}

	/**
	 * Displays a wordpress menu.
	 * @since 1.0.0
	 *
	 * @param string $key Key name of the menu.
	 */
	public function nav( $key )
	{
		$this->mvc->call( 'ConfigController@nav', $key );
	}

	/**
	 * Displays a specific section of a page.
	 * @since 1.0.0
	 *
	 * @param int 	 $post_id post ID.
	 * @param string $name    Section name to display.
	 */
	public function section( $post_id, $name = 'section_head' )
	{
		$this->mvc->call( 'PageController@section', $post_id, $name );
	}

	/**
	 * Save post hook.
	 * @since 1.0.0
	 *
	 * @param int $post_id Post id.
	 */
	public function save_post( $post_id )
	{
		switch (Request::input( 'post_type' )) {
			case 'page':
				$this->mvc->call( 'PageController@save', $post_id );
				break;
			case 'addon':
				$this->mvc->call( 'AddonController@save', $post_id );
				break;
		}
	}

	/**
	 * Displays the ADDON page.
	 * @since 1.0.0
	 *
	 * @param object $post WP_post
	 */
	public function addon( $post )
	{
		$this->mvc->call( 'AddonController@display', $post );
	}

	/**
	 * Displays addons.
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function addons()
	{
		$this->mvc->call( 'AddonController@index' );
	}
}