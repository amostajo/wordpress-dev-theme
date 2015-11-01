<?php

namespace DevTemplates\Controllers;

use DevTemplates\Models\Addon;
use DevTemplates\Main as Configuration;
use Amostajo\LightweightMVC\Controller as Controller;

/**
 * Controller will handle any theme required configuration.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */
class ConfigController extends Controller
{
	/**
	 * Enqueues and registers scripts.
	 * @since 1.0.0
	 *
	 * @param array $config Theme's config settings.
	 */
	public function enqueue( $config )
	{
		wp_register_style(
			'bootstrap',
			get_template_directory_uri() . $config->get( 'paths.bower' ) . 'bootstrap/dist/css/bootstrap.min.css',
			[],
			'3.3.5'
		);
		wp_register_style(
			'font-awesome',
			get_template_directory_uri() . $config->get( 'paths.bower' ) . 'font-awesome/css/font-awesome.min.css',
			[],
			'4.4.0'
		);
		wp_register_style(
			'font-g-montserrat',
			'http://fonts.googleapis.com/css?family=Montserrat:400,700',
			[],
			'1.0.0'
		);
		wp_register_style(
			'font-g-lato',
			'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic',
			[ 'font-g-montserrat' ],
			'1.0.0'
		);
		wp_register_style(
			'freelancer-theme',
			get_template_directory_uri() . '/css/freelancer.css',
			[ 'bootstrap', 'font-awesome', 'font-g-lato' ],
			'1.0.3'
		);
		wp_register_script(
			'bootstrap',
			get_template_directory_uri() . $config->get( 'paths.bower' ) . 'bootstrap/dist/js/bootstrap.min.js',
			[ 'jquery' ],
			'3.3.5',
			true
		);
		wp_register_script(
			'easing',
			get_template_directory_uri() . $config->get( 'paths.bower' ) . 'jquery-easing-original/jquery.easing.min.js',
			[ 'jquery' ],
			'1.3.2',
			true
		);
		wp_register_script(
			'classie',
			get_template_directory_uri() . $config->get( 'paths.bower' ) . 'classie/classie.js',
			[],
			'1.0.1',
			true
		);
		wp_register_script(
			'animated-header',
			get_template_directory_uri() . $config->get( 'paths.bower' ) . 'cbp-animated-header-fork/js/cbpAnimatedHeader.min.js',
			[ 'classie' ],
			'0.0.1',
			true
		);
		wp_register_script(
			'freelancer-theme',
			get_template_directory_uri() . '/js/freelancer.js',
			[ 'bootstrap', 'easing', 'animated-header' ],
			'1.0.3',
			true
		);
		wp_register_script(
			'github-cards',
			'//cdn.jsdelivr.net/github-cards/latest/widget.js',
			[],
			'1.0.2',
			true
		);
		wp_register_script(
			'lightbox',
			get_template_directory_uri() . $config->get( 'paths.bower' ) . 'lightbox2/dist/js/lightbox.min.js',
			[ 'jquery' ],
			'2.8.1',
			true
		);
		wp_register_style(
			'lightbox',
			get_template_directory_uri() . $config->get( 'paths.bower' ) . 'lightbox2/dist/css/lightbox.css',
			[],
			'2.8.1'
		);
		if ( ! is_admin() ) {
			wp_enqueue_style( 'freelancer-theme' );
			wp_enqueue_script( 'freelancer-theme' );
			wp_enqueue_script( 'github-cards' );
		}
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
		$classes[] = 'index';
		return $classes;
	}

	/**
	 * Inits theme on Wordpress.
	 * @since 1.0.0
	 */
	public function start()
	{
		// Register menus
		register_nav_menus( [
			Configuration::MENU_HEADER 			=> __( 'Header menu', 'DevTemplates' ),
			Configuration::MENU_FOOTER 			=> __( 'Footer menu', 'DevTemplates' ),
			Configuration::MENU_DOCUMENTATION 	=> __( 'Documentation menu', 'DevTemplates' ),
		] );
		// Register new post type
		register_post_type(
			'addon',
			[
				'labels'				=> [
											'name'               => _x( 'Addons', 'addons', 'DevTemplate' ),
											'singular_name'      => _x( 'Addon', 'addon', 'DevTemplate' ),
											'menu_name'          => _x( 'Addons', 'admin menu', 'DevTemplate' ),
											'name_admin_bar'     => _x( 'Addon', 'add new on admin bar', 'DevTemplate' ),
											'add_new'            => _x( 'Add New', 'book', 'DevTemplate' ),
											'add_new_item'       => __( 'Add New Addon', 'DevTemplate' ),
											'new_item'           => __( 'New Addon', 'DevTemplate' ),
											'edit_item'          => __( 'Edit Addon', 'DevTemplate' ),
											'view_item'          => __( 'View Addon', 'DevTemplate' ),
											'all_items'          => __( 'All Addons', 'DevTemplate' ),
											'search_items'       => __( 'Search Addons', 'DevTemplate' ),
											'parent_item_colon'  => __( 'Parent Addons:', 'DevTemplate' ),
											'not_found'          => __( 'No Addons found.', 'DevTemplate' ),
											'not_found_in_trash' => __( 'No Addons found in Trash.', 'DevTemplate' )
										],
				'description'			=> 'Wordpress Development Templates Add-ons',
				'public'				=> true,
				'publicly_queryable'	=> true,
				'show_ui'				=> true,
				'show_in_menu'			=> true,
				'query_var'				=> '/?{query_var_string}={single_post_slug}',
				'rewrite'				=> [ 'slug' => 'add-ons' ],
				'capability_type'		=> 'post',
				'has_archive'			=> true,
				'hierarchical'			=> false,
				'menu_position'			=> null,
				'supports'				=> [ 'title', 'editor', 'author', 'thumbnail', 'post-formats' ],
				'menu_icon'				=> get_template_directory_uri() . '/img/favicon.png',
				'register_meta_box_cb'	=> [ &$this, 'register_metabox_addon' ]
			]
		);
	}

	/**
	 * Displays a wordpress menu.
	 * @since 1.0.0
	 *
	 * @param string $key Key name of the menu.
	 */
	public function nav($key)
	{
		$args = [
			'theme_location' => $key,
		];
		switch ( $key ) {
			case Configuration::MENU_HEADER:
				$args[ 'items_wrap' ] = '<a href="#page-top"></a><ul id="%1$s" class="nav navbar-nav navbar-right %2$s">%3$s</ul>';
				break;
			case Configuration::MENU_FOOTER:
			case Configuration::MENU_DOCUMENTATION:
				$args[ 'items_wrap' ] = '<a href="#page-top"></a><ul id="%1$s" class="list-unstyled %2$s">%3$s</ul>';
				break;
		}
		wp_nav_menu( $args );
	}

	/**
	 * Registers metabox for addons.
	 * @since 1.0.0
	 */
	public function register_metabox_addon()
	{
		add_meta_box(
			'devt_addon',
			__( 'Project information', 'LucyVegas' ),
			[ &$this, 'metabox_addon' ],
			'addon'
		);
	}

	/**
	 * Displays the addon metabox.
	 * @since 1.0.0
	 *
	 * @param object $post WP_Post.
	 */
	public function metabox_addon( $post )
	{
		wp_nonce_field( 'metabox_addon', 'metabox_addon_nonce' );

		$this->view->show( 'admin.metaboxes.addon', [
			'addon' => Addon::find( $post->ID ),
		] );
	}
}