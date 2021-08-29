# Changelog

## Release 0.14.1

* **[Fix]**: fixed blog action typo which leads to broken blog breadcrumb
* **[Feat]**: added lazy load support
* **[Feat]**: added node image into docker container
* **[Feat]**: added 1920px max-width for Tailwind config
* **[Style]**: added composer normalize as dev dependency

Release Date: August 29, 2021

## Release 0.14.0

* **[Major]**: added docker support (based on [this great work](https://github.com/urre/wordpress-nginx-docker-compose))
* **[Fix]**: fixed composer vendor file included twice
* **[Fix]**: fixed blog layout page title
* **[Fix]**: fixed config default key overriding config values
* **[Fix]**: fixed blog breadcrumbs when page_for_posts doesn't exist
* **[Feat]**: task() helper now may have arguments
* **[Refactor]**: added AppContainerInterface as app instance
* **[Refactor]**: User roles refactored
* **[Refactor]**: Brocooly config file moved into root folder
* **[Refactor]**: changed container caller and boot method
* **[Refactor]**: changed maintenance mode config
* **[Refactor]**: changed container app booting within functions.php file
* **[Style]**: added selection color

Release Date: August 28, 2021

## Release 0.13.2

* **[Fix]**: logged in users no longer bypassing maintenance mode
* **[Fix]**: fixed GetSearchForm hook called deprecated method
* **[Fix]**: fixed default styles not applied after installation
* **[Fix]**: airbnb-config name
* **[Feat]**: added support for focus-visible state
* **[Feat]**: threshold for assets brotli and gzip compression changed from 4kb to 2kb
* **[Feat]**: added user avatar trait

Release Date: August 26, 2021

## Release 0.13.1

* **[Fix]**: added correct PostRepositoryContract
* **[Feat]**: added support for stringified controller@method name for routing callback

Release Date: August 20, 2021

## Release 0.13.0

* **[Feat]**: maintenance mode
* **[Feat]**: implemented Porto containers
* **[Refactor]**: Views folder renamed to UI
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
