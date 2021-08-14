<?php
/**
 * Redirect facade.
 *
 * @package Brocooly
 * @since 0.11.1
 */

declare(strict_types=1);

namespace Brocooly\Support\Facades;

use Brocooly\Router\Redirect as RouterRedirect;

class Redirect extends AbstractFacade
{
	protected static $factory = RouterRedirect::class;
}
