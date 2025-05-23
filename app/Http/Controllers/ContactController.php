<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Caraousel;

class ContactController extends Controller
{  

    private $contact, $id;
    
    public function __construct() {
        $this->id = 'd10a7e1e-1cb6-4a0a-ba9d-33fa89c63649';
        $this->contact = Contact::select('wa', 'email')->where('id', 'd10a7e1e-1cb6-4a0a-ba9d-33fa89c63649')->first();
    }

    /** 
        * TODO : Guest Function
    */

    public function index() {
        $contact = $this->contact;
        $data = $this->data();

        $carousel = Caraousel::select('carousel_images.*', 'collection_photos.path')
        ->join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
        ->where('carousel_images.jenis', '=', 'contact')
        ->first();

        return view('guest-v2.contact', compact('data', 'contact', 'carousel'));
    }

    /** 
        * TODO : Dashboard Admin Function
    */

    public function pageView() {
        $data = $this->data();

        return view('dashboard.kontak', compact('data'));
    }

    public function data() {
       return Contact::select('wa', 'email', 'address', 'gps')->where('id', $this->id)->first();
    }

    public function updateWhatsapp(Request $req) {
        date_default_timezone_set('Asia/Jakarta');

        try {

            $data = array(
                'wa' => $req->wa,
            );

            Contact::where('id', $this->id)->update($data);
            return response()->json(['success' => 'Berhasil Merubah Nomer Whatsapp']);    
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }
        
    }

    public function updateEmail(Request $req) {
        date_default_timezone_set('Asia/Jakarta');

        try {

            $data = array(
                'email' => $req->email,
            );

            Contact::where('id', $this->id)->update($data);
            return response()->json(['success' => 'Berhasil Merubah Kontak Email']);    
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }
    }

    public function updateAddress(Request $req) {
        date_default_timezone_set('Asia/Jakarta');
        
        try {

            $data = array(
                'address' => $req->address,
            );

            Contact::where('id', $this->id)->update($data);
            return response()->json(['success' => 'Berhasil Merubah Kontak Alamat']);    
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }
    
    }

    public function updateGps(Request $req) {
        date_default_timezone_set('Asia/Jakarta');

        try {

            $data = array(
                'gps' => $req->gps,
            );

            Contact::where('id', $this->id)->update($data);
            return response()->json(['success' => 'Berhasil Merubah Point Gps']);    
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }
        return response()->json(['success' => $req->gps]);
    }

}
