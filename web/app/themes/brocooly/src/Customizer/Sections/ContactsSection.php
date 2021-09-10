<?php
/**
 * Create customizer section
 *
 * Sections are wrappers for controls, a way to group multiple controls together.
 * All fields must belong to a section, no field can be an orphan.
 *
 * @see https://kirki.org/docs/setup/panels-sections/
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Theme\Customizer\Sections;

use Brocooly\Support\Facades\Mod;
use Brocooly\Customizer\AbstractSection;
use Theme\Customizer\Panels\ContactPanel;

class ContactsSection extends AbstractSection
{

	/**
	 * Section id
	 * Same as `$id` setting for `Kirki::add_section()`
	 *
	 * @var string
	 */
	const SECTION_ID = 'contacts';

	/**
	 * Section settings
	 * Same as `$args` setting for `Kirki::add_section()`
	 *
	 * @return array|string
	 */
	public function options() {
		return [
			'title' => esc_html__( 'Contacts', 'brocooly' ),
			'panel' => ContactPanel::PANEL_ID,
		];
	}

	/**
	 * Section controls
	 * Let's create contact email option field
	 *
	 * @see https://kirki.org/docs/controls/
	 * @return array
	 */
	public function controls() {
		return [
			Mod::text(
				[
					'settings' => 'email',
					'label'    => esc_html__( 'Email', 'brocooly' ),
				],
			),
			Mod::text(
				[
					'settings' => 'phone',
					'label'    => esc_html__( 'Phone number', 'brocooly' ),
				],
			),
			Mod::textarea(
				[
					'settings' => 'address',
					'label'    => esc_html__( 'Address', 'brocooly' ),
				],
			),
		];
	}

}
