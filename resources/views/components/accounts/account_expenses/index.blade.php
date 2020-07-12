@extends('layouts.app')

@section('content')

             

              <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                           <div class="card-header" style=' position:relative; padding:10px;'>
                             <h4>Account Expenses</h4>
                             <a href="{!! route('accountExpenses.create') !!}" class='btn btn-primary float-right' style="position:absolute;top:10px;right:10px;"> Add new</a>
                           </div>
                           <div class="card-body">
                             
                              <form class="form d-flex" action="#" method="POST" >
                                    
                                      <div class="form-group">
                                        <label for="my-select">Project</label>
                                        <select id="my-select" class="form-control">
                                          <option>--Project--</option>
                                          <option>Text</option>
                                          <option>Text</option>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="my-select">Vendors</label>
                                        <select id="my-select" class="form-control">
                                          <option>--Vendors--</option>
                                          <option>Text</option>
                                          <option>Text</option>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="my-select">Team</label>
                                        <select id="my-select" class="form-control">
                                          <option>--Team--</option>
                                          <option>Text</option>
                                          <option>Text</option>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="my-select">Category</label>
                                        <select id="my-select" class="form-control">
                                          <option>--Category--</option>
                                          <option>Text</option>
                                          <option>Text</option>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="my-select">Show</label>
                                        <select id="my-select" class="form-control">
                                          <option>Active</option>
                                          <option>Confirm</option>
                                          <option>Unconfirm</option>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="date">Show</label>
                                        <input id="startdate" type="date" name="startdate" class="form-control" />
                                          
                                      </div>

                                      <div class="form-group">
                                        <label for="date">Show</label>
                                        <input id="enddate" type="date" name="enddate" class="form-control" />
                                      </div>

                                      <div class="form-group">
                                         <label for="date"></label>
                                          <button type="button" class="btn btn-primary">Filter</button>
                                      </div>


                              
                              </form>
                             
                          

                              @include('flash::message')
                             @include('components.accounts.account_expenses.table')
                           </div>
                           <div class="card-footer text-muted">    
        @include('adminlte-templates::common.paginate', ['records' => $accountExpenses])
                           </div>
                         </div>
                    </div>
                 </div>
             </div>
    
@endsection

