<?php
/**
 * Theme instance.
 * Context from context() method will be available on any page as key value.
 * This array will be added to the global context through the `timber/context` filter.
 *
 * Definitions added directly into App Container.
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Theme\Http;

use Brocooly\Http\Request\WPRequest;

use function DI\create;

class Brocooly
{

	/**
	 * Set theme global context
	 *
	 * @return array | custom theme context.
	 */
	public function context() {
		$context = [

			/**
			 * WordPress conditionals
			 */
			'is_front'    => is_front_page(),
			'is_singular' => is_singular(),

			/**
			 * Queried object
			 */
			'queried'     => WPRequest::queried(),
		];

		return $context;
	}

	/**
	 * Bind values into DI\Container
	 *
	 * This method binds directly into ContainerBuilder
	 * so you're free to use any feature at any app environment
	 *
	 * This is EARLY access to DI\Container so bind here values
	 * extremely important for application. Otherwise use Providers
	 *
	 * @link https://php-di.org/doc/php-definitions.html
	 * @package Brocooly
	 * @since 0.9.1
	 */
	public function definitions() {
		$definitions = [

			/**
			 * --------------------------------------------------------------------------
			 * App Providers
			 * --------------------------------------------------------------------------
			 * Define a batch of entries for theme Actions and Services
			 *
			 * @see https://php-di.org/doc/php-definitions.html#wildcards
			 */
			'Theme\Containers\*\Contracts\Actions\*ActionContract' => create( 'Theme\Containers\*\Actions\*Action' ),

			/**
			 * --------------------------------------------------------------------------
			 * Main Users class
			 * --------------------------------------------------------------------------
			 *
			 * Will inherit `Timber\User` class to handle user metaboxes
			 *
			 * @since 0.16.1
			 */
			'users.parent'    => null,

			/**
			 * --------------------------------------------------------------------------
			 * Main Comments class
			 * --------------------------------------------------------------------------
			 *
			 * Same but for Comments
			 *
			 * @since 0.16.1
			 */
			'comments.parent' => null,
		];

		return $definitions;
	}
}
