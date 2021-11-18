<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view("components.website-control.testimonial.testimonial")->with("testimonial_lists",Testimonial::all());
   
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
            'client_name' => 'required',
            'comments_via' => 'required',
            'comments' => 'required'
        ]);

        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator)->withInput();
        }

        $c_image     = "";
        $c_signature = "";
        if ($request->hasFile('client_image')) {
            $c_image = $request->file('client_image')->store('testimonial','public');
        }

        if ($request->hasFile('signature')) {
            $c_signature = $request->file('signature')->store('testimonial','public');
        }

        Testimonial::create([
            'client_name'   => $request->input('client_name'),
            'client_image'  => $c_image,
            'client_comment'=> $request->input('comments'),
            'signature'     => $c_signature,
            'comment_via'   => $request->input( 'comments_via')
        ]);

        return redirect()->back()->withStatus("Data has been saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial,$id)
    {
        return  view("components.website-control.testimonial.testimonial-edit")
          ->with('testimonial_info', Testimonial::find($id));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Testimonial $testimonial,$id)
    {
        $c_image     = "";
        $c_signature = "";
        if ($r->hasFile('client_image')) {
            Storage::disk('public')->delete($r->input('dbclientimage'));
            $c_image = $r->file('client_image')->store('testimonial','public');
        }else {
            $c_image = $r->input('dbclientimage');
        }

        if ($r->hasFile('signature')) {
            Storage::disk('public')->delete($r->input( 'dbclientsignature'));
            $c_signature = $r->file('signature')->store('testimonial','public');
        } else {
            $c_signature = $r->input('dbclientsignature');
        }

        Testimonial::where("id",$id)->update([
            'client_name'   => $r->input('client_name'),
            'client_image'  => $c_image,
            'client_comment'=> $r->input('comments'),
            'signature'     => $c_signature,
            'comment_via'   => $r->input('comments_via')
        ]);

        return redirect()->back()->withStatus("Data has been Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial,$id)
    {
        $prot = Testimonial::find($id);
        if (file_exists(public_path()."/storage/".$prot->client_image)) {
            Storage::disk("public")->delete($prot->client_image);
        }
        if (file_exists(public_path()."/storage/".$prot->signature)) {
            Storage::disk("public")->delete($prot->signature);
        }
        $prot->delete();
        return redirect()->back()->withStatus("Data has been Deleted");
    }
}
