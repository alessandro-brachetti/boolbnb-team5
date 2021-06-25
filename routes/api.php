<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// if(env('APP_DEBUG')) {
//     Route::options('/{any?}', function() {})->where('any', '.*');
// }

// if(env('APP_DEBUG'))
// {
//     return $next($request)
//                     ->header('Access-Control-Allow-Origin', '')
//                     ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
//                     ->header('Access-Control-Allow-Headers', '');
//     }
//     else {
//     return $next($request);
// }
