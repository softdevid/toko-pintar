<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


//route CRUD produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::patch('/produk/update', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

//route CRUD Member
Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/member/create', [MemberController::class, 'create'])->name('produk.create');
Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
Route::get('/member/{id}/edit', [MemberController::class, 'edit'])->name('member.edit');
Route::patch('/member/update', [MemberController::class, 'update'])->name('member.update');
Route::delete('/member/delete/{id}', [MemberController::class, 'destroy'])->name('member.destroy');

//route CRUD Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::patch('/kategori/update', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

//route CRUD Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('produk.create');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::patch('/karyawan/update', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/delete/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

//route CRUD Karyawan
Route::get('/toko', [TokoController::class, 'index'])->name('toko.index');
Route::get('/toko/create', [TokoController::class, 'create'])->name('produk.create');
Route::post('/toko/store', [TokoController::class, 'store'])->name('toko.store');
Route::get('/toko/{id}/edit', [TokoController::class, 'edit'])->name('toko.edit');
Route::patch('/toko/update', [TokoController::class, 'update'])->name('toko.update');
Route::delete('/toko/delete/{id}', [TokoController::class, 'destroy'])->name('toko.destroy');





// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
