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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Customer Route
//get ('path')

// customerHomepage Display
Route::get('/registration/customerHomepage','CustomerController@create')->name('registration:customerHomepage');

// riderHomepage Display
Route::get('/registration/riderHomepage','RiderController@create')->name('registration:riderHomepage');

// staffHomepage Display
Route::get('/account/staffHomepage','StaffController@create')->name('account:staffHomepage');
Route::get('/account/customerProfileList','StaffController@index')->name('account:customerProfileList');

//service module
Route::resource('services','ServiceController');

Route::get('riderhome', function () {
    return view('riderHomepage');
})->middleware('auth', 'checkuser:runner@runner.com');

Route::get('customerHome', function () {
    return view('customerHome');
})->middleware('auth', 'checkuser:customer@customer.com');


//Payment
Route::get('/payment', function () {
    return view('payment/payment');
});

Route::get('/paymentoption', function () {
    return view('payment/paymentoption');
});


Route::get('/payment/cashondelivery','PaymentController@create')->name('payment:cashondelivery');

Route::post('/payment/cashondeliveryinsert','StudInsertController@insert');