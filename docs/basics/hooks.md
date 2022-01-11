# Hooks

> Hooks are a way for one piece of code to interact/modify another piece of code at specific, pre-defined spots. They make up the foundation for how plugins and themes interact with WordPress Core, but they’re also used extensively by Core itself.

## Create hook via object

As Brocooly is still WordPress theme you may register hooks within `functions.php` file but there are plenty ways to do it in brocooly-way. First one - is by creating special hook object

```sh
php broccoli new:hook HookName
```

This will create next file inside `src/Hooks` directory

```php
namespace Theme\Hooks;

class HookName
{
	/**
	 * Hook function
	 * Hook itself. Call `add_action` or `add_filter` here
	 *
	 * @return void
	 */
	public function load(): void
	{
		//...
	}
}
```

Write your hook within `load()` method and register it within `config/app.php` file into `hooks` array. That's it.

But you may specify what type of hook do you want to create

### Actions

Pass `-a` flag when creating hook and it will create action hook

```sh
php broccoli new:hook HookName -a
```

```php
namespace Theme\Hooks;

class HookName
{
	/**
	 * Action hook name
	 * Pass correct hook name as for WordPress `add_action()`
	 *
	 * @return string
	 */
	public function action(): string
	{
		return 'hook_name';
	}


	/**
	 * Hook callback function
	 * Here you may set any action
	 */
	public function hook()
	{
		//...
	}
}
```

`action()` method should return action name, while `hook()` - its callback. There are also two object parameters - `$priority` (hook priority) and `$params` (amount of passed params).

### Filters

Same is valid for filters but the flag is `-f`

```sh
php broccoli new:hook HookName -f
```

```php
namespace Theme\Hooks;

class HookName
{
	/**
	 * Filter hook name
	 * Pass correct hook name as for WordPress `add_filter()`
	 *
	 * @return string
	 */
	public function filter(): string
	{
		return 'hook_name';
	}


	/**
	 * Hook callback function
	 * Here you may set any action
	 *
	 * ! Don't forget: filters HAVE TO return something
	 */
	public function hook($something)
	{
		return $something;
	}
}
```

## Pass hook via ServiceProvider

You may write your hook inside `boot()` method of any registered `ServiceProvider` (any class which inherit `AbstractService` and registered within `providers` array of `config/app.php` file)

!> This method taking more and more place and priority as there is no need in any shenanigans around it