<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
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
        } elseif (Auth::user()->level == 'toko') {
            return Inertia::render('Produk/Index');
        }
    });
});

Route::group(['middleware' => 'auth', 'prefix' => 'toko'], function () {
    Route::get('/', function () {
        return Inertia::render('Produk/Index');
    });
});

//admin dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('toko.index');
Route::get('/admin-stok', [AdminController::class, 'stok'])->name('toko.stok');
Route::get('/admin-member', [AdminController::class, 'member'])->name('toko.member');
Route::get('/admin-karyawan', [AdminController::class, 'index'])->name('toko.index');
Route::get('/admin', [AdminController::class, 'index'])->name('toko.index');
Route::get('/admin', [AdminController::class, 'index'])->name('toko.index');

Route::group(['middleware' => 'auth'], function () {
    //route CRUD produk
    Route::resource('produk', ProdukController::class);

    //route CRUD Member
    Route::resource('member', MemberController::class);

    //route CRUD Kategori
    Route::resource('kategori', KategoriController::class);

    //route CRUD Karyawan
    Route::resource('karyawan', KaryawanController::class);

    //route CRUD Karyawan
    Route::resource('toko', TokoController::class);
});



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
