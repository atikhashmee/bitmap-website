@extends('layouts.app')
  

    @section('styles')
         <style>
            .vendor-card-holder{
    background-image: linear-gradient(#242c34,#242d36);
  box-shadow:1px 1px 5px 0.5px rgba(0,0,0,0.5);
  color:#ffff;
}
.each-type{
  margin-bottom:5px;
  padding-right:2.5px;
  padding-left:2.5px;
}
.carset-close{
  top:0px;
  right:5px;
}
.carset-edit{
  top:0px;
  left:10px;
  
}
         </style>
    @endsection


@section('content')

             

              <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                           <div class="card-header" style=' position:relative; padding:10px;'>
                             <h4>Vendors</h4>
                           </div>
                           <div class="card-body">
                           <form action="" class="form d-flex">
          <div class="form-group flex-grow-1 mr-2">
            <input type="search" class="form-control" placeholder="search">
          </div>
          <div class="form-group mr-5">
            <button class="btn btn-primary">Search <i class='fa fa-search'></i></button>
          </div>
          <div class="form-group ml-auto">
            <a href="{!! route('vendorTypes.create') !!}" class="btn btn-primary">create</a>
          </div>
        </form>
                              @include('flash::message')
                             @include('vendor_types.table')
                           </div>
                           <div class="card-footer text-muted">
                           </div>
                         </div>
                    </div>
                 </div>
             </div>
    
@endsection

