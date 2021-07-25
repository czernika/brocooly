<?php
/**
 * Make Brocooly multilingual again!
 *
 * @package Brocooly
 * @since 0.8.5
 */

add_action(
	'after_setup_theme',
	function() {
		load_theme_textdomain( 'brocooly', get_template_directory() . '/public/languages' );
	},
);
