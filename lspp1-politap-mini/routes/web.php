<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UiController;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;

Route::get('loginadmin', [ClientController::class, 'loginadmin'])->name('loginadmin');
Route::get('registrasi_Authentification', [ClientController::class, 'reg'])->name('reg');
Route::get('404', [UiController::class, 'notfound'])->name('404');

// =============== CLIENT NEW ===============
Route::get('/', [ClientController::class, 'clientutama'])->name('/');
Route::get('tentang', [ClientController::class, 'tentang'])->name('tentang');
Route::get('tutorial', [ClientController::class, 'tutorial'])->name('tutorial');
Route::get('logo', [ClientController::class, 'logo'])->name('logo');
Route::get('pengelola', [ClientController::class, 'pengelola'])->name('pengelola');
Route::get('pengelola_detail/{pengelola_detail}', [ClientController::class, 'pengelola_detail'])->name('pengelola_detail');
Route::get('struktur', [ClientController::class, 'struktur'])->name('struktur');
Route::get('visi', [ClientController::class, 'visi'])->name('visi');
Route::get('download', [ClientController::class, 'download'])->name('download');
Route::get('client_skkni', [ClientController::class, 'skkni'])->name('client_skkni');
Route::get('client_kkni', [ClientController::class, 'kkni'])->name('client_kkni');
Route::get('client_filelain', [ClientController::class, 'filelain'])->name('client_filelain');
Route::get('clien_fileapl2', [ClientController::class, 'fileapl2'])->name('clien_fileapl2');
Route::get('client_skema', [ClientController::class, 'skema'])->name('client_skema');
Route::get('skema_detail/{skema_detail}', [ClientController::class, 'skema_detail'])->name('skema_detail');
Route::get('client_tuk', [ClientController::class, 'tuk'])->name('client_tuk');
Route::get('tuk_detail/{tuk_detail}', [ClientController::class, 'tuk_detail'])->name('tuk_detail');
Route::get('client_sertifikat', [ClientController::class, 'sertifikat'])->name('client_sertifikat');
Route::get('client_asesor', [ClientController::class, 'asesor'])->name('client_asesor');
Route::get('asesor_detail/{asesor_detail}', [ClientController::class, 'asesor_detail'])->name('asesor_detail');
Route::get('client_berita', [ClientController::class, 'berita'])->name('client_berita');
Route::get('berita_detail/{berita_detail}', [ClientController::class, 'berita_detail'])->name('berita_detail');
Route::get('client_galeri', [ClientController::class, 'galeri'])->name('client_galeri');
Route::get('galeri_detail/{galeri_detail}', [ClientController::class, 'galeri_detail'])->name('galeri_detail');

Auth::routes();



