<?php
/**
 * Register Primary navigation menu
 *
 * @package Brocooly
 * @since 0.1.2
 */

declare(strict_types=1);

namespace Theme\Views\Menus;

use Brocooly\Views\Menus\AbstractMenu;

class PrimaryMenu extends AbstractMenu
{

	/**
	 * Menu name
	 * Will be available in twig files as `primary_menu`
	 *
	 * @var string
	 */
	public string $name = 'primary';

	/**
	 * Get menu label in admin area
	 *
	 * @return string
	 */
	public function label() {
		return esc_html__( 'Primary menu', 'brocooly' );
	}
}
