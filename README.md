# Brocooly Framework - is it just another WordPress site?

![Brocooly Framework](https://github.com/czernika/brocooly/blob/master/web/app/themes/brocooly/screenshot.png?raw=true)

[![GitHub license](https://img.shields.io/github/license/czernika/brocooly)](https://github.com/czernika/brocooly/blob/master/LICENSE) [![GitHub release](https://img.shields.io/github/v/release/czernika/brocooly)](https://gitHub.com/AliakseynkaIhar/marusia/releases/) ![Last commit](https://img.shields.io/github/last-commit/czernika/brocooly) ![PHP version](https://img.shields.io/packagist/php-v/czernika/brocooly) [![BCH compliance](https://bettercodehub.com/edge/badge/czernika/brocooly?branch=master)](https://bettercodehub.com/) [![Codacy Badge](https://app.codacy.com/project/badge/Grade/4862637146c54f969718ef7e6f4f5856)](https://www.codacy.com/gh/czernika/brocooly/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=czernika/brocooly&amp;utm_campaign=Badge_Grade) ![Safe](https://img.shields.io/badge/Stay-Safe-red?logo=data:image/svg%2bxml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTEwIDUxMCIgaGVpZ2h0PSI1MTIiIHZpZXdCb3g9IjAgMCA1MTAgNTEwIiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnPjxnPjxwYXRoIGQ9Im0xNzQuNjEgMzAwYy0yMC41OCAwLTQwLjU2IDYuOTUtNTYuNjkgMTkuNzJsLTExMC4wOSA4NS43OTd2MTA0LjQ4M2g1My41MjlsNzYuNDcxLTY1aDEyNi44MnYtMTQ1eiIgZmlsbD0iI2ZmZGRjZSIvPjwvZz48cGF0aCBkPSJtNTAyLjE3IDI4NC43MmMwIDguOTUtMy42IDE3Ljg5LTEwLjc4IDI0LjQ2bC0xNDguNTYgMTM1LjgyaC03OC4xOHYtODVoNjguMThsMTE0LjM0LTEwMC4yMWMxMi44Mi0xMS4yMyAzMi4wNi0xMC45MiA0NC41LjczIDcgNi41NSAxMC41IDE1LjM4IDEwLjUgMjQuMnoiIGZpbGw9IiNmZmNjYmQiLz48cGF0aCBkPSJtMzMyLjgzIDM0OS42M3YxMC4zN2gtNjguMTh2LTYwaDE4LjU1YzI3LjQxIDAgNDkuNjMgMjIuMjIgNDkuNjMgNDkuNjN6IiBmaWxsPSIjZmZjY2JkIi8+PHBhdGggZD0ibTM5OS44IDc3LjN2OC4wMWMwIDIwLjY1LTguMDQgNDAuMDctMjIuNjQgNTQuNjdsLTExMi41MSAxMTIuNTF2LTIyNi42NmwzLjE4LTMuMTljMTQuNi0xNC42IDM0LjAyLTIyLjY0IDU0LjY3LTIyLjY0IDQyLjYyIDAgNzcuMyAzNC42OCA3Ny4zIDc3LjN6IiBmaWxsPSIjZDAwMDUwIi8+PHBhdGggZD0ibTI2NC42NSAyNS44M3YyMjYuNjZsLTExMi41MS0xMTIuNTFjLTE0LjYtMTQuNi0yMi42NC0zNC4wMi0yMi42NC01NC42N3YtOC4wMWMwLTQyLjYyIDM0LjY4LTc3LjMgNzcuMy03Ny4zIDIwLjY1IDAgNDAuMDYgOC4wNCA1NC42NiAyMi42NHoiIGZpbGw9IiNmZjRhNGEiLz48cGF0aCBkPSJtMjEyLjgzIDM2MC4xMnYzMGg1MS44MnYtMzB6IiBmaWxsPSIjZmZjY2JkIi8+PHBhdGggZD0ibTI2NC42NSAzNjAuMTJ2MzBoMzYuMTRsMzIuMDQtMzB6IiBmaWxsPSIjZmZiZGE5Ii8+PC9nPjwvc3ZnPg==)

WordPress starter boilerplate with an improved folder structure (by [Bedrock](https://roots.io/bedrock)), twig template engine and webpack for compiling assets. It uses the power of [wepback](https://webpackjs.org) and [Timber](https://timber.github.io/docs/) together to simplify your local development workflow.

## Still Beta

> This package is on development mode

## Requirements

1. [Composer](https://getcomposer.org/)
2. PHP version 8.0 or greater
3. [Node.js](https://nodejs.org/)

## Getting Started

1 - Create a new project with

```sh
composer create-project czernika/brocooly your-app-folder
```

2 - Set your own environment variables in `.env` file

3 - Make sure the `DocumentRoot` is set to the `web` folder

See [here](https://roots.io/docs/bedrock/master/server-configuration/#nginx-configuration-for-bedrock).

4 - Install your project dependencies

```sh
npm install
```  

5 - Now you can run

```sh
npm run watch
```

It will start watching your application at `http://localhost:3000`. First time this will trigger WordPress installation process

## Documentation

See [here](https://czernika.gitbook.io/brocooly/). **Work in progress**

## Known Issues

1. During installation process you may see **WordPress database error: Table doesn't exist** error. It is appears as database is not set but you're already connected to it with `.env` file credentials.
2. Fatal error with `sqlite3` PHP module. No PHP downgrade allowed so the only option is to disable SQLite3 extension.
3. First time login by 'wp-admin' - may not redirect to admin-panel although successfully being authenticated. If login by 'wp-login.php' - no problem.
4. Errors within `functions.php` bypassing maintenance mode
