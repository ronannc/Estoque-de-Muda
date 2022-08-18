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
    return view( 'welcome' );
} );

Auth::routes();

Route::get( '/home', [ App\Http\Controllers\HomeController::class, 'index' ] )->name( 'home' );
Route::resource( '/group', \App\Http\Controllers\GroupController::class );
Route::resource( '/nursery', \App\Http\Controllers\NurseryController::class );

Auth::routes();

Route::get( '/home', function () {
    return view( 'home' );
} )->name( 'home' )->middleware( 'auth' );

