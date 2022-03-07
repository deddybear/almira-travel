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

Route::view('/',      'guest/index');
Route::view('/paket-tour', 'guest/paket-tour');
Route::view('/travel-reguler', 'guest/travel-reguler');
Route::view('/sewa-mobil', 'guest/sewa-mobil');
Route::view('/desc', 'guest/description');
Route::view('/contact', 'guest/contact');
// Route::view('/foto', 'guest/galeri-foto');

Route::prefix('dashboard')->group(function () {
    Route::view('/', 'dashboard/index');
    Route::view('/tour', 'dashboard/paket-tour');
    Route::view('/travel', 'dashboard/travel-reguler');
    Route::view('/car', 'dashboard/sewa-mobil');
    Route::view('/contact', 'dashboard/kontak');
});