<?php
/**
 * Console commands loader
 *
 * @package Brocooly
 * @since 0.7.0
 */

declare(strict_types=1);

namespace Brocooly;

use Brocooly\Console\MakeBlock;
use Brocooly\Console\MakeMenu;
use Brocooly\Console\MakeHook;
use Brocooly\Console\MakeOption;
use Brocooly\Console\MakeWidget;
use Brocooly\Console\MakeSidebar;
use Brocooly\Console\MakeShortcode;
use Brocooly\Console\MakeController;
use Brocooly\Console\MakePostType;
use Brocooly\Console\MakeTaxonomy;

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
		MakeBlock::class,
		MakeOption::class,
		MakeWidget::class,
		MakeSidebar::class,
		MakeTaxonomy::class,
		MakePostType::class,
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
