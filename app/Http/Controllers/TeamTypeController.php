<?php

namespace App\Http\Controllers;

use App\TeamType;
use Illuminate\Http\Request;
use App\Http\Requests\TeamTypeValidation;
use App\Repository\eloquent\TeamTypeEloquent;

class TeamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("components.website-control.teams.teamtype")->with("lists",TeamType::all());
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
    public function store(TeamTypeValidation $r, TeamTypeEloquent $tt)
    {
            $validation =   $r->validated();
            $tt->saveData($r->all());
          return redirect('Admin/Team/Category')->withStatus("Data Has been saved"); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeamType  $teamType
     * @return \Illuminate\Http\Response
     */
    public function show(TeamType $teamType,$id)
    {
         
          return view("components.website-control.teams.teamtypeedit")
          ->with("theitem",TeamType::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeamType  $teamType
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamType $teamType)
    {
        echo "you have reached here";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamType  $teamType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r,$id)
    {
        TeamType::where('id',$id)->update([
                 "category_title" =>  $r->input('cat_name'),
                 "description"    =>  $r->input("description")
        ]);
        return redirect('Admin/Team/Category/')->withStatus("Data Has been  Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamType  $teamType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedrow =  TeamType::where('id',$id)->delete();
       return redirect('Admin/Team/Category')->withStatus("Data Has been deleted");

    }
}
