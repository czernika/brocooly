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

class MakeTaxonomy extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:taxonomy';

	/**
	 * Menu name
	 *
	 * @var string
	 */
	private string $taxonomy;

	/**
	 * Shortcode stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'taxonomy.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new taxonomy model' )
			->addArgument(
				'taxonomy',
				InputArgument::REQUIRED,
				'Taxonomy name'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->taxonomy = $input->getArgument( 'taxonomy' );

		$this->createFile(
			$output,
			$this->taxonomy,
			'/inc/Models/',
		);

		return $this->success( $output, 'Taxonomy was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ TAX }}'       => Str::ucfirst( $value ),
			'{{ SNAKE_TAX }}' => Str::snake( $value ),
		];
	}
}
