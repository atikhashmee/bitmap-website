@extends('layouts.app')

@section('content')
  

    
                
                    
                           <div class="row">
                               <div class="col-md-3">
                                  @include('components.project.project-menu',[ 'p_id' => request()->route('project_id')])
                                   
                               </div>
                               <div class="col-md-9">
                                    <div class="card content-section">
                                        
                                        <div class="card-header  content-header" > 
                                            <h4>Create New Vendor Payment</h4>
                                          
                                        </div>
                                        <div class="card-body">
                                            @include('adminlte-templates::common.errors')
                                            {!! Form::open(['route' => ['vendorPayments.store',request()->route('project_id')]]) !!}
                  
                                          @include('components.project.vendor_payments.fields')
                  
                                      {!! Form::close() !!}
                                         </div>
                                         
                                    </div>
                               </div>
                           </div>
                    
              
@endsection
