<?php
/**
 * Create customizer option
 *
 * @example
 * ```
 * php broccoli new:sidebar <SidebarName>
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

class MakeSidebar extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:sidebar';

	/**
	 * Sidebar id
	 *
	 * @var string
	 */
	private string $sidebar;

	/**
	 * Hook stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'sidebar.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new sidebar location' )
			->addArgument(
				'sidebar',
				InputArgument::REQUIRED,
				'Sidebar id'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->sidebar = $input->getArgument( 'sidebar' );
		$outputFolder = '/inc/Views/Widgets/';
		$postfix      = 'Sidebar.php';

		$this->createFile(
			$output,
			$this->sidebar,
			$outputFolder,
			$postfix,
		);

		return $this->success( $output, 'Sidebar was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ SIDEBAR }}'       => Str::ucfirst( $value ),
			'{{ SNAKE_SIDEBAR }}' => Str::snake( $value ),
		];
	}
}
