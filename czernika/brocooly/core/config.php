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
use HelloNico\Twig\DumpExtension;
use Brocooly\Contracts\ModelContract;
use Whoops\Handler\PrettyPageHandler;
use Brocooly\Support\Factories\MetaFactory;
use Brocooly\Support\Builders\ModelBuilder;
use Brocooly\Support\Factories\FacadeFactory;
use Brocooly\Support\Factories\CustomizerFactory;

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

	/**
	 *--------------------------------------------------------------------------
	 * Debug helpers
	 *--------------------------------------------------------------------------
	 *
	 * Classes to handle errors and exceptions
	 */
	'dump'                                => create( DumpExtension::class ),
	'handler'                             => create( PrettyPageHandler::class ),

	/**
	 *--------------------------------------------------------------------------
	 * App Facades
	 *--------------------------------------------------------------------------
	 */
	'meta'                                => create( MetaFactory::class ),
	'facade'                              => create( FacadeFactory::class ),
	'mod'                                 => create( CustomizerFactory::class ),

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
