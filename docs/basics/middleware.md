# Middleware

Middleware is just a simple filter for request before rendering page content. It may be used to prevent unauthorized users from being able to do something on yur page etc. But there are no restriction on it so you may use it as you wish - like rendering special banner on every page before loading, why not?

## Create Middleware

The only requirement to Middleware class is to have `handle()` method - that's it. You may use `broccoli` console commander:

```
php broccoli new:middleware <Class/Name/Within/Folder>
```

Let's say you want to create `IsIhar` middleware inside `MyMiddleware` folder the command will be

```bash
php broccoli new:middleware MyMiddleware/IsIhar
```

Inside `src` folder you will find `MyMiddleware` folder with `IsIhar.php` file inside with generated data:

```php
<?php

/**
 * IsIhar - custom theme middleware
 *
 * @package Brocooly
 */

declare(strict_types=1);

namespace Theme\MyMiddleware;

use Brocooly\Http\Middleware\AbstractMiddleware;

class IsIhar extends AbstractMiddleware
{
	public function handle()
	{
		//...
	}
}
```

where `Brocooly\Http\Middleware\AbstractMiddleware` is just abstract parent and **doesn't** required to be extended. For now.

### Base Middleware

If you wish to create base middleware you may specify `-b` flag

```bash
php broccoli new:middleware MyMiddleware/IsIhar -b
```

This will create same middleware but in a predefined folder inside `src/Http/Middleware`. 

## Define Middleware

Middleware may be defined by chaining methods in `Route` facade or in a controller's `__construct()` with `$this->middleware()` method.

### As a Route

This was mentioned in a [Routing](basics/routing.md?id=middleware) chapter but there is a few things to add. First of all, you may specify as many middleware as you wish just pass it as array. Second - this middleware will be applied to route condition not specific method - basically if you have two routes with same callback - you need to specify middleware twice.

```php
Route::get( 'is_single', [ PostController::class, 'index' ] )->middleware( [ 'middleware1', 'middleware2' ] );
```

### Within Controller

To register middleware within controller use `middleware()` method.

```php
use Theme\Http\Middleware\IsIhar;

class PostController extends Controller
{

	public function __construct()
	{
		$this->middleware( IsIhar::class );
	}
}

```

!> Make sure your controller extends `Brocooly\Http\Controllers\BaseController`

Here you can also pass as many middlewares as you wish. They will be fired by placement order.

```php
public function __construct()
{
    $this->middleware( [ IsIhar::class, 'second' ] );
}
```

This middleware will be applied for every method within this controller. If you want to exclude some methods or apply middleware only to specific one you may use `only()` or `except()` methods. 

```php
public function __construct()
{
    $this->middleware( [ IsIhar::class, 'second' ] )->only( 'index' );
}

public function index()
{
    // Middleware will fire
}

public function single()
{
    // Not
}
```

Both these methods accept as one method as many (in array format).

?> Currently there is no separation within controller so you cannot specify different middleware for different methods at once. But you may do it with `Route` facade.

### Named Middleware

If you wish to name middleware instead of calling class every time you need to register it inside `src/Http/Brocooly.php` file within `definitions()` method

```php
use Theme\Http\Middleware\IsIhar;

use function DI\create;

public function definitions() {
    $definitions = [
        'ihar' => create( IsIhar::class ),
    ];

    return $definitions;
}
```

Now you may pass `ihar` instead of `IsIhar::class` anywhere

```php
Route::get( 'is_single', [ PostController::class, 'index' ] )->middleware( 'ihar' );
```