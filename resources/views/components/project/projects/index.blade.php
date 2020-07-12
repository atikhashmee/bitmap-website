@extends('layouts.app')

@section('styles')
    <style>
        .card-body{
          padding: .9rem;
         
      }
        .custom-card-body{
          border: 2px solid #000;
          border-bottom: none;
      }
      .card-footer{
          padding: 0px;
         
      }
        .card-header{
          background-color: #232b32;
          position:relative; 
          padding:16px;
        }
       
        .card-header>h4{
          color: #f9f9f9;
        }
        .btn-manageable-tagline{
          margin: 0px;
          width: 100%;
          height: 100%;
          background: #212529;
          color: #f8f9fe;
          border: 2px solid #000;
          border-radius: none;
      }
      .info-div>p{
          line-height: 10px;
      }
      .right-content-style>p{
          line-height: 10px;
      }
      
        
    </style>
@endsection
@section('content')

             

              <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                           <div class="card-header">
                             <h4>Projects</h4>
                             <a href="{!! route('projects.create') !!}" class='btn btn-warning  float-right' style="position:absolute;top:10px;right:10px;"> Create</a>
                           </div>
                           <div class="card-body">
                              @include('flash::message')
                             @include('components.project.projects.table')
                           </div>
                           <div class="card-footer text-muted">
                               
                       @include('adminlte-templates::common.paginate', ['records' => $projects])

                           </div>
                         </div>
                    </div>
                 </div>
             </div>
    
@endsection

