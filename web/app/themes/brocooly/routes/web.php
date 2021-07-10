<?php

use Brocooly\Router\Route;
use Theme\Controllers\FrontPageController;

// Route::get( 'is_front_page', [ FrontPageController::class, 'index' ] );
Route::get( 'is_front_page', FrontPageController::class );

/**
 *
 */
Route::resolve();
