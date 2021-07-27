<?php
/**
 * Handle any post type requests
 * Useful for mass assignment
 *
 * @package Brocooly
 * @since 0.8.7
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Brocooly\Contracts\ModelContract;
use Brocooly\Http\Controllers\BaseController;

class PostTypesController extends BaseController
{

	/**
	 * Post type instance
	 *
	 * @var object
	 */
	private $post;

	public function __construct( ModelContract $model ) {
		$this->post = $model;
	}

	/**
	 * Handle any post type
	 */
	public function single() {
		$post = $this->post::current();
		view( "content/{$this->post->getName()}/single.twig", compact( 'post' ) );
	}

}
