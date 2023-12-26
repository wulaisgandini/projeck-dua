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

Route::get('produk', 'App\Http\Controllers\ApiController@product_index');
Route::post('produk/add', 'App\Http\Controllers\ApiController@product_store');
Route::get('produk/{id}', 'App\Http\Controllers\ApiController@product_by_id');
Route::put('produk/{id}', 'App\Http\Controllers\ApiController@product_update'); // Adding the update route
Route::delete('produk/{id}', 'App\Http\Controllers\ApiController@product_delete');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
