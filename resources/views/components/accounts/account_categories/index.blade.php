@extends('layouts.app')



@section('content')
   <style>
     .categoryName{
         font-family:"Times";
     }
   </style>
             

              <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                           <div class="card-header" style=' position:relative; padding:10px;'>
                             <h4>Account Categories</h4>
                             <a href="{!! route('accountCategories.create') !!}" class='btn btn-primary float-right' style="position:absolute;top:10px;right:10px;"> Add new</a>
                           </div>
                           <div class="card-body">
                              @include('flash::message')
                             @include('components.accounts.account_categories.table')
                           </div>
                           <div class="card-footer text-muted">
                               
              {{--   @include('adminlte-templates::common.paginate', ['records' => $accountCategories]) --}}

                           </div>
                         </div>
                    </div>
                 </div>
             </div>
    
@endsection

