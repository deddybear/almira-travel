<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarouselListController extends Controller
{
    public function pageView() {
        return view('dashboard.carousel-images');
    }
}
