<?php
/**
 * Console commands loader
 *
 * @package Brocooly
 * @since 0.7.0
 */

declare(strict_types=1);

namespace Brocooly;

use Brocooly\Console\MakeMenu;
use Brocooly\Console\MakeHook;
use Brocooly\Console\MakeShortcode;
use Brocooly\Console\MakeController;

class Commands
{
	/**
	 * Array of available console commands
	 *
	 * @var array
	 */
	private static array $commands = [
		MakeMenu::class,
		MakeHook::class,
		MakeShortcode::class,
		MakeController::class,
	];

	/**
	 * Get all configuration data from `config` folder
	 */
	public static function get() {
		return static::$commands;
	}
}
