<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\PaletsController;
use App\Http\Controllers\PlanificationsController;
use App\Http\Controllers\BlockedController;

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
Route::resource('planifications', PlanificationsController::class);
Route::resource('blocked', BlockedController::class);
Route::get('getUser/{id}', [UsersController::class, 'getUser']);
Route::get('getClient/{id}', [ClientsController::class, 'getClient']);
Route::get('getProduct/{id}', [ProductsController::class, 'getProduct']);
Route::get('getLocation/{id}', [LocationsController::class, 'getLocation']);
Route::get('getPalet/{sscc}', [PaletsController::class, 'getPalet']);
Route::get('getPlanification/{id}', [PlanificationsController::class, 'getPlanification']);
Route::get('getBlocked/{id}', [BlockedController::class, 'getBlocked']);
Route::get('showId/{ean}', [ProductsController::class, 'showId']);
Route::get('num_pal/{albara_entrada}', [PaletsController::class, 'num_pal']);
Route::get('showEntries/{data}/{data2}', [PaletsController::class, 'showEntries']);
Route::get('showPalEntries/{num_albara}', [PaletsController::class, 'showPalEntries']);
Route::get('getPalResta/{id}', [PaletsController::class, 'getPalResta']);
Route::get('getPlanification/{albara_sortida}', [PlanificationsController::class, 'getPlanification']);
Route::get('getPlanifications/{albara_sortida}', [PlanificationsController::class, 'getPlanifications']);
Route::get('num_pal_sortida/{albara_entrada}', [PlanificationsController::class, 'num_pal_sortida']);
Route::get('showExpeditions/{data}/{data2}', [PaletsController::class, 'showExpeditions']);
Route::get('showPalExpeditions/{num_albara}', [PaletsController::class, 'showPalExpeditions']);






