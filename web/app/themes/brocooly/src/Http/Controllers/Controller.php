<?php
/**
 * Base request controller
 *
 * @package Brocooly
 * @since 0.10.2
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Brocooly\Http\Controllers\BaseController;

abstract class Controller extends BaseController
{
	/**
	 * Templates
	 *
	 * @var array
	 */
	protected array $templates = [
		'pages' => [
			'front' => 'content/front-page.twig',
		],
	];
}
