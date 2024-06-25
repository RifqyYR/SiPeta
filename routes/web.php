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

Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);