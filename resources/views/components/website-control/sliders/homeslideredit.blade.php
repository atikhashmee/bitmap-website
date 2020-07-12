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
                     <form action=" {{ url("Admin/updateSlider/".$Sliderinfo->id) }}" class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                           <label for="example-text-input" class="col-form-label">Header Title</label>
                        <input class="form-control" type="text"  id="headertitle" name="headertitle" value="{{$Sliderinfo->slider_Title}}">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="example-url-input" class="col-form-label">URL</label>
                           <input class="form-control" type="text"  id="url" name="url" value="{{$Sliderinfo->project_url}}">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="example-date-input" class="col-form-label">Date</label>
                           <input class="form-control" type="date" value="2018-03-05" name="date" id="example-date-input" value="{{$Sliderinfo->project_date}}">
                        </div>
                      
                                   <div class="form-group col-md-6">
                                    <input type="file"  id="imgfile" name="imgfile" value="{{$Sliderinfo->image_link}}">
                                    <img class="img-thumbnail" src="{{ asset('storage/'.$Sliderinfo->image_link) }}" alt="" width="200" height="auto">
                                    </div>
                              
                        
                        
                        <div class="form-group col-md-6">
                           <label for="example-search-input" class="col-form-label">Description</label>
                           <textarea class="form-control"  id="description" name="description"> {{$Sliderinfo->slider_Description}} </textarea>
                        </div>
                        <div class="form-group col-md-6" >
                              <label for="example-search-input" class="col-form-label">Make this slider visible</label>
                                  
                                    <input type="radio" value="yes" name="visiblity" 
                                      @if ($Sliderinfo->visibilty == 'yes')
                                        checked
                                      @endif
                                        /> Yes
                                    <input type="radio" value="no" name="visiblity" 
                                    @if ($Sliderinfo->visibilty == 'no')
                                        checked
                                      @endif
                                    /> No
                           </div>
                        <div class="input-group-append">
                           <button class="btn btn-outline-primary btn-lg" type="submit" name="btnsave">Update <i class="fa fa-save"></i> </button>
                           <a class="btn btn-outline-primary btn-lg" href="{{ route('sliders') }}" name="btnsave">Back <i class="fa fa-arrow-left"></i> </a>
                        </div>
                     </form>
                 </div>
              </div>
      
      </div>
      
   </div>

@endsection