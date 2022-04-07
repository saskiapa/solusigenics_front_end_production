<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('beranda');
});

Route::middleware(['IsNotLogin'])->group(function() {
    Route::get('/test', "api\FavoriteController@store");
    Route::get('/login', "LoginController@index")->name('login');
    Route::get('/signup', "SignupController@index");

    Route::prefix('api')->group(function()
    {
        Route::prefix('/user')->group(function() {
            Route::get('check_login', 'api\LoginController@checkLogin');
            Route::post('signup', "api\SignupController@index");
            Route::get('is_email_and_username_exist', "api\UserController@checkUsernameAndEmailExist");
        });
    });
});

Route::middleware(['IsLogin'])->group(function() {
    Route::get('/beranda', 'user\BerandaController@index')->name('beranda');
    Route::get('/tonton/{id}', 'user\WatchController@index')->name('watch');
    Route::get('/favorit', 'user\FavoriteController@index')->name('favorite');
    Route::get('/history', 'user\HistoryController@index')->name('history');

    Route::prefix('api')->group(function()
    {
        Route::prefix('/user')->group(function() {
            Route::get('/logout', "api\LogoutController@index");
            Route::get('/current_username', 'api\UserController@getCurrentUsername');
        });
        Route::prefix('/favorite')->group(function() {
            Route::post('store', 'api\FavoriteController@store');
            Route::get('isUserFavoritedVideo', 'api\FavoriteController@isUserFavoritedVideo');
            Route::post('delete', 'api\FavoriteController@deleteFavorite');
            Route::get('/', 'api\FavoriteController@getFavorite');
        });
        Route::prefix('/history')->group(function() {
            Route::post('store', 'api\WatchedController@store');
            // Route::get('isUserFavoritedVideo', 'api\WatchedController@isUserFavoritedVideo');
            Route::post('delete', 'api\WatchedController@deleteWatched');
            Route::get('/', 'api\WatchedController@getHistory');
        });
    });
});