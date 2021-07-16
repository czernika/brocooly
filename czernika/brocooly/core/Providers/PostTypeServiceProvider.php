<?php
/**
 * Register custom post types and taxonomies
 * Register nav menus and add them into global context
 *
 * @package Brocooly
 * @since 0.1.2
 */

declare(strict_types=1);

namespace Brocooly\Providers;

use Theme\Models\WP\Comment;

class PostTypeServiceProvider extends AbstractService
{

	/**
	 * Values reserved by WordPress
	 *
	 * @var array
	 */
	private array $protectedPostTypes = [ 'post', 'page' ];

	/**
	 * Values reserved by WordPress
	 *
	 * @var array
	 */
	private array $protectedTaxonomies = [ 'category', 'post_tag' ];

	public function register() {
		$this->app->set( 'custom_post_types', config( 'app.post_types', [] ) );
		$this->app->set( 'custom_taxonomies', config( 'app.taxonomies', [] ) );
	}

	public function boot() {
		$this->registerTaxonomies();
		$this->registerPostTypes();
		$this->registerComments();
	}

	/**
	 * Register post types
	 */
	private function registerPostTypes() {
		$postTypes = $this->app->get( 'custom_post_types' );

		if ( ! empty( $postTypes ) ) {
			foreach ( $postTypes as $postType ) {

				$cpt = $this->app->make( $postType );

				if ( in_array( $cpt->getName(), $this->protectedPostTypes, true ) ) {

					if ( method_exists( $cpt, 'fields' ) ) {
						add_action(
							'carbon_fields_register_fields',
							[ $cpt, 'fields' ],
						);
					}

					continue;
				}

				$cpt->setOptions( $cpt->options() );

				add_action(
					'init',
					function() use ( $cpt ) {
						register_post_type(
							$cpt->getName(),
							$cpt->getOptions(),
						);
					}
				);
			}
		}
	}

	/**
	 * Register taxonomies
	 */
	private function registerTaxonomies() {
		$taxonomies = $this->app->get( 'custom_taxonomies' );

		if ( ! empty( $taxonomies ) ) {
			foreach ( $taxonomies as $taxonomy ) {

				$tax = $this->app->make( $taxonomy );

				if ( in_array( $tax->getName(), $this->protectedTaxonomies, true ) ) {

					if ( method_exists( $tax, 'fields' ) ) {
						add_action(
							'carbon_fields_register_fields',
							[ $tax, 'fields' ],
						);
					}

					continue;
				}

				$tax->setOptions( $tax->options() );

				add_action(
					'init',
					function() use ( $tax ) {
						register_taxonomy(
							$tax->getName(),
							$tax->getPostTypes(),
							$tax->getOptions(),
						);
					}
				);
			}
		}
	}

	/**
	 * Register comment container
	 */
	private function registerComments() {
		$commentClass = Comment::class;

		if ( class_exists( $commentClass ) ) {
			$comment = $this->app->get( $commentClass );
			if ( method_exists( $comment, 'fields' ) ) {
				add_action(
					'carbon_fields_register_fields',
					[ $comment, 'fields' ],
				);
			}
		}
	}
}
