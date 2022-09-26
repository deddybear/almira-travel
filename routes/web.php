<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CarouselListController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/paket-tour', [PaketTourController::class, 'index']);
Route::get('/travel-reguler', [TravelRegulerController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/sewa-mobil', [SewaMobilController::class, 'index']);
Route::get('/mobil/desc/{slug}', [SewaMobilController::class, 'desc']);
Route::get('/tour/desc/{slug}', [PaketTourController::class, 'desc']);
Route::get('/travel/desc/{slug}', [TravelRegulerController::class, 'desc']);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'pageView']);
            Route::get('/tour', [PaketTourController::class, 'pageView']);
            Route::get('/travel', [TravelRegulerController::class, 'pageView']);
            Route::get('/car', [SewaMobilController::class, 'pageView']);
            Route::get('/contact', [ContactController::class, 'pageView']);
            Route::get('/carousel', [CarouselListController::class, 'pageView']);
            Route::get('/account', [AccountController::class, 'pageView']);
    
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
    
    Route::prefix('caraousel')->group(function () {
        Route::get('/list', [CarouselListController::class, 'listData']);
        Route::get('/search', [CarouselListController::class, 'search']);
        Route::post('/create', [CarouselListController::class, 'create']);
        Route::patch('/update/{id}', [CarouselListController::class, 'update']);
        Route::delete('/delete/{id}', [CarouselListController::class, 'delete']);
    });
    
    Route::prefix('kontak')->group(function () {
        Route::get('/data', [ContactController::class, 'data']);
        Route::patch('/wa', [ContactController::class, 'updateWhatsapp']);
        Route::patch('/email', [ContactController::class, 'updateEmail']);
        Route::patch('/address', [ContactController::class, 'updateAddress']);
        Route::patch('/gps', [ContactController::class, 'updateGps']);
    });

    Route::prefix('account')->group(function () {
        Route::prefix('update')->group(function () {
            Route::patch('/name', [AccountController::class, 'changeName'])->name('change-name');
            Route::patch('/password', [AccountController::class, 'changePassword'])->name('change-password');
            Route::patch('/email', [AccountController::class, 'changeEmail'])->name('change-email');
        });

    });
}); 




// Route::get('/test/storage/delete/{id}', [PaketTourController::class, 'deleteFiles']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
