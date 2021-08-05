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
		$this->app->set( 'sidebars', config( 'widgets.sidebars' ) );
		$this->app->set( 'widgets', config( 'widgets.widgets' ) );
	}

	/**
	 * Create sidebars and widgets
	 */
	public function boot() {

		if ( ! (bool) config( 'widgets.loadDefaults' ) ) {
			remove_action( 'init', 'wp_widgets_init', 1 );
			add_action( 'init', function() { do_action( 'widgets_init' ); }, 1 );
		}

		/**
		 * Use block editor or not
		 *
		 * @since 0.8.4
		 */
		if ( ! (bool) config( 'widgets.useGutenberg' ) ) {
			add_action(
				'after_setup_theme',
				function() {
					remove_theme_support( 'widgets-block-editor' );
				}
			);
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
			foreach ( $sidebars as $sidebarClass ) {

				$sidebar = $this->app->make( $sidebarClass );

				add_action(
					'widgets_init',
					function() use ( $sidebar ) {
						$defaults      = [
							'before_widget' => '<li id="%1$s" class="widget %2$s">',
							'after_widget'  => '</li>',
							'before_title'  => '<h2 class="widgettitle">',
							'after_title'   => '</h2>',
						];
						$options       = array_merge( $sidebar->options(), $defaults );
						$options['id'] = $sidebar::SIDEBAR_ID;
						register_sidebar( $options );
					}
				);

				if ( is_active_sidebar( $sidebar::SIDEBAR_ID ) ) {
					add_filter(
						'timber/context',
						function ( $context ) use ( $sidebar ) {
							$sidebarCaller             = str_replace( '-', '_', $sidebar::SIDEBAR_ID ) . '_sidebar';
							$context[ $sidebarCaller ] = Timber::get_widgets( $sidebar::SIDEBAR_ID );
							return $context;
						}
					);
				}
			}
		}
	}

	/**
	 * Register widgets
	 */
	private function bootWidgets() {
		$widgets = $this->app->get( 'widgets' );

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
