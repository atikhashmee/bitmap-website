@extends('layouts.app')

@section('content')


  
        
             <div class="row">
                 <div class="col-md-3">
                    @include('components.accounts.menu')
                     
                 </div>
                 <div class="col-md-9">
                      <div class="card content-section">
                          
                          <div class="card-header  content-header" > 
                              <h4>Project Expenses</h4>
                            <a href="{!! route('expenseTypes.create') !!}" 
                            class='btn btn-warning float-right' 
                            style="position:absolute;top:10px;right:10px;"> Add new</a>
                          
                          </div>
                          <div class="card-body">
                              @include('flash::message')
                              @include('components.accounts.expense_types.table')
                           </div>
                           <div class="card-footer">
                               
                         @include('adminlte-templates::common.paginate', ['records' => $expenseTypes])

                           </div>
                      </div>
                 </div>
             </div>
        


              
    
@endsection

