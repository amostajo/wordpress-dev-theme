<?php

namespace DevTemplates\Models;

use Amostajo\LightweightMVC\Model;
use Amostajo\LightweightMVC\Traits\FindTrait;

/**
 * Addon model.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */
class Addon extends Model
{
	use FindTrait;

	/**
	 * Page post type.
	 * @since 1.0.0
	 * @var string
	 */
	protected $type = 'addon';

	/**
	 * Aliases.
	 * @since 1.0.0
	 * @var array
	 */
	protected $aliases = [
		// Name of the addon
		'name'					=> 'post_title',
		// Slug
		'slug'					=> 'post_name',
		// Project or addon URL.
		'url'					=> 'meta_url',
		// Download url
		'download_url'			=> 'meta_download_url',
		// Software version
		'version'				=> 'meta_version',
		// Wordpress Dev Templated supported version
		'supported_version'		=> 'meta_supported_version',
		// GitHub username
		'github_username'		=> 'meta_github_username',
		// GitHub repository
		'github_repo'			=> 'meta_github_repo',
		// Addon permalink
		'permalink'				=> 'func_get_permalink',
		// Github link
		'github'				=> 'func_get_github',
		// Attachment ID
		'image_id' 				=> 'func_get_image_id',
		// Image url
		'image_url' 			=> 'func_get_image_url',
		// Thumb of the image
		'thumb_image_url' 		=> 'func_get_thumb_image_url',
	];

	/**
	 * Hidden properties.
	 * @since 1.0.0
	 * @var array
	 */
	protected $hidden = [
		'post_title', 'post_content', 'guid', 'post_excerpt', 'post_author',
		'post_date_gmt', 'to_ping', 'pinged', 'comment_status', 'ping_status',
		'post_password', 'post_name', 'post_modified', 'post_modified_gmt',
		'post_content_filtered', 'post_parent', 'menu_order', 'post_mime_type',
		'comment_count', 'filter', 'ancestors',
	];

	/**
	 * Returns the addon permalink within Wordpress.
	 * @since 1.0.0
	 *
	 * @return string
	 */
	protected function get_permalink()
	{
		return get_permalink( $this->ID );
	}

	/**
	 * Returns the github address.
	 * @since 1.0.0
	 *
	 * @return string
	 */
	protected function get_github()
	{
		if ( $this->github_username && $this->github_repo )
			return sprintf(
				'https://github.com/%s/%s',
				$this->github_username,
				$this->github_repo
			);
		return;
	}

	/**
	 * Returns image url.
	 * @since 1.0
	 *
	 * @return string
	 */
	protected function get_image_id()
	{
		return get_post_thumbnail_id( $this->ID );
	}

	/**
	 * Returns image url.
	 * @since 1.0
	 *
	 * @return string
	 */
	protected function get_image_url()
	{
		$id = $this->image_id;
		if ( $id ) {
			return wp_get_attachment_url( $id );
		}
		return;
	}

	/**
	 * Returns thumbnail size image url.
	 * @since 1.0
	 *
	 * @return string
	 */
	protected function get_thumb_image_url()
	{
		$url = $this->image_url;
		if ( $url ) {
			return resize_image(
				$url,
				400,
				220,
				false
			);
		}
		return;
	}
}