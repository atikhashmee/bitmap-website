<?php

namespace App\Http\Controllers;

use App\HomeStyle;
use Illuminate\Http\Request;

class HomeStyleController extends Controller
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
    public function store(Request $request,$id)
    {
        if ($id == 1) 
        {
            $collections = [2,3,4,5];
            HomeStyle::whereIn("id",$collections)->update([
               "status" => "0"
            ]);
            HomeStyle::where("id",$id)->update([
               "status" => "1"
            ]);
        }
        else if ($id == 2) {
            $collections = [1,3,4,5];
            HomeStyle::whereIn("id",$collections)->update([
               "status" => "0"
            ]);
            HomeStyle::where("id",$id)->update([
               "status" => "1"
            ]);
        }
        else if ($id == 3) {
            $collections = [1,2,4,5];
            HomeStyle::whereIn("id",$collections)->update([
               "status" => "0"
            ]);
            HomeStyle::where("id",$id)->update([
               "status" => "1"
            ]);
        }
        else if ($id == 4) {
             $collections = [1,2,3,5];
            HomeStyle::whereIn("id",$collections)->update([
               "status" => "0"
            ]);
            HomeStyle::where("id",$id)->update([
               "status" => "1"
            ]);
        }
        else if ($id == 5) {
           $collections = [1,2,3,4];
            HomeStyle::whereIn("id",$collections)->update([
               "status" => "0"
            ]);
            HomeStyle::where("id",$id)->update([
               "status" => "1"
            ]);
        }

        return redirect()->back()->withStatus("Home style Has been set");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeStyle  $homeStyle
     * @return \Illuminate\Http\Response
     */
    public function show(HomeStyle $homeStyle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeStyle  $homeStyle
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeStyle $homeStyle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeStyle  $homeStyle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeStyle $homeStyle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeStyle  $homeStyle
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeStyle $homeStyle)
    {
        //
    }
}
