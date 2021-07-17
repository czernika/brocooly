<?php
/**
 * Test menu instance
 *
 * @package Brocooly
 * @since 0.7.0
 */

declare(strict_types=1);

use Brain\Monkey;
use Brocooly\App;
use DI\Container;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{

	/**
	 * App instance
	 *
	 * @var object
	 */
	private object $app;

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->app = $this->getMockBuilder( App::class )
						->setConstructorArgs( [ new Container() ] )
						->getMock();
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * `app()` function exists
	 */
	public function testAppFunctionExists() {
		$this->assertTrue( function_exists( 'app' ) );
	}
}
