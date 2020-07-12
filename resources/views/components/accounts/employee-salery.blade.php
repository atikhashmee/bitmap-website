@extends('layouts.app')

@section('content')


    
           <div class="row">
               <div class="col-md-3">
                  @include('components.accounts.menu')
                   
               </div>
               <div class="col-md-9">
                    <div class="card content-section">
                        <div class="card-header  content-header" > 
                            <h4>Employee Salery</h4>  </div>
                        <div class="card-body">
                            @php
                                $totalsalery = 0;
                            @endphp
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Designation</th>
                                        <th>Salery Amount</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $team)
                                    @php
                                    $totalsalery +=   (double) $team->salerykeys->sum('pivot.amount');
                                    @endphp
                                        <tr>
                                            <td> {{ $team->member_name }}</td>
                                            <td> {{ $team->designation }} </td>
                                            <td> {{ $team->salerykeys->sum('pivot.amount') }} </td>
                                          
                                            
                                            <td> <a href="{{ url('Admin/Accounts/employee_salery/'.$team->id.'/set') }}" ><i class="fa fa-edit"></i> </a>   
                                                <a href="{{ url('Admin/Accounts/employee_salery/'.$team->id.'/paysaleries') }}" >
                                                    
                                                
                                                     <i class="fa fa-paypal "></i>
                                                    
                                                </a> </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" style="text-align:right">Total</td>
                                        <td >{{  number_format($totalsalery) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                         <div class="card-footer">
                             
                       

                         </div>
                    </div>
               </div>
           </div>
      
    
@endsection