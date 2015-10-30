<?php

namespace DevTemplates\Controllers;

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
		if ( ! is_admin() ) {
			wp_enqueue_style( 'freelancer-theme' );
			wp_enqueue_script( 'freelancer-theme' );
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
		register_nav_menus( [
			Configuration::MENU_HEADER 			=> __( 'Header menu', 'DevTemplates' ),
			Configuration::MENU_FOOTER 			=> __( 'Footer menu', 'DevTemplates' ),
			Configuration::MENU_DOCUMENTATION 	=> __( 'Documentation menu', 'DevTemplates' ),
		] );
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
}