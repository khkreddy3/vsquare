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
Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about-us', function () {
    return view('about');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/contact-us', function () {
    return view('contact');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reference', 'HomeController@reference')->name('reference');

Route::get('/invoice', 'HomeController@invoice')->name('invoice');

    Route::POST('/getuserdatefromto',  'HomeController@getuserdatabyweek')->name('users.getuserfromtodate');

    Route::POST('/getuserdatefromtoarray',  'HomeController@getuserdatabyweekarray')->name('users.getuserdatefromtoarray');
    
    Route::get('/getuserdatabyweeklist',  'HomeController@getuserdatabyweeklist')->name('users.getuserdatabyweeklist');
    
    

Route::get('/view/{id}', 'HomeController@view')->name('view');

Route::get('myprofile','HomeController@myProfile')->name('admin.myprofile');
Route::patch('withdrawaccept/{id}', 'HomeController@withdrawaccept')->name('admin.withdrawaccept');

Route::get('income','HomeController@userinterest')->name('income');

Route::POST('/getdatefromto',  'HomeController@getdatabyweek')->name('getfromtodate');
Route::POST('/getdatefromtoarray',  'HomeController@getdatabyweekarray')->name('getdatefromtoarray');
Route::get('/getdatabyweeklist',  'HomeController@getdatabyweeklist')->name('getdatabyweeklist');
Route::get('/get-databy-weeklistrefer',  'HomeController@getdatabyweeklistRefer')->name('getdatabyweeklistRefer');

Route::get('/getdatabyweeklistpending',  'HomeController@getdatabyweeklistpending')->name('getdatabyweeklistpending');
Route::get('/get-databy-weeklistreferpending',  'HomeController@getdatabyweeklistReferpending')->name('getdatabyweeklistReferpending');

Route::get('/getdatabyweeklistpaid',  'HomeController@getdatabyweeklistpaid')->name('getdatabyweeklistpaid');
Route::get('/get-databy-weeklistreferpaid',  'HomeController@getdatabyweeklistReferpaid')->name('getdatabyweeklistReferpaid');



Route::get('/curlinsertintrest', 'Admin\IncomeController@curlinsertdata')->name('curlinsertdata');

// Route::get('/curlreferinsertdata', 'Admin\IncomeController@curlinsertdata88')->name('curlinsertdata88');

Route::get('/curlrefedatad', 'Admin\IncomeController@curlrefedatad')->name('curlrefedatad');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store', 'view']]);

    Route::get('/settings', 'SettingsController@index')->name('settings');

    Route::patch('/settings/updateinterest', 'SettingsController@updateinterest')->name('settings.updateinterest');

    Route::patch('/settings/updateapplication', 'SettingsController@updateapplication')->name('settings.updateapplication');

    Route::patch('/settings/setuserid', 'SettingsController@setuserid')->name('settings.setuserid');

    // Route::get('/settings', 'UserController@resetuserid')->name('settings.resetuserid');

    Route::get('/create',  'UserController@create')->name('users.create');

    Route::get('/adddetails/{id}',  'UserController@adddetails')->name('users.adddetails');

    Route::patch('/users/submitdetails/{id}', 'UserController@submitdetails')->name('users.submitdetails');

    Route::patch('/users/payment/{id}', 'UserController@paymentdetails')->name('users.paymentdetails');

    Route::POST('/create',  'UserController@store')->name('users.store');
    
    Route::get('/userajax',  'UserController@userajax');

    Route::get('/view/{id}',  'UserController@view')->name('users.view');

    Route::get('/edit/{id}',  'UserController@edit')->name('users.edit');

    Route::resource('/reference', 'ReferenController', ['except' => ['show', 'create', 'store']]);

    Route::resource('/income', 'IncomeController', ['except' => ['show', 'create', 'store']]);
    
    Route::get('/incomeexport', 'IncomeController@incomeexport')->name('incomeexport');

    Route::resource('/withdraw', 'WithdrawController', ['except' => ['show', 'create', 'store']]);

    Route::patch('/users/updaterecpt/{id}', 'UserController@updaterecpt')->name('users.updaterecpt');

    Route::patch('/users/updaterecharge/{id}', 'UserController@updaterecharge')->name('users.updaterecharge');

    Route::patch('/users/withdrawaccept/{id}', 'UserController@withdrawaccept')->name('users.withdrawaccept');
    
    Route::patch('/withdraw/withdrawaccept/{id}', 'WithdrawController@withdrawaccept')->name('withdraw.withdrawaccept');

    Route::resource('/invoice', 'InvoiceController', ['except' => ['show', 'create', 'store']]);

    Route::POST('/getdatefromto',  'IncomeController@getdatabyweek')->name('users.getfromtodate');

    Route::POST('/getdatefromtoarray',  'IncomeController@getdatabyweekarray')->name('users.getdatefromtoarray');
    Route::POST('/getmonthfromtoarray',  'IncomeController@getdatabymontharray')->name('users.getmonthfromtoarray');
    
    Route::get('/getdatabyweeklist',  'IncomeController@getdatabyweeklist')->name('users.getdatabyweeklist');
    Route::post('/getreporttype',  'IncomeController@getReportType')->name('users.getreporttype');
    Route::POST('/getmonthfromto',  'IncomeController@getdatabymonth')->name('users.getfromtomonth');

    Route::get('/export', 'IncomeController@export')->name('export');


});