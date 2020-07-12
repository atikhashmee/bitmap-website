<?php

namespace App\Http\Controllers;
use App\ProtfolioBg;
use App\Protfolio;
use App\ProtfolioImage;
use App\ProtfolioFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(Request $r)
    {
          $r->validate([
              "projecttitle" => 'required',
              "projecttype"  => 'required'
          ]);
          $img = "";
          if ($r->hasFile("project_cover_photo")) {
            $img = $r->file("project_cover_photo")->store('prot_bg', 'public');
          }

          Protfolio::create([
               'protfolio_categories_id'=> $r->input("projecttype"),
                'project_title'=>$r->input("projecttitle"),
                'about_project'=>$r->input("about_project"),
                'description_project'=>$r->input("pro_detail"),
                'date'=> $r->input("date"),
                'client_name'=> $r->input("client"),
                'project_location'=> $r->input("plocation"),
                'video_url'=> $r->input("vdemo"),
                'video_description'=> $r->input("vdesc"),
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
    public function edit(Request $r,$id)
    {
        $category = 0;
        $img= "";
         if ($r->hasFile('project_cover_photo')) {
             Storage::disk("public")->delete($r->input("dbimage"));
             $img =  $r->file("project_cover_photo")->store('prot_bg','public');
         }
         else {
              $img =  $r->input("dbimage");
            }

         if (empty($r->input("projecttype"))) {
             $category = $r->input('dbcategory');
         }
         else {
             $category = $r->input('projecttype');
         }
         Protfolio::where("id",$id)->update([
               'protfolio_categories_id'=> $category,
                'project_title'=>$r->input("projecttitle"),
                'about_project'=>$r->input("about_project"),
                'description_project'=>$r->input("pro_detail"),
                'date'=> $r->input("date"),
                'client_name'=> $r->input("client"),
                'project_location'=> $r->input("plocation"),
                'video_url'=> $r->input("vdemo"),
                'video_description'=> $r->input("vdesc"),
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
         return redirect()->route("protfolio")->withStatus("Protfolio has been deleted");
    }
}
