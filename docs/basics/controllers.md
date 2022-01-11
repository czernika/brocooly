# Controllers

Controllers - is a class which may help you to organize requests and responses in a pretty way instead of writing closure functions inside routes itself.

## Create Controller

To create simple controller run the following command:

```bash
php broccoli new:controller SimpleController
```

This will create `SimpleController.php` file with no information within

```php
namespace Theme;

use Brocooly\Http\Controllers\BaseController;

class SimpleController extends BaseController
{
}
```

### Options

If you want to create abstract base Controller inside `src/Http/Controllers` directory, specify `-b` flag.

```bash
php broccoli new:controller SimpleController -b
```

which will create

```php
namespace Theme\Http\Controllers;

use Brocooly\Http\Controllers\BaseController;

abstract class SimpleController extends BaseController
{
}
```

Sometimes you need to extend not `BaseController` but `AjaxController` - it has its own place inside theme folder. So the command would be

!> AjaxController is currently in development mode so it can be easily changed by core itself. Yeap

```bash
php broccoli new:controller SimpleController -a
```

and generated file is

```php
namespace Theme;

use Theme\Http\Controllers\AjaxController;

class SimpleController extends AjaxController
{
	public function handle()
	{
		//...
	}
}
```

it has already create `handle()` template to work with.

To create more methods you may specify any of these flags: `-i` for invokable, `-c` to create `__construct()` and `-r` to create both `index()` and `single()`. You may mix as many flags as you wish

```bash
php broccoli new:controller CustomDir/SimpleController -acr
```

will generate

```php
namespace Theme\CustomDir;

use Theme\Http\Controllers\AjaxController;

class SimpleController extends AjaxController
{
	public function handle()
	{
		//...
	}


	public function __construct()
	{
		//...
	}


	public function index()
	{
		//...
	}


	public function single()
	{
		//...
	}
}
```

### What is Resource Controller

Out of the box WordPress separate every post type or taxonomy into two pages - singular page, which is **single** model, and its archive - or **index** file where there are all (or at least part) of models together. Instead of regular CRUD we are dealing mostly with singular-archive pages, or single-index templates. That is why Brocooly prefers refer single-index as a resource controller and methods.

## Usage

Use of controllers was described in a [routing](getting-started/routing.md) part of documentation.

Most common use is to pass Controller name and its method

```php
use Theme\Http\Controllers\PostController;

Route::get( 'is_single', [ PostController::class, 'index' ] );
```

This line means for `is_single()` case will be fired `index` method of `PostController` controller.

An alternative syntax would be

```php
Route::get( 'is_single', 'Theme\Http\Controllers\PostController@index' );
```

where controller and its method joined in a single line string with `@` as a divider.

> Remember to use a valid namespace for your Controller in both cases

Finally you pass only class name if it is invokable controller - basically a class which no need for any method except one.

```php
use Theme\Http\Controllers\PostController;

Route::get( 'is_single', PostController::class );
```

and your controller would be like

```php
class PostController
{
    public function __invoke()
    {
        // render the content
    }
}
```

### Passing Parameters

If you want to pass an argument to your method you need to pass it as a third parameter and accept inside method

```php
use Theme\Http\Controllers\PostController;

Route::get( 'is_single', [ PostController::class, 'single', new IndexRequest() ] );
```

```php
class PostController
{
    public function single( IndexRequest $request )
    {
        // dd( $request );
    }
}
```

### Dependency Injection

As was mentioned [before](basics/routing.md?id=dependency-injection) Brocooly supports single element dependency injection inside callback methods no need to pass param within Route facade, just bind it directly into controller method 

```php
Route::get( 'is_front_page', [ PostController::class, 'index' ] );

class PostController
{
    public function index( ThemeRequest $request )
    {
        dd( $request );
    }
}
```