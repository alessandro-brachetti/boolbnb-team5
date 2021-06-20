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




Route::get('/', 'ApartmentController@index'); 

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
  ->group(function () {
    Route::resource('/apartments', 'ApartmentController');

  });