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
Route::view('/tentang-kami', 'guest/tentang-kami');
Route::view('/paket-tour', 'guest/paket-tour');
Route::view('/travel-reguler', 'guest/travel-reguler');
Route::view('/sewa-mobil', 'guest/sewa-mobil');
// Route::view('/contact', 'guest/contact');
// Route::view('/foto', 'guest/galeri-foto');

Route::view('/admin/dashboard', 'dashboard/index');