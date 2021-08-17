<?php
/**
 * Custom Gutenberg blocks
 *
 * @package Brocooly
 * @since 0.6.0
 */

return [

	/**
	 * --------------------------------------------------------------------------
	 * Register custom Gutenberg blocks
	 * --------------------------------------------------------------------------
	 */
	'blocks'                  => [],

	/**
	 * --------------------------------------------------------------------------
	 * Use Gutenberg Editor
	 * --------------------------------------------------------------------------
	 *
	 * If set to false Gutenberg editor will be removed from all posts.
	 *
	 * @since 0.12.2
	 */
	'use_editor'              => true,

	/**
	 * Works only, if 'use_editor' set to 'false'
	 * If there additional problems with widgets set it to 'false'
	 */
	'deregister_block_styles' => true,

];
