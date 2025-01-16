<?php

namespace App\Http\Controllers;


use App\Models\Caraousel;
use App\Models\Mobil;
use App\Models\Tour;

class HomeController extends Controller {


    /** 
        * TODO : Guest Function
        ! kurang data sewa mobil
    */

    public function index() {
        $carousel = Caraousel::select('carousel_images.*', 'collection_photos.path')
                    ->join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
                    ->where('carousel_images.jenis', '=', 'home')
                    ->first();

        $mobil = Mobil::select('detail', 'name', 'price', 'tipe_mobil', 'kursi', 'cc', 'slug', 'collection_photos_id')
                ->with('photos:id,path')
                ->limit(8)
                ->inRandomOrder()
                ->get();

        $tour = Tour::select('detail', 'name', 'price', 'slug', 'lokasi', 'category', 'collection_photos_id')->with('photos:id,path')->get();

        return view('guest-v2.index', compact('mobil', 'tour', 'carousel'));
    }
}
