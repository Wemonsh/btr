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

//Route::get('/', 'MainController@index');
use App\Events\WebsocketEvent;

Route::get('/', function () {
    broadcast(new WebsocketEvent('some data'));
    return App\Http\Controllers\MainController::index();
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');


Route::get('/home', 'MainController@index');



Route::get('/wowrueng', 'HomeController@gamew')->name('wowru');

Route::group(['prefix' => 'main'], function() {
    Route::match(['get'], '/about', ['uses' => 'Main\AboutController@index', 'as' => 'about']);
    Route::match(['get'], '/faq', ['uses' => 'Main\FaqController@index', 'as' => 'faq']);
    Route::match(['get'], '/rank', ['uses' => 'Main\RankController@index', 'as' => 'rank']);
    Route::match(['get'], '/reviews', ['uses' => 'Main\ReviewsController@index', 'as' => 'reviews']);
    Route::match(['get'], '/rules', ['uses' => 'Main\RulesController@index', 'as' => 'rules']);
});

Route::group(['prefix' => 'profile'], function() {
    Route::match(['get', 'post'], '/', ['uses' => 'User\ProfileController@index', 'as' => 'profile']);
    Route::match(['get', 'post'], '/chat/{id?}', ['uses' => 'User\ChatController@index', 'as' => 'chat']);

    Route::get('/messages', 'User\ChatController@fetchMessages');
    Route::post('/messages', 'User\ChatController@sendMessage');
});

// Faq
Route::get('/faq', 'Faq\FaqController@index');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::match(['get', 'post'], '/', ['uses' => 'Admin\MainController@index', 'as' => 'dashboard']);

    // Users
    Route::match(['get', 'post'], '/users' ,['uses' => 'Admin\UsersController@index', 'as' => 'usersAdmin']);
    Route::match(['get', 'post'], '/users/edit/{id}' ,['uses' => 'Admin\UsersController@edit', 'as' => 'usersEdit']);
    Route::match(['get', 'post'], '/users/delete/{id}', ['uses' => 'Admin\UsersController@delete', 'as' => 'usersDelete']);

    // Roles
    Route::match(['get', 'post'], '/roles' ,['uses' => 'Admin\Roles\MainController@index', 'as' => 'rolesAdmin']);
    Route::match(['get', 'post'], '/roles/create' ,['uses' => 'Admin\Roles\MainController@create', 'as' => 'rolesCreate']);
    Route::match(['get', 'post'], '/roles/edit/{id}' ,['uses' => 'Admin\Roles\MainController@edit', 'as' => 'rolesEdit']);
    Route::match(['get', 'post'], '/roles/delete/{id}', ['uses' => 'Admin\Roles\MainController@delete', 'as' => 'rolesDelete']);

    // Orders
    Route::match(['get', 'post'], '/orders' ,['uses' => 'Admin\Order\MainController@index', 'as' => 'ordersAdmin']);
    Route::match(['get', 'post'], '/orders/show/{id}', ['uses' => 'Admin\Order\MainController@show', 'as' => 'ordersShow']);
    Route::match(['get', 'post'], '/orders/create' ,['uses' => 'Admin\Order\MainController@create', 'as' => 'ordersCreate']);
    Route::match(['get', 'post'], '/orders/edit/{id}' ,['uses' => 'Admin\Order\MainController@edit', 'as' => 'ordersEdit']);
    Route::match(['get', 'post'], '/orders/delete/{id}', ['uses' => 'Admin\Order\MainController@delete', 'as' => 'ordersDelete']);

    // Games
    Route::match(['get', 'post'], '/games', ['uses' => 'Admin\Game\MainController@index', 'as' => 'gamesAdmin']);

    // Faq
    Route::match(['get', 'post'], '/faq', ['uses' => 'Admin\Faq\MainController@index', 'as' => 'faqAdmin']);

    // Trashed
    Route::group(['prefix' => 'trashed', 'middleware' => 'admin'], function () {
        // Users
        Route::match(['get', 'post'], '/users', ['uses' => 'Admin\Trashed\UsersController@index', 'as' => 'usersDeleted']);
        Route::match(['get', 'post'], '/users/recover/{id}', ['uses' => 'Admin\Trashed\UsersController@recover', 'as' => 'usersRecover']);

        // Roles
        Route::match(['get', 'post'], '/roles', ['uses' => 'Admin\Trashed\RolesController@index', 'as' => 'rolesDeleted']);
        Route::match(['get', 'post'], '/roles/recover/{id}', ['uses' => 'Admin\Trashed\RolesController@recover', 'as' => 'rolesRecover']);

        // Orders
        Route::match(['get', 'post'], '/orders', ['uses' => 'Admin\Trashed\OrdersController@index', 'as' => 'ordersDeleted']);
        Route::match(['get', 'post'], '/orders/recover/{id}', ['uses' => 'Admin\Trashed\OrdersController@recover', 'as' => 'ordersRecover']);

        // Games
        Route::match(['get', 'post'], '/games', ['uses' => 'Admin\Trashed\GamesController@index', 'as' => 'gamesDeleted']);
        Route::match(['get', 'post'], '/games/recover/{id}', ['uses' => 'Admin\Trashed\GamesController@recover', 'as' => 'gamesRecover']);

        // Games Categories
        Route::match(['get', 'post'], '/games-categories', ['uses' => 'Admin\Trashed\GamesCategoriesController@index', 'as' => 'gamesCategoriesDeleted']);
        Route::match(['get', 'post'], '/games-categories/recover/{id}', ['uses' => 'Admin\Trashed\GamesCategoriesController@recover', 'as' => 'gamesCategoriesRecover']);

        // Games Selects
        Route::match(['get', 'post'], '/games-selects', ['uses' => 'Admin\Trashed\GamesSelectsController@index', 'as' => 'selectsDeleted']);
        Route::match(['get', 'post'], '/games-selects/recover/{id}', ['uses' => 'Admin\Trashed\GamesSelectsController@recover', 'as' => 'selectsRecover']);

        // Games Content
        Route::match(['get', 'post'], '/games-content', ['uses' => 'Admin\Trashed\GamesContentController@index', 'as' => 'contentDeleted']);
        Route::match(['get', 'post'], '/games-content/recover/{id}', ['uses' => 'Admin\Trashed\GamesContentController@recover', 'as' => 'contentRecover']);

        // Faq
        Route::match(['get', 'post'], '/faq', ['uses' => 'Admin\Trashed\FaqController@index', 'as' => 'faqDeleted']);
        Route::match(['get', 'post'], '/faq/recover/{id}', ['uses' => 'Admin\Trashed\FaqController@recover', 'as' => 'faqRecover']);

        // Faq Categories
        Route::match(['get', 'post'], '/faq-categories', ['uses' => 'Admin\Trashed\FaqCategoriesController@index', 'as' => 'faqCategoriesDeleted']);
        Route::match(['get', 'post'], '/faq-categories/recover/{id}', ['uses' => 'Admin\Trashed\FaqCategoriesController@recover', 'as' => 'faqCategoriesRecover']);

        // Slider
        Route::match(['get', 'post'], '/slider', ['uses' => 'Admin\Trashed\SliderController@index', 'as' => 'sliderDeleted']);
        Route::match(['get', 'post'], '/slider/recover/{id}', ['uses' => 'Admin\Trashed\SliderController@recover', 'as' => 'sliderRecover']);
    });

    // Slider
    Route::match(['get', 'post'], '/slider' ,['uses' => 'Admin\Slider\MainController@index', 'as' => 'sliderAdmin']);
    Route::match(['get', 'post'], '/slider/create' ,['uses' => 'Admin\Slider\MainController@create', 'as' => 'sliderCreate']);
    Route::match(['get', 'post'], '/slider/edit/{id}' ,['uses' => 'Admin\Slider\MainController@edit', 'as' => 'sliderEdit']);
    Route::match(['get', 'post'], '/slider/delete/{id}', ['uses' => 'Admin\Slider\MainController@delete', 'as' => 'sliderDelete']);

    // Users
//    Route::match(['get', 'post'], '/users' ,['uses' => 'Admin\UsersController@index', 'as' => 'usersIndex']);
//    Route::match(['get', 'post'], '/users/edit/{id}' ,['uses' => 'Admin\UsersController@edit', 'as' => 'usersEdit']);
//    Route::match(['get', 'post'], '/users/delete/{id}', ['uses' => 'Admin\UsersController@delete', 'as' => 'usersDelete']);
//
//    Route::match(['get', 'post'], '/users/deleted' ,['uses' => 'Admin\UsersController@deleted', 'as' => 'usersDeleted']);

//    // Games
//    Route::match(['get', 'post'], '/games' ,['uses' => 'Admin\GamesController@index', 'as' => 'gamesIndex']);
//    Route::match(['get', 'post'], '/games/create' ,['uses' => 'Admin\GamesController@create', 'as' => 'gamesCreate']);
//    Route::match(['get', 'post'], '/games/edit/{id}' ,['uses' => 'Admin\GamesController@edit', 'as' => 'gamesEdit']);
//    Route::match(['get', 'post'], '/games/delete/{id}', ['uses' => 'Admin\GamesController@delete', 'as' => 'gamesDelete']);
//
//        // Test Games
//        Route::match(['get', 'post'], '/games/show/{id}', ['uses' => 'Admin\GamesController@show', 'as' => 'gamesShow']);
//        Route::match(['get', 'post'], '/games/deleted' ,['uses' => 'Admin\GamesController@deleted', 'as' => 'gamesDeleted']);
//        Route::match(['get', 'post'], '/games/recover/{id}', ['uses' => 'Admin\GamesController@recover', 'as' => 'gamesRecover']);
//
//    // Services
//    Route::match(['get', 'post'], '/services' ,['uses' => 'Admin\ServicesController@index', 'as' => 'servicesIndex']);
//    Route::match(['get', 'post'], '/services/create' ,['uses' => 'Admin\ServicesController@create', 'as' => 'servicesCreate']);
//    Route::match(['get', 'post'], '/services/edit/{id}' ,['uses' => 'Admin\ServicesController@edit', 'as' => 'servicesEdit']);
//    Route::match(['get', 'post'], '/services/delete/{id}', ['uses' => 'Admin\ServicesController@delete', 'as' => 'servicesDelete']);
//
//        // Test Services
//        Route::match(['get', 'post'], '/services/show/{id}', ['uses' => 'Admin\ServicesController@show', 'as' => 'servicesShow']);
//        Route::match(['get', 'post'], '/services/deleted' ,['uses' => 'Admin\ServicesController@deleted', 'as' => 'servicesDeleted']);
//        Route::match(['get', 'post'], '/services/recover/{id}', ['uses' => 'Admin\ServicesController@recover', 'as' => 'servicesRecover']);
//
//    // Category
//    Route::match(['get', 'post'], '/categories' ,['uses' => 'Admin\CategoriesController@index', 'as' => 'categoriesIndex']);
//    Route::match(['get', 'post'], '/categories/create' ,['uses' => 'Admin\CategoriesController@create', 'as' => 'categoriesCreate']);
//    Route::match(['get', 'post'], '/categories/edit/{id}' ,['uses' => 'Admin\CategoriesController@edit', 'as' => 'categoriesEdit']);
//    Route::match(['get', 'post'], '/categories/delete/{id}', ['uses' => 'Admin\CategoriesController@delete', 'as' => 'categoriesDelete']);
//
//        // Test Category
//        Route::match(['get', 'post'], '/categories/show/{id}', ['uses' => 'Admin\CategoriesController@show', 'as' => 'categoriesShow']);
//        Route::match(['get', 'post'], '/categories/deleted' ,['uses' => 'Admin\CategoriesController@deleted', 'as' => 'categoriesDeleted']);
//        Route::match(['get', 'post'], '/categories/recover/{id}', ['uses' => 'Admin\CategoriesController@recover', 'as' => 'categoriesRecover']);
//
//    // Selects
//    Route::match(['get', 'post'], '/selects' ,['uses' => 'Admin\SelectsController@index', 'as' => 'selectsIndex']);
//    Route::match(['get', 'post'], '/selects/create' ,['uses' => 'Admin\SelectsController@create', 'as' => 'selectsCreate']);
//    Route::match(['get', 'post'], '/selects/edit/{id}' ,['uses' => 'Admin\SelectsController@edit', 'as' => 'selectsEdit']);
//    Route::match(['get', 'post'], '/selects/delete/{id}', ['uses' => 'Admin\SelectsController@delete', 'as' => 'selectsDelete']);
//
//        // Test Selects
//        Route::match(['get', 'post'], '/selects/show/{id}', ['uses' => 'Admin\SelectsController@show', 'as' => 'selectsShow']);
//        Route::match(['get', 'post'], '/selects/deleted' ,['uses' => 'Admin\SelectsController@deleted', 'as' => 'selectsDeleted']);
//        Route::match(['get', 'post'], '/selects/recover/{id}', ['uses' => 'Admin\SelectsController@recover', 'as' => 'selectsRecover']);
});

Route::match(['get', 'post'], '/{game}/{service}', ['uses' => 'Game\ServiceController@index', 'as' => 'game']);

Route::match(['get', 'post'], '/{game}/{service}/create', ['uses' => 'Game\OrderController@create', 'as' => 'orderCreate']);

Route::match(['get', 'post'], '/{game}/{service}/show/{id}', ['uses' => 'Game\OrderController@show', 'as' => 'orderShow']);

Route::match(['get', 'post'], '/{game}/{category}/buy/{id}', ['uses' => 'Game\OrderController@buy', 'as' => 'orderBuy']);

Route::match(['get', 'post'], '/{game}/{service}/edit/{id}', ['uses' => 'Game\OrderController@edit', 'as' => 'orderEdit']);


