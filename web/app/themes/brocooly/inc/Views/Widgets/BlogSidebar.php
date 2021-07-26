<?php
/**
 * Custom blog sidebar
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Views\Widgets;

use Brocooly\Views\Widgets\AbstractSidebar;

class BlogSidebar extends AbstractSidebar
{

	/**
	 * Will be available as {{ blog_sidebar }}
	 *
	 * @var string
	 */
	public string $id = 'blog';

	/**
	 * Get sidebar options
	 *
	 * @return array
	 */
	public function options() {
		return [
			'name'          => esc_html__( 'Blog sidebar', 'brocooly' ),
			'description'   => esc_html__( 'Sidebar on blog page', 'brocooly' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => "</li>\n",
			'before_title'  => '<h2 class="mb-1 text-xl font-bold widgettitle">',
			'after_title'   => "</h2>\n",
		];
	}
}
