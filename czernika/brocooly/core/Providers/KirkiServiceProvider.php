<?php
/**
 * Register theme customizer options
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Brocooly\Providers;

use Kirki;

class KirkiServiceProvider extends AbstractService
{

	/**
	 * Register customizer configuration
	 */
	public function register() {
		$this->app->set(
			'customizer_config',
			config(
				'customizer.config',
				[
					'brocooly_admin_config' => [
						'capability'  => 'edit_theme_options',
						'option_type' => 'theme_mod',
					],
				],
			)
		);

		$this->app->set( 'customizer_prefix', config( 'customizer.prefix', 'brocooly_' ) );

		$this->app->set( 'customizer_panels', config( 'customizer.panels', [] ) );
		$this->app->set( 'customizer_sections', config( 'customizer.sections', [] ) );
		$this->app->set( 'customizer_options', config( 'customizer.options', [] ) );
	}

	/**
	 * Create sections and options
	 */
	public function boot() {
		$this->initConfig();
		$this->initPanels();
		$this->initSections();
		$this->initOptions();
	}

	/**
	 * Init Kirki configuration
	 */
	private function initConfig() {
		$configs = $this->app->get( 'customizer_config' );

		if ( ! empty( $configs ) ) {
			foreach ( $configs as $id => $options ) {
				Kirki::add_config( $id, $options );
			}
		}
	}

	/**
	 * Init customizer panel
	 */
	private function initPanels() {
		$panels   = $this->app->get( 'customizer_panels' );

		if ( ! empty( $panels ) ) {
			foreach ( $panels as $panel ) {

				$panel = $this->app->make( $panel );

				Kirki::add_panel(
					$panel::$id,
					$panel->options(),
				);
			}
		}
	}

	/**
	 * Init customizer sections
	 */
	private function initSections() {
		$sections = $this->app->get( 'customizer_sections' );
		$prefix   = $this->app->get( 'customizer_prefix' );
		$config   = $this->getConfig();

		if ( ! empty( $sections ) ) {
			foreach ( $sections as $section ) {

				$section = $this->app->make( $section );

				Kirki::add_section(
					$section::$id,
					$section->options(),
				);

				foreach( $section->controls() as $controls ) {
					$controls['section'] = $section::$id;
					$controls['settings'] = $prefix . $controls['settings'];
					Kirki::add_field( $config, $controls );
				}
			}
		}
	}

	/**
	 * Init customizer controls
	 */
	private function initOptions() {
		$options = $this->app->get( 'customizer_options' );
		$prefix  = $this->app->get( 'customizer_prefix' );
		$config  = $this->getConfig();

		if ( ! empty( $options ) ) {
			foreach ( $options as $option ) {
				$option = $this->app->make( $option );
				$settings = $option->options();
				$settings['settings'] = $prefix . $settings['settings'];
				Kirki::add_field( $config, $settings );
			}
		}
	}

	/**
	 * Get customizer config id
	 *
	 * @return string
	 */
	private function getConfig() {

		/**
		 * TODO: refactor
		 */
		$config = array_keys( $this->app->get( 'customizer_config' ) )[0];
		return $config;
	}
}
