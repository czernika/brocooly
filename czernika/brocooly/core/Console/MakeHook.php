<?php
/**
 * Create hook class
 *
 * @example
 * ```
 * php broccoli new:hook <HookName>
 * php broccoli new:hook <HookName> -f // filter
 * php broccoli new:hook <HookName> -a // action
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

class MakeHook extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:hook';

	/**
	 * Hook name
	 *
	 * @var string
	 */
	private string $hook;

	/**
	 * Hook stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'hook.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to set new hook' )
			->addArgument(
				'hook',
				InputArgument::REQUIRED,
				'Hook name'
			)
			->addOption(
				'filter',
				null,
				InputOption::VALUE_NONE,
				'Define hook as a filter'
			)
			->addOption(
				'action',
				null,
				InputOption::VALUE_NONE,
				'Define hook as an action'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->hook = $input->getArgument( 'hook' );

		if ( $input->getOption( 'filter' ) ) {
			$this->stubModelName = 'filter.stub';
		}

		if ( $input->getOption( 'action' ) ) {
			$this->stubModelName = 'action.stub';
		}

		$this->createFile(
			$output,
			$this->hook,
			'/inc/Hooks/',
		);

		return $this->success( $output, 'Hook was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ HOOK }}'       => Str::ucfirst( $value ),
			'{{ SNAKE_HOOK }}' => Str::snake( $value ),
		];
	}
}
