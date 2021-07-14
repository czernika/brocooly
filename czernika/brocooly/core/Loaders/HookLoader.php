<?php
/**
 * Init custom theme hooks
 *
 * @package Brocooly
 * @since 0.3.0
 */

namespace Brocooly\Loaders;

use Brocooly\App;
use Brocooly\Hooks\BodyClass;

class HookLoader
{

	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
    protected App $app;

	/**
	 * Default app hooks
	 *
	 * @var array
	 */
	private array $hooks = [
		BodyClass::class,
	];

	public function __construct( App $app ) {
		$this->app = $app;
	}

	public function call() {
		$this->setHooks();
	}

	private function setHooks() {
		$themeHooks = config( 'app.hooks' );

		$hooks = array_merge( $this->hooks, $themeHooks );

		foreach ( $hooks as $hook ) {
			$hookClass = new $hook();

			if ( method_exists( $hookClass, 'load' ) ) {
				$hookClass->load();
			}

			if ( method_exists( $hookClass, 'filter' ) ) {
				add_filter( $hookClass->filter(), [ $hookClass, 'hook' ] );
			}

			if ( method_exists( $hookClass, 'action' ) ) {
				add_action( $hookClass->action(), [ $hookClass, 'hook' ] );
			}
		}
	}
}
