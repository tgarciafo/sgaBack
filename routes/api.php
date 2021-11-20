<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\PaletsController;
use App\Http\Controllers\PlanificationsController;
use App\Http\Controllers\BloquejatsController;

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
Route::resource('bloquejats', BloquejatsController::class);
Route::get('getUser/{id}', [UsersController::class, 'getUser']);
Route::get('getClient/{id}', [ClientsController::class, 'getClient']);
Route::get('getProduct/{id}', [ProductsController::class, 'getProduct']);
Route::get('getLocation/{id}', [LocationsController::class, 'getLocation']);
Route::get('getPalet/{sscc}', [PaletsController::class, 'getPalet']);
Route::get('getPlanification/{id}', [PlanificationsController::class, 'getPlanification']);
Route::get('getBloquejat/{id}', [BloquejatsController::class, 'getBloquejat']);
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
Route::get('getBloquejats', [BloquejatsController::class, 'getBloquejats']);
Route::delete('destroy/{product_id}/{albara_sortida}', [PlanificationsController::class, 'destroy']);
Route::put('addUserClient/{client_id}/{user_id}', [ClientsController::class, 'addUserClient']);
Route::put('expeditionPal/{sscc}/{albara_sortida}/{data_sortida}', [PaletsController::class, 'expeditionPal']);
Route::delete('destroyLine/{product_id}/{albara_sortida}', [PlanificationsController::class, 'destroyLine']);
Route::get('consultaPlanifications', [PlanificationsController::class, 'consultaPlanifications']);
Route::delete('destroyEntire/{albara_sortida}', [PlanificationsController::class, 'destroyEntire']);
Route::get('estocClient/{idClient}/{data}', [PaletsController::class, 'estocClient']);
Route::get('getClientProduct/{client_id}', [ProductsController::class, 'getClientProduct']);
Route::get('estocProduct/{product_id}/{data}', [PaletsController::class, 'estocProduct']);
Route::get('estocUbicacio/{client_id}/{location_id}/{data}', [PaletsController::class, 'estocUbicacio']);
Route::get('estocAlbara/{num_albara}', [PaletsController::class, 'estocAlbara']);
Route::get('estocLot/{client_id}/{product_id}/{data}', [PaletsController::class, 'estocLot']);
















