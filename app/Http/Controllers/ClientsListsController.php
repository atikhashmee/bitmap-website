<?php

namespace App\Http\Controllers;

use App\ClientsLists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientsListsController extends Controller
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
       
        $validated = $r->validate([
                 'compnay_name'  => 'required',
                 'client_avater' => 'required'
          ]);
            $client_avatar = "";
          if ($r->hasFile('client_avater')) {
            $client_avatar = $r->file("client_avater")->store("Clients","public");
          }
        ClientsLists::create([
            'Compnay_name'  =>  $r->input('compnay_name'),
            'phone _number' =>  $r->input('phone_number'),
            'email'         =>  $r->input( 'email'),
            'address'       =>  $r->input( 'address'),
            'avater'        =>  $client_avatar
        ]);
        return redirect()->back()->withStatus("Data has been Saved");
    }

    public function updateStatus($id,$status){
        ClientsLists::where('id',$id)->update([
            'status' => $status
        ]);
        return redirect()->back()->withStatus("Client Name has been published to the website");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientsLists  $clientsLists
     * @return \Illuminate\Http\Response
     */
    public function show(ClientsLists $clientsLists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientsLists  $clientsLists
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientsLists $clientsLists,$id)
    {
        return view("components.website-control.services.client_edit")->with("client_info", ClientsLists::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientsLists  $clientsLists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, ClientsLists $clientsLists,$id)
    {
        
        $client_avatar = "";

        if ($r->hasFile('client_avater')) {
            Storage::disk('public')->delete(trim($r->input("dbclientavater")));
            $client_avatar = $r->file("client_avater")->store("Clients","public") ;
        } else {
            $client_avatar = $r->input("dbclientavater");
        }
        ClientsLists::where("id",$id)->update([
            'Compnay_name'  =>  $r->input('compnay_name'),
            'phone_number' =>  $r->input('phone_number'),
            'email'         =>  $r->input('email'),
            'address'       =>  $r->input('address'),
            'avater'        =>  $client_avatar
        ]);
        return redirect()->back()->withStatus("Data has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientsLists  $clientsLists
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientsLists $clientsLists,$id)
    {
        $prot = ClientsLists::find($id);
        if (file_exists(public_path()."/storage/".$prot->avater)) {
            Storage::disk("public")->delete($prot->avater);
        }
        $prot->delete();
        return redirect()->back()->withStatus("Data has been Deleted");
    }
}
