@extends('layouts.app')

@section('styles')
<style>
  .card-body{
    padding: 10px 0px !important;
    }
    .card-header {
      background-color: #232b32;
      position:relative; 
      padding:16px;
    }
   
    .card-header>h4{
      color: #f9f9f9;
    }
  
</style>
@endsection
@section('content')
  

             <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                           <div class="card-header">
                             <h4>Create New Vendor</h4>
                            
                           </div>
                           <div class="card-body">
                              @include('adminlte-templates::common.errors')
                          {!! Form::open(['route' => ['vendors.store',request()->route('vendor_type_id')]]) !!}

                        @include('vendors.fields')

                    {!! Form::close() !!}
                           </div>
                           <div class="card-footer text-muted">
                              
                           </div>
                         </div>
                    </div>
                 </div>
             </div>
              
@endsection
