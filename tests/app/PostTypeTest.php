<?php
/**
 * Test post types initialization
 *
 * @package Brocooly
 * @since 0.8.2
 */

declare(strict_types=1);

use Brain\Monkey;
use Brocooly\Models\PostType;
use PHPUnit\Framework\TestCase;

class CustomPostType extends PostType {

	protected static string $name = 'custom';

	public bool $doNotRegister = false;
}

class StandardWPPostType extends PostType {

}

class PostTypeTest extends TestCase
{

	/**
	 * Custom post type
	 *
	 * @var object
	 */
	private object $customPostType;

	/**
	 * Standard WordPress post type
	 *
	 * @var object
	 */
	private object $standardPostType;

	/**
	 * Abstract Post type model
	 *
	 * @var object
	 */
	private object $parentPostType;

	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->customPostType   = new CustomPostType();
		$this->standardPostType = new StandardWPPostType();
		$this->parentPostType   = $this->getMockBuilder( PostType::class )->getMock();
	}

	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * List of all public and protected methods
	 *
	 * @return array
	 */
	public function addParentPostTypeMethodsProvider() {
		return [
			[ 'options' ],
			[ 'getOptions' ],
			[ 'getName' ],
		];
	}

	/**
	 * List of all public and protected properties
	 *
	 * @return array
	 */
	public function addParentPostTypePropertiesProvider() {
		return [
			[ 'name' ],
			[ 'doNotRegister' ],
		];
	}

	/**
	 * @dataProvider addParentPostTypeMethodsProvider
	 */
	public function testParentPostTypeMethodExists( string $method ) {
		$this->assertTrue( method_exists( $this->parentPostType, $method ) );
	}

	/**
	 * @dataProvider addParentPostTypePropertiesProvider
	 */
	public function testParentPostTypePropertyExists( string $property ) {
		$this->assertTrue( property_exists( $this->parentPostType, $property ) );
	}

	public function testPostTypeExtendsAbstractPostType() {
		$parent = PostType::class;
		$this->assertSame( $parent, get_parent_class( $this->customPostType ) );
		$this->assertSame( $parent, get_parent_class( $this->standardPostType ) );
	}

}
