@extends('layouts.app')

@section('content')


               
                     
                          <div class="row">
                              <div class="col-md-3">
                                 @include('components.accounts.menu')
                              </div>
                              <div class="col-md-9">
                                   <div class="card content-section">
                                       
                                       <div class="card-header  content-header" > 
                                          <h4>Update Treasures</h4>
                                         
                                       </div>
                                       <div class="card-body">
                                           @include('adminlte-templates::common.errors')
                                           {!! Form::model($treasures, ['route' => ['treasures.update', $treasures->id], 'method' => 'patch']) !!}
            
                                           @include('components.accounts.treasures.fields')
                   
                                      {!! Form::close() !!}
                                        </div>
                                        
                                   </div>
                              </div>
                          </div>
                     
@endsection