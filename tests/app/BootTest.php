<?php

declare(strict_types=1);

namespace App;

use Brain\Monkey;
use Brocooly\App;
use DI\Container;
use Timber\Timber;
use Brocooly\Bootstrap;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class BootTest extends TestCase
{

	private $container;

	private $application;

	private $bootstrap;

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->container   = new Container();
		$this->application = new App( $this->container );
		$this->bootstrap   = new Bootstrap( $this->application );
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * `Run()` method inside Bootstrap object must be exist
	 */
	public function test_run_method_exists() {
		$this->assertTrue( method_exists( $this->bootstrap, 'run' ) );
	}

	/**
	 * Timber library should be running.
	 */
	public function test_timber_is_on() {
		$this->assertIsObject( $this->application->timber );
		$this->assertTrue( $this->application->timber instanceof Timber );
	}

	/**
	 * Public `app()` helper is a instance of \Brocooly\App class
	 */
	public function test_app() {
		$this->assertTrue( app() instanceof App );
		$this->assertTrue( app() instanceof ContainerInterface );
		$this->assertTrue( $this->application instanceof ContainerInterface );
	}
}
