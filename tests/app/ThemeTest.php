<?php
/**
 * Test theme switching
 *
 * @package Brocooly
 * @since 0.8.7
 */

declare(strict_types=1);

use Brain\Monkey;
use PHPUnit\Framework\TestCase;

class ThemeTest extends TestCase
{
	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();
	}

	public function tearDown(): void {

		/**
		 * Switch back to Brocooly
		 */
		switch_theme( 'brocooly' );

		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * Theme switcher provider
	 *
	 * @return array
	 */
	public function add_theme_switcher_provider() {
		return [ [ 'brocooly' ] ];
	}

	/**
	 * Test theme switching
	 * Assert theme text domain is same as theme name
	 *
	 * @dataProvider add_theme_switcher_provider
	 * @param string $theme | theme name.
	 */
	public function test_theme_switching( string $theme ) {
		switch_theme( $theme );

		$themeDomain = wp_get_theme()->get( 'TextDomain' );

		$this->assertSame( $theme, $themeDomain );
	}
}
