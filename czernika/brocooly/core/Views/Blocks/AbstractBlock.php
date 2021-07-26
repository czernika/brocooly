<?php
/**
 * Abstract Gutenberg block
 *
 * @package Brocooly
 * @since 0.6.0
 */

declare(strict_types=1);

namespace Brocooly\Views\Blocks;

use Carbon_Fields\Block;
use Brocooly\Router\View;

abstract class AbstractBlock extends Block
{

	/**
	 * Get block title
	 *
	 * @return string
	 */
	protected function title() {
		return __( 'My Shiny Gutenberg Block', 'brocooly' );
	}

	/**
	 * Get block description
	 *
	 * @return string
	 */
	protected function description() {
		return '';
	}

	/**
	 * Get render file
	 *
	 * @throws Exception
	 */
	protected function view() {
		throw new \Exception(
			sprintf(
				'No render callback was set for block!',
			),
			true,
		);
	}

	/**
	 * Get block fields
	 *
	 * @return array
	 */
	protected function fields() {
		return [];
	}

	/**
	 * Get block category
	 *
	 * @return string
	 */
	protected function category() {
		return 'common';
	}

	/**
	 * Get block icon
	 *
	 * @return string
	 */
	protected function icon() {
		return 'heart';
	}

	/**
	 * Get WordPress blocks
	 *
	 * @return array
	 */
	protected function blocks() {
		return [];
	}

	public function render() {
		$this->make( $this->title() )

			->add_fields( $this->fields() )

			->set_description( $this->description() )

			->set_category( ...$this->setCategory() )

			->set_icon( $this->icon() )

			->set_inner_blocks( ! empty( $this->blocks() ) )

			->set_inner_blocks_template( $this->blocks() )

			->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
				View::make( $this->view(), compact( 'fields', 'attributes', 'inner_blocks' ) );
			} );

	}

	/**
	 * Set block category
	 *
	 * @return array
	 */
	private function setCategory() {
		if ( is_array( $this->category() ) ) {
			return $this->category();
		}

		return [ $this->category() ];
	}
}
