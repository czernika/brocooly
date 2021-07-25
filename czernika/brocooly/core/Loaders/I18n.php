<?php
/**
 * I18n class to handle theme string translations
 *
 * @package Brocooly
 * @since 0.8.5
 */

declare(strict_types=1);

namespace Brocooly\Loaders;

use Brocooly\App;

class I18n
{

	/**
	 * Lang textdomain
	 *
	 * @var string
	 */
	private string $domain;

	/**
	 * Path to .pot files
	 *
	 * @var string
	 */
	private string $path;

	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	protected App $app;

	public function __construct( App $app ) {
		$this->app = $app;

		$this->domain = config( 'i18n.domain' );
		$this->path   = config( 'i18n.path' );

		$this->app->set( 'domain', $this->domain );
		$this->app->set( 'lang_pot_path', $this->path );
	}

	public function call() {
		add_action(
			'after_setup_theme',
			function() {
				load_textdomain( $this->domain, $this->path );
			}
		);
	}
}
