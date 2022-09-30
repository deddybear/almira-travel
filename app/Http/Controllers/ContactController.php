<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{  
    
    public function __construct() {
        $this->id = 'd10a7e1e-1cb6-4a0a-ba9d-33fa89c63649';
    }

    /** 
        * TODO : Guest Function
    */

    public function index() {
        $data = $this->data();

        return view('guest/contact', compact('data'));
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
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
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
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
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
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
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
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
        return response()->json(['success' => $req->gps]);
    }

}
