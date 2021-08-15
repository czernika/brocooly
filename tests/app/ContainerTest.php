<?php

declare(strict_types=1);

namespace App;

use Brain\Monkey;
use Brocooly\App;
use Timber\Timber;
use Brocooly\Router\Router;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class ContainerTest extends TestCase
{

	private $container;

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->container = container();
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * --------------------------------------------------------------------------
	 * Check container implements ContainerInterface
	 * --------------------------------------------------------------------------
	 */
	public function test_app_must_be_an_instance_of_container_interface() {
		$this->assertTrue( container() instanceof ContainerInterface );
	}

	/**
	 * --------------------------------------------------------------------------
	 * Check app container keys
	 * --------------------------------------------------------------------------
	 * 'timber' key is for \Timber\Timber instance
	 * 'routing' key is for \Brocooly\Router\Router instance
	 */
	public function container_config_keys() {
		return [
			[ 'app', App::class ],
			[ 'timber', Timber::class ],
			[ 'routing', Router::class ],
		];
	}

	/**
	 * @dataProvider container_config_keys
	 */
	public function test_container_has_keys( string $objectKey, string $object ) {
		$this->assertTrue( $this->container->has( $objectKey ) );
		$this->assertTrue( $this->container->get( $objectKey ) instanceof $object );
	}
}
