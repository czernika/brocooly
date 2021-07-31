<?php
/**
 * Set Debuggers for Application
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Loaders;

use Whoops\Run;
use Brocooly\App;

class DebuggerLoader
{
    /**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
    protected App $app;

	public function __construct( App $app ) {
		$this->app = $app;
	}

	/**
	 * Register Debuggers for both views and backend
	 */
	public function call() {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {

			/**
			 * Twig debugger
			 */
			add_filter(
				'timber/loader/twig',
				function( $twig ) {
					$twig->addExtension( $this->app->get( 'dump' ) );
					return $twig;
				}
			);

			/**
			 * Application debugger
			 *
			 * This line causing issue (problem out of the Brocooly theme)
			 * TODO: provide an option to disable cool errors completely
			 */
			$whoops = $this->app->get( Run::class );
			$whoops->pushHandler( $this->app->get( 'handler' ) );
			$whoops->register();
		}
	}

}
