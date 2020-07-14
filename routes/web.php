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
    return view('layouts/app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createBuild', 'BuildController@index');
Route::get('/listBuild', 'BuildController@view');
Route::get('/build', 'BuildController@getBuild');
Route::post('/createBuild', 'BuildController@store');
Route::delete('/createBuild/{createBuild}', 'BuildController@destroy');

Route::get('/viewProfile', 'ProfileController@view');
Route::get('/profiles', 'ProfileController@show');
Route::post('/profile', 'ProfileController@update');
