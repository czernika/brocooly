<?php

declare(strict_types=1);

namespace Brocooly\Router;

use Timber\Timber;
use Brocooly\Storage\Context;

class View
{
    private static array $renderData = [];

    public static function make( $views, array $ctx = [] ) {
		$timberContext = Context::get();
		$ctx           = array_merge( $timberContext, $ctx );

		self::$renderData['context'] = $ctx;
		self::$renderData['views']   = $views;

		return Timber::render( self::$renderData['views'], self::$renderData['context'] );
	}

	public static function __callStatic( $name, $arguments ) {
		return Timber::$name( ...$arguments );
	}
}
