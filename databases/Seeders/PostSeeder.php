<?php

/**
 * PostSeeder - database seeder
 *
 * @package Brocooly
 */

declare(strict_types=1);

namespace Databases\Seeders;

use Brocooly\Support\DB\Seeder;
use Theme\Models\WP\Post;

class PostSeeder extends Seeder
{
	/**
	 * Seeder post type
	 *
	 * @var object
	 */
	public $seeder = Post::class;

	/**
	 * How many times run seeder
	 *
	 * @var int
	 */
	public $times = 1;


	/**
	 * Return params as for `wp_insert_post`
	 *
	 * @return array
	 */
	public function params(): array
	{
		return [
			'post_title'   => 'Hello World again!',
			'post_author'  => 1,
			'post_content' => $this->faker->paragraph,
		];
	}
}
