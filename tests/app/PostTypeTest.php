<?php
/**
 * Test post type instance
 *
 * @package Brocooly
 * @since 0.8.2
 */

declare(strict_types=1);

use Brain\Monkey;
use Brocooly\Models\PostType;
use PHPUnit\Framework\TestCase;

class PostTypeTest extends TestCase
{

	/**
	 * Post type instance
	 *
	 * @var object
	 */
	private object $postType;

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->postType = $this->getMockBuilder( PostType::class )->getMock();
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * Post Type has `getName()` method
	 */
	public function testPostTypeHasGetNameMethod() {
		$this->assertTrue( method_exists( $this->postType, 'getName' ) );
	}

	/**
	 * Post Type has `setOptions()` method
	 */
	public function testPostTypeHasSetOptionsMethod() {
		$this->assertTrue( method_exists( $this->postType, 'setOptions' ) );
	}

	/**
	 * Post Type has `getOptions()` method
	 */
	public function testPostTypeHasGetOptionsMethod() {
		$this->assertTrue( method_exists( $this->postType, 'getOptions' ) );
	}

	/**
	 * Post Type has `createFields()` method
	 */
	public function testPostTypeHasCreateFieldsMethod() {
		$this->assertTrue( method_exists( $this->postType, 'createFields' ) );
	}

	/**
	 * Post Type has `setContainer()` method
	 */
	public function testPostTypeHasSetContainerMethod() {
		$this->assertTrue( method_exists( $this->postType, 'setContainer' ) );
	}

	/**
	 * Post Type `setOptions()` method has only one param
	 */
	public function testPostTypeSetOptionsMethodHasOnlyOneProperty() {
		$method = new \ReflectionMethod( $this->postType, 'setOptions' );
		$this->assertTrue( 1 === $method->getNumberOfParameters() );
	}

	/**
	 * Post Type has `name` property
	 */
	public function testPostTypeHasNameProperty() {
		$this->assertTrue( property_exists( $this->postType, 'name' ) );
	}

	/**
	 * Post Type has `options` property
	 */
	public function testPostTypeHasOptionsProperty() {
		$this->assertTrue( property_exists( $this->postType, 'options' ) );
	}

	/**
	 * Post Type has `doNotRegister` property
	 */
	public function testPostTypeHasRegisterPropertyIsBoolean() {
		$this->assertIsBool( $this->postType->doNotRegister );
	}
}
