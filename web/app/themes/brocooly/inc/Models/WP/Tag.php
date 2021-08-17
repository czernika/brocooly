<?php
/**
 * Post Tag model
 * Tags provide a useful way to group related posts together and to quickly tell readers what a post is about.
 * Tags also make it easier for people to find your content.
 *
 * @package Brocooly
 * @since 0.12.2
 */

declare(strict_types=1);

namespace Theme\Models\WP;

use Brocooly\Models\Taxonomy;

class Tag extends Taxonomy
{

	/**
	 * Taxonomy slug
	 * WordPress taxonomies like category or tags are protected
	 * from being registered twice
	 *
	 * @var string
	 */
	const TAXONOMY = 'post_tag';
}
