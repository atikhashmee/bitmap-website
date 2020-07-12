<?php

namespace App\Http\Controllers\Accounts;

use App\Models\Accounts\SetupSelery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Acme\Foo;
class SalerysetUpController extends Controller
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
    public function store(Request $r,$employee_id)
    {
          
        //  dd($r->all());
       // dd(SetupSelery::count());
         
         if (SetupSelery::where('employee_id',$employee_id)->count() > 0) {
              
            SetupSelery::where('employee_id',$employee_id)->delete();
             
        for($i=0;$i<count($r->input('salery_keys')); $i++){
            SetupSelery::create(
                [
                 'employee_id' => $employee_id,
                 'salery_key_id' => $r->input('salery_keys')[$i],
                 'amount'        => $r->input('amounts')[$r->input('salery_keys')[$i]][0]
                ]
            );
        }
         }
         else {
              //  dd($request->all());
        for($i=0;$i<count($r->input('salery_keys')); $i++){
            SetupSelery::create(
                [
                 'employee_id' => $employee_id,
                 'salery_key_id' => $r->input('salery_keys')[$i],
                 'amount'        => $r->input('amounts')[$r->input('salery_keys')[$i]][0]
                ]
            );
        }
         }
       

        return redirect()->back()->withStatus('Data has been updated');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accounts\SetupSelery  $setupSelery
     * @return \Illuminate\Http\Response
     */
    public function show(SetupSelery $setupSelery)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accounts\SetupSelery  $setupSelery
     * @return \Illuminate\Http\Response
     */
    public function edit(SetupSelery $setupSelery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accounts\SetupSelery  $setupSelery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetupSelery $setupSelery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accounts\SetupSelery  $setupSelery
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetupSelery $setupSelery)
    {
        //
    }
}
