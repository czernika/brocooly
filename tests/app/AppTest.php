<?php

declare(strict_types=1);

use Brain\Monkey;
use Brocooly\App;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class AppTest extends TestCase
{

	private $container;

	private $app;

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->container = container();
		$this->app       = new App( $this->container );
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * --------------------------------------------------------------------------
	 * Check \Brocooly\App object
	 * --------------------------------------------------------------------------
	 */
	public function test_app_must_be_an_instance_of_container_interface() {
		$this->assertTrue( app() instanceof ContainerInterface );
		$this->assertTrue( $this->app instanceof ContainerInterface );
	}

	public function test_app_must_be_an_object() {
		$this->assertIsObject( app() );
		$this->assertIsObject( $this->app );
	}

	/**
	 * --------------------------------------------------------------------------
	 * Check main methods
	 * --------------------------------------------------------------------------
	 * run() method will boot application.
	 * web() method will include routes for app
	 */
	public function app_methods_to_check() {
		return [ [ 'run' ], [ 'web' ] ];
	}

	/**
	 * @dataProvider app_methods_to_check
	 */
	public function test_app_must_have_methods( string $method ) {
		$this->assertTrue( method_exists( $this->app, $method ) );
	}

	/**
	 * --------------------------------------------------------------------------
	 * CORE_PATH constant must be defined
	 * --------------------------------------------------------------------------
	 */
	public function test_app_core_path_constant_must_be_defined() {
		$this->assertTrue( defined( 'CORE_PATH' ) );
	}
}
