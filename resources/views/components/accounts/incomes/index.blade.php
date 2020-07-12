@extends('layouts.app')

@section('content')
             

    
               <div class="row">
                   <div class="col-md-3">
                      @include('components.accounts.menu')
                       
                   </div>
                   <div class="col-md-9">
                        <div class="card content-section">
                            
                            <div class="card-header  content-header" > 
                                <h4>Incomes</h4>
                              <a href="{!! route('incomes.create',request()->route('employee_id')) !!}" 
                              class='btn btn-warning float-right' 
                              style="position:absolute;top:10px;right:10px;"> Add new</a>
                            
                            </div>
                            <div class="card-body">
  
                                @include('flash::message')
                                <form >
                                    <div class="row">
                                        <div class="col">
                                             <div class="form-group">
                                               <label for="startdate">Start Date</label>
                                               <input id="startdate" class="form-control form-control-alternative" type="date">
                                             </div>
                                        </div>
                                        <div class="col">
                                             <div class="form-group">
                                               <label for="enddate">End Date</label>
                                               <input id="enddate" class="form-control form-control-alternative" type="date">
                                             </div>
                                        </div>
                                        <div class="col">
                                             <div class="form-group">
                                                 <button style="position:absolute; top:29px;" type="submit" class="btn btn-primary">Search</button>
                                             </div>
                                        </div>
                                    </div>
                                </form>
                                @include('components.accounts.incomes.table')
                             </div>
                             <div class="card-footer">
                                 
                           @include('adminlte-templates::common.paginate', ['records' => $incomes])
  
                             </div>
                        </div>
                   </div>
               </div>
         
  
    
@endsection

