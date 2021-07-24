<?php
/**
 * Body class hook
 * Filters the list of CSS body class names for the current post or page.
 *
 * @link https://developer.wordpress.org/reference/hooks/body_class/
 * @package Brocooly
 * @since 0.3.0
 */

namespace Brocooly\Hooks;

class BodyClass
{

	/**
	 * Filter name
	 *
	 * @return string
	 */
	public function filter() {
		return 'body_class';
	}

	/**
	 * Add classes to body
	 * Will be available with {{ body_class }}
	 *
	 * Note that the filter function must return the array of classes
	 * after it is finished processing, or all of the classes will be cleared
	 * and could seriously impact the visual state of a user’s site.
	 *
	 * @param array $classes | classlist.
	 * @return array
	 */
	public function hook( array $classes ) {

		$include = [
			'is-iphone'            => $GLOBALS['is_iphone'],
			'is-chrome'            => $GLOBALS['is_chrome'],
			'is-safari'            => $GLOBALS['is_safari'],
			'is-ns4'               => $GLOBALS['is_NS4'],
			'is-opera'             => $GLOBALS['is_opera'],
			'is-mac-ie'            => $GLOBALS['is_macIE'],
			'is-win-ie'            => $GLOBALS['is_winIE'],
			'is-firefox'           => $GLOBALS['is_gecko'],
			'is-lynx'              => $GLOBALS['is_lynx'],
			'is-ie'                => $GLOBALS['is_IE'],
			'is-edge'              => $GLOBALS['is_edge'],
			'is-archive'           => is_archive(),
			'is-post_type_archive' => is_post_type_archive(),
			'is-attachment'        => is_attachment(),
			'is-author'            => is_author(),
			'is-category'          => is_category(),
			'is-tag'               => is_tag(),
			'is-tax'               => is_tax(),
			'is-date'              => is_date(),
			'is-day'               => is_day(),
			'is-feed'              => is_feed(),
			'is-comment-feed'      => is_comment_feed(),
			'is-front-page'        => is_front_page(),
			'is-home'              => is_home(),
			'is-privacy-policy'    => is_privacy_policy(),
			'is-month'             => is_month(),
			'is-page'              => is_page(),
			'is-paged'             => is_paged(),
			'is-preview'           => is_preview(),
			'is-robots'            => is_robots(),
			'is-search'            => is_search(),
			'is-single'            => is_single(),
			'is-singular'          => is_singular(),
			'is-time'              => is_time(),
			'is-trackback'         => is_trackback(),
			'is-year'              => is_year(),
			'is-404'               => is_404(),
			'is-embed'             => is_embed(),
			'is-mobile'            => wp_is_mobile(),
			'is-desktop'           => ! wp_is_mobile(),
			'has-blocks'           => function_exists( 'has_blocks' ) && has_blocks(),
		];

		/**
		 * Sidebars
		 */
		foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
			$include[ "is-sidebar-{$sidebar['id']}" ] = is_active_sidebar( $sidebar['id'] );
		}

		foreach ( $include as $class => $do_include ) {
			if ( $do_include ) {
				$classes[ $class ] = $class;
			}
		}

		return $classes;
	}
}
