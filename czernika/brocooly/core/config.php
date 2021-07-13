<?php
/**
 * Configuration object for Container instance.
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Brocooly\App;
use Timber\Timber;
use Brocooly\Bootstrap;
use Brocooly\Factories\FacadeFactory;
use Brocooly\Factories\MetaFactory;
use HelloNico\Twig\DumpExtension;
use Theme\Contracts\PostServiceContract;
use Theme\Services\PostService;
use Whoops\Handler\PrettyPageHandler;

use function DI\get;
use function DI\create;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Main Application instances
	 *--------------------------------------------------------------------------
	 *
	 * Application itself and Timber class. As Brocooly depends on Timber
	 * this is a core of application.
	 *
	 */
	'bootstrap' => create( Bootstrap::class )
						->constructor( get( App::class ) ),
	'timber'    => create( Timber::class ),

	/**
	 *--------------------------------------------------------------------------
	 * Debug helpers
	 *--------------------------------------------------------------------------
	 *
	 * Classes to handle errors and exceptions
	 *
	 */
	'dump'      => create( DumpExtension::class ),
	'handler'   => create( PrettyPageHandler::class ),

	/**
	 *--------------------------------------------------------------------------
	 * App Facades
	 *--------------------------------------------------------------------------
	 *
	 */
	'facade'     => create( FacadeFactory::class ),
	'meta'       => create( MetaFactory::class ),

];
