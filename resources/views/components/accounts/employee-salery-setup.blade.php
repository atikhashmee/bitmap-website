@extends('layouts.app')

@section('content')


           <div class="row">
               <div class="col-md-3">
                  @include('components.accounts.menu')
                   
               </div>
               <div class="col-md-9">
                    <div class="card content-section">
                        <div class="card-header  content-header" > 
                            <h4>Employee Salery update</h4>

                        </div>
                        <div class="card-body">
                        <form action="{{ url('Admin/Accounts/employee_salery/'.request()->route('employee_id').'/save') }}" method="POST">
                                    @csrf
                                     <div class="form-group">
                                         <label for="my-input">Employee Name</label>
                                         <input type="hidden" id="employee_id" name="employee_id" value="{{ $user->id }}" />
                                     <input id="my-input" class="form-control" value="{{ $user->member_name }}" type="text" readonly >
                                     </div>

                                     <h4>Salery keys</h4>
                                     <hr>
                                     
                                     <table class="table table-bordered">
                                         
                                          @foreach ($keys as $key)
                                                 
                                              <tr>
                                               
                                                  <td> <input type="checkbox"
                                                    value="{{ $key->id }}"  
                                                    name="salery_keys[]" 
                                                   
                                                     @if (App\Acme\Foo::isSaleryKeySetup($user->id,$key->id)['token'] == 'true')
                                                       checked
                                                     @endif
                                                    
                                                    /> </td>
                                                   <td> {{ $key->key_name }} </td>
                                                  <td> 
                                                        @if (App\Acme\Foo::isSaleryKeySetup($user->id,$key->id)['token'] == 'true')
                                                        <input type="text" class="form-control" name="amounts[{{ $key->id }}][]" value="{{App\Acme\Foo::isSaleryKeySetup($user->id,$key->id)['item_amount']}}"> 
                                                      @else
                                                      <input type="text" class="form-control" name="amounts[{{ $key->id }}][]" > 
                                                      @endif
                                                    </td>
                                           </tr>
                                          
                                          @endforeach
                                         
                                         
                                     </table>
                                     <a href="{{ url('Admin/Accounts/saleryKeys') }}">Add more salery fields</a>

                                     <div class="form-group mt-2">
                                         <button type="submit" class="btn btn-warning">Update</button>
                                           @if (App\Acme\Foo::isSaleryKeySetup($user->id)['total_number'] > 0 )

                                           <a href="{{  url('Admin/Accounts/employee_salery/'.$user->id.'/paysaleries')  }}" class="btn btn-primary "> go to pay <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                                           @endif
                                       
                                     </div>
                                </form>
                         </div>
                         <div class="card-footer"></div>
                    </div>
               </div>
           </div>
      
    
@endsection