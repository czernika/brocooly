# Brocooly Framework - is it just another WordPress site?

[![GitHub license](https://img.shields.io/github/license/czernika/brocooly)](https://github.com/czernika/brocooly/blob/master/LICENSE) [![GitHub release](https://img.shields.io/github/v/release/czernika/brocooly)](https://gitHub.com/AliakseynkaIhar/marusia/releases/)[![BCH compliance](https://bettercodehub.com/edge/badge/czernika/brocooly?branch=master)](https://bettercodehub.com/)

WordPress starter boilerplate with an improved folder structure (by [Bedrock](https://roots.io/bedrock)), twig template engine and webpack for compiling assets. It uses the power of [wepback](https://webpackjs.org) and [Timber](https://timber.github.io/docs/) together to simplify your local development workflow.

## Dev Mode

> This package is still on development mode

## Requirements

1. [Composer](https://getcomposer.org/)
2. PHP version 7.4 or greater
3. [Node.js](https://nodejs.org/)

## Getting Started

1. Create a new project with
```sh
composer create-project aliha/marusia your-app-folder
```
2. Set your own environment variables in `.env` file

3. Make sure the `DocumentRoot` is set to the `web` folder
> Note! See [here](https://roots.io/docs/bedrock/master/server-configuration/#nginx-configuration-for-bedrock).

4. Install your project dependencies
```sh
npm install
```  

5. Now you can run
```sh
npm run watch
``` 

It will start watching your application at `http://localhost:3000`. First time this will trigger WordPress installation process
