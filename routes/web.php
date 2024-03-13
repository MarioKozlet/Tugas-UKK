<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManajemenUserController;
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

Route::get('/dashboard', function () {
    return view('layouts/dashboard');
})->name('dashboard')->middleware('auth');

Route::resource('/manajemenuser', ManajemenUserController::class)->middleware('auth', 'admin');

Route::resource('/kelas', KelasController::class)->middleware('auth', 'admin');

Route::resource('/guru', GuruController::class)->middleware('auth', 'admin');

Route::controller(LoginController::class)->name('auth.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/login', 'authenticate')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});
