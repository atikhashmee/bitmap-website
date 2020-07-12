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
                              @include('components.accounts.menu')
                           </div>
                           <div class="col-md-8">
                                <div class="card content-section">
                                    
                                    <div class="card-header  content-header" > 
                                      <h4>  Income</h4>
                                      
                                    </div>
                                    <div class="card-body">
                                        @include('components.accounts.incomes.show_fields')
                                        <a href="{!! route('incomes.index') !!}" class="btn btn-default">Back</a>
                                     </div>
                                     
                                </div>
                           </div>
                       </div>
                  </div>  
@endsection
