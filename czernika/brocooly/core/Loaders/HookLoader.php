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
use Webmozart\Assert\Assert;

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

	/**
	 * Call hooks
	 *
	 * @return void
	 */
	private function setHooks() {
		$themeHooks = config( 'app.hooks' );

		$hooks = array_merge( $this->hooks, $themeHooks );

		foreach ( $hooks as $hookClass ) {
			$hook = $this->app->get( $hookClass );

			if ( method_exists( $hookClass, 'load' ) ) {
				$hook->load();
			}

			if ( method_exists( $hook, 'filter' ) ) {
				$this->checkFilter( $hook, $hookClass );

				add_filter(
					$hook->filter(),
					[ $hook, 'hook' ],
					$hook->priority ?? 10,
					$hook->params ?? 1,
				);
			}

			if ( method_exists( $hook, 'action' ) ) {
				$this->checkAction( $hook, $hookClass );

				add_action(
					$hook->action(),
					[ $hook, 'hook' ],
					$hook->priority ?? 10,
					$hook->params ?? 1,
				);
			}
		}
	}

	private function checkFilter( $hook, $hookClass ) {
		Assert::methodExists(
			$hook,
			'hook',
			/* translators: 1: hook class name. */
			sprintf(
				'Hook() method is not present at %s hook',
				$hookClass
			),
		);

		Assert::methodNotExists(
			$hook,
			'action',
			/* translators: 1: hook class name. */
			sprintf(
				'action() method could not be used inside %s filter',
				$hookClass
			),
		);
	}

	private function checkAction( $hook, $hookClass ) {
		Assert::methodExists(
			$hook,
			'hook',
			/* translators: 1: hook class name. */
			sprintf(
				'Hook() method is not present at %s hook',
				$hookClass
			),
		);

		Assert::methodNotExists(
			$hook,
			'filter',
			/* translators: 1: hook class name. */
			sprintf(
				'filter() method could not be used inside %s action',
				$hookClass
			),
		);
	}
}
