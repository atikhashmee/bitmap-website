<?php

namespace App\Http\Controllers;

use App\ProtfolioCategory;
use Illuminate\Http\Request;

class ProtfolioCategoryController extends Controller
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
            'cat_name' => 'required'
        ]);
        ProtfolioCategory::create([
            'category_name' => $r->input('cat_name'),
           'description'    => $r->input('description')
        ]);
        return redirect()->back()->withStatus("Category has been saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProtfolioCategory  $protfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProtfolioCategory $protfolioCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProtfolioCategory  $protfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProtfolioCategory $protfolioCategory,$id)
    {
        return view('components.website-control.protfolio.categoryedit')
        ->with("cateitem",ProtfolioCategory::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProtfolioCategory  $protfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, ProtfolioCategory $protfolioCategory,$id)
    {
        ProtfolioCategory::where("id",$id)->update([
            'category_name' => $r->input('cat_name'),
            'description'    => $r->input('description')
        ]);
        return redirect()->back()->withStatus("Category has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProtfolioCategory  $protfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProtfolioCategory $protfolioCategory,$id)
    {
        ProtfolioCategory::where("id",$id)->delete();
        return redirect()->back()->withStatus("Category has been Deleted");
    }
}
