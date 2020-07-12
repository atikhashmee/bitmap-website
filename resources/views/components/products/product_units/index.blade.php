@extends('layouts.app')

@section('content')

             

              {{-- <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                           <div class="card-header" style=' position:relative; padding:10px;'>
                          
                             <a href="" class='btn btn-primary float-right' style="position:absolute;top:10px;right:10px;"> Add new</a>
                           </div>
                           <div class="card-body">
                              @include('flash::message')
                           
                           </div>
                           <div class="card-footer text-muted">
                               
                           </div>
                         </div>
                    </div>
                 </div>
             </div> --}}

             
             <div class="row">
                 <div class="col-md-3">
                    @include('components.products.product_menu')
                     
                 </div>
                 <div class="col-md-9">
                      <div class="card content-section">
                          
                          <div class="card-header  content-header" > 
                              <h4>Product Units</h4>
                            <a href="{!! route('productUnits.create') !!}" 
                            class='btn btn-warning float-right' 
                            style="position:absolute;top:10px;right:10px;"> Add new</a>
                          
                          </div>
                          <div class="card-body">
                              @include('flash::message')
                               @include('components.products.product_units.table')
                           </div>
                           <div class="card-footer">
                               
                         

                           </div>
                      </div>
                 </div>
             </div>
    
@endsection

