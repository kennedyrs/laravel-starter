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

/*
 * Rota para visualizar o template admin
 */
Route::get('/template', function () {
    return view('admin.dashboard');
});
Route::get('/dashboard', 'HomeController@dashboardAdminInfo')->name('dashboardAdmin');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
