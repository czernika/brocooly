<?php
/**
 * Abstract widget
 *
 * @package Brocooly
 * @since 0.4.0
 */

declare(strict_types=1);

namespace Brocooly\Widgets;

use Carbon_Fields\Widget;

class AbstractWidget extends Widget
{

	/**
	 * Widget id
	 *
	 * @var string
	 */
	protected string $widgetId = '';

	/**
	 * Setup widget
	 */
	public function __construct() {
        $this->setup(
			$this->widgetId,
			$this->title(),
			$this->description(),
			$this->options(),
		);
    }

	/**
	 * Widget title
	 *
	 * @return string
	 */
	protected function title() {
		throw new \Exception(
			sprintf(
				'Title was not set for "%s" widget!',
				$this->widgetId,
			),
			true,
		);
	}

	/**
	 * Widget description
	 *
	 * @return string
	 */
	protected function description() {
		return '';
	}

	/**
	 * Get widget options
	 *
	 * @return array
	 */
	protected function options() {
		return [];
	}

	/**
	 * Get widget view file
	 *
	 * @return string
	 */
	protected function view() {
		throw new \Exception(
			sprintf(
				'View file was not set for "%s" widget!',
				$this->widgetId,
			),
			true,
		);
	}

    /**
	 * Called when rendering the widget in the front-end
	 *
	 * @param array $args | widget arguments.
	 * @param array $instance | widget instance.
	 * @return void
	 */
    public function front_end( $args, $instance ) {
        view( $this->view(), compact( 'args', 'instance' ) );
    }
}
