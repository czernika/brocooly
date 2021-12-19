<?php
/**
 * Debug customization
 * Works ONLY if `WP_DEBUG` set to `true`
 *
 * @package Brocooly
 * @since 0.24.0
 */

use Whoops\Handler\PrettyPageHandler;

return [

	/**
	 * --------------------------------------------------------------------------
	 * Set debug handler
	 * --------------------------------------------------------------------------
	 *
	 * PrettyPageHandler may cause some problems with `sqlite3` PHP extension.
	 * Alternatively you may disable extension itself (recommended).
	 *
	 * Set to `false` to disable pretty errors
	 */
	'handler'        => PrettyPageHandler::class,

	/**
	 * --------------------------------------------------------------------------
	 * Use commented output or not
	 * --------------------------------------------------------------------------
	 *
	 * This will enable (or disable) commented output for every twig-template included
	 */
	'comment_output' => true,

];
