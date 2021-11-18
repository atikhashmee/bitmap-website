<?php

namespace App\Http\Controllers;

use App\ServicesLists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServicesListsController extends Controller
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
            'list_avater' => 'required',
            'list_title' => 'required',
            'short_description' => 'max:200'
        ]);

        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator, "service_list")->withInput();
        }
        
        $coverphoto = "";

        if ($request->hasFile('list_avater')) {
            Storage::disk('public')->delete(trim($request->input("bgseimage")));
            $coverphoto = $request->file("list_avater")->store("ServicesList","public") ;
        } else {
            $coverphoto = $request->input("bgseimage");
        }

        ServicesLists::create([
            'list_title' => $request->input( 'list_title'),
            'short_description'=>  $request->input('short_description'),
               'img' => $coverphoto
        ]);
        return redirect()->back()->withStatus("Data has been Saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServicesLists  $servicesLists
     * @return \Illuminate\Http\Response
     */
    public function show(ServicesLists $servicesLists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServicesLists  $servicesLists
     * @return \Illuminate\Http\Response
     */
    public function edit(ServicesLists $servicesLists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServicesLists  $servicesLists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServicesLists $servicesLists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServicesLists  $servicesLists
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicesLists $servicesLists,$id)
    {
          $prot =  ServicesLists::find($id);
      
        if (file_exists(public_path()."/storage/".$prot->img)) {
            Storage::disk("public")->delete($prot->img);
        }
        $prot->delete();
        return redirect()->back()->withStatus("Data has been Deleted");

    }
}
