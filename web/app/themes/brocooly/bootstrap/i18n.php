<?php
/**
 * Make Brocooly multilingual again!
 *
 * @package Brocooly
 * @since 0.8.5
 */

defined( 'BROCOOLY_LANG_DIR' ) || define( 'BROCOOLY_LANG_DIR', trailingslashit( get_template_directory() ) . 'languages' );

add_action(
	'after_setup_theme',
	function() {
		load_theme_textdomain( 'brocooly', BROCOOLY_LANG_DIR );
	},
);
