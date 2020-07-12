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
                              @include('components.accounts.menu',[ 'e_id' => request()->route('employee_id')])
                           </div>
                           <div class="col-md-8">
                                <div class="card content-section">
                                    
                                    <div class="card-header  content-header" > 
                                      <h4>Expense Type</h4>
                                      
                                    </div>
                                    <div class="card-body">
                                        <div id="printAre">
                                        @include('components.accounts.paysaleries.show_fields')
                                    </div>
                                        <a href="{!! route('paysaleries.index',request()->route('employee_id')) !!}" class="btn btn-default">Back</a>
                                        <a href="#" onclick="printDiv('printAre')" class="btn btn-default float-right">Print <i class="fa fa-print" aria-hidden="true"></i> </a>
                                     </div>
                                     
                                </div>
                           </div>
                       </div>
                  </div>  
@endsection


@section('scripts')
    <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
           
                document.body.innerHTML = printContents;
           
                window.print();
           
                document.body.innerHTML = originalContents;
           }
    </script>
@endsection
