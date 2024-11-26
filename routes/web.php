<?php

use App\Models\Identitas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DownlodController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\HalamanStatisController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SliderController;
use App\Models\HalamanStatis;

Route::get('/', [BeritaController::class, 'index'])->name('berita.index');

Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('berita/tambah', [BeritaController::class, 'tambah'])->name('berita.tambah');
Route::post('berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('berita/show/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('berita/update/{id}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('berita/{id}/destroy', [BeritaController::class, 'destroy'])->name('berita.destroy');

Route::get('galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('galeri/tambah', [GaleriController::class, 'tambah'])->name('galeri.tambah');
Route::post('galeri', [GaleriController::class, 'store'])->name('galeri.store');
Route::get('galeri/edit/{id}', [GaleriController::class, 'edit'])->name('galeri.edit');
Route::put('galeri/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');
Route::delete('galeri/{id}/destroy', [GaleriController::class, 'destroy'])->name('galeri.destroy');

// Route::get('/kategori_berita', [KategoriBeritaController::class, 'index']);
Route::get('kategori_berita', [KategoriBeritaController::class, 'index'])->name('kategori_berita.index');
Route::get('kategori_berita/tambah', [KategoriBeritaController::class, 'tambah'])->name('kategori_berita.tambah');
Route::post('kategori_berita', [KategoriBeritaController::class, 'store'])->name('kategori_berita.store');
Route::get('kategori_berita/edit/{id}', [KategoriBeritaController::class, 'edit'])->name('kategori_berita.edit');
Route::put('kategori_berita/update/{id}', [KategoriBeritaController::class, 'update'])->name('kategori_berita.update');
Route::get('kategori_berita/{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori_berita.destroy');
Route::delete('kategori_berita/{id}/destroy', [KategoriBeritaController::class, 'destroy'])->name('kategori_berita.destroy');

Route::get('identitas', [IdentitasController::class, 'index'])->name('identitas.index');
Route::get('identitas/tambah', [IdentitasController::class, 'tambah'])->name('identitas.tambah');
Route::post('identitas', [IdentitasController::class, 'store'])->name('identitas.store');
Route::get('identitas/edit/{id}', [IdentitasController::class, 'edit'])->name('identitas.edit');
Route::get('identitas/show/{slug}', [IdentitasController::class, 'show'])->name('identitas.show');
Route::put('identitas/update/{id}', [IdentitasController::class, 'update'])->name('identitas.update');
Route::get('identitas/{id}', [IdentitasController::class, 'destroy'])->name('identitas.destroy');
Route::delete('identitas/{id}/destroy', [IdentitasController::class, 'destroy'])->name('identitas.destroy');

Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('menu/tambah', [MenuController::class, 'tambah'])->name('menu.tambah');
Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::get('menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::delete('menu/{id}/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');

Route::get('guru', [GuruController::class, 'index'])->name('guru.index');
Route::get('guru/tambah', [GuruController::class, 'tambah'])->name('guru.tambah');
Route::post('guru', [GuruController::class, 'store'])->name('guru.store');
Route::get('guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
Route::put('guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::get('guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
Route::delete('guru/{id}/destroy', [GuruController::class, 'destroy'])->name('guru.destroy');

Route::get('downlod', [DownlodController::class, 'index'])->name('downlod.index');
Route::get('downlod/tambah', [DownlodController::class, 'tambah'])->name('downlod.tambah');
Route::post('downlod', [DownlodController::class, 'store'])->name('downlod.store');
Route::get('downlod/edit/{id}', [DownlodController::class, 'edit'])->name('downlod.edit');
Route::put('downlod/update/{id}', [DownlodController::class, 'update'])->name('downlod.update');
Route::get('downlod/{id}', [DownlodController::class, 'destroy'])->name('downlod.destroy');
Route::delete('downlod/{id}/destroy', [DownlodController::class, 'destroy'])->name('downlod.destroy');

Route::get('halaman_statis', [HalamanStatisController::class, 'index'])->name('halaman_statis.index');
Route::get('halaman_statis/tambah', [HalamanStatisController::class, 'tambah'])->name('halaman_statis.tambah');
Route::post('halaman_statis', [HalamanStatisController::class, 'store'])->name('halaman_statis.store');
Route::get('halaman_statis/edit/{id}', [HalamanStatisController::class, 'edit'])->name('halaman_statis.edit');
Route::put('halaman_statis/update/{id}', [HalamanStatisController::class, 'update'])->name('halaman_statis.update');
Route::get('halaman_statis/{id}', [HalamanStatisController::class, 'destroy'])->name('halaman_statis.destroy');
Route::delete('halaman_statis/{id}/destroy', [HalamanStatisController::class, 'destroy'])->name('halaman_statis.destroy');

Route::get('album', [AlbumController::class, 'index'])->name('album.index');
Route::get('album/tambah', [AlbumController::class, 'tambah'])->name('album.tambah');
Route::post('album', [AlbumController::class, 'store'])->name('album.store');
Route::get('album/edit/{id}', [AlbumController::class, 'edit'])->name('album.edit');
Route::put('album/update/{id}', [AlbumController::class, 'update'])->name('album.update');
Route::get('album/{id}', [AlbumController::class, 'destroy'])->name('album.destroy');
Route::delete('album/{id}/destroy', [AlbumController::class, 'destroy'])->name('album.destroy');

Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
Route::get('banner/tambah', [BannerController::class, 'tambah'])->name('banner.tambah');
Route::post('banner', [BannerController::class, 'store'])->name('banner.store');
Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
Route::put('banner/update/{id}', [BannerController::class, 'update'])->name(name: 'banner.update');
Route::get('banner/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');
Route::delete('banner/{id}/destroy', [BannerController::class, 'destroy'])->name('banner.destroy');

Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
Route::get('slider/tambah', [SliderController::class, 'tambah'])->name('slider.tambah');
Route::post('slider', [SliderController::class, 'store'])->name('slider.store');
Route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::put('slider/update/{id}', [SliderController::class, 'update'])->name(name: 'slider.update');
Route::get('slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
Route::delete('slider/{id}/destroy', [SliderController::class, 'destroy'])->name('slider.destroy');
