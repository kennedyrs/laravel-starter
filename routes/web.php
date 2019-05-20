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

Route::get('/', function(){return redirect()->route('admin.dashboard');});

Route::group(['middleware'=>'auth', 'prefix'=>'administrator', 'as'=>'admin.'], function (){

    Route::get('/dashboard', 'HomeController@dashboardAdminInfo')->name('dashboard');

    #
    # Rotas do menu de usúarios
    #
    Route::get('/users', 'User\UserController@index')->name('user.index');
});

Auth::routes();
