@extends('layouts.app')

@section('styles')
    <style>
      

    .vendor-card-holder{
    background-image: linear-gradient(blue,blue);
  box-shadow:1px 1px 5px 0.5px rgba(0,0,0,0.5);
  color:#ffff;
}
.each-type{
  margin-bottom:5px;
  padding-right:2.5px;
  padding-left:2.5px;
}

.short-info{
   line-height:8px;
}

.carset-close{
  top:0px;
  right:5px;
}
.carset-edit{
  top:0px;
  left:10px;
  
}
.custom-card-header{
  padding:0px;
}
.downpart-over-image{
    position:absolute;
    bottom:0;
    width:100%;
    height:50%;
    background-color:rgba(0,0,0,0.5);
    padding-left:50px;
    padding-top:40px;
}
.downpart-over-image>h4{
    color:white;
    font-size:26px;
    text-transform:uppercase;
}
    </style>
@endsection

@section('content')

              <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                         <div class="card">

                           <div class="card-header custom-card-header position-relative">
                              <img src="//unsplash.it/1000/200" class="w-100"  alt="">
                              <div class="downpart-over-image">
                                     <h4> {{ $vendor_category }}    </h4>
                              </div>
                           
                             
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
            <a href="{!! route('vendors.create',request()->route('vendor_type_id')) !!}" class="btn btn-primary">create</a>
          </div>
        </form>
                              @include('flash::message')
                             @include('vendors.table')
                           </div>
                           <div class="card-footer text-muted">
                               
                           </div>
                         </div>
                    </div>
                 </div>
             </div>
    
@endsection

