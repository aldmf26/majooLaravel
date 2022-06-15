<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriSatuanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
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
    return view('welcome', ['title' => 'Majoo']);
})->name('welcome');

// auth welcome 
Route::get('/auth', [AuthController::class, 'index'])->name('auth');

// login
Route::post('/login', [LoginController::class, 'prosesLogin'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::post('/tambahProduk', [ProdukController::class, 'tambah'])->name('tambahProduk');
Route::post('/editProduk', [ProdukController::class, 'edit'])->name('editProduk');
Route::get('/hapusProduk', [ProdukController::class, 'hapus'])->name('hapusProduk');

// stok produk
Route::get('/stokProduk', [ProdukController::class, 'stokProduk'])->name('stokProduk');
Route::get('/buatStokProduk', [ProdukController::class, 'buatStokProduk'])->name('buatStokProduk');
Route::post('/inputProdukMasuk', [ProdukController::class, 'inputProdukMasuk'])->name('inputProdukMasuk');
Route::get('/detailStokProduk', [ProdukController::class, 'detailStokProduk'])->name('detailStokProduk');
Route::post('/editStokMasuk', [ProdukController::class, 'editStokMasuk'])->name('editStokMasuk');
Route::get('/deleteStok', [ProdukController::class, 'deleteStok'])->name('deleteStok');
Route::get('/printStokMasuk', [ProdukController::class, 'printStokMasuk'])->name('printStokMasuk');
Route::post('/tambahProdukMasuk', [ProdukController::class, 'tambahProdukMasuk'])->name('tambahProdukMasuk');

// kategori & satuan
Route::get('/kategoriSatuan', [KategoriSatuanController::class, 'index'])->name('kategoriSatuan');
Route::post('/tambahKategori', [KategoriSatuanController::class, 'tambahKategori'])->name('tambahKategori');
Route::post('/editKategori', [KategoriSatuanController::class, 'editKategori'])->name('editKategori');
Route::get('/hapusKategori', [KategoriSatuanController::class, 'hapusKategori'])->name('hapusKategori');
Route::post('/tambahSatuan', [KategoriSatuanController::class, 'tambahSatuan'])->name('tambahSatuan');
Route::post('/editSatuan', [KategoriSatuanController::class, 'editSatuan'])->name('editSatuan');
Route::get('/hapusSatuan', [KategoriSatuanController::class, 'hapusSatuan'])->name('hapusSatuan');
// -------------------------------

// user
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/tambahUser', [UserController::class, 'tambah'])->name('tambahUser');
Route::post('/editUser', [UserController::class, 'edit'])->name('editUser');
Route::get('/hapusUser', [UserController::class, 'hapus'])->name('hapusUser');
// ---------------------------------------------

// waitres
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
Route::post('/tambahKaryawan', [KaryawanController::class, 'tambah'])->name('tambahKaryawan');
Route::post('/editKaryawan', [KaryawanController::class, 'edit'])->name('editKaryawan');
Route::get('/hapusKaryawan', [KaryawanController::class, 'hapus'])->name('hapusKaryawan');
// ---------------------------------------------
