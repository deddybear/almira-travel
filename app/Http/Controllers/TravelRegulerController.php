<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelRegulerController extends Controller
{
    //
    public function pageView() {
        return view('dashboard.travel-reguler');
    }
}
