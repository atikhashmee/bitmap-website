@extends('layouts.app')

@section('content')
    

    <style>
             
            .content-section{
                border: none;
            }
            .content-header{
                background-color: #3490dc;
                color: #fff;
            }
          
            </style>
            
                  <div class="container">
                       <div class="row">
                           <div class="col-md-4">
                              @include('components.project.project-menu',[ 'p_id' => request()->route('project_id')])
                               
                           </div>
                           <div class="col-md-8">
                                <div class="card content-section">
                                    
                                    <div class="card-header  content-header" > 
                                        <h4>    Project Team</h4>
                                      
                                    </div>
                                    <div class="card-body">

                                        <h1> work summery </h1>
                                            @include('components.project.project_teams.show_fields')
                                            <a href="{!! route('projectTeams.index',[request()->route('project_id'),request()->route('task_id')]) !!}" class="btn btn-default">Back</a>
                                     </div>
                                     
                                </div>
                           </div>
                       </div>
                  </div> 
@endsection
