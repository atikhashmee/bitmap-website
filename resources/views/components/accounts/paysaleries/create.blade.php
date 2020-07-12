@extends('layouts.app')

@section('scripts')
                <script type="text/javascript">
    function updatesum() 
    {
    var againsum = 0;
    var ddd = document.getElementsByClassName("chebocs");
    for (var j = 0; j < ddd.length; j++)
     {
        if (ddd[j].checked) 
        {
          againsum += parseInt(ddd[j].value);
          //alert(ddd[j].value);
        }
     }
    document.getElementById('saleryamount').value = againsum;

    }

      

     document.getElementById('salery_calculate').addEventListener('change',function(event){
              var idname      =    event.target;
              var salryamount =    document.getElementById('saleryamount').value;
              var payamount   =    document.getElementById('payamount');
              var grossamount =    document.getElementById('gross_amount');
              var loanamount  =    document.getElementById('loan').value;
              var taxamount   =    document.getElementById('tax').value;
              var sum = salryamount;
              if(idname.id == 'tax'){
                sum -= (parseInt(idname.value || 0 )/100)*salryamount;
                sum -= loanamount;
              }
              else if(idname.id == 'loan'){
                sum -= (parseInt(taxamount)/100)*salryamount;
                sum -= loanamount;
              }
              grossamount.value = sum;
              payamount.value = sum; 
     });

   


  


                   

                </script>
            @endsection

@section('content')

            
                
                     
                           <div class="row">
                               <div class="col-md-3">
                                  @include('components.accounts.menu',[ 'e_id' => request()->route('employee_id')])
                               </div>
                               <div class="col-md-9">
                                    <div class="card content-section">
                                        
                                        <div class="card-header  content-header" > 
                                            <h4>Create New Paysalery</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col">
                                                        @php
                                        $salery_sum =0;
                                    @endphp

                                     
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>keys</td>
                                                    <td>Amount</td>
                                                </tr>
                                                
                                            </thead>
                                            <tbody>

                                                @foreach ($users->salerykeys as $key)
                                                  @php
                                                       $salery_sum += intval($key->pivot->amount);
                                                  @endphp
                                                      <tr>
                                                          <td>
                                                              <input type="checkbox" checked class="chebocs" value="{{ $key->pivot->amount }}">
                                                          </td>
                                                          <td>
                                                              <p>
                                                                  {{ $key->key_name }}
                                                              </p>
                                                          </td>
                                                          <td>
                                                              <p>  {{ $key->pivot->amount }}  </p>
                                                          </td>
                                                      </tr>
                                                @endforeach
                                                   <tr>  
                                                       <td colspan="2"> <p style="text-align:right"> Total Amount </p> </td>
                                                       <td> {{ $salery_sum }} </td>
                                                   </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-warning" type="button" onclick="updatesum()"> update </button>
                                                </div>
                                                <div class="col">
                                                        @include('adminlte-templates::common.errors')

                                                                @if (count($users->salerykeys) == 0)
                                                                      <p> This employee has no salery key setup yet.  
                                                                       to be able to pay him set saleries <a href="{{ url('Admin/Accounts/employee_salery/'.request()->route('employee_id').'/set') }}"> click </a>
                                                                    </p>
                                                                @else
                                                                {!! Form::open(['route' => ['paysaleries.store',request()->route('employee_id')]]) !!}
                                                                @include('components.accounts.paysaleries.fields',['total_amount'=> $salery_sum ])
                                                                {!! Form::close() !!}
                                                                @endif

                                                        
                                                </div>
                                            </div>

                                           

                                            
                                         </div>
                                         
                                    </div>
                               </div>
                           </div>
                      
              
@endsection


