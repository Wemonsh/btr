<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index');

Auth::routes();

Route::get('/home', 'MainController@index');
Route::get('/profile', 'HomeController@index')->name('home');
Route::get('/wowrueng', 'HomeController@gamew')->name('wowru');



// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::match(['get', 'post'], '/', ['uses' => 'Admin\MainController@index', 'as' => 'dashboard']);

    // Games
    Route::match(['get', 'post'], '/games' ,['uses' => 'Admin\GamesController@index', 'as' => 'gamesIndex']);
    Route::match(['get', 'post'], '/games/create' ,['uses' => 'Admin\GamesController@create', 'as' => 'gamesCreate']);
    Route::match(['get', 'post'], '/games/edit/{id}' ,['uses' => 'Admin\GamesController@edit', 'as' => 'gamesEdit']);
    Route::match(['get', 'post'], '/games/delete/{id}', ['uses' => 'Admin\GamesController@delete', 'as' => 'gamesDelete']);

        // Test Games
        Route::match(['get', 'post'], '/games/show/{id}', ['uses' => 'Admin\GamesController@show', 'as' => 'gamesShow']);
        Route::match(['get', 'post'], '/games/deleted' ,['uses' => 'Admin\GamesController@deleted', 'as' => 'gamesDeleted']);
        Route::match(['get', 'post'], '/games/recover/{id}', ['uses' => 'Admin\GamesController@recover', 'as' => 'gamesRecover']);

    // Services
    Route::match(['get', 'post'], '/services' ,['uses' => 'Admin\ServicesController@index', 'as' => 'servicesIndex']);
    Route::match(['get', 'post'], '/services/create' ,['uses' => 'Admin\ServicesController@create', 'as' => 'servicesCreate']);
    Route::match(['get', 'post'], '/services/edit/{id}' ,['uses' => 'Admin\ServicesController@edit', 'as' => 'servicesEdit']);
    Route::match(['get', 'post'], '/services/delete/{id}', ['uses' => 'Admin\ServicesController@delete', 'as' => 'servicesDelete']);

        // Test Services
        Route::match(['get', 'post'], '/services/show/{id}', ['uses' => 'Admin\ServicesController@show', 'as' => 'servicesShow']);
        Route::match(['get', 'post'], '/services/deleted' ,['uses' => 'Admin\ServicesController@deleted', 'as' => 'servicesDeleted']);
        Route::match(['get', 'post'], '/services/recover/{id}', ['uses' => 'Admin\ServicesController@recover', 'as' => 'servicesRecover']);

    // Categories
    Route::match(['get', 'post'], '/categories' ,['uses' => 'Admin\CategoriesController@index', 'as' => 'categoriesIndex']);
    Route::match(['get', 'post'], '/categories/create' ,['uses' => 'Admin\CategoriesController@create', 'as' => 'categoriesCreate']);
    Route::match(['get', 'post'], '/categories/edit/{id}' ,['uses' => 'Admin\CategoriesController@edit', 'as' => 'categoriesEdit']);
    Route::match(['get', 'post'], '/categories/delete/{id}', ['uses' => 'Admin\CategoriesController@delete', 'as' => 'categoriesDelete']);

        // Test Categories
        Route::match(['get', 'post'], '/categories/show/{id}', ['uses' => 'Admin\CategoriesController@show', 'as' => 'categoriesShow']);
        Route::match(['get', 'post'], '/categories/deleted' ,['uses' => 'Admin\CategoriesController@deleted', 'as' => 'categoriesDeleted']);
        Route::match(['get', 'post'], '/categories/recover/{id}', ['uses' => 'Admin\CategoriesController@recover', 'as' => 'categoriesRecover']);

    // Selects
    Route::match(['get', 'post'], '/selects' ,['uses' => 'Admin\SelectsController@index', 'as' => 'selectsIndex']);
    Route::match(['get', 'post'], '/selects/create' ,['uses' => 'Admin\SelectsController@create', 'as' => 'selectsCreate']);
    Route::match(['get', 'post'], '/selects/edit/{id}' ,['uses' => 'Admin\SelectsController@edit', 'as' => 'selectsEdit']);
    Route::match(['get', 'post'], '/selects/delete/{id}', ['uses' => 'Admin\SelectsController@delete', 'as' => 'selectsDelete']);

        // Test Selects
        Route::match(['get', 'post'], '/selects/show/{id}', ['uses' => 'Admin\SelectsController@show', 'as' => 'selectsShow']);
        Route::match(['get', 'post'], '/selects/deleted' ,['uses' => 'Admin\SelectsController@deleted', 'as' => 'selectsDeleted']);
        Route::match(['get', 'post'], '/selects/recover/{id}', ['uses' => 'Admin\SelectsController@recover', 'as' => 'selectsRecover']);
});

Route::match(['get', 'post'], '/{game}/{service}', ['uses' => 'Game\ServiceController@index', 'as' => 'game']);

Route::match(['get', 'post'], '/{game}/{service}/create', ['uses' => 'Game\OrderController@create', 'as' => 'orderCreate']);

Route::match(['get', 'post'], '/{game}/{service}/show/{id}', ['uses' => 'Game\OrderController@show', 'as' => 'orderShow']);

Route::match(['get', 'post'], '/{game}/{service}/buy/{id}', ['uses' => 'Game\OrderController@buy', 'as' => 'orderBuy']);

