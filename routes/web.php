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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', App\Http\Controllers\UserController::class);
Route::resource('mitra', App\Http\Controllers\MitraController::class);
Route::resource('jasaangkut', App\Http\Controllers\JasaAngkutController::class);
Route::resource('kostkontrakan', App\Http\Controllers\KostKontrakanController::class);
