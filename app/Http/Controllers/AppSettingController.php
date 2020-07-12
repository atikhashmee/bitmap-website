<?php

namespace App\Http\Controllers;

use App\AppSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppSettingController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppSetting  $appSetting
     * @return \Illuminate\Http\Response
     */
    public function show(AppSetting $appSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppSetting  $appSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(AppSetting $appSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppSetting  $appSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, AppSetting $appSetting)
    {
            $appsettings = AppSetting::find(1);
             
             
         
         $logo="";
         $pavicon = "";
         if ($r->hasFile('logofile')) {
             Storage::disk('public')->delete($appsettings->logo);
            $logo = $r->file("logofile")->store("settings","public");
         }else 
         $logo = $appsettings->logo;
         
         if ($r->hasFile('feviconfile')) {
             Storage::disk('public')->delete($appsettings->fevicon);
            $pavicon  = $r->file("feviconfile")->store("settings","public");
         }
         else 
            $pavicon = $appsettings->fevicon;


        AppSetting::where("id",1)->update([
                 'logo'  =>  $logo,
                 'fevicon'  => $pavicon,
                 'title'  => $r->input('sitetitle'),
                 'short_description'  =>$r->input('shortdes'),
                 'address'  =>$r->input('adrs'),
                 'phone'  =>$r->input('phone'),
                 'email'  =>   $r->input('email'),
                 'facebook'  =>$r->input('fblink'),
                 'twitter'  =>$r->input('twitterlink'),
                'instagram' =>$r->input('instlink')
        ]);
        return redirect()->back()->withStatus("Settings updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppSetting  $appSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppSetting $appSetting)
    {
        //
    }
}
