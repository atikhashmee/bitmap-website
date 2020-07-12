@extends('layouts.app')

@section('content')
  

        
             
                   <div class="row">
                       <div class="col-md-3">
                          @include('components.accounts.menu')
                       </div>
                       <div class="col-md-9">
                            <div class="card content-section">
                                
                                <div class="card-header  content-header" > 
                                  <h4>  Employee Loan</h4>
                                  
                                </div>
                                <div class="card-body">
                                    @include('components.accounts.employee_loans.show_fields')
                                    <a href="{!! route('employeeLoans.index') !!}" class="btn btn-default">Back</a>
                                 </div>
                                 
                            </div>
                       </div>
                   </div>
             
@endsection
