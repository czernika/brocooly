# Request

Request object is extended facade for great Laravel Validation object with its validation rules. While form data may be differ and slightly more complex but the basics are almost same (but minified)

## Create request object

```sh
php broccoli new:request RequestName
```

!> Pass `-b` flag if you wish to create base Request object inside `src/Http/Requests` folder. Otherwise you need to specify full path (or it will be created in a theme root `src` folder)

```php
namespace Theme;

use Brocooly\Http\Request\Request;

class SimpleThemeRequest extends Request
{
	public function rules(): array
	{
		//...
	}
}
```

It may accept any params but the main point is `rules` array - it is basically same as [Laravel validation rules](https://laravel.com/docs/8.x/validation) and do same job.

## Example with a SearchRequest

Let's create some basic example with a typical search request. As you know WordPress has `s` search query parameter. Let's validate it.

```php
class SearchThemeRequest extends Request
{
	public function rules(): array
	{
		's' => 'string|required|max:255',
	}
}
```

Basically we're checking `s` param to be string, required and has max length of 255 symbols. Let's check it for `https://domain.com/?s=searchphrase`

```php
Route::get( 'is_front_page', function( SearchThemeRequest $request ) {
    dd( $request->validate( $_GET )->passes() );
} );
```

It will return `true` if "searchphrase" is present and `false` if it fails provided rules

Brocooly provide abstract `ThemeRequest` class with `getDataOrFail()` method. It will return validated data if request passed validation or `false` if it's not. It is also set `firstError` parameter

```php
public function getDataOrFail( array $data ) : array|false
{
    $validatedData = $this->validate( $data );

    if ( $validatedData->fails() ) {
        $this->firstError = $validatedData->errors()->first();
        return false;
    }

    $data = $validatedData->validated();
    return $data;
}
```

## Extending rules

To create your own validation rule run command

```sh
php broccoli new:rule RuleName
```

Generated file is

```php
namespace Theme\Rules;

use Illuminate\Contracts\Validation\Rule;

class RuleName extends Rule
{
	public function __construct()
	{
		//...
	}


	public function passes($attribute, $value)
	{
		//...
	}


	public function message()
	{
		//...
	}
}
```

`passes()` method should return true value when rule is passed, `message()` - error message. To use it pass an object into rules array

```php
class SearchThemeRequest extends Request
{
	public function rules(): array
	{
		's' => [
            'string',
            'required',
            'max:255',
            new RuleName(),
        ],
	}
}
```

If you need to use it as a string rule there is more action to do. Let's have a practical example - we will check AJAX referer.

```php
namespace Theme\Rules;

use Illuminate\Contracts\Validation\Rule;

class AjaxReferer implements Rule
{

	public function __construct(
		private string $action = '-1',
	) {}

	public function passes( $attribute, $value ) {
		return check_ajax_referer( $this->action, $attribute, false );
	}

	public function message() {
		return esc_html__( 'AJAX referer failed', 'brocooly' );
	}
}
```

Next register new validation rule inside ServiceProvider by extending `Validator` facade which accept two params - name and callback 

```php
use Brocooly\Support\Facades\Validator;

add_action(
    'init',
    function() {
        Validator::extend(
            'ajax_referer',
            function( $attribute, $value, $parameters, $validator ) {
                $action = empty( $parameters ) ? '-1' : $parameters[0];
                return $this->app->make( AjaxReferer::class, compact( 'action' ) )
                        ->passes( $attribute, $value );
            }
        );
    }
);
```

Finally register error message within language file for i18n. That's it

!> Not sure why does it happens but `message()` in this case is not returned but it is required by rule implementation.