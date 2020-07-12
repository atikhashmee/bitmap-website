@extends('layouts.app')

@section('content')

  
       
             <div class="row">
                 <div class="col-md-3">
                    @include('components.project.project-menu',[ 'p_id' => request()->route('project_id')])
                     
                 </div>
                 <div class="col-md-9">
                      <div class="card content-section">
                          
                          <div class="card-header  content-header" > 
                              <h4>Add New Project goods</h4>
                            
                          </div>
                          <div class="card-body">
                              @include('adminlte-templates::common.errors')
                              {!! Form::open(['route' => ['projectGoods.store',request()->route('project_id')]]) !!}
    
                            @include('components.project.project_goods.fields')
    
                        {!! Form::close() !!}
                           </div>
                           
                      </div>
                 </div>
             </div>
                                                                                              


              
@endsection
