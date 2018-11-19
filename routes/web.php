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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Guesthomecontroller@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/service', 'Guesthomecontroller@service');
Route::get('/gallery', 'Guesthomecontroller@gallery');
Route::get('/event', 'Guesthomecontroller@event');
Route::get('/pricing', 'Guesthomecontroller@pricing');
Route::get('/viewitem/{id}', 'Guesthomecontroller@show')->name('viewitem.show');
Route::get('/contact', 'Guesthomecontroller@contact')->name('contact');
Route::post('/message', 'Guesthomecontroller@message')->name('contact.submit');



Auth::routes();

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');

//email activation related routes
Route::get('/user/activation/{token}','Auth\RegisterController@userActivation');

Route::prefix('admin')->group(function(){
    Route::get('/signin', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Password reset routes
    Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    //item category related routes
    Route::get('/all_item_categories', 'ItemcategorysController@index')->name('all_item_categories.index');
    Route::post('/all_item_categories', 'ItemcategorysController@store')->name('all_item_categories.store');
    Route::delete('/all_item_categories/{id}', 'ItemcategorysController@destroy')->name('all_item_categorys.destroy');
});


Route::resource('cart', 'CartController');
Route::get('/cart','CartController@index')->name('cart');
Route::get('/paymentoption','CartController@paymentoption')->name('checkout');
Route::get('/paymentbkash','CartController@paymentbkash')->name('paymentbkash');
Route::get('/cashpayment','CartController@cashpayment')->name('cashpayment');
Route::post('/order','CartController@order')->name('order');
Route::post('/ordercash','CartController@ordercash')->name('ordercash');
Route::post('/confirmed','CartController@btransaction')->name('confirmation.tid');

Route::resource('users','UserController');
Route::resource('sliders','homeslidesController');
Route::resource('roles','RolesController');
Route::resource('sliders','SlidersController');
Route::resource('events','EventsController');
Route::resource('posts','PostsController');
Route::resource('comments','CommentsController');
Route::resource('items','ItemsController');
Route::resource('bookings','BookingsController');
Route::resource('payments','PaymentsController');
Route::resource('offers','OffersController');
Route::resource('services','ServicesController');
Route::resource('shippings','ShippingsController');
Route::resource('signatures','SignaturesController');
Route::resource('sliders','SlidersController');
Route::resource('bookingdurations','BookingdurationsController');
Route::resource('itemcategories','ItemcategorysController');
Route::resource('orders','OrdersController');
