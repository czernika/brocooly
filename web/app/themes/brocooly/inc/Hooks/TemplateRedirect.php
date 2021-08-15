<?php
/**
 * Do NOT send extra queries to resolve template
 * and redirect everything to index.php
 *
 * ! NOTE - your app may have some issues with plugins.
 * If you're remove this hook from `config/app.php`
 *
 * @package Brocooly
 * @since 0.8.10
 */

namespace Theme\Hooks;

class TemplateRedirect
{

	/**
	 * Action name
	 *
	 * @return string
	 */
	public function action() {
		return 'template_redirect';
	}

	/**
	 * Load theme root `index.php` as main and only template
	 * and exit
	 *
	 * @return void
	 */
	public function hook() {
		require BROCOOLY_THEME_PATH . '/index.php';
		exit;
	}
}
