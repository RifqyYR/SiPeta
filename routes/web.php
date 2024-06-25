<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kelola-user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/tambah-user', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/tambah-user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/kelola-user/hapus/{uuid}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

Route::get('/ubah-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change-password');
Route::post('/ubah-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update-password');

Route::get('/bayam', [App\Http\Controllers\SpinachController::class, 'index'])->name('plant.spinach.index');
Route::get('/tambah-pertumbuhan-bayam', [App\Http\Controllers\SpinachController::class, 'create'])->name('plant.spinach.create');
Route::post('/tambah-pertumbuhan-bayam', [App\Http\Controllers\SpinachController::class, 'store'])->name('plant.spinach.store');
Route::get('/edit-pertumbuhan-bayam/{uuid}', [App\Http\Controllers\SpinachController::class, 'edit'])->name('plant.spinach.edit');
Route::post('/edit-pertumbuhan-bayam', [App\Http\Controllers\SpinachController::class, 'update'])->name('plant.spinach.update');
Route::get('/hapus-pertumbuhan-bayam/{uuid}', [App\Http\Controllers\SpinachController::class, 'destroy'])->name('plant.spinach.destroy');

Route::get('/bawang', [App\Http\Controllers\OnionController::class, 'index'])->name('plant.onion.index');
Route::get('/tambah-pertumbuhan-bawang', [App\Http\Controllers\OnionController::class, 'create'])->name('plant.onion.create');
Route::post('/tambah-pertumbuhan-bawang', [App\Http\Controllers\OnionController::class, 'store'])->name('plant.onion.store');
Route::get('/edit-pertumbuhan-bawang/{uuid}', [App\Http\Controllers\OnionController::class, 'edit'])->name('plant.onion.edit');
Route::post('/edit-pertumbuhan-bawang', [App\Http\Controllers\OnionController::class, 'update'])->name('plant.onion.update');
Route::get('/hapus-pertumbuhan-bawang/{uuid}', [App\Http\Controllers\OnionController::class, 'destroy'])->name('plant.onion.destroy');

Route::get('/home/get-data-chart', [App\Http\Controllers\HomeController::class, 'getDataChart'])->name('home.data-chart');

Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);