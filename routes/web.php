<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\TenagapendidikController;

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

Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class,'index']);
    Route::get('/dashboard', [DashboardController::class,'index']);

    Route::prefix('pengguna')->group(function () {
        Route::get('/', [PenggunaController::class, 'index'])->name('pengguna');
        Route::get('/tambah', [PenggunaController::class, 'tambah'])->name('pengguna.tambah');
        Route::get('/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::post('/simpan', [PenggunaController::class, 'simpan'])->name('pengguna.simpan');
        Route::delete('/hapus', [PenggunaController::class, 'hapus']);
    });

    Route::prefix('kategoriberita')->group(function () {
        Route::get('/', [KategoriberitaController::class, 'index'])->name('kategoriberita');
        Route::get('/tambah', [KategoriberitaController::class, 'tambah'])->name('kategoriberita.tambah');
        Route::get('/edit', [KategoriberitaController::class, 'edit'])->name('kategoriberita.edit');
        Route::post('/simpan', [KategoriberitaController::class, 'simpan'])->name('kategoriberita.simpan');
        Route::delete('/hapus', [KategoriberitaController::class, 'hapus']);
    });

    Route::prefix('mapel')->group(function () {
        Route::get('/', [MapelController::class, 'index'])->name('mapel');
        Route::get('/tambah', [MapelController::class, 'tambah'])->name('mapel.tambah');
        Route::get('/edit', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::post('/simpan', [MapelController::class, 'simpan'])->name('mapel.simpan');
        Route::delete('/hapus', [MapelController::class, 'hapus']);
    });

    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('berita');
        Route::get('/tambah', [BeritaController::class, 'tambah'])->name('berita.tambah');
        Route::get('/edit', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::post('/simpan', [BeritaController::class, 'simpan'])->name('berita.simpan');
        Route::delete('/hapus', [BeritaController::class, 'hapus']);
    });

    Route::prefix('carousel')->group(function () {
        Route::get('/', [CarouselController::class, 'index'])->name('carousel');
        Route::get('/tambah', [CarouselController::class, 'tambah'])->name('carousel.tambah');
        Route::post('/simpan', [CarouselController::class, 'simpan'])->name('carousel.simpan');
        Route::delete('/hapus', [CarouselController::class, 'hapus']);
    });

    Route::prefix('prestasi')->group(function () {
        Route::get('/', [PrestasiController::class, 'index'])->name('prestasi');
        Route::get('/tambah', [PrestasiController::class, 'tambah'])->name('prestasi.tambah');
        Route::post('/simpan', [PrestasiController::class, 'simpan'])->name('prestasi.simpan');
        Route::delete('/hapus', [PrestasiController::class, 'hapus']);
    });

    Route::prefix('gallery')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('gallery');
        Route::get('/tambah', [GalleryController::class, 'tambah'])->name('gallery.tambah');
        Route::post('/simpan', [GalleryController::class, 'simpan'])->name('gallery.simpan');
        Route::delete('/hapus', [GalleryController::class, 'hapus']);
    });

    Route::prefix('tenagapendidik')->group(function () {
        Route::get('/', [TenagapendidikController::class, 'index'])->name('tenagapendidik');
        Route::get('/tambah', [TenagapendidikController::class, 'tambah'])->name('tenagapendidik.tambah');
        Route::get('/edit', [TenagapendidikController::class, 'edit'])->name('tenagapendidik.edit');
        Route::post('/simpan', [TenagapendidikController::class, 'simpan'])->name('tenagapendidik.simpan');
        Route::delete('/hapus', [TenagapendidikController::class, 'hapus']);
    });
});
