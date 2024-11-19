<?php

use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\BukuControllers;
use App\Http\Controllers\CartControllers;
use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\KategoriControllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PeminjamanControllers;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenulisControllers;
use App\Http\Controllers\RakControllers;
use App\Http\Controllers\RegisControllers;
use App\Http\Controllers\UserControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthControllers::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthControllers::class, 'login']);
Route::get('logout', [AuthControllers::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthControllers::class, 'showRegisterForm'])->name('register.form');
    Route::post('register', [AuthControllers::class, 'register'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->group(function () {

        //dashboard
        Route::get('/dashboard', [DashboardControllers::class, 'adminDash'])->name('admin.dashboard');
        Route::get('/profile', [DashboardControllers::class, 'proad'])->name('profileAdmin');

        //buku
        Route::controller(BukuControllers::class)->prefix('buku')->group(function () {
            Route::get('', 'adminBuku')->name('adminbuku');
            Route::get('create', 'create')->name('adminBukuCreate');
            Route::post('', 'store')->name('adminBukuStore');
            Route::get('edit/{id}', 'edit')->name('adminBukuEdit');
            Route::put('update/{id}', 'update')->name('buku.update');
        });

        //penerbit
        Route::controller(PenerbitController::class)->prefix('penerbit')->group(function () {
            Route::get('', [PenerbitController::class, 'penerbitPage'])->name('adminpenerbit');
            Route::post('', [PenerbitController::class, 'store'])->name('pages.admin.penerbit.store');
            Route::get('create', [PenerbitController::class, 'create'])->name('create_penerbit');
            Route::get('edit/{id}', [PenerbitController::class, 'edit'])->name('penerbit.edit');
            Route::put('update/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
        });

        //penulis
        Route::controller(PenulisControllers::class)->prefix('penulis')->group(function () {
            Route::get('', 'penulisPage')->name('adminpenulis');
            Route::post('', 'store')->name('pages.admin.penulis.store');
            Route::get('create', 'create')->name('create_penulis');
            Route::get('edit/{id}', 'edit')->name('penulis.edit');
            Route::put('update/{id}', 'update')->name('penulis.update');
        });

        //kategori
        Route::controller(KategoriControllers::class)->prefix('kategori')->group(function () {
            Route::get('', 'kategoriPage')->name('adminkategori');
            Route::post('', 'store')->name('pages.admin.kategori.store');
            Route::get('create', 'create')->name('create_kategori');
            Route::get('edit/{id}', 'edit')->name('kategori.edit');
            Route::put('update/{id}', 'update')->name('kategori.update');
        });

        //rak
        Route::controller(RakControllers::class)->prefix('rak')->group(function () {
            Route::get('', 'rakPage')->name('adminrak');
            Route::post('', 'store')->name('pages.admin.rak.store');
            Route::get('create', 'create')->name('create_rak');
            Route::get('edit/{id}', 'edit')->name('rak.edit');
            Route::put('update/{id}', 'update')->name('rak.update');
        });

        //user
        Route::controller(UserControllers::class)->prefix('user')->group(function () {
            Route::get('', 'index')->name('adminUserIndex');
            Route::post('', 'store')->name('adminUserStore');
            Route::get('create', 'create')->name('adminUserCreate');
            Route::get('edit/{id}', 'edit')->name('adminUserEdit');
            Route::put('update/{id}', 'update')->name('adminUserUpdate');
        });

        //peminjaman
        Route::controller(PeminjamanControllers::class)->prefix('peminjaman')->group(function () {
            Route::get('', 'indexAdmin')->name('adminPeminjamanIndex');
            Route::post('', 'store');
            Route::put('update/{id}', 'update');
        });
    });

    Route::prefix('siswa')->group(function () {
        Route::get('dashboard', [DashboardControllers::class, 'siswaDash'])->name('siswaDashboard');
        Route::get('/profile', [DashboardControllers::class, 'prois'])->name('profileSiswa');

        Route::get('/buku', [BukuControllers::class, 'index'])->name('siswaBukuIndex');
        Route::get('/search', [BukuControllers::class, 'search'])->name('siswaBukuSearch');

        Route::get('pinjam', [PeminjamanControllers::class, 'indexSiswa'])->name('siswaPinjam');
        Route::post('/cart/add', [CartControllers::class, 'addToCart'])->name('cart.add');
        Route::get('/cart/view', [CartControllers::class, 'viewCart'])->name('cart.view');


        Route::get('/cart', [CartControllers::class, 'index'])->name('cart.index');
        Route::get('/cart/details', [CartControllers::class, 'cartDetails'])->name('cart.details');
        Route::post('/cart/remove', [CartControllers::class, 'removeFromCart'])->name('cart.remove');
        Route::post('/cart/update', [CartControllers::class, 'updateQuantity'])->name('cart.update');
        Route::post('/peminjaman', [PeminjamanControllers::class, 'store'])->name('peminjaman.store');
        Route::get('peminjaman/detail/{id}', [PeminjamanControllers::class, 'show'])->name('peminjaman.detail');

    });
});

Route::post('/createpenerbit', [PenerbitController::class, 'create'])->name('action.createpenerbit');




Route::get('siswa/buku/{id}/pinjam', [BukuControllers::class, 'pinjam'])->name('bukuPinjam');
Route::get('siswa/buku/{id}/detail', [BukuControllers::class, 'detail'])->name('bukuDetail');
Route::get('siswa/buku/{id}/edit', [BukuControllers::class, 'edit'])->name('bukuEdit');
Route::put('siswa/buku/{id}', [BukuControllers::class, 'update'])->name('bukuUpdate');


Route::get('/createbuku', [BukuControllers::class, 'create']);
