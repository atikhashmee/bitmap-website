@extends('layouts.app')

@section('content')
    

   
        
            
                   <div class="row">
                       <div class="col-md-3">
                          @include('components.accounts.menu')
                       </div>
                       <div class="col-md-9">
                            <div class="card content-section">
                                
                                <div class="card-header  content-header" > 
                                    <h1>
                                        Treasures
                                    </h1>
                                  
                                </div>
                                <div class="card-body">
                                    @include('components.accounts.treasures.show_fields')
                                    <a href="{!! route('treasures.index') !!}" class="btn btn-default">Back</a>
                                 </div>
                                 
                            </div>
                       </div>
                   </div>
               
@endsection
