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
// Route::resource('user', App\Http\Controllers\UserController::class);
Route::resource('usergeneral', App\Http\Controllers\UserGeneralController::class);
Route::resource('barang', App\Http\Controllers\BarangController::class);
Route::resource('jasaangkut', App\Http\Controllers\JasaAngkutController::class);
Route::resource('kostkontrakan', App\Http\Controllers\KostKontrakanController::class);
Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
Route::resource('pesanjasa', App\Http\Controllers\PesanjasaController::class);
Route::resource('pesankostkontrakan', App\Http\Controllers\PesanKostkontrakanController::class);

Route::get('transaksi\batal\{id}', [App\Http\Controllers\TransaksiController::class, 'batal'])->name('transaksiBatal');
Route::get('transaksi\confirm\{id}', [App\Http\Controllers\TransaksiController::class, 'confirm'])->name('transaksiConfirm');
Route::get('transaksi\dikirim\{id}', [App\Http\Controllers\TransaksiController::class, 'dikirim'])->name('transaksiDikirim');
Route::get('transaksi\selesai\{id}', [App\Http\Controllers\TransaksiController::class, 'selesai'])->name('transaksiSelesai');

Route::get('pesanjasa\confirm\{id}', [App\Http\Controllers\PesanJasaController::class, 'confirm'])->name('pesanJasaKonfirmasi');
Route::get('pesanjasa\batal\{id}', [App\Http\Controllers\PesanJasaController::class, 'batal'])->name('pesanJasaBatal');
Route::get('pesanjasa\exportjasa\{id}', [App\Http\Controllers\PesanJasaController::class, 'exportjasa'])->name('exportjasa');

Route::get('pesankostkontrakan\confirm\{id}', [App\Http\Controllers\PesanKostkontrakanController::class, 'confirm'])->name('pesanKostkontrakanKonfirmasi');
Route::get('pesankostkontrakan\batal\{id}', [App\Http\Controllers\PesanKostkontrakanController::class, 'batal'])->name('pesanKostkontrakanBatal');
Route::get('pesankostkontrakan\exportkost\{id}', [App\Http\Controllers\PesanKostkontrakanController::class, 'exportkost'])->name('exportkost');