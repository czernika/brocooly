<?php
/**
 * Create Contact panel
 *
 * @see https://kirki.org/docs/setup/panels-sections/
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Theme\Customizer\Panels;

use Brocooly\Customizer\AbstractPanel;

class ContactPanel extends AbstractPanel
{

	/**
	 * Panel id
	 *
	 * @var string
	 */
	public static string $id = 'contact_panel';

	/**
	 * Panel settings
	 *
	 * @return array
	 */
	public function options() {
		return [
			'title' => esc_html__( 'Contact data', 'brocooly' ),
		];
	}
}
