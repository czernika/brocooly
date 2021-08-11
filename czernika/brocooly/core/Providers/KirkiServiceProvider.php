<?php
/**
 * Register theme customizer options
 * We're using Kirki Framework plugin under MIT license
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Brocooly\Providers;

use Kirki;
use Webmozart\Assert\Assert;

class KirkiServiceProvider extends AbstractService
{

	/**
	 * Register customizer configuration
	 */
	public function register() {
		$customizerSettings = [ 'config', 'prefix', 'panels', 'sections', 'options' ];
		foreach ( $customizerSettings as $setting ) {
			$this->app->set( 'customizer_' . $setting, config( 'customizer.' . $setting ) );
		}
	}

	/**
	 * Create sections and options
	 */
	public function boot() {
		if ( class_exists( 'Kirki' ) ) {
			$this->initConfig();
			$this->initPanels();
			$this->initSections();
			$this->initOptions();
		}
	}

	/**
	 * Init Kirki configuration
	 *
	 * NOTE: currently there is only one config supported
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
		$panels = $this->app->get( 'customizer_panels' );

		if ( ! empty( $panels ) ) {
			foreach ( $panels as $panelClass ) {
				$panel = $this->app->get( $panelClass );

				$this->assertPanel( $panel, $panelClass );

				$options = $panel->options();
				if ( is_string( $options ) ) {
					$options = [ 'title' => $options ];
				}

				Kirki::add_panel( esc_html( $panel::PANEL_ID ), $options );
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
			foreach ( $sections as $sectionClass ) {
				$section = $this->app->get( $sectionClass );

				$this->assertSection( $section, $sectionClass );

				$options = $section->options();
				if ( is_string( $options ) ) {
					$options = [ 'title' => $options ];
				}

				Kirki::add_section( esc_html( $section::SECTION_ID ), $options );

				foreach ( $section->controls() as $controls ) {
					$controls['section']  = esc_html( $section::SECTION_ID );
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
			foreach ( $options as $optionClass ) {
				$option   = $this->app->make( $optionClass );
				$settings = $option->settings();

				$this->assertOption( $option, $optionClass );

				$settings['settings'] = $prefix . $settings['settings'];
				Kirki::add_field( esc_html( $config ), $settings );
			}
		}
	}

	/**
	 * Assert panel options are OK
	 *
	 * @param object $panel | panel object.
	 * @param string $panelClass | panel class name.
	 * @throws AssertionError
	 */
	private function assertPanel( object $panel, string $panelClass ) {
		Assert::stringNotEmpty(
			esc_html( $panel::PANEL_ID ),
			/* translators: 1: customizer panel id. */
			sprintf(
				'You need to specify static `id` parameter for %s panel',
				$panelClass,
			),
		);
	}

	/**
	 * Assert section options are OK
	 *
	 * @param object $section | section object.
	 * @param string $sectionClass | section class name.
	 * @throws \Exception | Assert this is a valid section.
	 */
	private function assertSection( object $section, string $sectionClass ) {
		Assert::stringNotEmpty(
			esc_html( $section::SECTION_ID ),
			/* translators: 1: customizer section class name. */
			sprintf(
				'You need to specify static `id` parameter for %s section',
				$sectionClass,
			),
		);

		Assert::isArray(
			$section->controls(),
			/* translators: 1 - customizer section class name, 2 - customizer section controls type. */
			sprintf(
				'`controls()` method should return array for %1$s section, %2$s given',
				$sectionClass,
				gettype( $section->controls() ),
			),
		);
	}

	/**
	 * Assert section options are OK
	 *
	 * @param object $option | option object.
	 * @param string $optionClass | option class name.
	 * @throws \Exception | Assert this is a valid option.
	 */
	private function assertOption( object $option, string $optionClass ) {
		Assert::isArray(
			$option->settings(),
			/* translators: 1: customizer option class name; 2: customizer option settings type. */
			sprintf(
				'`settings()` method should return array for %1$s option, %2$s given',
				$optionClass,
				gettype( $option->settings() ),
			),
		);

		Assert::keyExists(
			$option->settings(),
			'section',
			/* translators: 1: customizer section class name. */
			sprintf(
				'You need to specify `section` setting for %s option',
				$optionClass,
			),
		);
	}

	/**
	 * Get customizer config
	 * TODO: refactor
	 *
	 * @return string
	 */
	private function getConfig() {
		$config = array_keys( $this->app->get( 'customizer_config' ) )[0];
		return $config;
	}
}
