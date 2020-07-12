<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceItem as InvoItem;
use App\InvoiceHead;

class InvoiceItem extends Controller
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

    public function createNewItemHead( Request $r){
         $validated = $r->validate([
              'headname' => 'required'
         ]);

         InvoiceHead::create([
                'item_head_name' => $r->input('headname')
         ]);
        return redirect()->back()->withStatus("Item head has been created");
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
                'item_name' => 'required'
        ]);

        InvoItem::create([
            'Item_name' => $r->input('item_name'),
            'Item_unit' => $r->input('unit'),
            'Item_price' => $r->input('price')
        ]);
        return redirect()->back()->withStatus("Item has been created");
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
    public function edit($id)
    {
        return view( 'components.accessories.items-edit')
        ->with('editabledata',InvoItem::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        InvoItem::where('id',$id)->update([
            'Item_name' => $r->input('item_name'),
            'Item_unit' => $r->input('unit'),
            'Item_price' => $r->input('price')
        ]);
       
        return redirect()->route('InvoiceItems')->withStatus("Item has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pr = InvoiceHead::find($id);
        $pr->delete();
        return redirect()->back()->withStatus("Item has been Deleted");
    }
    public function delItems($id){
       $prot  =  InvoItem::find($id);
       $prot->delete();
     return redirect()->back()->withStatus("Item has been Deleted");
    }
}
