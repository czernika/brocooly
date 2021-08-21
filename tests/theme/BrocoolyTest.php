<?php

declare(strict_types=1);

namespace Theme;

use Brain\Monkey;
use Theme\Http\Brocooly;
use PHPUnit\Framework\TestCase;

class BrocoolyTest extends TestCase
{

	private $theme;

	private $version = '0.13.2';

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->theme = new Brocooly();
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * Check current theme version
	 */
	public function test_theme_version() {
		$theme = wp_get_theme( 'brocooly' );
		$this->assertSame( $this->version, $theme->get( 'Version' ) );
	}

	/**
	 * --------------------------------------------------------------------------
	 * Check main methods
	 * --------------------------------------------------------------------------
	 * context() method will control custom Timber context.
	 * definitions() method will include config for container
	 */
	public function theme_methods_to_check() {
		return [ [ 'context' ], [ 'definitions' ] ];
	}

	/**
	 * @dataProvider theme_methods_to_check
	 */
	public function test_theme_must_have_methods( string $method ) {
		$this->assertTrue( method_exists( $this->theme, $method ) );
	}

	public function test_theme_context_method_should_return_array() {
		$this->assertIsArray( $this->theme->context() );
	}

	public function test_theme_definitions_method_should_return_array() {
		$this->assertIsArray( $this->theme->definitions() );
	}
}
