<?php
/**
 * Create contact section
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Theme\Customizer\Sections;

use Brocooly\Facades\Mod;
use Brocooly\Customizer\AbstractSection;
use Theme\Customizer\Panels\ContactPanel;

class ContactSection extends AbstractSection
{

	/**
	 * Section id
	 *
	 * @var string
	 */
	public static string $id = 'contact_section';

	/**
	 * Section settings
	 *
	 * @return array
	 */
	public function options() {
		return [
			'title' => esc_html__( 'Site Contacts', 'brocooly' ),
			'panel' => ContactPanel::$id,
		];
	}

	/**
	 * Section controls
	 *
	 * @return array
	 */
	public function controls() {
		return [
			Mod::text([
				'settings' => 'email',
				'label'    => esc_html__( 'Contact Email', 'brocooly' ),
			]),
		];
	}

}
