<?php
/**
 * Test menu instance
 *
 * @package Brocooly
 * @since 0.7.0
 */

declare(strict_types=1);

use Brain\Monkey;
use PHPUnit\Framework\TestCase;
use Brocooly\Menus\AbstractMenu;

class MenuTest extends TestCase
{

	/**
	 * Menu instance
	 *
	 * @var object
	 */
	private object $menu;

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->menu = $this->getMockBuilder( AbstractMenu::class )->getMock();
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * AbstractMenu have `label()` method
	 */
	public function testMenuHasLabelMethod() {
		$this->assertTrue( method_exists( $this->menu, 'label' ) );
	}

	/**
	 * AbstractMenu have `name` property
	 */
	public function testMenuHasNameProperty() {
		$this->assertTrue( property_exists( $this->menu, 'name' ) );
	}

	/**
	 * AbstractMenu have `name` property type is string
	 */
	public function testMenuNamePropertyIsString() {
		$this->assertIsString( $this->menu->name );
	}
}
