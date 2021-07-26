<?php
/**
 * Create shortcode model with its template file
 *
 * @example
 * ```
 * php broccoli new:shortcode <ShortCodeName> -f
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

class MakeShortcode extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:shortcode';

	/**
	 * Shortcode name
	 *
	 * @var string
	 */
	private string $shortcode;

	/**
	 * Shortcode stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'shortcode.stub';

	/**
	 * Shortcode stub file view template
	 *
	 * @var string
	 */
	protected string $stubModelViewName = 'views/shortcode-view.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new shortcode' )
			->addArgument(
				'shortcode',
				InputArgument::REQUIRED,
				'Shortcode tag'
			)
			->addOption(
				'template',
				'f',
				InputOption::VALUE_NONE,
				'Create view file for shortcode'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->shortcode = $input->getArgument( 'shortcode' );

		$this->createFile(
			$output,
			$this->shortcode,
			'/inc/Views/Shortcodes/',
			'Shortcode.php',
		);

		if ( $input->getOption( 'template' ) ) {
			$this->createFile(
				$output,
				$this->shortcode,
				'/resources/views/shortcodes/',
				'.twig',
				'view',
				true,
			);
		}

		return $this->success( $output, 'Shortcode was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [
			'{{ SHORTCODE }}'    => Str::ucfirst( $value ),
			'{{ LC_SHORTCODE }}' => Str::kebab( $value ),
		];
	}
}
