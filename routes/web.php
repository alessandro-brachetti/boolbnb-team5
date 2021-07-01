<?php

use Illuminate\Support\Facades\Route;
use App\Service;
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
Route::get('/apartment/{apartment}', 'ApartmentController@show')->name('guests.show');


Route::get('/search/{query}', function(){
  $services = Service::all();
  return view('guests.search', compact('services'));
})->name('guests.search');

Route::post('/messages', 'MessageController@store')->name('messages.store');

Route::post('/views/{apartment}', 'ViewController@store')->name('views.store');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::middleware(['auth'])->namespace('Admin')->prefix('admin')->name('admin.')
  ->group(function () {
    Route::resource('/apartments', 'ApartmentController');
    Route::get('/message/{apartment}', 'MessageController@index')->name('message.index');
    Route::get('/sponsor/{apartment}', 'SponsorController@index')->name('sponsor.index');
    Route::post('/sponsor/', 'SponsorController@store')->name('sponsor.store');
    Route::post('/payment/make', 'PaymentController@make')->name('payment.make');
    Route::get('/payment/make', 'PaymentController@make')->name('payment.make');
  });
