<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/satu', function () {
    return view('welcome');
});

Route::get('/', [PagesController::class, 'index'])->name('home.index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'show']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);


// Routes untuk CRUD Barang
Route::get('tambah-barang', [BarangController::class, 'tambahbarang']);
Route::post('tambah-barang', [BarangController::class, 'store']);
Route::get('/barang', [BarangController::class, 'barang'])->name('barang.index');
Route::get('edit/barang/{barang}/edit', [BarangController::class, 'editbarang']);
Route::put('edit/barang/{barang}', [BarangController::class, 'update']);
Route::delete('/barang/{barang}', [BarangController::class, 'destroy']);