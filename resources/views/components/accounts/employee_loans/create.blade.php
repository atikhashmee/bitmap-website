@extends('layouts.app')

@section('content')
  

  
       
             <div class="row">
                 <div class="col-md-3">
                    @include('components.accounts.menu')
                 </div>
                 <div class="col-md-9">
                      <div class="card content-section">
                          
                          <div class="card-header  content-header" > 
                            <h4>Add new Employee Loan</h4>
                            
                          </div>
                          <div class="card-body">
                              @include('adminlte-templates::common.errors')
                              {!! Form::open(['route' => 'employeeLoans.store']) !!}
                              @include('components.accounts.employee_loans.fields')
                              {!! Form::close() !!}
                           </div>
                           
                      </div>
                 </div>
             </div>
            

              
@endsection
