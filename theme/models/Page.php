<?php

namespace DevTemplates\Models;

use Amostajo\LightweightMVC\Model;
use Amostajo\LightweightMVC\Traits\FindTrait;

/**
 * Page model.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */
class Page extends Model
{
    use FindTrait;

    /**
     * Page post type.
     * @since 1.0.0
     * @var string
     */
    protected $type = 'page';

    /**
     * Aliases.
     * @since 1.0.0
     * @var array
     */
    protected $aliases = [
    	'section_head'		=> 'meta_section_head',
    	'section_download'	=> 'meta_section_download',
    ];
}