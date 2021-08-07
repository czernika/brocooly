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
use Brocooly\Router\Routes;
use Brocooly\Router\Router;
use HelloNico\Twig\DumpExtension;
use Brocooly\Contracts\ModelContract;
use Brocooly\Support\Factories\MetaFactory;
use Brocooly\Support\Factories\FileFactory;
use Brocooly\Support\Builders\ModelBuilder;
use Brocooly\Support\Factories\FacadeFactory;
use Brocooly\Support\Factories\ValidatorFactory;
use Brocooly\Support\Factories\CustomizerFactory;
use Brocooly\Support\Factories\RouteFactory;

use function DI\get;
use function DI\create;
use function DI\factory;

$appDefintions = [

	/**
	 *--------------------------------------------------------------------------
	 * Main Application instances
	 *--------------------------------------------------------------------------
	 *
	 * Application itself and Timber class. As Brocooly depends on Timber
	 * this is a core of application.
	 */
	'bootstrap'                           => create( Bootstrap::class )
												->constructor( get( App::class ) ),
	'timber'                              => create( Timber::class ),
	'routing'                             => create( Router::class )
												->constructor( get( Routes::class ) ),

	/**
	 *--------------------------------------------------------------------------
	 * Debug helpers
	 *--------------------------------------------------------------------------
	 *
	 * Classes to handle errors and exceptions
	 */
	'dump'                                => create( DumpExtension::class ),

	/**
	 *--------------------------------------------------------------------------
	 * App Facades
	 *--------------------------------------------------------------------------
	 */
	'meta'                                => create( MetaFactory::class ),
	'facade'                              => create( FacadeFactory::class ),
	'mod'                                 => create( CustomizerFactory::class ),
	'validator'                           => create( ValidatorFactory::class ),
	'file'                                => create( FileFactory::class ),
	'router'                              => create( RouteFactory::class ),

	/**
	 * --------------------------------------------------------------------------
	 * Bind ServiceContracts with its Services
	 * --------------------------------------------------------------------------
	 */
	'Theme\Contracts\*ServiceContract'    => create( 'Theme\Services\*Service' ),
	'Theme\Contracts\*RepositoryContract' => create( 'Theme\Repositories\*Repository' ),
	ModelContract::class                  => factory( [ ModelBuilder::class, 'resolve' ] ),

];

return $appDefintions;
