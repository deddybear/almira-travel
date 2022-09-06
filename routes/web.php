<?php

use App\Http\Controllers\CarouselListController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketTourController;
use App\Http\Controllers\SewaMobilController;
use App\Http\Controllers\TravelRegulerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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

Route::prefix('admin')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'pageView']);
        Route::get('/tour', [PaketTourController::class, 'pageView']);


        Route::prefix('travel')->group(function () {
            Route::get('/', [TravelRegulerController::class, 'pageView']);
        });

        Route::prefix('car')->group(function () {
            Route::get('/', [SewaMobilController::class, 'pageView']);
        });
        
        Route::prefix('contact')->group(function () {
            Route::get('/', [ContactController::class, 'pageView']);
        });
     
        Route::prefix('carousel')->group(function () {
            Route::get('/', [CarouselListController::class, 'pageView']);
        });

      
    });
});

Route::prefix('tour')->group(function () {
    Route::get('/list', [PaketTourController::class, 'listData']);
    Route::get('/search', [PaketTourController::class, 'search']);
    Route::post('/create', [PaketTourController::class, 'create']);
    Route::patch('/update/{id}', [PaketTourController::class, 'update']);
    Route::delete('/delete/{id}', [PaketTourController::class, 'delete']);
});

Route::prefix('travel')->group(function () {
    Route::get('/list', [TravelRegulerController::class, 'listData']);
    Route::get('/search', [TravelRegulerController::class, 'search']);
    Route::post('/create', [TravelRegulerController::class, 'create']);
    Route::patch('/update/{id}', [TravelRegulerController::class, 'update']);
    Route::delete('/delete/{id}', [TravelRegulerController::class, 'delete']);
});


Route::prefix('mobil')->group(function () {
    Route::get('/list', [SewaMobilController::class, 'listData']);
    Route::get('/search', [SewaMobilController::class, 'search']);
    Route::post('/create', [SewaMobilController::class, 'create']);
    Route::patch('/update/{id}', [SewaMobilController::class, 'update']);
    Route::delete('/delete/{id}', [SewaMobilController::class, 'delete']);
});

// Route::get('/test/storage/delete/{id}', [PaketTourController::class, 'deleteFiles']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
