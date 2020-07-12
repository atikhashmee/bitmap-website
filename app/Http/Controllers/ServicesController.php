<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceBg;
use App\ServiceHolder;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function updateBg(Request $r){

         
          
           $bg  =  ServiceBg::find(1);
           $bg->service_headline = $r->input("headertitle");
           $bg->service_description = $r->input("bgdescription");
           if ($r->hasFile('bgimgfile')) {
              Storage::disk('public')->delete($bg->service_bg_img);
                $bg->service_bg_img = $r->file("bgimgfile")->store('Services','public');
           }
           $bg->save();
           return redirect()->back()->withStatus("Data has been updated");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
           
             $validated =  $r->validate([
                  "servicetitle" => 'required',
                  "services_photo" => 'mimes:png',
                 ]);

              $coverphoto = "";
              
              if ($r->hasFile('service_cover_photo')) {
                   $coverphoto = $r->file("service_cover_photo")->store("Services","public");
              }
            ServiceHolder::create([
                    "service_name" => $r->input('servicetitle'), 
                    "about_service" => $r->input('about_project'), 
                    "long_about_sevice" => $r->input('pro_detail'), 
                    "date_time" => $r->input('date'), 
                    "price" => $r->input('price'), 
                    "services_photo" => $coverphoto
            ]);

        return redirect()->back()->withStatus("Data has been Saved");
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view( 'components.website-control.services.services-edit')
        ->with('editinfo',ServiceHolder::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        

        $coverphoto = "";

        if ($r->hasFile('service_cover_photo')) {
            Storage::disk('public')->delete(trim($r->input("bgseimage")));
            $coverphoto = $r->file("service_cover_photo")->store("Services","public");
        }
        else {
           $coverphoto = $r->input("bgseimage");
        }

        ServiceHolder::where("id",$id)->update([
            "service_name" => $r->input('servicetitle'),
            "about_service" => $r->input('about_project'),
            "long_about_sevice" => $r->input('pro_detail'),
            "date_time" => $r->input('date'),
            "price" => $r->input('price'),
            "services_photo" => $coverphoto
        ]);

        return redirect()->back()->withStatus("Data has been Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prot = ServiceHolder::find($id);
        if (file_exists(public_path()."/storage/".$prot->services_photo)) {
            Storage::disk("public")->delete($prot->services_photo);
         }
        $prot->delete();
        return redirect()->back()->withStatus("Data has been Deleted");
    }
}
