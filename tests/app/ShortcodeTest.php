<?php
/**
 * Test shortcodes instance
 *
 * @package Brocooly
 * @since 0.7.0
 */

declare(strict_types=1);

use Brain\Monkey;
use PHPUnit\Framework\TestCase;
use Brocooly\Shortcodes\AbstractShortcode;

class ShortcodeTest extends TestCase
{

	/**
	 * Shortcode instance
	 *
	 * @var object
	 */
	private object $shortcode;

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->shortcode = $this->getMockBuilder( AbstractShortcode::class )->getMock();
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * AbstractShortcode have render method
	 */
	public function testShortcodeHaveRenderMethod() {
		$this->assertTrue( method_exists( $this->shortcode, 'render' ) );
	}

	/**
	 * AbstractShortcode render method has only $attributes param
	 */
	public function testShortcodeRenderMethodHaveOnlyOneProperty() {
		$method = new \ReflectionMethod( $this->shortcode, 'render' );
		$this->assertTrue( 1 === $method->getNumberOfParameters() );
	}

	/**
	 * AbstractShortcode have id property
	 */
	public function testShortcodeHaveIdProperty() {
		$this->assertTrue( property_exists( $this->shortcode, 'id' ) );
	}

	/**
	 * AbstractShortcode's id property type is string
	 */
	public function testShortcodeIdPropertyIsString() {
		$this->assertIsString( $this->shortcode->id );
	}
}
