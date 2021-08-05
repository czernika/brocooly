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
	const PANEL_ID = 'contact_panel';

	/**
	 * Panel settings
	 * Same as for Kirki panel.
	 *
	 * Most of the time it is just label so you can pass it as a string.
	 * If you need more provide an array.
	 *
	 * @return array|string
	 */
	public function options() {
		return esc_html__( 'Contact data', 'brocooly' );
	}
}
