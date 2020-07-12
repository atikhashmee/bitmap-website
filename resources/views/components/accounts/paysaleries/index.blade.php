@extends('layouts.app')

@section('content')


  
             <div class="row">
                 <div class="col-md-3">
                    @include('components.accounts.menu',[ 'e_id' => request()->route('employee_id')])
                     
                 </div>
                 <div class="col-md-9">
                      <div class="card content-section">
                          
                          <div class="card-header  content-header" > 
                              <h4>Paysaleries</h4>
                            <a href="{!! route('paysaleries.create',request()->route('employee_id')) !!}" 
                            class='btn btn-warning float-right' 
                            style="position:absolute;top:10px;right:10px;"> Add new</a>
                          
                          </div>
                          <div class="card-body">


                              @include('flash::message')

                              <table class="table table-bordered">
                                  
                                  <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <td>{{ $employee->member_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td>{{ $employee->designation }}</td>
                                    </tr>
                                  </thead>

                              </table>
                              <form >
                                  <div class="row">
                                      <div class="col">
                                           <div class="form-group">
                                             <label for="startdate">Start Date</label>
                                             <input id="startdate" class="form-control" type="date">
                                           </div>
                                      </div>
                                      <div class="col">
                                           <div class="form-group">
                                             <label for="enddate">End Date</label>
                                             <input id="enddate" class="form-control" type="date">
                                           </div>
                                      </div>
                                      <div class="col">
                                           <div class="form-group">
                                               <button style="position:absolute; top:29px;" type="submit" class="btn btn-primary">Search</button>
                                           </div>
                                      </div>
                                  </div>
                              </form>
                              @include('components.accounts.paysaleries.table')
                           </div>
                           <div class="card-footer">
                               
                         @include('adminlte-templates::common.paginate', ['records' => $paysaleries])

                           </div>
                      </div>
                 </div>
             </div>
       


              

    
@endsection

