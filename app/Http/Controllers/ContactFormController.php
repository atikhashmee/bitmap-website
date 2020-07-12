<?php

namespace App\Http\Controllers;

use App\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactFormController extends Controller
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
           
            $contactimg ="";
             if ($r->hasFile("imgfile")) {
                     Storage::disk('public')->delete($r->input('dbimagefile'));
                    $contactimg = $r->file('imgfile')->store('Contact_form','public');
             }else{
            $contactimg = $r->input('dbimagefile');
             }
           ContactForm::where("id",1)->update([
               'contact_heading' => $r->input('headertitle'),
                'little_description' => $r->input('description'),
                'email' => $r->input('email'),
                'cell' => $r->input('cell'),
                'website' => $r->input('website'),
                'address' => $r->input('address'),
                'go_location' => $r->input('mapadrs'),
                'note_on_go_location' => $r->input('mapnote'),
                'contact_image' => $contactimg
           ]);
           return redirect()->back()->withStatus("Data has been updated");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function show(ContactForm $contactForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactForm $contactForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactForm $contactForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactForm $contactForm)
    {
        //
    }
}
