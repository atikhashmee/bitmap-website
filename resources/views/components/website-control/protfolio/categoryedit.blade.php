@extends('layouts.app')
@section('content')
<div class="row">
      <div class="col-md-3">
         @include('components.website-control.webcontrol-menu')
      </div>
      <div class="col-md-9">
            @include('components.website-control.webcontrol-header')
   <div class="row">
       
      
             <div class="col-md-12">
              <div class="card card-body">
                
               <form  action="{{url("Admin/Protfolio/Category/updateType/".$cateitem->id)}}" method="post" >
                @csrf
                  <div class="form-group col-md-6">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                     <input 
                     id="cat_name" 
                     class="form-control"  
                     name="cat_name"   
                     type="text"
                    value="{{ $cateitem->category_name }}"
                      />
                  </div>
                  <div class="form-group col-md-6">
                     <label  for="textarea">Description 
                     </label>
                     <textarea id="description"  name="description" class="form-control">
                        {{ $cateitem->description }}   
                    </textarea>
                  </div>
                  <div class="form-group col-md-6">
                     
                      <button id="updatecate" name="updatecate" type="submit" class="btn btn-outline-primary">Save <i class="fa fa-floppy-o"></i></button>
                      <button type="submit" class="btn btn-outline-danger">Cancel</button>
                     
                  </div>
               </form>
            </div>
         </div>
     
   </div>
</div> </div>
@endsection