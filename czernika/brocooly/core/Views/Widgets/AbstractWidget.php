<?php
/**
 * Abstract widget
 *
 * It is extends Carbon_Fields\Widget and strongly depends on its logic.
 *
 * @package Brocooly
 * @since 0.4.0
 */

declare(strict_types=1);

namespace Brocooly\Views\Widgets;

use Carbon_Fields\Widget;
use Webmozart\Assert\Assert;

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

		Assert::stringNotEmpty(
			$this->widgetId,
			'You need to specify widget id',
		);

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
	 * @throws Exception if no title was provided.
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
	 * Get widget fields and options
	 *
	 * @return array
	 */
	protected function options() {
		return [];
	}

	/**
	 * Get widget view file
	 *
	 * @throws Exception if no file was provided.
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
