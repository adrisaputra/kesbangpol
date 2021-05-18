<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\IzinPenelitianController;
use App\Http\Controllers\SkkOrmasController;
use App\Http\Controllers\SktOrmasController;
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
Route::get('/pengajuan_izin_penelitian_w/search', [BerandaController::class, 'search_pengajuan_izin_penelitian']);
Route::get('/buat_pengajuan_izin_penelitian_w', [BerandaController::class, 'buat_pengajuan_izin_penelitian']);
Route::get('/pengajuan_izin_penelitian_w/edit/{izin_penelitian}', [BerandaController::class, 'edit_izin_penelitian']);
Route::put('/pengajuan_izin_penelitian_w/edit/{izin_penelitian}', [BerandaController::class, 'update_izin_penelitian']);
Route::get('/pengajuan_izin_penelitian_w/detail/{izin_penelitian}', [BerandaController::class, 'detail_izin_penelitian']);

Route::get('/pengajuan_skk_ormas_w', [BerandaController::class, 'pengajuan_skk_ormas']);
Route::get('/pengajuan_skk_ormas_w/search', [BerandaController::class, 'search_pengajuan_skk_ormas']);
Route::get('/buat_pengajuan_skk_ormas_w', [BerandaController::class, 'buat_pengajuan_skk_ormas']);
Route::get('/pengajuan_skk_ormas_w/edit/{skk_ormas}', [BerandaController::class, 'edit_skk_ormas']);
Route::put('/pengajuan_skk_ormas_w/edit/{skk_ormas}', [BerandaController::class, 'update_skk_ormas']);
Route::get('/pengajuan_skk_ormas_w/detail/{skk_ormas}', [BerandaController::class, 'detail_skk_ormas']);

Route::get('/pengajuan_skt_ormas_w', [BerandaController::class, 'pengajuan_skt_ormas']);
Route::get('/pengajuan_skt_ormas_w/search', [BerandaController::class, 'search_pengajuan_skt_ormas']);
Route::get('/buat_pengajuan_skt_ormas_w', [BerandaController::class, 'buat_pengajuan_skt_ormas']);
Route::get('/pengajuan_skt_ormas_w/edit/{skt_ormas}', [BerandaController::class, 'edit_skt_ormas']);
Route::put('/pengajuan_skt_ormas_w/edit/{skt_ormas}', [BerandaController::class, 'update_skt_ormas']);
Route::get('/pengajuan_skt_ormas_w/detail/{skt_ormas}', [BerandaController::class, 'detail_skt_ormas']);

Route::get('/status_izin_penelitian_w', [BerandaController::class, 'status_izin_penelitian']);
Route::get('/status_izin_penelitian_w/search', [BerandaController::class, 'search_status_izin_penelitian']);
Route::get('/status_skk_ormas_w', [BerandaController::class, 'status_skk_ormas']);
Route::get('/status_skk_ormas_w/search', [BerandaController::class, 'search_status_skk_ormas']);
Route::get('/status_skt_ormas_w', [BerandaController::class, 'status_skt_ormas']);
Route::get('/status_skt_ormas_w/search', [BerandaController::class, 'search_status_skt_ormas']);

Route::get('/pengajuan_izin_penelitian_w/perbaikan/{izin_penelitian}', [BerandaController::class, 'perbaikan_izin_penelitian']);
Route::put('/pengajuan_izin_penelitian_w/perbaikan/{izin_penelitian}', [BerandaController::class, 'update_izin_penelitian']);
Route::get('/pengajuan_skk_ormas_w/perbaikan/{skk_ormas}', [BerandaController::class, 'perbaikan_skk_ormas']);
Route::put('/pengajuan_skk_ormas_w/perbaikan/{skk_ormas}', [BerandaController::class, 'update_skk_ormas']);
Route::get('/pengajuan_skt_ormas_w/perbaikan/{skt_ormas}', [BerandaController::class, 'perbaikan_skt_ormas']);
Route::put('/pengajuan_skt_ormas_w/perbaikan/{skt_ormas}', [BerandaController::class, 'update_skt_ormas']);

Route::get('/registrasi_w', [BerandaController::class, 'registrasi']);
Route::post('/registrasi_w', [RegistrasiController::class, 'store']);

Route::get('/login-sistem', function () {
    return view('auth.login');
});
Route::post('/logout-sistem', [LoginController::class, 'logout']);

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

## SKK Ormas
Route::get('/skk_ormas_masuk', [SkkOrmasController::class, 'index']);
Route::get('/skk_ormas_di_proses', [SkkOrmasController::class, 'index']);
Route::get('/skk_ormas_di_verifikasi', [SkkOrmasController::class, 'index']);
Route::get('/skk_ormas_selesai', [SkkOrmasController::class, 'index']);

Route::get('/skk_ormas_masuk/search', [SkkOrmasController::class, 'search']);
Route::get('/skk_ormas_di_proses/search', [SkkOrmasController::class, 'search']);
Route::get('/skk_ormas_di_verifikasi/search', [SkkOrmasController::class, 'search']);
Route::get('/skk_ormas_selesai/search', [SkkOrmasController::class, 'search']);

Route::get('/skk_ormas_masuk/create', [SkkOrmasController::class, 'create']);
Route::post('/skk_ormas_masuk', [SkkOrmasController::class, 'store']);

Route::get('/skk_ormas_masuk/detail/{skk_ormas}', [SkkOrmasController::class, 'detail']);
Route::get('/skk_ormas_di_proses/detail/{skk_ormas}', [SkkOrmasController::class, 'detail']);
Route::get('/skk_ormas_di_verifikasi/detail/{skk_ormas}', [SkkOrmasController::class, 'detail']);
Route::get('/skk_ormas_selesai/detail/{skk_ormas}', [SkkOrmasController::class, 'detail']);

Route::get('/skk_ormas_masuk/proses/{skk_ormas}', [SkkOrmasController::class, 'proses']);
Route::put('/skk_ormas_di_verifikasi/edit/{skk_ormas}', [SkkOrmasController::class, 'update']);

## SKT Ormas
Route::get('/skt_ormas_masuk', [SktOrmasController::class, 'index']);
Route::get('/skt_ormas_di_proses', [SktOrmasController::class, 'index']);
Route::get('/skt_ormas_di_verifikasi', [SktOrmasController::class, 'index']);
Route::get('/skt_ormas_selesai', [SktOrmasController::class, 'index']);

Route::get('/skt_ormas_masuk/search', [SktOrmasController::class, 'search']);
Route::get('/skt_ormas_di_proses/search', [SktOrmasController::class, 'search']);
Route::get('/skt_ormas_di_verifikasi/search', [SktOrmasController::class, 'search']);
Route::get('/skt_ormas_selesai/search', [SktOrmasController::class, 'search']);

Route::get('/skt_ormas_masuk/create', [SktOrmasController::class, 'create']);
Route::post('/skt_ormas_masuk', [SktOrmasController::class, 'store']);

Route::get('/skt_ormas_masuk/detail/{skt_ormas}', [SktOrmasController::class, 'detail']);
Route::get('/skt_ormas_di_proses/detail/{skt_ormas}', [SktOrmasController::class, 'detail']);
Route::get('/skt_ormas_di_verifikasi/detail/{skt_ormas}', [SktOrmasController::class, 'detail']);
Route::get('/skt_ormas_selesai/detail/{skt_ormas}', [SktOrmasController::class, 'detail']);

Route::get('/skt_ormas_masuk/proses/{skt_ormas}', [SktOrmasController::class, 'proses']);
Route::put('/skt_ormas_di_verifikasi/edit/{skt_ormas}', [SktOrmasController::class, 'update']);

## User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/search', [UserController::class, 'search']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/edit/{user}', [UserController::class, 'edit']);
Route::put('/user/edit/{user}', [UserController::class, 'update']);
Route::get('/user/hapus/{user}',[UserController::class, 'delete']);