<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatacetakController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/datacetak', [App\Http\Controllers\DatacetakController::class, 'index'])->name('datacetak');

Route::post('/home/datacetak/store', [DatacetakController::class, 'store'])->name('datacetak');

Route::get('/home/datacetak/sudahcetak', [App\Http\Controllers\DatacetakController::class, 'sudahcetak'])->name('datacetak');
Route::get('/home/datacetak/delete/{id}',[App\Http\Controllers\DatacetakController::class, 'destroy'])->name('datacetak/delete');

Route::patch('/home/datacetak/{tercetak}', [App\Http\Controllers\DatacetakController::class, 'tercetak'])->name('tercetak');
Route::patch('/home/datacetak/sudahcetak/{back}', [App\Http\Controllers\DatacetakController::class, 'back'])->name('sudahcetak/back');

Route::resource('/home/datacetak', DatacetakController::class);