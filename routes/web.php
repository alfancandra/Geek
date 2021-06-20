<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\DatacetakController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/datacetak', [App\Http\Controllers\DatacetakController::class, 'index'])->name('datacetak');

Route::post('/home/datacetak/store', [DatacetakController::class, 'store'])->name('datacetak');

Route::get('/home/datacetak/sudahcetak', [App\Http\Controllers\DatacetakController::class, 'sudahcetak'])->name('datacetak');

Route::resource('/home/datacetak', DatacetakController::class);