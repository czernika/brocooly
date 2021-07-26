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

class MakeMenu extends CreateFileConsoleCommand
{

	/**
	 * The name of the command
	 */
	protected static $defaultName = 'new:menu';

	/**
	 * Menu name
	 *
	 * @var string
	 */
	private string $menu;

	/**
	 * Shortcode stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName = 'menu.stub';

	/**
	 * Set arguments for `configure()` method
	 */
	protected function setArguments() {
		$this
			->setDescription( 'Allows you to create new menu location' )
			->addArgument(
				'location',
				InputArgument::REQUIRED,
				'Location slug'
			);
	}

	/**
	 * Set arguments for `execute()` method
	 */
	protected function preexecute( InputInterface $input, OutputInterface $output ) {
		$this->menu = $input->getArgument( 'location' );

		$this->createFile(
			$output,
			$this->menu,
			'/inc/Views/Menus/',
			'Menu.php',
		);

		return $this->success( $output, 'Menu was successfully created' );
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		$postfix = config( 'menus.postfix' );
		return [
			'{{ MENU }}'          => Str::ucfirst( $value ),
			'{{ LC_MENU }}'       => Str::kebab( $value ),
			'{{ PREFIXED_MENU }}' => Str::kebab( $value ) . $postfix,
		];
	}
}
