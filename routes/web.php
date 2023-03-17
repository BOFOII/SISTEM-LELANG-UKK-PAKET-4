<?php

use App\Http\Controllers\CMS\AuthController as CMSAuthController;
use App\Http\Controllers\CMS\BarangController as CMSBarangController;
use App\Http\Controllers\CMS\HomeController as CMSHomeController;
use App\Http\Controllers\CMS\LaporanController;
use App\Http\Controllers\CMS\LelangController as CMSLelangController;
use App\Http\Controllers\CMS\MasyarakatController;
use App\Http\Controllers\CMS\PetugasController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LelangController;
use App\Http\Controllers\Frontend\NotificationController;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register')->middleware('guest');
Route::get('/tawar-aja/{lelang}', [LelangController::class, 'index'])->name('tawar');
Route::get('/notifications', [NotificationController::class, '_all'])->name('api.notifications');

Route::post('/login', [AuthController::class, '_login'])->name('post.login.frontend')->middleware('guest');
Route::post('/register', [AuthController::class, '_register'])->name('post.register.frontend')->middleware('guest');
Route::post('/image-upload', [ImageUploadController::class, '_upload'])->name('post.image-upload');
Route::post('/tawar-aja/{lelang}', [LelangController::class, '_store'])->name('post.tawaran');

Route::patch('/tawar-aja/{lelang}/{history}', [LelangController::class, '_update'])->name('patch.tawaran');
Route::patch('/readall-notification', [NotificationController::class, '_readall'])->name('patch.notfication');

Route::delete('/logout', [AuthController::class, '_logout'])->name('delete.logout.frontend');
Route::delete('/tawar-aja/{lelang}/{history}', [LelangController::class, '_destroy'])->name('delete.tawaran');


Route::get('/cms/login', [CMSAuthController::class, 'index'])->name('login.cms')->middleware('guest:cms');
Route::post('/cms/login', [CMSAuthController::class, '_login'])->name('post.login.cms');

Route::prefix('/cms')->middleware(['auth:cms'])->group(function() {
    Route::get('/', [CMSHomeController::class, 'index'])->name('view.home.cms');
    Route::get('/barang/{barang?}', [CMSBarangController::class, 'index'])->name('view.barang');
    Route::get('/lelang/{lelang?}', [CMSLelangController::class, 'index'])->name('view.lelang.cms');
    Route::get('/petugas/{petugas?}', [PetugasController::class, 'index'])->name('view.petugas.cms')->middleware('admin.verify');
    Route::get('/masyarakat', [MasyarakatController::class, 'index'])->name('view.masyarakat.cms');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('view.laporan.cms');

    Route::post('/barang', [CMSBarangController::class, '_store'])->name('post.barang.cms');
    Route::post('/lelang', [CMSLelangController::class, '_store'])->name('post.lelang.cms');
    Route::post('/petugas', [PetugasController::class, '_store'])->name('post.petugas.cms')->middleware('admin.verify');

    Route::patch('/lelang/{lelang}', [CMSLelangController::class, '_update'])->name('patch.lelang');
    Route::patch('/lelang/open/{lelang}', [CMSLelangController::class, '_open'])->name('patch.lelang.open');
    Route::patch('/lelang/close/{lelang}', [CMSLelangController::class, '_close'])->name('patch.lelang.close');

    Route::patch('/barang/{barang}', [CMSBarangController::class, '_update'])->name('patch.barang.cms');
    Route::patch('/petugas/{petugas}', [PetugasController::class, '_update'])->name('patch.petugas.cms');
    
    Route::delete('/logout', [CMSAuthController::class, '_logout'])->name('delete.logout.cms');
    Route::delete('/barang/{barang}', [CMSBarangController::class, '_destroy'])->name('delete.barang.cms');
    Route::delete('/lelang/{lelang}', [CMSLelangController::class, '_destroy'])->name('delete.lelang.cms');
    Route::delete('/petugas/{petugas}', [PetugasController::class, '_destroy'])->name('delete.petugas.cms');
});