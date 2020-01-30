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
    return redirect('home/');
});

//Add new Employee
Route::get('/employees', 'EmployeesController@index')->name('employees.index');
Route::post('/employees/search', 'EmployeesController@search')->name('employees.search');
Route::get('/employees/{id}/edit', 'EmployeesController@edit_employee')->name('employees.edit');
Route::put('/employees/{id}', 'EmployeesController@update_employee')->name('employees.update');
Route::delete('/employees/{id}', 'EmployeesController@destroy_employee')->name('employees.destroy');
Route::get('/profile', 'EmployeesController@showProfile')->name('employees.showProfile');

//---------------------------------------------------------------------------------------------------

//upload employee file
Route::get('/upload', 'EmployeesController@showForm');
Route::post('/upload', 'EmployeesController@storeData');

//---------------------------------------------------------------------------------------------------
//Add new Employee Balance


Route::get('/employees_balance/search_balance', 'BalanceController@user_index')->name('employee_balance.index_users');
Route::get('/employees_balance/{id}', 'BalanceController@show_employee_balance')->name('employee_balance.show');
Route::post('/employees_balance/search', 'BalanceController@search')->name('employee_balance.search');
Route::get('/employees_balance/{id}/create', 'BalanceController@create_balance')->name('employee_balance.create');
Route::post('/employees_balance/{id}', 'BalanceController@store_balance')->name('employee_balance.store');
Route::get('/employees_balance/{id}/edit', 'BalanceController@edit_employee_balance')->name('employee_balance.edit');
Route::put('/employees_balance/{id}', 'BalanceController@update_employee_balance')->name('employee_balance.update');
Route::delete('/employees_balance/{user_id}/{id}', 'BalanceController@destroy_employee_balance')->name('employee_balance.destroy');
//---------------------------------------------------------------------------------------------------


//upload employee balance file
Route::get('/upload_balance', 'BalanceController@showForm');
Route::post('/upload_balance', 'BalanceController@storeData');

//---------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------
//Add new Employee notification


Route::get('/employees_notify/search_notification', 'NotificationController@user_index')->name('employee_note.index_users');
Route::get('/employees_notify/{id}', 'NotificationController@show_employee_notes')->name('employee_note.edit');
Route::post('/employees_notify/search', 'NotificationController@search')->name('employee_note.search');
Route::get('/employees_notify/{id}/create', 'NotificationController@create_note')->name('employee_note.create');
Route::post('/employees_notify/{id}', 'NotificationController@store_note')->name('employee_note.store');
Route::get('/employees_notify/{id}/edit', 'NotificationController@edit_employee_note')->name('employee_note.edit');
Route::put('/employees_notify/{id}', 'NotificationController@update_employee_note')->name('employee_note.update');
Route::delete('/employees_notify/{user_id}/{id}', 'NotificationController@destroy_employee_note')->name('employee_note.destroy');
//---------------------------------------------------------------------------------------------------


//upload employee notification file
Route::get('/upload_note', 'NotificationController@showForm');
Route::post('/upload_note', 'NotificationController@storeData');

//---------------------------------------------------------------------------------------------------


//---------------------------------------------------------------------------------------------------
//Add new General notification


Route::get('/generaklNotifications', 'GeneralNotificationController@index')->name('general_note.index');
Route::get('/generaklNotifications/createNote', 'GeneralNotificationController@create_note')->name('general_note.create');
Route::post('/generaklNotifications', 'GeneralNotificationController@store_note')->name('general_note.store');
Route::delete('/generaklNotifications/{id}', 'GeneralNotificationController@destroy_note')->name('general_note.destroy');
Route::get('/generaklNotifications/{id}/edit', 'GeneralNotificationController@edit_note')->name('general_note.edit');
Route::put('/generaklNotifications/{id}', 'GeneralNotificationController@update_note')->name('general_note.update');
//---------------------------------------------------------------------------------------------------


//upload general notification file
// Route::get('/upload_note', 'NotificationController@showForm');
// Route::post('/upload_note', 'NotificationController@storeData');

//---------------------------------------------------------------------------------------------------
//tickets-----
Route::resource('tickets' ,'TicketsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'web'], function () {
    Route::resource('Api/login/getAllData', 'ApiLoginController');
});

Route::group(['middleware' => 'web'], function () {
    Route::resource('Api/getAllData', 'ApiController');
});


