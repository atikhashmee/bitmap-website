<?php

namespace App\Http\Controllers;

use App\HomeSlider;
use Illuminate\Http\Request;
 use App\Http\Requests\SliderRequest;
 use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.website-control.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
      try {
        $img =  $request->file('imgfile')->store("sliders","public");
        HomeSlider::create([
          "visibilty"          => $request->input('visiblity'),
          "slider_Title"       => $request->input('headertitle'),
          "slider_Description" => $request->input('description'),
          "project_url"        => $request->input('url'),
          "project_date"       => $request->input('date'),
          "image_link"         => $img
        ]);
        return redirect()->back()->withStatus("Data has been saved");
      } catch (\Exception $e) {
          dd($e->getMessage());
      }
     
    }


    public function reorders(Request $r){
             $ids = $r->input('ids');

             for($i=0,$j=1; $i<count($ids); $i++,$j++){
                 
                 HomeSlider::where('id',$ids[$i])->update([
                        'image_order' => $j
                  ]);
             }
          return redirect()->back()->with("status","data saved")->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $homeSlider,$id)
    {
         
          return view("components.website-control.sliders.homeslideredit")->with("Sliderinfo",HomeSlider::find($id));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSlider $homeSlider)
    {
      $imges = "//unsplash.it/300/200";
      $homeslider = HomeSlider::find($id);
      //$img =  $r->file('imgfile')->store("sliders","Slider_".mt_rand(100,6000),"public");
      if ($r->hasFile("imgfile")) {
             Storage::disk("public")->delete($homeslider->image_link);
             $imges = $r->file('imgfile')->store("sliders","public");
      } 
       else
      $imges =  $homeslider->image_link;
        HomeSlider::where("id",$id)->update([
              "visibilty"          => $r->input('visiblity'),
               "slider_Title"       => $r->input('headertitle'),
               "slider_Description" => $r->input('description'),
               "project_url"        => $r->input('url'),
               "project_date"       => $r->input('date'),
               "image_link"       =>  $imges
        ]);

      return redirect()->route('sliders')->withStatus("Data has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSlider $homeSlider,$id)
    {
      $prot = HomeSlider::find($id);
     if (file_exists(public_path()."/storage/".$prot->image_link)) 
      {
         Storage::disk("public")->delete($prot->image_link);
      }
      $prot->delete();
       return redirect()->back()->withStatus("Data has been Deleted");
    }
}
