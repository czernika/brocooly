<?php
/**
 * Make Brocooly multilingual again!
 *
 * @package Brocooly
 * @since 0.8.5
 */

/**
 * --------------------------------------------------------------------------
 * Define language directory
 * --------------------------------------------------------------------------
 *
 * Where all your language files are stored.
 *
 * It is used inside Illuminate validation package
 * and built-in WordPress load_theme_textdomain() function.
 *
 * ! NOTE: if you're gonna place it inside `public` directory
 * make sure it is will NOT be deleted during production assets compilation by webpack.
 */
defined( 'BROCOOLY_LANG_DIR' ) || define( 'BROCOOLY_LANG_DIR', trailingslashit( get_template_directory() ) . 'languages' );

/**
 * --------------------------------------------------------------------------
 * Define theme textdomain
 * --------------------------------------------------------------------------
 *
 * Required action for multilingual sites.
 */
add_action(
	'after_setup_theme',
	function() {
		load_theme_textdomain( 'brocooly', BROCOOLY_LANG_DIR );
	},
);
