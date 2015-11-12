<?php

namespace DevTemplates\Controllers;

use DevTemplates\Models\Page;
use DevTemplates\Main as Configuration;
use Amostajo\LightweightMVC\Controller;
use Amostajo\LightweightMVC\Request;

/**
 * Controller will handle any theme required configuration on ADMIN dashboard.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */
class AdminController extends Controller
{
	/**
	 * Inits.
	 * @since 1.0.0
	 */
	public function start()
	{
		// Addings settings
		register_setting( 'dev-templates', 'devt_page_downloads' );
		register_setting( 'dev-templates', 'devt_page_addons' );
		// Add special metaboxes
		$this->special_metaboxes();
	}

	/**
	 * Registers admin menus.
	 * @since 1.0.0
	 */
	public function menu()
	{
		// Add theme settings
		add_submenu_page(
			'options-general.php',
			'Theme Settings',
			'Theme',
			'manage_options',
			Configuration::ADMIN_MENU_SETTINGS,
			[ &$this, 'view_settings' ]
		);
	}

	/**
	 * Displays admin settings.
	 * @since 1.0.0
	 */
	public function view_settings()
	{
		$this->view->show( 'admin.pages.settings' );
	}

	/**
	 * Adds new metaboxes.
	 * @since 1.0.0
	 */
	public function special_metaboxes()
	{
		$post_id = Request::input( 'post', Request::input( 'post_ID', 0 ) );
		if ( $post_id == get_option( 'devt_page_downloads' , -1 ) ) {
			add_meta_box(
				'devt_section_editor',
				__( 'Head section', 'LucyVegas' ),
				[ &$this, 'metabox_section_head' ],
				'page'
			);
		}
	}

	/**
	 * Displays section metabox.
	 * @since 1.0.0
	 *
	 * @param int $post_id Post ID.
	 */
	public function metabox_section_head( $post )
	{
		wp_nonce_field( 'metabox_section', 'metabox_section_nonce' );

		$this->view->show( 'admin.metaboxes.section', [
			'content' => get_post_meta( $post->ID, 'section_head', true ),
			'name'	  => 'section_head',
		] );
	}
}