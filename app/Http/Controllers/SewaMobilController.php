<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SewaMobilController extends Controller
{
    public function pageView() {
        return view('dashboard.sewa-mobil');
    }
}
