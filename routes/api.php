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

Route::middleware('auth:sanctum')->get('/usergeneral', function (Request $request) {
     return $request->usergeneral();
});
//auth user
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);

// Route::post('/updateProfile', [App\Http\Controllers\Api\AuthController::class, 'updateProfile']);
// Route::post('/upload', [App\Http\Controllers\Api\AuthController::class, 'upload']);

Route::get('/semua', [App\Http\Controllers\Api\SemuaController::class, 'index']);

Route::get('/barang', [App\Http\Controllers\Api\BarangController::class, 'index']);
Route::get('/kostkontrakan', [App\Http\Controllers\Api\KostKontrakanController::class, 'index']);
Route::get('/jasaangkut', [App\Http\Controllers\Api\JasaAngkutController::class, 'index']);

Route::post('/checkout', [App\Http\Controllers\Api\TransaksiController::class, 'store']);
Route::get('/checkout/user/{id}', [App\Http\Controllers\Api\TransaksiController::class, 'history']);
Route::post('/checkout/batal/{id}', [App\Http\Controllers\Api\TransaksiController::class, 'batal']);
Route::post('checkout/upload/{id}', [App\Http\Controllers\Api\TransaksiController::class, 'upload']);

Route::post('/pesanjasa', [App\Http\Controllers\Api\PesanJasaController::class, 'store']);
Route::get('/pesanjasa/user/{id}', [App\Http\Controllers\Api\PesanJasaController::class, 'history']);
Route::post('/pesanjasa/batal/{id}', [App\Http\Controllers\Api\PesanJasaController::class, 'batal']);

Route::post('/pesankostkontrakan', [App\Http\Controllers\Api\PesanKostkontrakanController::class, 'store']);
Route::get('/pesankostkontrakan/user/{id}', [App\Http\Controllers\Api\PesanKostkontrakanController::class, 'history']);
Route::post('/pesankostkontrakan/batal/{id}', [App\Http\Controllers\Api\PesanKostkontrakanController::class, 'batal']);
