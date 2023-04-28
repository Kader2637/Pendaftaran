<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});
Route::resource('/jurnal', App\Http\Controllers\JurnalController::class);

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/customer' , App\Http\Controllers\CustomerController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/guruku' ,App\Http\Controllers\GuruController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/daftar' , App\Http\Controllers\DaftarController::class);
Route::put('/daftar/{daftar}/confirm', [App\Http\Controllers\DaftarController::class, 'confirm'])->name('daftar.confirm');
Route::put('/daftar/{daftar}/tolak', [App\Http\Controllers\DaftarController::class, 'tolak'])->name('daftar.tolak');
Route::get('/konfirmasi', [App\Http\Controllers\DaftarController::class, 'konfirmasi'])->name('konfirmasi.index');
Route::resource('terima' , App\Http\Controllers\DiterimaController::class);
Route::get('/createguru', [App\Http\Controllers\GuruController::class, 'guruku'])->name('createguru.index');

Route::get('/admin', function () {
    if (Gate::allows('admin')) {
        return view('admin.home');
    } else {
        abort(403, 'Unauthorized action.');
    }
});

Route::get('/guru', function () {
    if (Gate::allows('guru')) {
        return view('guru.home');
    } else {
        abort(403, 'Unauthorized action.');
    }
});

Route::get('/siswa', function () {
    if (Gate::allows('siswa')) {
        return view('siswa.home');
    } else {
        abort(403, 'Unauthorized action.');
    }
});

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

// Route::resource('/home', DashboardController::class)->except('show')->middleware('admin');
// Route::resource('/home', DashboardController::class)->except('show')->middleware('guru');


Route::get('/logout', [CustomAuthController::class, 'signOut'])->name('logout');
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin');
Route::get('signup', [CustomAuthController::class, 'signup'])->name('register-user');
Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
