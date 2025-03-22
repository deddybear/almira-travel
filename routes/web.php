<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CarouselListController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryPhotosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessagingController;
use App\Http\Controllers\PaketTourController;
use App\Http\Controllers\PrivateTourController;
use App\Http\Controllers\SewaMobilController;
use App\Http\Controllers\TravelRegulerController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('sewa-mobil')->group(function () {
    Route::get('/', [SewaMobilController::class, 'index'])->name('sewa_mobil');
    Route::get('get-list', [SewaMobilController::class, 'getListTour']);
    Route::get('desc/{slug}', [SewaMobilController::class, 'desc'])->name('mobil-desc');
    Route::post('search-guest', [SewaMobilController::class, 'searchGuest']);
});

Route::prefix('paket-tour')->group(function () {
    Route::get('/', [PaketTourController::class, 'index'])->name('paket_tour');
    Route::get('get-list', [PaketTourController::class, 'getListTour']);
    Route::get('desc/{slug}', [PaketTourController::class, 'desc'])->name('tour-desc');
    Route::post('search-guest', [PaketTourController::class, 'searchGuest']);
});


    Route::prefix('travel-reguler')->group(function () {
        Route::get('/', [TravelRegulerController::class,'index'])->name('travel-reguler');
        Route::get('get-list', [TravelRegulerController::class, 'getListTravel']);
        Route::get('desc/{slug}', [TravelRegulerController::class, 'desc'])->name('travel-reguler-desc');
        Route::post('search-guest', [TravelRegulerController::class, 'searchGuest']);
    });
    
    Route::prefix('tour-private')->group(function () {
        Route::get('/', [PrivateTourController::class, 'index'])->name('tour_private');
        Route::get('get-list', [PrivateTourController::class, 'getListTour']);
        Route::get('desc/{slug}', [PrivateTourController::class, 'desc'])->name('tour_private_desc');
        Route::post('search-guest', [PrivateTourController::class, 'searchGuest']);
    });    




Route::get('/gallery', [GalleryPhotosController::class, 'index'])->name('galeri');
Route::get('/contact', [ContactController::class, 'index'])->name('kontak');

Route::prefix('send')->group(function () {
    Route::post('/mobil/review', [SewaMobilController::class, 'createReview']);
    Route::post('/tour/review', [PaketTourController::class, 'createReview']);
    Route::post('/msg', [MessagingController::class, 'sendMsg']);

});





Auth::routes();
Auth::routes(['verify' => true]);

// Route untuk admin 

Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'pageView']);
            Route::get('/tour', [PaketTourController::class, 'pageView']);
            
                Route::get('/tour-private', [PrivateTourController::class, 'pageView']);
            
            Route::get('/gallery', [GalleryPhotosController::class, 'pageView']);
            Route::get('/car', [SewaMobilController::class, 'pageView']);
            Route::get('/contact', [ContactController::class, 'pageView']);
            Route::get('/carousel', [CarouselListController::class, 'pageView']);
            Route::get('/account', [AccountController::class, 'pageView']);
            Route::get('/messaging', [MessagingController::class, 'pageView']);
            Route::get('/travel-reguler', [TravelRegulerController::class,'pageView']);
        });
    });
    
    
        Route::prefix('tour')->group(function () {
            Route::get('/list', [PaketTourController::class, 'listData']);
            Route::get('/search', [PaketTourController::class, 'search']);
            Route::get('/get-data/{id}', [PaketTourController::class, 'get']);
            Route::post('/create', [PaketTourController::class, 'create']);
            Route::patch('/update/{id}', [PaketTourController::class, 'update']);
            Route::delete('/delete/{id}', [PaketTourController::class, 'delete']);
        });
    
    
        Route::prefix('tour-private')->group(function () {
            Route::get('/list', [PrivateTourController::class, 'listData']);
            Route::get('/search', [PrivateTourController::class, 'search']);
            Route::get('/get-data/{id}', [PrivateTourController::class, 'get']);
            Route::post('/create', [PrivateTourController::class, 'create']);
            Route::patch('/update/{id}', [PrivateTourController::class, 'update']);
            Route::delete('/delete/{id}', [PrivateTourController::class, 'delete']);
        });
    


    Route::prefix('travel')->group(function () {
        Route::get('/list', [TravelRegulerController::class, 'listData']);
        Route::get('/search', [TravelRegulerController::class, 'search']);
        Route::get('/get-data/{id}', [TravelRegulerController::class, 'get']);
        Route::post('/create', [TravelRegulerController::class, 'create']);
        Route::patch('/update/{id}', [TravelRegulerController::class, 'update']);
        Route::delete('/delete/{id}', [TravelRegulerController::class, 'delete']);
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
        Route::get('/get-data/{id}', [SewaMobilController::class, 'get']);
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
