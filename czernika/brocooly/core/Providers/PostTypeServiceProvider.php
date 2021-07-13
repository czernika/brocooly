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

class PostTypeServiceProvider extends AbstractService
{

	/**
	 * Values reserved by WordPress
	 *
	 * @var array
	 */
	private array $protectedPostTypes = [ 'post', 'page' ];

	public function register() {
		$this->app->set( 'custom_post_types', config( 'app.post_types', [] ) );
	}

	public function boot() {
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
}
