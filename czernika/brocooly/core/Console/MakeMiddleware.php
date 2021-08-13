<?php
/**
 * Create middleware
 *
 * @example
 * ```
 * php broccoli new:middleware <MiddlewareName>
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

class MakeMiddleware extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:middleware';

	/**
	 * Middleware name
	 *
	 * @var string
	 */
	private string $middleware;

	/**
	 * Middleware stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'middleware.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new middleware' )
			->addArgument(
				'middleware',
				InputArgument::REQUIRED,
				'Middleware name'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->middleware = $input->getArgument( 'middleware' );

		$this->createFile(
			$output,
			$this->middleware,
			'/inc/Http/Middleware/',
		);

		return $this->success( $output, 'Middleware was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ MIDDLEWARE }}' => Str::ucfirst( $value ),
		];
	}
}
