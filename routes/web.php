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
Route::get('admin/login', 'V1\Web\backend\AdminController@getlogin')->name('be.login');
Route::post('admin/login', 'V1\Web\Backend\AdminController@postLogin')->name('be.postLogin');
Route::group(['prefix' => '/admin', 'namespace' => 'V1\Web\backend', 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::resource('/user', 'UserController');
    Route::resource('/news', 'NewsController');
    Route::resource('/information', 'InformationController');
    Route::resource('/banner', 'BannerController');
    Route::resource('/introduce', 'IntroduceController');
    Route::resource('/contact', 'ContactController');
    Route::post('/contact/changestatus', 'ContactController@changestatus')->name('contact.changestatus');
    Route::resource('/promotion', 'PromotionController');
    Route::post('/promotion/changestatus', 'PromotionController@changestatus')->name('promotion.changestatus');
    Route::resource('/factory', 'FactoryController');
    Route::resource('/offer', 'OfferController');
    Route::resource('/product', 'ProductController');
    Route::resource('/bill', 'BillController');
    Route::post('/bill/changestatus', 'BillController@changestatus')->name('bill.changestatus');
    Route::get('/bill/pdfexport/{id}', 'BillController@pdfexport')->name('bill.pdfexport');
    Route::resource('/service', 'ServiceController');
    Route::resource('/logo', 'LogoController');
    Route::get('/logout', 'AdminController@logout');
    Route::get('/statistics/product', [
        'uses' => 'StatisticController@getProductBill',
        'as' => 'statistic.getproductbill',
    ]);
    Route::get('/statistics/bill', [
        'uses' => 'StatisticController@getBill',
        'as' => 'statistic.getbill',
    ]);
    Route::resource('/comment', 'CommentController');
    Route::post('/comment/changestatus', 'CommentController@changestatus')
    ->name('comment.changestatus');
});

//Front End
Route::group(['namespace' => 'V1\Web\frontend'], function () {
    Route::get('/', 'HomeController@index')->name('fe.home.index');
    Route::get('/information', 'InformationController@index')->name('fe.information.index');
    Route::get('/information/{id}-{slug}', 'InformationController@detail')->name('fe.information.detail');
    Route::get('/product-new', 'ProductController@productNew')->name('fe.product.productnew');
    Route::get('/news', 'NewsController@index')->name('fe.new.index');
    Route::get('/news/{id}-{slug}', 'NewsController@detail')->name('fe.news.detail');
    Route::get('/contact', 'ContactController@index')->name('fe.contact.index');
    Route::post('/contact', 'ContactController@store')->name('fe.contact.store');
    Route::get('/register', 'HomeController@getRegister')->name('fe.register.getregister');
    Route::post('/register', 'HomeController@postRegister')->name('fe.register.postregister');
    Route::get('/register/edit', 'HomeController@getEditRegister')->name('fe.register.editregister');
    Route::post('/register/edit/{id}', 'HomeController@postEditRegister')->name('fe.register.posteditregister');
    Route::get('/login', 'HomeController@getLogin')->name('fe.login');
    Route::post('/login', 'HomeController@postLogin')->name('fe.postLogin');
    Route::get('/logout', 'HomeController@postLogout')->name('fe.postLogout');
    Route::get('/product/{id}-{slug}', 'ProductController@detail')->name('fe.product.detail');
    Route::get('/factory/{id}-{slug}', 'FactoryController@postFactory')->name('fe.factory.postfactory');
    // Giỏ hàng
    Route::get('/cart/checkout', 'HomeController@checkout')->name('fe.cart.checkout');
    Route::post('addCart/{product}', ['uses' => 'HomeController@addCart', 'as' => 'addCart']);
    Route::post('updateCart/{rowId}', ['uses' => 'HomeController@updateCart', 'as' => 'updateCart']);
    Route::delete('deleteCart/{rowId}', ['uses' => 'HomeController@deleteCart', 'as' => 'deleteCart']);
    Route::get('/search', 'HomeController@getSearch')->name('fe.search');
    //thanh toán
    Route::get('/cart/pay', 'HomeController@pay')->name('fe.cart.pay');
    Route::post('success', ['uses' => 'HomeController@store', 'as' => 'makeOrder']);
    //lịch sử đơn hàng đã đặt
    Route::get('/bill/history/{id}', 'HomeController@getHistoryBill')->name('fe.bill.history');
    Route::get('/bill/detail/{id}', [
        'uses' => 'HomeController@bill_detail',
        'as' => 'fe.bill_detail',
    ]);
    Route::get('cancelBill/{id}', [
        'uses' => 'HomeController@cancelBill',
        'as' => 'fe.bill.cancel',
    ]);
    // Bình luận
    Route::post('/comment', [
        'uses' => 'CommentController@store',
        'as' => 'fe.comment.store'
    ]);
});
