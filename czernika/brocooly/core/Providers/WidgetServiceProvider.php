<?php
/**
 * Widget Service Provider
 *
 * @package Brocooly
 * @since 0.4.0
 */

declare(strict_types=1);

namespace Brocooly\Providers;

use Timber\Timber;

class WidgetServiceProvider extends AbstractService
{

	/**
	 * Register sidebars and widgets
	 */
	public function register() {
		$this->app->set( 'sidebars', config( 'widgets.sidebars', [] ) );
		$this->app->set( 'widgets', config( 'widgets.widgets', [] ) );
	}

	/**
	 * Create sidebars and widgets
	 */
	public function boot() {

		if ( ! (bool) config( 'widgets.loadDefaults' ) ) {
			remove_action( 'init', 'wp_widgets_init', 1 );
			add_action( 'init', function() { do_action( 'widgets_init' ); }, 1 );
		}

		$this->bootSidebars();
		$this->bootWidgets();
	}

	/**
	 * Register sidebars and add theme into Timber context
	 */
	private function bootSidebars() {
		$sidebars = $this->app->get( 'sidebars' );

		if ( ! empty( $sidebars ) ) {
			foreach ( $sidebars as $sidebar ) {

				$sidebarClass = $this->app->make( $sidebar );

				add_action(
					'widgets_init',
					function() use ( $sidebarClass ) {
						$options = $sidebarClass->options();
						$options['id'] = $sidebarClass->id;
						register_sidebar( $options );
					}
				);

				add_filter(
					'timber/context',
					function ( $context ) use ( $sidebarClass ) {
						$sidebarCaller             = str_replace( '-', '_', $sidebarClass->id ) . '_sidebar';
						$context[ $sidebarCaller ] = Timber::get_widgets( $sidebarClass->id );
						return $context;
					}
				);
			}
		}
	}

	/**
	 * Register widgets
	 */
	private function bootWidgets() {
		$widgets  = $this->app->get( 'widgets' );

		if ( ! empty( $widgets ) ) {
			foreach ( $widgets as $widget ) {
				add_action(
					'widgets_init',
					function() use ( $widget ) {
						register_widget( $widget );
					}
				);
			}
		}
	}
}
