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

Route::get('/', function () {
    return view('welcome');
});

// backend routes
Route::group(['prefix' => '/admin', 'namespace' => 'V1\Web\backend'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::resource('/user', 'UserController');
    Route::resource('/news', 'NewsController');
    Route::resource('/information', 'InformationController');
    Route::resource('/banner', 'BannerController');
    Route::resource('/introduce', 'IntroduceController');
    Route::resource('/contact', 'ContactController');
    Route::post('/contact/changestatus', 'ContactController@changestatus')->name('contact.changestatus');
    Route::resource('/promotion', 'PromotionController');
    Route::post('/promotion/changestatus', 'promotionController@changestatus')->name('promotion.changestatus');
    Route::resource('/factory', 'FactoryController');
});
