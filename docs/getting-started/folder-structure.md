# Folder structure

Brocooly Framework consist of two major parts - Brocooly core (which is intermediate between WordPress itself and its representation on front) and Brocooly theme (which is special WordPress theme)

## Core

Brocooly core basically requires only one folder for you to know (which is `config`) and root files.

### App configuration

```
config/
├─ environments/
│  ├─ development.php
│  ├─ production.php
│  ├─ staging.php
├─ app.php
```

App configuration is handled by `.env` file and `config/app.php`. Environment type includes also specific files for any WordPress environment type like if your environment defined inside `.env` file is production (`WP_ENV=production`) - `production.php` file will be included.

!> Note: you must **NOT** use `wp-config.php` file and handle any definition outside this in any environment 

### Custom environment

You may create as many environment types as you wish but there is only one restriction - name of the file should be exactly the same as environment name. Let say you want to create test environment - all you need to do is to create `test.php` file inside `config/environments` folder, fill ot with your configuration and define `WP_ENV` as `test`

> We suggest to follow `WP_ENVIRONMENT_TYPE` types convention [introduced](https://developer.wordpress.org/reference/functions/wp_get_environment_type/) in WordPress 5.8.0 - this way ypu may get it via native `wp_get_environment_type()` function

## Theme

You may find theme itself at `web/app/themes/brocooly` folder.