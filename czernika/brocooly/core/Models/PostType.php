<?php
/**
 * Abstract post type model
 *
 * @package Brocooly
 * @since 0.2.0
 */

declare(strict_types=1);

namespace Brocooly\Models;

use Timber\Post;
use Carbon_Fields\Container;
use Brocooly\Contracts\ModelContract;
use Brocooly\Support\Builders\PostTypeQueryBuilder;

abstract class PostType extends Post implements ModelContract
{

	/**
	 * Register post type or not
	 * Sometimes you don't want to register post type as it is already may be registered
	 * but you want to add extra metaboxes or queries
	 *
	 * In that case just set this variable to `true`
	 *
	 * @var bool
	 */
	public bool $doNotRegister = false;

	/**
	 * Post type slug
	 *
	 * @var string
	 */
	const POST_TYPE = 'post';

	/**
	 * Get post type name
	 *
	 * @return string
	 */
	public function getName() {
		if ( ! static::POST_TYPE ) {
			throw new \Exception( 'You must specify post type name', true );
		}

		return static::POST_TYPE;
	}

	/**
	 * Set post type options
	 *
	 * @throws Exception
	 */
	protected function options() {
		throw new \Exception( 'You must specify post type options', true );
	}

	/**
	 * Return post type options
	 *
	 * @throws Exception
	 */
	public function getOptions() {
		return $this->options();
	}

	/**
	 * Create metabox container for post types
	 *
	 * @param string $id | container id.
	 * @param string $label | container label.
	 * @param array  $fields | array of custom fields.
	 * @param string $context | The part of the page where the container should be shown.
	 * @return void
	 */
	protected function createFields( string $id, string $label, array $fields, string $context = 'normal' ) {
		$this->setContainer( $id, $label )
			->add_fields( $fields )
			->set_context( $context );
	}

	/**
	 * Set metabox container
	 *
	 * @param string $id | container id.
	 * @param string $label | container label.
	 * @return object
	 */
	protected function setContainer( string $id, string $label ) {
		$container = Container::make( 'post_meta', $id, $label )
						->where( 'post_type', '=', static::POST_TYPE );
		return $container;
	}

	/**
	 * Get posts by query
	 *
	 * @param string $name | method name.
	 * @param array  $arguments | method options.
	 * @return void
	 */
	public static function __callStatic( string $name, array $arguments ) {
		array_unshift( $arguments, static::POST_TYPE );
		return PostTypeQueryBuilder::$name( ...$arguments );
	}

	/**
	 * Create post type draft
	 *
	 * @param array   $data | passed data.
	 * @param boolean $wp_error | show error as WP_Error object.
	 * @return int | post id.
	 */
	public static function createDraft( array $data, bool $wp_error = false ) {
		$data['post_type']   = static::POST_TYPE;
		$data['post_author'] = get_current_user_id() ?? 1;
		return wp_insert_post( wp_slash( $data ), $wp_error );
	}

	/**
	 * Create post type
	 *
	 * @param array   $data | passed data.
	 * @param boolean $wp_error | show error as WP_Error object.
	 * @return int | post id.
	 */
	public static function create( array $data, bool $wp_error = false ) {
		$data['post_status'] = 'publish';
		$data['post_type']   = static::POST_TYPE;
		$data['post_author'] = get_current_user_id() ?? 1;
		return wp_insert_post( wp_slash( $data ), $wp_error );
	}

}
