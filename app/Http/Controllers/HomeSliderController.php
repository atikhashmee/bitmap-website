<?php

namespace App\Http\Controllers;

use App\HomeSlider;
use Illuminate\Http\Request;
 use App\Http\Requests\SliderRequest;
 use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
    public function create()
    {
        return view('components.website-control.sliders.create');
    }

    public function edit($id) {
      return view("components.website-control.sliders.edit")->with("Sliderinfo",HomeSlider::find($id));
    }

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


    public function reorders(Request $r) {
      $ids = $r->input('ids');
      for($i=0,$j=1; $i<count($ids); $i++,$j++) {
          HomeSlider::where('id',$ids[$i])->update(['image_order' => $j]);
      }
      return redirect()->back()->with("status","data saved")->withInput();
    }

    public function update(Request $request, $id)
    {
      $imges = "//unsplash.it/300/200";
      $homeslider = HomeSlider::find($id);
      //$img =  $r->file('imgfile')->store("sliders","Slider_".mt_rand(100,6000),"public");
      if ($request->hasFile("imgfile")) {
          Storage::disk("public")->delete($homeslider->image_link);
          $imges = $request->file('imgfile')->store("sliders","public");
      } else {
          $imges =  $homeslider->image_link;
      }
      HomeSlider::where("id",$id)->update([
              "visibilty"          => $request->input('visiblity'),
              "slider_Title"       => $request->input('headertitle'),
              "slider_Description" => $request->input('description'),
              "project_url"        => $request->input('url'),
              "project_date"       => $request->input('date'),
              "image_link"         => $imges
      ]);

      return redirect()->back()->withStatus("Data has been updated");
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
      if (file_exists(public_path()."/storage/".$prot->image_link)) {
          Storage::disk("public")->delete($prot->image_link);
      }
      $prot->delete();
      return redirect()->back()->withStatus("Data has been Deleted");
    }
}
