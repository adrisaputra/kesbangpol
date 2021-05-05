<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;

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

Route::get('/buat_storage', function () {
    Artisan::call('storage:link');
    dd("Storage Berhasil Di Buat");
});

Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
    dd("Cache Clear All");
});


Route::get('/', [BerandaController::class, 'index']);
Route::get('/login_w', [BerandaController::class, 'login']);
Route::post('/login_w', [LoginController::class, 'authenticate']);
Route::get('/pengajuan_izin_penelitian_w', [BerandaController::class, 'pengajuan_izin_penelitian']);
Route::get('/buat_pengajuan_izin_penelitian_w', [BerandaController::class, 'buat_pengajuan_izin_penelitian']);
Route::post('/buat_pengajuan_izin_penelitian_w', [BerandaController::class, 'store']);
Route::get('/registrasi_w', [BerandaController::class, 'registrasi']);
Route::post('/registrasi_w', [RegistrasiController::class, 'store']);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', [HomeController::class, 'index']);
