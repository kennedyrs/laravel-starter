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
    Route::get('/users/{id}/edit', 'User\UserController@edit')->where('id', '[0-9]+')->name('user.edit');
    Route::get('/users/create', 'User\UserController@create')->name('user.create');
    Route::post('/users/create/save', 'User\UserController@save')->name('user.create.save');
    Route::post('/users/{id}/update', 'User\UserController@update')->where('id', '[0-9]+')->name('user.update');
    Route::post('/users/{id}/update/password', 'User\UserController@updatePassword')->where('id', '[0-9]+')->name('user.update.password');
    Route::delete('/users/{id}/delete', 'User\UserController@delete')->where('id', '[0-9]+')->name('user.delete');
});
