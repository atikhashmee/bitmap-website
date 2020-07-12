@extends('layouts.app')

@section('content')


                  
                        
                             <div class="row">
                                 <div class="col-md-3">
                                    @include('components.accounts.menu',[ 'e_id' => request()->route('employee_id')])
                                 </div>
                                 <div class="col-md-9">
                                      <div class="card content-section">
                                          
                                          <div class="card-header  content-header" > 
                                                <h4>Update Paysalery</h4>
                                             </div>
                                          <div class="card-body">
                                              @include('adminlte-templates::common.errors')
                                              {!! Form::model($paysalery, ['route' => ['paysaleries.update', $paysalery->id,request()->route('employee_id')], 'method' => 'patch']) !!}
               
                                              @include('components.accounts.paysaleries.fields',['total_amount' => $paysalery->payamount  ])
                      
                                         {!! Form::close() !!}
                                           </div>
                                           
                                      </div>
                                 </div>
                             </div>
                        
@endsection