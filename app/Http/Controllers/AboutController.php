<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::find(1);
        if ($about == null) {
            About::firstOrCreate(
                ['headline_bg' => 'About Us']
            );
        }
        
        return view("components.website-control.about.aboutus")
        ->with("aboutinfo", About::find(1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    { 
          $aboutimage = "";
          $aboutbgimage = "";

         $existing =  About::find(1);
           

          if ($r->hasFile('aboutimage')) {
             Storage::disk("public")->delete($existing->about_img);
            $aboutimage =  $r->file('aboutimage')->store("aboutImage","public");
  
          }
          else {
              $aboutimage = $existing->about_img;
          }

          if ($r->hasFile('bgimgfile')) {
              Storage::disk("public")->delete($existing->image_bg);
           $aboutbgimage =  $r->file('bgimgfile')->store("aboutImage","public");  
          }
          else {
              $aboutbgimage = $existing->image_bg;
          }
              
              
          $about = About::find(1);
          $about->company_history_title = $r->input("history-headertitle");
          $about->compnay_history_description = $r->input( "history-description");
          $about->heading = $r->input("headertitle");
          $about->description = $r->input("description");
          $about->about_img = $aboutimage;
          $about->headline_bg = $r->input("headerbg");
          $about->description_bg = $r->input("descbg");
          $about->youtubelink = $r->input("youtubelink");
          $about->image_bg =   $aboutbgimage;
          $about->save();
          return redirect()->back()->withStatus("Data has been Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
