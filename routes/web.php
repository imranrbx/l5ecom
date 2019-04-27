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
Route::resource('checkout', 'OrderController');
Route::post('paypal', 'OrderController@paypal')->name('checkout.paypal');
Route::get('returnPaypal', 'OrderController@returnPaypal')->name('process.paypal');
Route::get('cancelPaypal', 'OrderController@cancelPaypal')->name('cancel.paypal');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'products.', 'prefix' => 'products'], function () {
	Route::get('/', 'ProductController@show')->name('all');
	Route::get('/{product}', 'ProductController@single')->name('single');
	Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('addToCart');
});

Route::group(['as' => 'cart.', 'prefix' => 'cart'], function () {
	Route::get('/', 'ProductController@cart')->name('all');
	Route::post('/remove/{product}', 'ProductController@removeProduct')->name('remove');
	Route::post('/update/{product}', 'ProductController@updateProduct')->name('update');
});

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
	Route::get('/', 'AdminController@dashboard');
	Route::get('category/{category}/remove', 'CategoryController@remove')->name('category.remove');
	Route::get('category/trash', 'CategoryController@trash')->name('category.trash');
	Route::get('category/recover/{id}', 'CategoryController@recoverCat')->name('category.recover');
	Route::get('product/{product}/remove', 'ProductController@remove')->name('product.remove');
	Route::get('product/trash', 'ProductController@trash')->name('product.trash');
	Route::get('product/recover/{id}', 'ProductController@recoverProduct')->name('product.recover');

	Route::view('product/extras', 'admin.partials.extras')->name('product.extras');

	Route::get('profile/{profile}/remove', 'ProfileController@remove')->name('profile.remove');
	Route::get('profile/trash', 'ProfileController@trash')->name('profile.trash');
	Route::get('profile/recover/{id}', 'ProfileController@recoverProduct')->name('profile.recover');
	Route::view('profile/roles', 'admin.partials.extras')->name('profile.extras');

	Route::get('profile/states/{id?}', 'ProfileController@getStates')->name('profile.states');
	Route::get('profile/cities/{id?}', 'ProfileController@getCities')->name('profile.cities');

	Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
	Route::resource('product', 'ProductController');
	Route::resource('category', 'CategoryController');
	Route::resource('profile', 'ProfileController');
});
Route::get('bydate', function(){
	return \App\User::where('created_at','=', '2019-03-22 12:50:23')->get();
});