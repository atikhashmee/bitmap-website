@extends('layouts.app')

@section('content')

             


              <div class="row">
                 <div class="col-md-3">
                    @include('components.products.product_menu')
                     
                 </div>
                 <div class="col-md-9">
                      <div class="card content-section">
                          
                          <div class="card-header  content-header" > 
                              <h4>Product Categories</h4>
                            <a href="{!! route('productCategories.create') !!}" 
                            class='btn btn-warning float-right' 
                            style="position:absolute;top:10px;right:10px;"> Add new</a>
                          
                          </div>
                          <div class="card-body">
                              @include('flash::message')
                               @include('components.products.product_categories.table')
                           </div>
                           <div class="card-footer">
                               
                         

                           </div>
                      </div>
                 </div>
             </div>
    
@endsection

