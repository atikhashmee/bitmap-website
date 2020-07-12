@extends('layouts.app')
  @section('styles')
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" /> --}}

   <style>

       .show-employee{
             display : block;
       }
       .hide-employee{
            display:none;
       }
   </style>
  @endsection
@section('content')
  

                
                      
                           <div class="row">
                               <div class="col-md-3">
                                  @include('components.accounts.menu')
                               </div>
                               <div class="col-md-9">
                                    <div class="card content-section">
                                        
                                        <div class="card-header  content-header" > 
                                            <h4>Create New Expenditures</h4>
                                          
                                        </div>
                                        <div class="card-body">
                                            @include('adminlte-templates::common.errors')
                                            {!! Form::open(['route' => 'expenditures.store']) !!}
                                            @include('components.accounts.expenditures.fields')
                                            {!! Form::close() !!}
                                         </div>
                                         
                                    </div>
                               </div>
                           </div>
                          
              
              
@endsection

@section('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script> --}}
     <script>
         //alert("Hello world from expenditure");
        

        
         /*  $('#date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: false
            });  */

            document.getElementById('employeeis').addEventListener("change",function(event){
                   if(event.target.value === "employee")
                   {
                        var clname =    document.getElementById("employee_field").className;
                        var ccname =  clname.replace('hide-employee',"show-employee");
                        document.getElementById("employee_field").className = ccname;
                   }
                   else 
                   {
                        var clname =    document.getElementById("employee_field").className;
                        var ccname =  clname.replace('show-employee',"hide-employee");
                        document.getElementById("employee_field").className = ccname;
                   }
                  
            });
        
     </script>
@endsection


