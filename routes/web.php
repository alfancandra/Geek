<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatacetakController;
use App\Http\Controllers\DatabingkaiController;
use App\Http\Controllers\DatafotoStudioController;
use App\Http\Controllers\DatapaketstudioController;
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

// URL MENU
Route::get('/home/daftarfoto', [App\Http\Controllers\DatafotoStudioController::class, 'create'])->name('daftarfoto');
Route::get('/home/datafotostudio', [App\Http\Controllers\DatafotoStudioController::class, 'index'])->name('datafotostudio');
Route::get('/home/datapaketstudio', [DatapaketstudioController::class, 'index'])->name('datapaketstudio');
Route::get('/home/datacetak', [App\Http\Controllers\DatacetakController::class, 'index'])->name('datacetak');
Route::get('/home/databingkai', [App\Http\Controllers\DatabingkaiController::class, 'index'])->name('databingkai');

// FORM
Route::post('/home/datafotostudio/store', [DatafotoStudioController::class, 'store'])->name('datafotostudio');
Route::get('/home/datafotostudio/delete/{id}',[App\Http\Controllers\DatafotoStudioController::class, 'destroy'])->name('datafotostudio/delete');

Route::get('/home/datapaketstudio/delete/{id}',[App\Http\Controllers\DatapaketstudioController::class, 'destroy'])->name('datapaketstudio/delete');

Route::post('/home/datacetak/store', [DatacetakController::class, 'store'])->name('datacetak');
Route::post('/home/databingkai/store', [DatabingkaiController::class, 'store'])->name('databingkai');
Route::get('/home/databingkai/delete/{id}',[App\Http\Controllers\DatabingkaiController::class, 'destroy'])->name('databingkai/delete');

Route::get('/home/datacetak/sudahcetak', [App\Http\Controllers\DatacetakController::class, 'sudahcetak'])->name('datacetak');
Route::get('/home/datacetak/delete/{id}',[App\Http\Controllers\DatacetakController::class, 'destroy'])->name('datacetak/delete');

Route::patch('/home/datacetak/{tercetak}', [App\Http\Controllers\DatacetakController::class, 'tercetak'])->name('tercetak');
Route::patch('/home/datacetak/sudahcetak/{back}', [App\Http\Controllers\DatacetakController::class, 'back'])->name('sudahcetak/back');

// Resource
Route::resource('/home/datafotostudio', DatafotoStudioController::class);
Route::resource('/home/datapaketstudio', DatapaketstudioController::class);
Route::resource('/home/datacetak', DatacetakController::class);
Route::resource('/home/databingkai', DatabingkaiController::class);