@extends('layouts.app')

@section('content')
    

   
        
              
                   <div class="row">
                       <div class="col-md-3">
                          @include('components.accounts.menu')
                       </div>
                       <div class="col-md-9">
                            <div class="card content-section">
                                
                                <div class="card-header  content-header" > 
                                  <h4>  Employee Loan</h4>
                                  
                                </div>
                                <div class="card-body">
                                        <div id="printAre">
                                    @include('components.accounts.expenditures.show_fields')
                                        </div>
                                    <a href="{!! route('expenditures.index') !!}" class="btn btn-default">Back</a>
                                    <a href="#" onclick="printDiv('printAre')" class="btn btn-default float-right">Print <i class="fa fa-print" aria-hidden="true"></i> </a>
                                    
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