<?php
/**
 * Create menu model
 *
 * @example
 * ```
 * php broccoli new:role <RoleName>
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

class MakeRole extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:role';

	/**
	 * Menu name
	 *
	 * @var string
	 */
	private string $role;

	/**
	 * Shortcode stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'role.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new role' )
			->addArgument(
				'role',
				InputArgument::REQUIRED,
				'Role id'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->role = $input->getArgument( 'role' );

		$this->createFile(
			$output,
			$this->role,
			'/inc/Models/Users/',
			'Role.php',
		);

		return $this->success( $output, 'Role was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ ROLE }}'       => Str::ucfirst( $value ),
			'{{ SNAKE_ROLE }}' => Str::snake( $value ),
		];
	}
}
