<?php
/**
 * Create menu model
 *
 * @example
 * ```
 * php broccoli new:menu <MenuLocation>
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

class MakePostType extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:model';

	/**
	 * Menu name
	 *
	 * @var string
	 */
	private string $model;

	/**
	 * Shortcode stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'posttype.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new menu post type model' )
			->addArgument(
				'model',
				InputArgument::REQUIRED,
				'Model name'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->model = $input->getArgument( 'model' );

		$this->createFile(
			$output,
			$this->model,
			'/inc/Models/',
		);

		return $this->success( $output, 'Model was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ MODEL }}'       => Str::ucfirst( $value ),
			'{{ SNAKE_MODEL }}' => Str::snake( $value ),
		];
	}
}
