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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return $request->user();
});
//auth user
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);

Route::get('/barang', [App\Http\Controllers\Api\BarangController::class, 'index']);
Route::get('/kostkontrakan', [App\Http\Controllers\Api\KostKontrakanController::class, 'index']);
Route::get('/jasaangkut', [App\Http\Controllers\Api\JasaAngkutController::class, 'index']);
Route::post('/checkout', [App\Http\Controllers\Api\TransaksiController::class, 'store']);
Route::get('/checkout/user/{id}', [App\Http\Controllers\Api\TransaksiController::class, 'history']);
