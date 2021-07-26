<?php
/**
 * Create widget with its template file
 *
 * @example
 * ```
 * php broccoli new:widget <WidgetName> -f
 * ```
 *
 * @package Brocooly
 * @since 0.7.0
 */

declare(strict_types=1);

namespace Brocooly\Console;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeWidget extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:widget';

	/**
	 * Widget name
	 *
	 * @var string
	 */
	private string $widget;

	/**
	 * Widget stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'widget.stub';

	/**
	 * Shortcode stub file view template
	 *
	 * @var string
	 */
	protected string $stubModelViewName = 'views/widget-view.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new widget' )
			->addArgument(
				'widget',
				InputArgument::REQUIRED,
				'Widget id'
			)
			->addOption(
				'template',
				'f',
				InputOption::VALUE_NONE,
				'Create view file for widget'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->widget = $input->getArgument( 'widget' );

		$this->createFile(
			$output,
			$this->widget,
			'/inc/Views/Widgets/',
			'Widget.php',
		);

		if ( $input->getOption( 'template' ) ) {
			$this->createFile(
				$output,
				$this->widget,
				'/resources/views/widgets/',
				'.twig',
				'view',
				true,
			);
		}

		return $this->success( $output, 'Widget was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ WIDGET }}'       => Str::ucfirst( $value ),
			'{{ SNAKE_WIDGET }}' => Str::snake( $value ),
			'{{ LC_WIDGET }}'    => Str::kebab( $value ),
		];
	}
}
