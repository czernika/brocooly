<?php
/**
 * Register customizer options
 *
 * The Customize API (Customizer) is a framework for live-previewing any change to WordPress.
 * It provides a unified interface for users to customize various aspects of their theme and their site, from colors and layouts to widgets, menus, and more.
 * Themes and plugins alike can add options to the Customizer. The Customizer is the canonical way to add options to your theme.
 *
 * Brocooly Framework use Kirki Framework plugin under The MIT License (MIT) to help you to create awesome control settings
 *
 * @package Brocooly
 * @since 0.3.0
 */

use Theme\Customizer\FooterLogoOption;
use Theme\Customizer\Panels\ContactPanel;
use Theme\Customizer\Sections\ContactsSection;

use function Env\env;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Customizer panels and sections
	 *--------------------------------------------------------------------------
	 *
	 * Register theme panels and sections.
	 *
	 * @see https://kirki.org/docs/setup/panels-sections/
	 */
	'panels'   => [
		ContactPanel::class,
	],

	'sections' => [
		ContactsSection::class,
	],

	/**
	 *--------------------------------------------------------------------------
	 * Customizer controls
	 *--------------------------------------------------------------------------
	 *
	 * This will register individual options
	 * Mostly used for WordPress sections like `title_tagline` etc
	 *
	 * It is recommended to create options within sections
	 *
	 * @see https://kirki.org/docs/controls/
	 */
	'options'  => [
		FooterLogoOption::class,
	],

	/**
	 *--------------------------------------------------------------------------
	 * Configuration
	 *--------------------------------------------------------------------------
	 *
	 * Options for Kirki config
	 * Configurations allow each project to use a different setup
	 * and act as identifiers so it’s important you create one.
	 * Fields that belong to your configuration will inherit your config properties.
	 *
	 * TODO: add more configs
	 *
	 * @see https://kirki.org/docs/setup/config/
	 */
	'config'   => [
		'brocooly_admin_config' => [
			'capability'  => 'edit_theme_options',
			'option_type' => 'theme_mod',
		],
	],

	/**
	 *--------------------------------------------------------------------------
	 * Default options prefix
	 *--------------------------------------------------------------------------
	 *
	 * Every theme mod will be available with this prefix
	 *
	 * @example
	 * ```
	 * get_theme_mod( 'brocooly_setting' );
	 * is same as
	 * {{ mod('setting') }} | {{ fn('get_theme_mod', 'brocooly_setting') }}
	 * ```
	 */
	'prefix'   => env( 'THEME' ) ? env( 'THEME' ) . '_' : 'brocooly_',

];
