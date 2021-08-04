<?php
/**
 * Do NOT send extra queries to resolve template
 * and redirect everything to index.php
 *
 * ! NOTE - it may cause some issues with plugins.
 * If you're have some problems remove this hook
 *
 * @package Brocooly
 * @since 0.8.10
 */

namespace Theme\Hooks;

class TemplateRedirect
{
	public function action() {
		return 'template_redirect';
	}

	public function hook() {
		require BROCOOLY_THEME_PATH . '/index.php';
		exit();
	}
}
