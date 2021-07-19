<?php
/**
 * Console commands loader
 *
 * TODO: add support fot theme console commands?
 *
 * @package Brocooly
 * @since 0.7.0
 */

declare(strict_types=1);

namespace Brocooly;

use Brocooly\Console\MakeRole;
use Brocooly\Console\MakeHook;
use Brocooly\Console\MakeMenu;
use Brocooly\Console\MakeBlock;
use Brocooly\Console\MakeOption;
use Brocooly\Console\MakeWidget;
use Brocooly\Console\MakeSidebar;
use Brocooly\Console\MakePostType;
use Brocooly\Console\MakeTaxonomy;
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
		MakeRole::class,
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
	 * Get all console commands list
	 *
	 * @return array
	 */
	public static function get() {
		return static::$commands;
	}
}
