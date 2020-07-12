@extends('layouts.app')

@section('content')
  

          {{--    <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                           <div class="card-header" style=' position:relative; padding:10px;'>
                            
                            
                           </div>
                           <div class="card-body">
                              @include('adminlte-templates::common.errors')
                          {!! Form::open(['route' => '.store']) !!}

                        @include('.fields')

                    {!! Form::close() !!}
                           </div>
                           <div class="card-footer text-muted">
                              
                           </div>
                         </div>
                    </div>
                 </div>
             </div> --}}


         
                
                    
                           <div class="row">
                               <div class="col-md-3">
                                  @include('components.project.project-menu',[ 'p_id' => request()->route('project_id')])
                                   
                               </div>
                               <div class="col-md-9">
                                    <div class="card content-section">
                                        
                                        <div class="card-header  content-header" > 
                                            <h4>Create New Project Expense</h4>
                                          
                                        </div>
                                        <div class="card-body">
                                            @include('adminlte-templates::common.errors')
                                            {!! Form::open(['route' => ['projectExpenses.store',request()->route('project_id')]]) !!}
                  
                                          @include('components.project.project_expenses.fields')
                  
                                      {!! Form::close() !!}
                                         </div>
                                         
                                    </div>
                               </div>
                           </div>
                      
              
@endsection
