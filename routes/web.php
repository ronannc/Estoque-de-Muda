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

Route::get( '/', function () {
    return view( 'auth.login' );
} );

Auth::routes(['register' => true]);

Route::get( '/inventory/list/{specie_id}', [ App\Http\Controllers\InventoryController::class, 'index' ] )->name( 'inventory.list' );
Route::get( '/home', [ App\Http\Controllers\HomeController::class, 'index' ] )->name( 'home' );
Route::resource( '/group', \App\Http\Controllers\GroupController::class )->except( [ 'show' ] );
Route::resource( '/type', \App\Http\Controllers\TypeController::class )->except( [ 'show' ] );
Route::resource( '/nursery', \App\Http\Controllers\NurseryController::class );
Route::resource( '/specie', \App\Http\Controllers\SpecieController::class );
Route::resource( '/inventory', \App\Http\Controllers\InventoryController::class )->except( [ 'show' ] );
Route::resource( '/user', \App\Http\Controllers\UserController::class )->except( [ 'show' ] );


