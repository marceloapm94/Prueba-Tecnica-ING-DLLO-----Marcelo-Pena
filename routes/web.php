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




Auth::routes();


Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'PostsController@index')->name('home');
    Route::name('create_post_path')->get('/posts/create/{producto}/{precio}/{moneda}/{imagen}', 'PostsController@create');
    Route::name('store_post_path')->post('/posts', 'PostsController@store');
    Route::name('post_path')->get('/posts/{post}', 'PostsController@show');
    Route::name('edit_post_path')->get('/posts/{post}/edit', 'PostsController@edit');
    Route::name('update_post_path')->put('/posts/{post}', 'SoapController@bank');
    
    
    
    Route::get('bank', 'SoapController@bank');
    
    Route::name('banco')->put('banco', 'SoapController@banco');
    
    Route::name('return_path')->get('/afterbank/{post}', 'SoapController@afterbank');
    
    
    Route::name('addmoney.paywithpaypal')->get('paywithpaypal/{post}', 'AddMoneyController@payWithPaypal');
    Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
    Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));
    
    Route::name('addmoney.paywithML')->get('paywithML/{post}', 'AddMoneyControllerML@payWithML');
    Route::post('ML', array('as' => 'addmoney.ML','uses' => 'AddMoneyControllerML@postPaymentWithML',));
    
    Route::post('PSE', array('as' => 'addmoney.PSE','uses' => 'AddMoneyControllerPSE@postPaymentWithPSE',));
  


});

Route::get('/', 'PostsController@store');

Route::name('posts_path')->get('/posts', 'PostsController@index');

Route::name('posts_path')->get('/posts', 'PostsController@index');

Route::post('verificarpago', 'AddMoneyControllerML@getPaymentStatus');


