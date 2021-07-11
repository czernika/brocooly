<?php
/**
 * Load theme definitions
 *
 * @package Brocooly
 * @since 0.1.1
 */

declare(strict_types=1);

namespace Brocooly\Loaders;

use Brocooly\App;

class DefinitionLoader
{
	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	private App $app;

	/**
	 * Definitions array
	 */
	private array $definitions = [];

	public function __construct( App $app ) {
		$this->app = $app;

		$this->definitions = [
			'BROCOOLY_THEME_PATH' => trailingslashit( get_template_directory() ),
			'BROCOOLY_THEME_URI'  => trailingslashit( get_template_directory_uri() ),
		];
	}

	/**
	 * Register theme definitions and constants
	 *
	 * @return void
	 */
	public function call() {
		foreach ( $this->definitions as $key => $value ) {
			defined( $key ) || define( $key, $value );
		}
	}
}
