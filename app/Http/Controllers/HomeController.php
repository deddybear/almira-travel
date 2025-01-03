<?php

namespace App\Http\Controllers;

use App\Models\Caraousel;
use App\Models\Contact;
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
        
        $mobil = Mobil::select('detail', 'name', 'price', 'tipe_mobil', 'kursi', 'cc', 'slug', 'collection_photos_id')->with('photos:id,path')->get();
        $contact = Contact::select('wa', 'email')->where('id', 'd10a7e1e-1cb6-4a0a-ba9d-33fa89c63649')->first();

        return view('guest.index', compact('caraousel', 'mobil', 'contact'));
    }
}
