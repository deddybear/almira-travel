<?php

namespace App\Http\Controllers;

use App\Models\Caraousel;
use App\Models\Mobil;
use Illuminate\Http\Request;

class HomeController extends Controller {


    /** 
        * TODO : Guest Function
        ! kurang data sewa mobil
    */

    public function index() {
        $caraousel = Caraousel::join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
                                ->select('collection_photos.path')
                                ->get();
        
        $mobil = $data = Mobil::select('detail', 'name', 'price', 'tipe_mobil', 'kursi', 'cc', 'slug', 'collection_photos_id')->with('photos:id,path')->get();
        
        return view('guest.index', compact('caraousel', 'mobil'));
    }
}
