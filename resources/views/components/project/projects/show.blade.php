@extends('layouts.app')

 @section('styles')
    <style>
       .each-overview{
            padding:20px;
            text-align:center;
            line-height:12px;
            margin:10px;
       }
    
    </style>
     
 @endsection

@section('content')


      
           <div class="row">
               <div class="col-md-3">
                  @include('components.project.project-menu',[ 'p_id' => request()->route('project')])
                   
               </div>
               <div class="col-md-9">
                    <div class="card content-section">
                        <div class="card-header float-right content-header" > <a href="{!! route('projects.index') !!}" class="btn btn-danger">Back <i class="fa fa-align-left" aria-hidden="true"></i> </a> 
                           
                        </div>
                        <div class="card-body">
                              
                                 @include('components.project.projects.show_fields')
                        </div>
                    </div>
               </div>
           </div>
     
    
@endsection
