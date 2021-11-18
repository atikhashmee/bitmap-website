<?php

namespace App\Http\Controllers;
use App\Protfolio;
use App\ProtfolioBg;
use App\ProtfolioFaq;
use App\ProtfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProtfolioController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            "projecttitle" => 'required',
            "projecttype"  => 'required'
        ]);

        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator)->withInput();
        }

        $img = "";
        if ($request->hasFile("project_cover_photo")) {
            $img = $request->file("project_cover_photo")->store('prot_bg', 'public');
        }

        Protfolio::create([
            'protfolio_categories_id'=> $request->input("projecttype"),
            'project_title'=>$request->input("projecttitle"),
            'about_project'=>$request->input("about_project"),
            'description_project'=>$request->input("pro_detail"),
            'date'=> $request->input("date"),
            'client_name'=> $request->input("client"),
            'project_location'=> $request->input("plocation"),
            'video_url'=> $request->input("vdemo"),
            'video_description'=> $request->input("vdesc"),
            'project_cover_photo'=> $img
        ]);
        return redirect()->back()->withStatus("Protfolio has been saved");
    }
    public function saveImages(Request $r,$id){
          /* $r->validate([
            "images" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ]); */

          if ($r->hasFile("images")) {
               foreach ($r->file('images') as $img) {
               $path =  $img->store("prot_bg","public");
                ProtfolioImage::create([
                    "protfolios_id" => $id,
                    "images" => $path
                ]);
               }
          }
          else return redirect()->back()->withErr("no Files have been specified");

           return redirect()->back()->withStatus("Images has been saved");

    }

    public function deleteImages($id){

          $imges = ProtfolioImage::find($id);
           if (Storage::disk('public')->exists($imges->images)) {
               Storage::disk("public")->delete($imges->images);
           }
        $imges->delete();
           return redirect()->back()->withStatus("Image has been deleted");
    }

    public function saveFaqs(Request $r,$id){
        $r->validate([
            "title" => "required"
        ]);
         
        for($i =0; $i<count($r->input('title'));$i++){
            ProtfolioFaq::create([
                'protfolios_id' => $id,
                'title'         => $r->input('title')[$i],
                'description'   => $r->input('descrp')[$i]
            ]);
        }  
    return redirect()->back()->withStatus("Faqs have been saved");
    }

    public function delFaqs($id){
        ProtfolioFaq::where("id",$id)->delete();
        return redirect()->back()->withStatus("Faqs have been deleted");
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
    public function edit(Request $request,$id)
    {
        $category = 0;
        $img= "";
         if ($request->hasFile('project_cover_photo')) {
             Storage::disk("public")->delete($request->input("dbimage"));
             $img =  $request->file("project_cover_photo")->store('prot_bg','public');
         }
         else {
              $img =  $request->input("dbimage");
            }

         if (empty($request->input("projecttype"))) {
             $category = $request->input('dbcategory');
         }
         else {
             $category = $request->input('projecttype');
         }
         Protfolio::where("id",$id)->update([
               'protfolio_categories_id'=> $category,
                'project_title'=>$request->input("projecttitle"),
                'about_project'=>$request->input("about_project"),
                'description_project'=>$request->input("pro_detail"),
                'date'=> $request->input("date"),
                'client_name'=> $request->input("client"),
                'project_location'=> $request->input("plocation"),
                'video_url'=> $request->input("vdemo"),
                'video_description'=> $request->input("vdesc"),
                'project_cover_photo'=>$img
          ]);
          return redirect()->route("protfolio")->withStatus("Protfolio has been Updated");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
         $bgimage = "";
         $protfoliobg = ProtfolioBg::find(1);
         if ($r->hasFile('bgimgfile')) {
              Storage::disk("public")->delete($protfoliobg->bg_image);
              $bgimage = $r->file('bgimgfile')->store("prot_bg","public");
         }
         else {
             $bgimage = $protfoliobg->bg_image;
         }

        ProtfolioBg::where('id',1)->update([
          'bg_title' => $r->input("headertitle"),
          'bg_description' => $r->input("bgdescription"),
          'bg_image' => $bgimage
        ]);
        return redirect()->back()->withStatus("Background information has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $prot = Protfolio::find($id);
         if ( file_exists(public_path()."/storage/".$prot->project_cover_photo) ) {
            Storage::disk("public")->delete($prot->project_cover_photo);
         }
         
         $prot->delete();
         return redirect()->back()->withStatus("Protfolio has been deleted");
    }
}
