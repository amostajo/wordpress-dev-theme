<?php

namespace DevTemplates\Controllers;

use DevTemplates\Models\Page;
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
class PageController extends Controller
{
	/**
	 * Displays a specific section of a page.
	 * @since 1.0.0
	 *
	 * @param int 	 $post_id post ID.
	 * @param string $name    Section name to display.
	 *
	 * @return view
	 */
	public function section( $post_id, $name = 'section_head' )
	{
		$page = Page::find( $post_id );
		if ( $page->has_meta( $name ) ) {
			switch ( $name ) {
				case 'section_head':
					return $this->view->get( 'sections.head', [
						'content'	=> get_post_meta( $post_id, 'section_head', true ),
					] );
			}
		}
	}

	/**
	 * Save page.
	 * @since 1.0.0
	 *
	 * @param int $post_id Post id.
	 */
	public function save( $post_id )
	{
		// Is valid save ?
		$nonce = Request::input( 'metabox_section_nonce', '', true );

		if ( (defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			|| empty($nonce) 
			|| ! wp_verify_nonce( $nonce, 'metabox_section' ) 
		) {
			return;
		}

		foreach (Request::input( 'sections', [] ) as $section) {
			update_post_meta( $post_id, $section, Request::input( $section ) );
		}
	}
}