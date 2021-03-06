@extends('layouts.app')

@section('content')

     
                
                     
                           <div class="row">
                               <div class="col-md-3">
                                  @include('components.project.project-menu',[ 'p_id' => request()->route('project_id')])
                                   
                               </div>
                               <div class="col-md-9">
                                    <div class="card content-section">
                                        
                                        <div class="card-header  content-header" > 
                                            <h4>Project Loan Payments</h4>
                                          <a href="{!! route('projectLoanPayments.create',[request()->route('project_id'),request()->route('loan_id') ]) !!}" 
                                            class='btn btn-warning float-right' style="position:absolute;top:10px;right:10px;"> create new</a>
                                        </div>
                                        <div class="card-body">
                                            @include('flash::message')
                                           @include('components.project.project_loan_payments.table')
                                         </div>
                                         <div class="card-footer text-muted">
                                            @include('adminlte-templates::common.paginate', ['records' => $projectLoanPayments])
                                         </div>
                                    </div>
                               </div>
                           </div>
                     
    
@endsection

