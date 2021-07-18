<?php
/**
 * Test customizer options, sections and panels
 *
 * @package Brocooly
 * @since 0.7.0
 */

declare(strict_types=1);

namespace App;

use Brain\Monkey;
use PHPUnit\Framework\TestCase;
use Brocooly\Customizer\AbstractOption;
use Brocooly\Customizer\AbstractPanel;
use Brocooly\Customizer\AbstractSection;

class CustomizerTest extends TestCase
{
	/**
	 * Option instance
	 *
	 * @var object
	 */
	private object $option;

	/**
	 * Section instance
	 *
	 * @var object
	 */
	private object $section;

	/**
	 * Panel instance
	 *
	 * @var object
	 */
	private object $panel;

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->option  = $this->getMockBuilder( AbstractOption::class )->getMock();
		$this->section = $this->getMockBuilder( AbstractSection::class )->getMock();
		$this->panel   = $this->getMockBuilder( AbstractPanel::class )->getMock();
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * `config( 'customizer.config' )` is array
	 */
	public function testCustomizerConfigIsArray() {
		$this->assertIsArray( config( 'customizer.config' ) );
	}

	/**
	 * `config( 'customizer.prefix' )` is string
	 */
	public function testCustomizerPrefixIsString() {
		$this->assertIsString( config( 'customizer.prefix' ) );
	}

	/**
	 * AbstractOption has `settings()` method
	 */
	public function testCustomizerOptionHasSettingsethod() {
		$this->assertTrue( method_exists( $this->option, 'settings' ) );
	}

	/**
	 * AbstractPanel has id property
	 */
	public function testCustomizerPanelHasIdProperty() {
		$this->assertTrue( property_exists( $this->panel, 'id' ) );
	}

	/**
	 * AbstractPanel's id property type is string
	 */
	public function testCustomizerPanelIdPropertyIsString() {
		$this->assertIsString( $this->panel::$id );
	}

	/**
	 * AbstractSection has `options()` method
	 */
	public function testCustomizerSectionHasOptionsMethod() {
		$this->assertTrue( method_exists( $this->section, 'options' ) );
	}

	/**
	 * AbstractSection has `controls()` method
	 */
	public function testCustomizerSectionHasControlsMethod() {
		$this->assertTrue( method_exists( $this->section, 'controls' ) );
	}

	/**
	 * AbstractSection has id property
	 */
	public function testCustomizerSectionHasIdProperty() {
		$this->assertTrue( property_exists( $this->section, 'id' ) );
	}

	/**
	 * AbstractSection's id property type is string
	 */
	public function testCustomizerSectionIdPropertyIsString() {
		$this->assertIsString( $this->section::$id );
	}
}
