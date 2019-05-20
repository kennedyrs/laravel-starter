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

Route::get('/', function(){
    return redirect()->route('admin.home');
});

Route::get('register', function(){
    return redirect()->route('admin.home');
});

Route::group(['middleware'=>'auth', 'prefix'=>'administrator', 'as'=>'admin.'], function (){

    Route::get('/', function(){
        return "Ok OK Silvio.";
    })->name('home');

    Route::get('/dashboard', 'HomeController@dashboardAdminInfo')->name('dashboard');


    Route::get('/users', 'User\UserController@index')->name('user.index');
    Route::get('/users/{id}/show', 'User\UserController@show')->where('id', '[0-9]+')->name('user.show');
});
