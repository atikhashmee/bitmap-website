@extends('layouts.app')

@section('content')




                  
                        
                             <div class="row">
                                 <div class="col-md-3">
                                    @include('components.project.project-menu',[ 'p_id' => request()->route('project_id')])
                                     
                                 </div>
                                 <div class="col-md-9">
                                      <div class="card content-section">
                                          
                                          <div class="card-header  content-header" > 
                                                <h4>Update Project Loan Payment</h4>
                                          </div>
                                          <div class="card-body">
                                                @include('adminlte-templates::common.errors')
                                                {!! Form::model($projectLoanPayment, ['route' => ['projectLoanPayments.update', $projectLoanPayment->id,request()->route('project_id'),request()->route('loan_id')], 'method' => 'patch']) !!}
                     
                                             @include('components.project.project_loan_payments.fields')
                                        {!! Form::close() !!}
                                           </div>
                                           
                                      </div>
                                 </div>
                             </div>
                        
@endsection