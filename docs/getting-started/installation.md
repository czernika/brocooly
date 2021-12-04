# Installation

To install fresh copy of Brocooly Framework simply run next command:
```
composer create-project czernika/brocooly <your-project-folder>
```

Next fill in `.env` file at the root of your project with correct information, at least:

| Variable | Value |
| ------ | ------ |
| DB_NAME | database name |
| DB_USER | database user |
| DB_PASSWORD | database password |
| WP_HOME | Home URL of your site |

> It is recommended to fill WordPress salts also as a security measure

Create database. If you have wp-cli, all you need to do is
```
wp db create
```

This will create database named `DB_NAME` with `DB_PREFIX` prefixes for all tables.

Next go to `WP_HOME` address and finish the installation of WordPress or do it with `wp core install ...` command.

You will starter screen

![Starter screen](/_media/starter-screen.png)

That's it. Happy publishing!
