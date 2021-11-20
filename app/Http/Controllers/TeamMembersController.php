<?php

namespace App\Http\Controllers;

use App\TeamMembers;
use App\TeamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Acme\Foo;
class TeamMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //dd(Foo::getTeamMemberByTypeId(4));
       return view("components.website-control.teams.teams.Teams")
       ->with("teamtypes",TeamType::all())
       ->with("teamsmembers",TeamMembers::all());
    }



    public function teamView(){
        return view('components.website-control.teams.teams.ourmembers')
        ->with("teamtypes",TeamType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //return $id;
        return view('components.website-control.teams.teams.createTeams')
        ->with("typeid",$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r,$teamtype)
    {
        $r->validate([
                "membername" => 'required'
        ]);
         
        if ($r->hasFile("personimage")) 
        {
                 $img =  $r->file("personimage")->store("TeamMembers","public");  
      
        }
        else 
        dd("file is not found");
     
        TeamMembers::create([
                "team_types_id" => $teamtype,
                "member_name"   => $r->input('membername'),
                "employee_status"   => $r->input('employee_status'),
                "visibility"   => $r->input('visibilty'),
                "designation" =>   $r->input('designation'),
                "description" =>   $r->input('description'),
                "email"       =>   $r->input('email'),
                "linkedin"    =>   $r->input('linedin'),
                "twitter"     =>   $r->input('twitterlink'),
                "instagram"   =>   $r->input('instalink'),
                "memberimage" =>    $img
        ]); 
      return redirect()->back()->withStatus("Data has been saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeamMembers  $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMembers $teamMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeamMembers  $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMembers $teamMembers,$id)
    {
        return view( "components.website-control.teams.teams.TeamsEdit")
             ->with("teamtypes",TeamType::all())
             ->with("member",TeamMembers::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamMembers  $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r,  $id)
    {
        $teamtype = "";
        $teamimage = "";

        if ($r->hasFile("personimage")) {
            Storage::disk("public")->delete($r->input("dbpersonimage"));
            $teamimage = $r->file("personimage")->store("TeamMembers","public"); 
        }else{
            $teamimage = $r->input("dbpersonimage");
        }

        if (!empty($r->input('membertype'))) {
            $teamtype = $r->input('membertype');
        }else  $teamtype = $r->input('dbmembertype');

        TeamMembers::where("id",$id)->update([
            "team_types_id" => $teamtype,
            "member_name" =>   $r->input('membername'),
            "designation" =>   $r->input('designation'),
            "employee_status" => $r->input('employee_status'),
            "description" =>   $r->input('description'),
            "email"       =>   $r->input('email'),
            "visibility"   =>  $r->input('visibilty'),
            "linkedin"    =>   $r->input('linedin'),
            "twitter"     =>   $r->input('twitterlink'),
            "instagram"   =>   $r->input('instalink'),
            "memberimage" =>   $teamimage
        ]);
        return redirect()->route('teams')->withStatus("Data has been Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamMembers  $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMembers $teamMembers,$id)
    {
        $prot = TeamMembers::find($id);
        if (file_exists(public_path()."/storage/".$prot->memberimage)) {
            Storage::disk("public")->delete($prot->memberimage);
        }
        $prot->delete();

        return redirect()->back()->withStatus("Data has been Deleted");
    }
}
