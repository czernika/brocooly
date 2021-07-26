<?php
/**
 * Create controller
 *
 * @example
 * ```
 * php broccoli new:controller <ControllerName>
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

class MakeController extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:controller';

	/**
	 * Controller name
	 *
	 * @var string
	 */
	private string $controller;

	/**
	 * Shortcode stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'controller.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new controller' )
			->addArgument(
				'controller',
				InputArgument::REQUIRED,
				'Controller name'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->controller = $input->getArgument( 'controller' );

		$this->createFile(
			$output,
			$this->controller,
			'/inc/Http/Controllers/',
			'Controller.php',
		);

		return $this->success( $output, 'Controller was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ CONTROLLER }}' => Str::ucfirst( $value ),
		];
	}
}
