@extends('layouts.app')

@section('content')


<div class="container">
                 <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                           <div class="card-header" style=' position:relative; padding:10px;'>
                             <h4>Update Project</h4>
                            
                           </div>
                           <div class="card-body">
                              @include('adminlte-templates::common.errors')
                           {!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'patch']) !!}

                        @include('components.project.projects.fields')

                   {!! Form::close() !!}
                           </div>
                           <div class="card-footer text-muted">
                              
                           </div>
                         </div>
                    </div>
                 </div>
             </div>
@endsection