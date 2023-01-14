<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanAdminController;
use App\Http\Controllers\LaporanTokoController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;


use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', '/dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        // validasi level user
        if (Auth::user()->level == 'admin') {
            return Inertia::render('Dashboard');
        } elseif (Auth::user()->level == 'toko1') {
            return Inertia::render('AdminToko/Dashboard');
        } elseif (Auth::user()->level == 'toko2') {
            return Inertia::render('AdminToko/Dashboard');
        }
    });
});

Route::group(['middleware' => 'auth', 'prefix' => 'toko1'], function () {
    Route::get('/', function () {
        return Inertia::render('Produk/Index');
    });
});

Route::group(['middleware' => 'auth', 'prefix' => 'toko2'], function () {
    Route::get('/', function () {
        return Inertia::render('Produk/Index');
    });
});

//admin dashboard
Route::get('/dashboard-toko', [DashboardController::class, 'dashboard']);

Route::group(['toko'], function () {
    //route CRUD produk
    Route::resource('produk', ProdukController::class);

    //route CRUD Member
    Route::resource('member', MemberController::class);

    //route CRUD Kategori
    Route::resource('kategori', KategoriController::class);

    //route CRUD Karyawan
    Route::resource('karyawan', KaryawanController::class);

    Route::get('/laporan-bulanan/penjualan', [LaporanTokoController::class, 'laporanBulananPenjualan'])->name('laporanPenjualanBulanan');
    Route::get('/laporan-tahunan/penjualan', [LaporanTokoController::class, 'laporanTahunanPenjualan'])->name('laporanPenjualanTahunan');
    Route::get('/laporan-range/penjualan', [LaporanTokoController::class, 'laporanPenjualanRange'])->name('laporanPenjualanRange');

    Route::get('/laporan-bulanan/pembelian', [LaporanTokoController::class, 'laporanBulananPembelian'])->name('laporanPembelianBulanan');
    Route::get('/laporan-tahunan/pembelian', [LaporanTokoController::class, 'laporanTahunanPembelian'])->name('laporanPembelianTahunan');
    Route::get('/laporan-range/pembelian', [LaporanTokoController::class, 'laporanPembelianRange'])->name('laporanPembelianRange');
});

Route::group(['admin'], function () {

    //route laporan penjualan per bulan, tahun super admin
    Route::get('/admin/laporan-bulanan/penjualan', [LaporanAdminController::class, 'laporanPenjualanBulananAdmin'])->name('laporanBulananPenjualanAdmin');
    Route::get('/admin/laporan-tahunan/penjualan', [LaporanAdminController::class, 'laporanPenjualanTahunanAdmin'])->name('laporanTahunanPenjualanAdmin');

    //route laporan pembelian per bulan, tahun super admin
    Route::get('/admin/laporan-bulanan/pembelian', [LaporanAdminController::class, 'laporanPembelianBulananAdmin'])->name('laporanBulananPenjualanAdmin');
    Route::get('/admin/laporan-tahunan/pembelian', [LaporanAdminController::class, 'laporanPembelianTahunanAdmin'])->name('laporanTahunanPembelianAdmin');

    //route laporan penjualan range tanggal
    Route::get('/admin/laporan-range/penjualan', [LaporanAdminController::class, 'laporanPenjualanRange'])->name('laporanPenjualanRangeAdmin');
    Route::get('/admin/laporan-range/pembelian', [LaporanAdminController::class, 'laporanPembelianRange'])->name('laporanPembelianRangeAdmin');
});

//Kasir
Route::redirect('/kasir', '/kasir/jual');
Route::get('/kasir/jual', [KasirController::class, 'jual'])->name('kasir.jual');
Route::get('/kasir/beli', [KasirController::class, 'beli'])->name('kasir.beli');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
