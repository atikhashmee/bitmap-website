@extends('layouts.app')

@section('content')
    
     @section('styles')
         <style>
             
            .content-section{
                border: none;
            }
            .content-header{
                background-color: #3490dc;
                color: #fff;
            }
            .vendor-container{
                position: relative;
                border: 2px solid red;
                margin-top: 57px;
            }
          .vendor-section{
            position: absolute;
            width: 300px;
            height: auto;
            background: red;
            top: -64px;
            left: -2px;
            padding: 20px;
            border-radius: 0px 45px 0px 0px;
          }
            </style>
            
     @endsection
           
            
                  <div class="container">
                       <div class="row">
                           <div class="col-md-4">
                              @include('components.project.project-menu',[ 'p_id' => request()->route('project_id')])
                               
                           </div>
                           <div class="col-md-8">
                                <div class="card content-section">
                                    
                                    <div class="card-header  content-header" > 
                                        <h4> Vendors and team  </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="vendor-container">
                                            <div class="vendor-section">
                                              <h><b>Vendors</b></h>
                                            </div>
                                        <form action="" >
                                            <div class="row"  style="padding:20px;">
                                                <div class="col">
                                                        <div class="form-group">
                                                                <label for="">Vendor</label>
                                                                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                                                <small id="helpId" class="form-text text-muted">Help text</small>
                                                              </div>
                                                </div>
                                                <div class="col">
                                                        <div class="form-group">
                                                                <label for="">Budget</label>
                                                                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                                                <small id="helpId" class="form-text text-muted">Help text</small>
                                                            </div>
                                                </div>
                                                <div class="col">
                                                        <div class="form-group">
                                                                <label for="">Payment Type</label>
                                                                 <select name="" id="" class="form-control">
                                                                     <option value="">Chose an option</option>
                                                                     <option value="">Contractual</option>
                                                                     <option value="">Contractual with goods</option>
                                                                     <option value="">Daily Basis</option>
                                                                 </select>
                                                            </div>

                                                           
                                                </div>

                                            </div>  
                                            <div class="row" style="padding:20px;">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="">Specify any extra requirement</label>
                                                        <textarea class="form-control letterbox" name="requirements" id="requirements" rows="3"></textarea>
                                                      </div>
                                                 
                                                  
                                                  <div class="form-group">
                                                    <button class="btn btn-outline-primary"> Save change <i class="fa fa-floppy-o" aria-hidden="true"></i> </button>
                                                </div>
                                              </div>  
                                            </div>      
                                        </form>
                                    </div>

                                        <form action="">

                                            <div class="form-group">
                                              <label for="">Team Member</label>
                                              <input type="text"
                                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                              <small id="helpId" class="form-text text-muted">Help text</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="">Specify task</label>
                                              <input type="text"
                                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                              <small id="helpId" class="form-text text-muted">Help text</small>
                                            </div>
                                        </form>
                                           
                                            <a href="{!! route('projectTasks.index',request()->route('project_id')) !!}" class="btn btn-default">Back</a>
                                     </div>
                                </div>
                           </div>
                       </div>
                  </div>  
@endsection
