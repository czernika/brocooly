<?php

declare(strict_types=1);

namespace Theme;

use Brain\Monkey;
use Theme\Http\Brocooly;
use PHPUnit\Framework\TestCase;

class BrocoolyTest extends TestCase
{

	private $brocooly;

	/**
	 * @inheritDoc
	 */
	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		/**
		 * Create new Brocooly instance
		 */
		$this->brocooly = new Brocooly();
	}

	/**
	 * @inheritDoc
	 */
	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * Provide Brocooly class methods to check
	 *
	 * @return array
	 */
	public function add_methods_provider() {
		return [ [ 'definitions' ], [ 'context' ] ];
	}

	/**
	 * Assert method exists and returns array
	 *
	 * @dataProvider add_methods_provider
	 * @param string $method | method to check.
	 * @return void
	 */
	public function test_brocooly_method( string $method ) {
		$this->assertTrue( method_exists( $this->brocooly, $method ) );
		$this->assertIsArray( $this->brocooly->$method() );
	}
}
