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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route for Profile page
Route::any('/profile','UserController@profile');

//Route to Reset Password
Route::post('/resetPassword','Auth\ChangePasswordController@requestPasswordChange');

//Route for Profile page
Route::any('/edit','UserController@edit');

Route::resource('users','UserController');

Route::post('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

//Route for Profile page
Route::any('/log','UserLog\LogController@index');