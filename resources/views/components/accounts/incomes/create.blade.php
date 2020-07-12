@extends('layouts.app')



@section('content')
  

          

             
                
                     
                           <div class="row">
                               <div class="col-md-3">
                                  @include('components.accounts.menu')
                               </div>
                               <div class="col-md-9">
                                    <div class="card content-section">
                                        
                                        <div class="card-header  content-header" > 
                                            <h4>Create New Income</h4>
                                          
                                        </div>
                                        <div class="card-body">
                                            @include('adminlte-templates::common.errors')
                                            {!! Form::open(['route' => 'incomes.store']) !!}
                                            @include('components.accounts.incomes.fields')
                                            {!! Form::close() !!}
                                         </div>
                                         
                                    </div>
                               </div>
                           </div>
                         
              
              
@endsection

@section('scripts')
<script>
       
      document.getElementById('moneysource').addEventListener("change",function(event){
           var res = event.target.value;
            if(res === "baccount") {
                 document.getElementById("bank_account").style.display="block";

                 document.getElementById("client_source").style.display="none";
                 document.getElementById("project_source").style.display="none";
            }
            else if(res === "client"){
                document.getElementById("client_source").style.display="block";

                document.getElementById("project_source").style.display="none";
                document.getElementById("bank_account").style.display="none";
            }
            else if(res === "project"){
                document.getElementById("project_source").style.display="block";

                document.getElementById("bank_account").style.display="none";
                document.getElementById("client_source").style.display="none";
            }
       });

</script>
    
@endsection
