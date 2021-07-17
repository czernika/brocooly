<?php
/**
 * Test app hooks
 *
 * @package Brocooly
 * @since 0.7.0
 */

declare(strict_types=1);

use Brain\Monkey;
use Brocooly\Hooks\BodyClass;
use PHPUnit\Framework\TestCase;

use function Brain\Monkey\Functions\expect;

class HookTest extends TestCase
{

	/**
	 * App instance
	 *
	 * @var object
	 */
	private object $bodyClassHook;

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->bodyClassHook = new BodyClass();
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * BodyClass hook have `filter` method
	 */
	public function testBodyClassHookHasFilterMethod() {
		$this->assertTrue( method_exists( $this->bodyClassHook, 'filter' ) );
	}

	/**
	 * BodyClass hook `filter` method returns string
	 */
	public function testBodyClassHookFilterMethodReturnsString() {
		$this->assertSame( 'body_class', $this->bodyClassHook->filter() );
	}

	/**
	 * BodyClass hook have `hook` method
	 */
	public function testBodyClassHookHasHookMethod() {
		$this->assertTrue( method_exists( $this->bodyClassHook, 'hook' ) );
	}

	/**
	 * BodyClass hook `hook` method returns array
	 */
	public function testBodyClassHookHookMethodReturnsArray() {
		$fakeArray = [];
		$this->assertIsArray( $this->bodyClassHook->hook( $fakeArray ) );
	}
}
