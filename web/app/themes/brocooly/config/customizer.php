<?php
/**
 * Register customizer options
 *
 * @package Brocooly
 * @since 0.3.0
 */

use Theme\Customizer\FooterLogoOption;
use Theme\Customizer\Panels\ContactPanel;
use Theme\Customizer\Sections\ContactSection;

use function Env\env;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Configuration
	 *--------------------------------------------------------------------------
	 *
	 * Options for Kirki config
	 *
	 * @see https://kirki.org/docs/setup/config/
	 *
	 */
	'config' => [
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
	 */
	'prefix'  => env( 'THEME' ) ? env( 'THEME' ) . '_' : 'brocooly_',

	/**
	 *--------------------------------------------------------------------------
	 * Customizer panels and sections
	 *--------------------------------------------------------------------------
	 *
	 * @see https://kirki.org/docs/setup/panels-sections/
	 *
	 */
	'panels'   => [
		ContactPanel::class,
	],

	'sections' => [
		ContactSection::class,
	],

	/**
	 *--------------------------------------------------------------------------
	 * Customizer controls
	 *--------------------------------------------------------------------------
	 *
	 * @see https://kirki.org/docs/controls/
	 *
	 */
	'options'  => [
		FooterLogoOption::class,
	],

];
