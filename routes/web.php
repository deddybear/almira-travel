<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\CarouselListController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryPhotosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessagingController;
use App\Http\Controllers\PaketTourController;
use App\Http\Controllers\SewaMobilController;
use App\Models\GalleryPhotos;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/gallery-photos', [GalleryPhotosController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/sewa-mobil', [SewaMobilController::class, 'index']);
Route::get('/mobil/desc/{slug}', [SewaMobilController::class, 'desc']);
Route::get('/tour/desc/{slug}', [PaketTourController::class, 'desc']);

Route::prefix('send')->group(function () {
    Route::post('/mobil/review', [SewaMobilController::class, 'createReview']);
    Route::post('/tour/review', [PaketTourController::class, 'createReview']);
    Route::post('/msg', [MessagingController::class, 'sendMsg']);

});

// Route untuk admin 

Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'pageView']);
            Route::get('/tour', [PaketTourController::class, 'pageView']);
            Route::get('/gallery', [GalleryPhotosController::class, 'pageView']);
            Route::get('/car', [SewaMobilController::class, 'pageView']);
            Route::get('/contact', [ContactController::class, 'pageView']);
            Route::get('/carousel', [CarouselListController::class, 'pageView']);
            Route::get('/account', [AccountController::class, 'pageView']);
            Route::get('/messaging', [MessagingController::class, 'pageView']);
        });
    });
    

    Route::prefix('tour')->group(function () {
        Route::get('/list', [PaketTourController::class, 'listData']);
        Route::get('/search', [PaketTourController::class, 'search']);
        Route::post('/create', [PaketTourController::class, 'create']);
        Route::patch('/update/{id}', [PaketTourController::class, 'update']);
        Route::delete('/delete/{id}', [PaketTourController::class, 'delete']);
    });
    
    Route::prefix('gallery')->group(function () {
        Route::get('/list', [GalleryPhotosController::class, 'listData']);
        Route::get('/search', [GalleryPhotosController::class, 'search']);
        Route::post('/create', [GalleryPhotosController::class, 'create']);
        Route::delete('/delete/{id}', [GalleryPhotosController::class, 'delete']);
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

    Route::prefix('messaging')->group(function () {
        
        Route::get('/list', [MessagingController::class, 'data']);
        Route::get('/search', [MessagingController::class, 'search']);
        Route::get('/show/{id}', [MessagingController::class, 'show']);
        Route::delete('/delete/{id}', [MessagingController::class, 'delete']);
    });

    Route::prefix('review')->group(function () {
        Route::delete('/delete/{id}', [SewaMobilController::class, 'deleteReview']);
    });
}); 




// Route::get('/test/storage/delete/{id}', [PaketTourController::class, 'deleteFiles']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
