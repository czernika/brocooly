<?php
/**
 * Boot Config instance
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Loaders;

use Brocooly\App;
use Brocooly\Storage\Config;

class ConfigLoader
{

	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	private $app;

	public function __construct( App $app ) {
		$this->app = $app;
	}

	/**
	 * Get all configuration data from `config` folder
	 */
	public function call() {
		$configFiles = glob( wp_normalize_path( get_template_directory() . '/config' ) . '/*.php' );

		$data = [];
		foreach ( $configFiles as $file ) {
			$data[ pathinfo( $file )['filename'] ] = require_once $file;
		}

		$this->app->get( Config::class )::$data = $data;
	}
}
