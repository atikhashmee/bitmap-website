<?php

namespace App\Http\Controllers;

use App\About;
use App\ServiceBg;
use App\HomeSlider;
use App\ServiceHolder;
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

      $about = About::find(1);
      if ($about == null) {
          About::firstOrCreate(
              ['headline_bg' => 'About Us']
          );
      }
      $data['aboutinfo'] = About::find(1);
      return view('home', $data);
    }

    public function servicePage() {
      $service = \App\ServiceBg::find(1);
      if ($service == null) {
        \App\ServiceBg::firstOrCreate(
            ['service_headline' => 'Bitmap Services']
        );
      }
    return view("components.website-control.services.services")
        ->with("bg", \App\ServiceBg::find(1))
        ->with("allservices", \App\ServiceHolder::all())
        ->with("shortservicelists", \App\ServicesLists::all())
        ->with('client_lists', \App\ClientsLists::all());
    }
}
