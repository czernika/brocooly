<?php
/**
 * Create Gutenberg block with its template file
 *
 * @example
 * ```
 * php broccoli new:block <BlockName> -f
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

class MakeBlock extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:block';

	/**
	 * Shortcode name
	 *
	 * @var string
	 */
	private string $block;

	/**
	 * Shortcode stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'block.stub';

	/**
	 * Shortcode stub file view template
	 *
	 * @var string
	 */
	protected string $stubModelViewName = 'views/block-view.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new Gutenberg block' )
			->addArgument(
				'block',
				InputArgument::REQUIRED,
				'Block name'
			)
			->addOption(
				'template',
				'f',
				InputOption::VALUE_NONE,
				'Create view file for block'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->block = $input->getArgument( 'block' );

		$this->createFile(
			$output,
			$this->block,
			'/inc/Views/Blocks/',
			'Blocks.php',
		);

		if ( $input->getOption( 'template' ) ) {
			$this->createFile(
				$output,
				$this->block,
				'/resources/views/blocks/',
				'.twig',
				'view',
				true,
			);
		}

		return $this->success( $output, 'Block was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ BLOCK }}'    => Str::ucfirst( $value ),
			'{{ LC_BLOCK }}' => Str::kebab( $value ),
		];
	}
}
