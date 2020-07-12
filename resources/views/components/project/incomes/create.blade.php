@extends('layouts.app')

 @section('styles')
 <style>
            
        .source-type-style{
             margin-top: 1rem;
        }
      
        </style>
 @endsection

@section('content')
  

          

             
                
                    
                           <div class="row">
                               <div class="col-md-3">
                                    @include('components.project.project-menu',[ 'p_id' => request()->route('project_id')])
                               </div>
                               <div class="col-md-9">
                                    <div class="card content-section">
                                        
                                        <div class="card-header  content-header" > 
                                            <h4>Create New Income</h4>
                                          
                                        </div>
                                        <div class="card-body">
                                            @include('adminlte-templates::common.errors')
                                            {!! Form::open(['route' => ['projectIncomes.store',request()->route('project_id')]]) !!}
                                            @include('components.project.incomes.fields')
                                            {!! Form::close() !!}
                                         </div>
                                         
                                    </div>
                               </div>
                           </div>
                          
              
              
@endsection


