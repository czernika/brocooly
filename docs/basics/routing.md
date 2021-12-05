# Routing

All routes configuration files are inside `routes` folder where `web.php` is used to handle simple GET and POST requests, while `ajax.php` is for [WordPress AJAX requests](https://codex.wordpress.org/AJAX_in_Plugins) via `wp_ajax_` hooks

## Basics

Most basic route accept two parameters - any conditional callback or [WordPress conditional tag](https://codex.wordpress.org/Conditional_Tags), which should return `boolean` value and callback function fires when first condition is `true`. In most cases this would be `get()` method of `Brocooly\Support\Facades\Route`.

```php
use Brocooly\Support\Facades\Route;

Route::get( 'is_front_page', function() {
    echo 'Hello World';
} );
```

This mean on every page which will satisfied by `is_front_page()` WordPress condition (which is actually only one page) we will see 'Hello World' phrase.

### Conditions

But what does condition actually mean?

Most of the routing systems are close to URI-based routing, like if you're in a `http://site.com/hello-world` page, the route would be 'hello-world'. That is not how Brocooly routing work.

WordPress has it's own routing dynamic system (as it CMS not framework) based on root templates. For example, any post will be rendered by `single.php` or `singular.php` or `index.php`. Even more, WordPress template hierarchy provides much more options and flexibility. So there is no extra need to ruin it and even more - Brocooly routing system cares about it. It will handle same conditions as a first param. 

```php
Route::get( 'is_single', /** callback **/ );
```

So in this case callback will render content when there is `true === is_single()`. That's it. That is the logic behind it. But what if we have complex condition with a parameter in it? Like `is_singular( 'book' )` - so we need to show specific template for book's singular page. As it was said condition could be any callable - so you may pass an array 

```php
Route::get( [ 'is_singular', 'book' ], /** callback **/ );
```

or even callback itself. Let's say you want same template for singular book pages and any post archive page.

```php
function isBookSingularOrPostArchive() {
    return is_singular( 'book' ) || is_archive();
}

Route::get( 'isBookSingularOrPostArchive', /** callback **/ );

// or with anonymous arrow function
Route::get( fn() => is_singular( 'book' ) || is_archive(), /** callback **/ );
```

Wait. Does that mean we could pass **ANY** condition which will return `true` or `false`? That's true. So if you wish to create some simple intermediate page without its own editable content (like Thank you page or maybe even Login) - that is totally up to you.

```php
Route::get( fn() => '/login/' === $_SERVER['REQUEST_URI'], /** callback **/ );
```

In this case callback will be fired when we are on a login page.

Possible conflict of such approach is one page may correspond few conditionals - like `is_page()` and `is_singular()` - both will return `true` for singular WordPress page.

In this case any condition positioned above another will be fired. So

```php
Route::get( 'is_page', function() {
    echo 'Hello Page';
} );

Route::get( 'is_singular', function() {
    echo 'Hello Singular';
} );
```

Here we will see 'Hello Page' not 'Hello Singular' - as it is higher. Not in WordPress priority list - but actually higher in your code. This mean it is better to place specific conditions higher than other general - basically it is some kind of WordPress hierarchy but only having one index file. But if you wish basic WordPress system will still work - so `singular.php` file will have higher priority other than `index.php`.

### Callback

Callback - any callable simple as that. But at the same time there few rules and extra examples you may find useful.

As you mentioned before you may pass as a callback any function or function name as a string and it's will be fine. Brocooly prefers MVC and we're handling callbacks inside [Controllers](basics/controllers.md) and its methods.

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
    public function __invoke() {
        // render the content
    }
}
```

### Passing Params

Any controller method may accept any params but they're required to pass within routes. This will be the third param of a callback function. Let pass a `PostRequest` as a dependency for `index` method of `PostController`

```php
use Theme\Http\Controllers\PostController;

Route::get( 'is_single', [ PostController::class, 'index', new PostRequest() ] );
```

### Rendering the Content

That being said how to render the content? Well simple enough it is just a plain HTML as it is you may echo. So this would work

```php
class PostController
{
    public function index() {
        ?>
            <h1>Posts</h1>
            <ul>
                ...
            </ul>
        <?php
    }
}
```

Does it have any sense? Nope. So this where twig template engine comes in help. There is a special Brocooly helper function called `view()` - it is accepts two params - twig template name to render and it's context as an array (basically it is template data to work with).

```php
class PostController
{
    public function index() {
        $foo = 'bar';
        return view( 'content/post/index.twig', [ 'context_foo' => $foo ] );
    }
}
```

and inside `content/post/index.twig`

```twig
<h1>Posts</h1>
<p>{{ context_foo }}</p>
```

which will be rendered as

```html
<h1>Posts</h1>
<p>bar</p>
```

You may leave second parameter blank if there is no need in a special context inside a template.

By the way if there are no matching callback what will happen? Well under the hood Brocooly handle this case for you and will render `content/404.twig` template. If you wish to rewrite it, pass `is_404()` route at the bottom of the file as a last attempt to find appropriate template. 

## Available routes

List of all available route methods are next:

| Route | Request | Use case |
| ------ | ------ | ------ |
| `Route::get( $condition, $callback )` | GET | Most common use for any GET-request |
| `Route::view( $condition, $template )` | GET | Same as `get()` but when there are no need to create complicated callback-function |
| `Route::$condition( $callback )` | GET | Same as `get()` but it is a special case for WordPress simple conditional tags without any params |
| `Route::post( $handler, $callback )` | POST | Submit form requests handlers |
| `Route::ajax( $action, $callback )` | AJAX | Any WordPress AJAX request handled by `wp_ajax_` hooks |

Get method is the simplest and has been shown in examples bellow. It is most common use case so there a few shortcuts for it

### View Routing

Sometimes there is no need to create a Controller for a simple use case like `is_404()` - no data need to be passed, it is plain HTML in general so there is a simple method for that

```php
Route::view( 'is_404', 'content/404.twig' );
```

The syntax is straight as it is - render `content/404.twig` template on `is_404()` pages.

### Conditional Routing

As you may noticed there is specific syntax in a table bellow for `Route::$condition( $callback )` - what does that mean? Basically as Brocooly grows it have been noticed that most common used case will be `is_page`, `is_page`, `is_front_page` - those who doesn't require any param and they are simple as that. So `get-is_page` syntax became kinda irrelevant and this is where the story begins. 

If you pass WordPress conditional as a method name in a camelCase or snake_case it will do the trick. So basically next two lines are do the same

```php
Route::get( 'is_single', /** callback **/ );
Route::isSingle( /** callback **/ );
```

but the second one shorter while first is more universal - as being said **ONLY** WordPress conditionals maybe used as a conditional routing and only some of them - you cannot do the trick for `is_singular( 'book' )`.

### Post Routing

POST routing is a different other than GET - as it is not about rendering content but handling the requests. This route is used mostly for submission forms handling like create post, send message etc.

!> All routes must be defined not inside `routes/web.php` but `routes/ajax.php`.

Syntax is same as for GET but first parameter is actually action name for a `handler` function inside `twig` template as an `action` attribute inside form. Sounds complicated? So here is an example

```php
Route::post( 'actionName', /** callback **/ );
```

```twig
<form action="{{ handler( 'actionName' ) }}">
```

or

```twig
<form action="{{ site.site_url ~ 'admin-post.php' }}">
    <input type="hidden" name="actionName">
```

`handler()` function is just echoing path to `admin-post.php` file with `actionName` as `action` - nothing special. On a form submission callback function will be fired accordingly to its action name. The logic inside handler method is all up to you, but it should end in a redirect or rendering extra content.

This route basically registering `add_action( 'admin_post_actionName', /** callback **/ )`.

### AJAX Routing

AJAX routing is very similar to POST but more complex as it involves not only PHP script but Javascript also.

First of all routes must be defined not inside `routes/web.php` but `routes/ajax.php` as for POST routes. Second as a first param this requires action name which you should pass with Javascript data inside your AJAX request named `action`. Inside callback it should ends with `wp_die()` WordPress function.

```php
Route::ajax( 'actionName', /** callback **/ );
```

As a helper there is an `AjaxController` class present - it may be extended by your own controller. In this case it is better to call `index()` method as a callback inside `Route` but handle logic within protected `handle()` method. This way `wp_die()` will be handled by parent controller

```php
Route::ajax( 'actionName', [ PostAjaxController::class, 'index' ] );
```

```php
use Theme\Http\Controllers\AjaxController;

class PostAjaxController extends AjaxController
{
    protected function handle() {
        // AJAX request logic
    }
}
```

Under the hood this work like `add_action( 'wp_ajax_actionName', /** callback **/ )`.

If you want to allow unauthorized users be available to use these methods, chain route with `noPriv()` method, so both actions took place. This applied to POST routes also.

```php
Route::post( 'actionName', [ PostController::class, 'index' ] )->noPriv();
Route::ajax( 'actionName', [ PostAjaxController::class, 'index' ] )->noPriv();
```
