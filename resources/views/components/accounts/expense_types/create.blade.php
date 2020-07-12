@extends('layouts.app')

@section('content')
  

  
        
             <div class="row">
                 <div class="col-md-3">
                    @include('components.accounts.menu')
                 </div>
                 <div class="col-md-9">
                      <div class="card content-section">
                          
                          <div class="card-header  content-header" > 
                            <h4>Create New Expense Type</h4>
                            
                          </div>
                          <div class="card-body">
                              @include('adminlte-templates::common.errors')
                              {!! Form::open(['route' => 'expenseTypes.store']) !!}
                              @include('components.accounts.expense_types.fields')
                              {!! Form::close() !!}
                           </div>
                           
                      </div>
                 </div>
             </div>
            

  
    



          
              
@endsection
