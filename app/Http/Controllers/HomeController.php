<?php

namespace App\Http\Controllers;


use App\Models\Caraousel;
use App\Models\Mobil;
use App\Models\Tour;
use App\Models\Contact;
use App\Models\Travel;

class HomeController extends Controller {

    public $contact;

    /** 
        * TODO : Guest Function
        ! kurang data sewa mobil
    */
    public function __construct() {
        $this->contact = Contact::select('wa', 'email')->where('id', 'd10a7e1e-1cb6-4a0a-ba9d-33fa89c63649')->first();
    }

    public function index() {
        $contact = $this->contact;

        $carousel = Caraousel::select('carousel_images.*', 'collection_photos.path')
                    ->join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
                    ->where('carousel_images.jenis', '=', 'home')
                    ->first();

        $mobil = Mobil::select('detail', 'name', 'price', 'tipe_mobil', 'kursi', 'cc', 'slug', 'collection_photos_id')
                ->with('photos:id,path')
                ->limit(8)
                ->inRandomOrder()
                ->get();

        $tour = Tour::select('detail', 'name', 'price', 'slug', 'lokasi', 'category', 'collection_photos_id')
                ->with('photos:id,path')
                ->limit(8)
                ->inRandomOrder()
                ->get();

        $tourPrivate = Tour::select('detail', 'name', 'price', 'slug', 'lokasi', 'category', 'collection_photos_id')
                        ->with('photos:id,path')
                        ->where('type_tour', '=', 'private')
                        ->limit(4)
                        ->inRandomOrder()
                        ->get();

        $travelReguler = Travel::select('collection_photos_id', 'name', 'category', 'lokasi', 'price', 'slug')
                            ->with('photos:id,path')
                            ->limit(4)
                            ->inRandomOrder()
                            ->get();

        return view('guest-v2.index', compact('mobil', 'tour', 'carousel', 'tourPrivate', 'travelReguler', 'contact'));
    }
}
