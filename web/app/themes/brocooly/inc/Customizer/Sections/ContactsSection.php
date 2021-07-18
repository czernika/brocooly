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

use Brocooly\Facades\Mod;
use Brocooly\Customizer\AbstractSection;

class ContactsSection extends AbstractSection
{

	/**
	 * Section id
	 * Same as `$id` setting for `Kirki::add_section()`
	 *
	 * @var string
	 */
	public static string $id = 'contacts';

	/**
	 * Section settings
	 * Same as `$args` setting for `Kirki::add_section()`
	 *
	 * @return array
	 */
	public function options() {
		return [
			'title' => esc_html__( 'Contacts', 'brocooly' ),
			// 'panel' => Panel::$id,
		];
	}

	/**
	 * Section controls
	 *
	 * @see https://kirki.org/docs/controls/
	 * @return array
	 */
	public function controls() {
		return [
			// Mod::text([ 'settings' => 'example_setting', 'label' => esc_html__( 'Example setting', 'brocooly'  ) ]),
		];
	}

}