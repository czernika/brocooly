<?php
/**
 * Carbon Fields Service Provider
 * Add support for metaboxes, option pages and widgets
 *
 * @package Brocooly
 * @since 0.2.0
 */

declare(strict_types=1);

namespace Brocooly\Providers;

use Carbon_Fields\Carbon_Fields;

class CarbonFieldsServiceProvider extends AbstractService
{
	/**
	 * Init Carbon Fields
	 */
	public function register() {
		add_action(
			'after_setup_theme',
			[ Carbon_Fields::class, 'boot' ],
		);
	}
}
