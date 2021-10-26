<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\PaletsController;

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

Route::resource('users', UsersController::class);
Route::resource('clients', ClientsController::class);
Route::resource('products', ProductsController::class);
Route::resource('locations', LocationsController::class);
Route::resource('palets', PaletsController::class);
Route::get('getUser/{id}', [UsersController::class, 'getUser']);
Route::get('getClient/{id}', [ClientsController::class, 'getClient']);
Route::get('getProduct/{id}', [ProductsController::class, 'getProduct']);
Route::get('getLocation/{id}', [LocationsController::class, 'getLocation']);
Route::get('getPalet/{sscc}', [PaletsController::class, 'getPalet']);
Route::get('showId/{ean}', [ProductsController::class, 'showId']);
Route::get('num_pal/{albara_entrada}', [PaletsController::class, 'num_pal']);
Route::get('showEntries/{data}/{data2}', [PaletsController::class, 'showEntries']);
Route::get('showPalEntries/{num_albara}', [PaletsController::class, 'showPalEntries']);





