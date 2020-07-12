@extends('layouts.app')

@section('content')

             
                
                     
                           <div class="row">
                               <div class="col-md-3">
                                  @include('components.project.project-menu',[ 'p_id' => request()->route('project_id')])
                                   
                               </div>
                               <div class="col-md-9">
                                    <div class="card content-section">
                                        
                                        <div class="card-header  content-header" > 
                                            <h4>Project Loans</h4>
                                          <a href="{!! route('projectLoands.create',request()->route('project_id')) !!}" 
                                            class='btn btn-warning float-right' 
                                            style="position:absolute;top:10px;right:10px;"> Create New</a>
                                        
                                        </div>
                                        <div class="card-body">
                                            @include('flash::message')
                                           @include('components.project.project_loands.table')
                                         </div>
                                         <div class="card-footer">
                                             
                                       @include('adminlte-templates::common.paginate', ['records' => $projectLoands])
              
                                         </div>
                                    </div>
                               </div>
                           </div>
                     
    
@endsection

