<?php

namespace App\Http\Controllers;

use App\HomeSlider;
use Illuminate\Http\Request;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      $data = [];
      $data['sliders'] = HomeSlider::orderBy('image_order')->get();
        
      return view('home', $data);
    }
}
