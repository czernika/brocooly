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
 * NOTE: if you're gonna place it inside `public` directory
 * make sure it is will NOT be deleted during production assets compilation by webpack.
 */
if ( ! defined( 'BROCOOLY_THEME_LANG_PATH' ) ) {
	define( 'BROCOOLY_THEME_LANG_PATH', BROCOOLY_THEME_PATH . 'languages' );
}

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
		load_theme_textdomain( 'brocooly', BROCOOLY_THEME_LANG_PATH );
	},
);
