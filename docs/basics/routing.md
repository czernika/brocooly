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

## Available routes

List of all available route methods are next:

| Route | Request | Use case |
| ------ | ------ | ------ |
| `Route::get( $condition, $callback )` | GET | Most common use for any GET-request |
| `Route::view( $condition, $template )` | GET | Same as `get()` but when there are no need to create complicated callback-function |
| `Route::$condition( $callback )` | GET | Same as `get()` but it is a special case for WordPress simple conditional tags without any params |
| `Route::post( $handler, $callback )` | POST | Submit form requests handlers |
| `Route::ajax( $action, $callback )` | AJAX | Any WordPress AJAX request handled by `wp_ajax_` hooks |

### Route::get() 