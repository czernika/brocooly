<?php
/**
 * Create customizer option
 *
 * @example
 * ```
 * php broccoli new:option <OptionName>
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

class MakeOption extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:customizer';

	/**
	 * Option name
	 *
	 * @var string
	 */
	private string $option;

	/**
	 * Hook stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'section.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new customizer settings' )
			->addArgument(
				'customizer',
				InputArgument::REQUIRED,
				'Section name or option'
			)
			->addOption(
				'option',
				null,
				InputOption::VALUE_NONE,
				'Create customizer option'
			)
			->addOption(
				'panel',
				null,
				InputOption::VALUE_NONE,
				'Create customizer panel'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->option = $input->getArgument( 'customizer' );
		$outputFolder = '/inc/Customizer/Sections/';
		$postfix      = 'Section.php';

		if ( $input->getOption( 'panel' ) ) {
			$this->stubModelName = 'panel.stub';
			$outputFolder        = '/inc/Customizer/Panels/';
			$postfix             = 'Panel.php';
		}

		if ( $input->getOption( 'option' ) ) {
			$this->stubModelName = 'option.stub';
			$outputFolder        = '/inc/Customizer/';
			$postfix             = 'Option.php';
		}

		$this->createFile(
			$output,
			$this->option,
			$outputFolder,
			$postfix,
		);

		return $this->success( $output, 'Customizer option was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ OPTION }}'       => Str::ucfirst( $value ),
			'{{ SNAKE_OPTION }}' => Str::snake( $value ),
		];
	}
}
