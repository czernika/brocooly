# Changelog

## Release 0.18.1

* **[Refactor]**: refactored broccoli console file
* **[Fix]**: fixed login page link

Release Date: November 7, 2021

## Release 0.18.0

* **[Refactor]**: refactor console commands
* **[Refactor]**: added base AjaxController
* **[Refactor]**: added base ThemeRequest

Release Date: November 7, 2021

## Release 0.17.0

* **[Refactor]**: minor changes

Release Date: November 6, 2021

## Release 0.16.3

* **[Docs]**: added docs

Release Date: October 16, 2021

## Release 0.16.2

* **[Feat]**: added support to extend allowed mime types

Release Date: October 4, 2021

## Release 0.16.1

* **[Feat]**: added parent `Comment` and `User` classes to extend from
* **[Feat]**: more config options for `brocooly.config.js`

Release Date: October 4, 2021

## Release 0.16.0

* **[Breaking]**: default theme was minified

* **[Feat]**: added support for extending Timber default classes. **Currently this works only for version 1.18!**
* **[Feat]**: added `Option` facade
* **[Docs]**: improved docs, fixed some typos

Release Date: September 21, 2021

## Release 0.15.0

* **[Breaking]**: `inc` folder renamed to `src` as there are may be additional extra includes

* **[Feat]**: added `copyrights()` filter
* **[Feat]**: added `Mail` facade to send emails via SMTP or default WordPress transport
* **[Feat]**: added default mail layout
* **[Feat]**: added `sprite()` function for SVG icons like `<svg><use xlink:href="{{ sprite('sprite-id') }}" /></svg>`
* **[Refactor]**: `Mod` facade now implements simple settings creation with `Mod::type('id', 'label')`
* **[Build]**: added `.min` postfix for minified scripts and styles
* **[Build]**: added `.stylelintignore` and `.eslintignore` files
* **[Build]**: changed `.browserslistrc` config

Release Date: September 12, 2021

## Release 0.14.2

* **[Fix]**: fixed broken console commands
* **[Fix]**: removed plugin disabler
* **[Feat]**: added support for script localization
* **[Feat]**: added `.distignore` file
* **[Feat]**: added html-twig compression feature for production mode
* **[Feat]**: now scripts may NOT be concatenated by default
* **[Feat]**: added support for custom manifest file name
* **[Feat]**: added `middlewareOnly()` method
* **[Refactor]**: generic favicon now has additional check
* **[Refactor]**: refactored `.htaccess` file

Release Date: September 9, 2021

## Release 0.14.1

* **[Fix]**: fixed blog action typo which leads to broken blog breadcrumb
* **[Feat]**: added lazy load support
* **[Feat]**: added node image into docker container
* **[Feat]**: added 1920px max-width for Tailwind config
* **[Refactor]**: some hooks were relocated into core, some were removed
* **[Style]**: added composer normalize as dev dependency
* **[Style]**: dark mode

Release Date: September 1, 2021

## Release 0.14.0

* **[Major]**: added docker support (based on [this great work](https://github.com/urre/wordpress-nginx-docker-compose))
* **[Fix]**: fixed composer vendor file included twice
* **[Fix]**: fixed blog layout page title
* **[Fix]**: fixed config default key overriding config values
* **[Fix]**: fixed blog breadcrumbs when `page_for_posts` doesn't exist
* **[Feat]**: `task()` helper now may have arguments
* **[Refactor]**: added `AppContainerInterface` as app instance
* **[Refactor]**: User roles refactored
* **[Refactor]**: Brocooly config file moved into root folder
* **[Refactor]**: changed container caller and boot method
* **[Refactor]**: changed maintenance mode config
* **[Refactor]**: changed container app booting within `functions.php` file
* **[Style]**: added selection color

Release Date: August 28, 2021

## Release 0.13.2

* **[Fix]**: logged in users no longer bypassing maintenance mode
* **[Fix]**: fixed `GetSearchForm` hook called deprecated method
* **[Fix]**: fixed default styles not applied after installation
* **[Fix]**: airbnb-config name
* **[Feat]**: added support for focus-visible state
* **[Feat]**: threshold for assets brotli and gzip compression changed from 4kb to 2kb
* **[Feat]**: added user avatar trait

Release Date: August 26, 2021

## Release 0.13.1

* **[Fix]**: added correct `PostRepositoryContract`
* **[Feat]**: added support for stringified controller@method name for routing callback

Release Date: August 20, 2021

## Release 0.13.0

* **[Feat]**: maintenance mode
* **[Feat]**: implemented Porto containers
* **[Refactor]**: `Views` folder renamed to `UI`
* **[Refactor]**: Contracts folder structure refactored

Release Date: August 20, 2021

## Release 0.12.2

* **[Feat]**: added Tag model
* **[Docs]**: improved docs for WordPress models

Release Date: August 17, 2021

## Release 0.12.1

* **[Feat]**: improved a11y
* **[Chore]**: added more translation
* **[Docs]**: added contribution for [Flaticon](https://www.flaticon.com/) icons
* **[Docs]**: improved docs for config environment
* **[Tests]**: added more tests

Release Date: August 16, 2021

## Release 0.12.0

* **[Feat]**: czernika/brocooly-core was separated from main project.

Release Date: August 15, 2021

## Beta Release

Release Date: August 6, 2021
