<?php

namespace DevTemplates\Controllers;

use DevTemplates\Models\Addon;
use Amostajo\LightweightMVC\Controller;
use Amostajo\LightweightMVC\Request;

/**
 * Controller will handle any theme required configuration.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */
class AddonController extends Controller
{
	/**
	 * Save page.
	 * @since 1.0.0
	 *
	 * @param int $post_id Post id.
	 */
	public function save( $post_id )
	{
		// Is valid save ?
		$nonce = Request::input( 'metabox_addon_nonce', '', true );

		if ( (defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			|| empty($nonce) 
			|| ! wp_verify_nonce( $nonce, 'metabox_addon' ) 
		) {
			return;
		}

		$addon = Addon::find( $post_id );

		$addon->url = Request::input( 'url' );
		$addon->download_url = Request::input( 'download_url' );
		$addon->version = Request::input( 'version' );
		$addon->supported_version = Request::input( 'supported_version' );
		$addon->github_username = Request::input( 'github_username' );
		$addon->github_repo = Request::input( 'github_repo' );

		$addon->save();
	}

	/**
	 * Displays the ADDON page.
	 * @since 1.0.0
	 *
	 * @param object $post WP_post
	 */
	public function display( $post )
	{
		wp_enqueue_style( 'lightbox' );
		wp_enqueue_script( 'lightbox' );
		$addon = new Addon();
		return $this->view->get( 'pages.addon', [
			'post'	=> $post,
			'addon' => $addon->from_post( $post ),
		] );
	}
}