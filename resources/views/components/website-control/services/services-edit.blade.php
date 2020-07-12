@extends('layouts.app')
@section('content')

  
  
  
   
         <div class="row">
             <div class="col-md-3">
                  @include('components.website-control.webcontrol-menu')
             </div>
            <div class="col-md-9">
                  @include('components.website-control.webcontrol-header')
                  <div class="card">
                     <div class="card-body">
                           <form action="{{ url("Admin/Serviceupdate/".$editinfo->id) }}"  method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group col-md-6">
                                 <label for="">Service Name</label>
                                 <input type="text" 
                                 class="form-control" 
                                 name="servicetitle" 
                                 id="servicetitle"
                              value="{{$editinfo->service_name}}"
                                 />
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="">About Service</label>
                                 <textarea 
                                 name="about_project" 
                                 id="about_project" 
                                 class="form-control">
                              {{$editinfo->about_service}}
                               </textarea>
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="">Details Description</label>
                                 <textarea class="form-control" id="pro_detail" name="pro_detail">
                                     {{$editinfo->long_about_sevice}}
                                 </textarea>
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="">Date</label>
                                 <input type="date" class="form-control" 
                                 name="date" 
                                 id="date"
                                 value="{{$editinfo->date_time}}"
                                 />
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="">Price</label>
                                 <input type="text" class="form-control" name="price" id="price"
                                 value="{{$editinfo->price}}"
                                 />
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="">Service Cover Photo</label>
                                 <br>
                                  <small> (height X width = 80 X 80, type png) </small>
                              <input id="bgseimage" name="bgseimage" class="form-control" type="hidden" value="{{$editinfo->services_photo}}">
                                 <input type="file" class="form-control" onchange="loadFile(event)" 
                                 name="service_cover_photo" id="service_cover_photo" />
                                
                                  <div class="service-img-folder">
                                   <img src="{{ asset("storage/".$editinfo->services_photo) }}" class='img-thumbnail' id="output">
                                  </div>
                              </div>
                              <div class="form-group">
                                 <button class="btn btn-outline-primary" name="saveservice"> Update <i class="fa fa-floppy-o"></i></button>
                              <a class="btn btn-outline-primary" href="#" name="saveservice"> Back <i class="fa fa-arrow-left"></i></a>
                              </div>
                              </form>
                     </div>
                  </div>
               
            </div>
            
         </div>
      
  

@endsection