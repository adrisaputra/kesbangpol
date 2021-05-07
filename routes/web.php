<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\IzinPenelitianController;
use App\Http\Controllers\UserController;

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

Route::get('/login-sistem', function () {
    return view('auth.login');
});

Route::get('/dashboard', [HomeController::class, 'index']);

## Izin Penelitian
Route::get('/izin_penelitian_masuk', [IzinPenelitianController::class, 'index']);
Route::get('/izin_penelitian_di_proses', [IzinPenelitianController::class, 'index']);
Route::get('/izin_penelitian_di_verifikasi', [IzinPenelitianController::class, 'index']);
Route::get('/izin_penelitian_selesai', [IzinPenelitianController::class, 'index']);

Route::get('/izin_penelitian_masuk/search', [IzinPenelitianController::class, 'search']);
Route::get('/izin_penelitian_di_proses/search', [IzinPenelitianController::class, 'search']);
Route::get('/izin_penelitian_di_verifikasi/search', [IzinPenelitianController::class, 'search']);
Route::get('/izin_penelitian_selesai/search', [IzinPenelitianController::class, 'search']);

Route::get('/izin_penelitian_masuk/create', [IzinPenelitianController::class, 'create']);
Route::post('/izin_penelitian_masuk', [IzinPenelitianController::class, 'store']);

Route::get('/izin_penelitian_masuk/detail/{izin_penelitian}', [IzinPenelitianController::class, 'detail']);
Route::get('/izin_penelitian_di_proses/detail/{izin_penelitian}', [IzinPenelitianController::class, 'detail']);
Route::get('/izin_penelitian_di_verifikasi/detail/{izin_penelitian}', [IzinPenelitianController::class, 'detail']);
Route::get('/izin_penelitian_selesai/detail/{izin_penelitian}', [IzinPenelitianController::class, 'detail']);

Route::get('/izin_penelitian_masuk/proses/{izin_penelitian}', [IzinPenelitianController::class, 'proses']);
Route::put('/izin_penelitian_di_verifikasi/edit/{izin_penelitian}', [IzinPenelitianController::class, 'update']);

## User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/search', [UserController::class, 'search']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/edit/{user}', [UserController::class, 'edit']);
Route::put('/user/edit/{user}', [UserController::class, 'update']);
Route::get('/user/hapus/{user}',[UserController::class, 'delete']);