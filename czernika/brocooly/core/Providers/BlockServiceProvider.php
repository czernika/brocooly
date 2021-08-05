<?php
/**
 * Register custom Gutenberg blocks
 *
 * @package Brocooly
 * @since 0.6.0
 */

declare(strict_types=1);

namespace Brocooly\Providers;

class BlockServiceProvider extends AbstractService
{

	public function register() {
		$this->app->set( 'custom_blocks', config( 'blocks.blocks' ) );
	}

	public function boot() {
		$this->registerBlocks();
	}

	/**
	 * Register blocks
	 */
	private function registerBlocks() {
		$blocks = $this->app->get( 'custom_blocks' );

		if ( ! empty( $blocks ) ) {
			foreach ( $blocks as $block ) {
				$blockClass = $this->app->make( $block );

				if ( method_exists( $blockClass, 'render' ) ) {
					add_action(
						'carbon_fields_register_fields',
						[ $blockClass, 'render' ],
					);
				}
			}
		}
	}
}
