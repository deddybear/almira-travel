<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function pageView() {
        return view('dashboard.kontak');
    }
}
