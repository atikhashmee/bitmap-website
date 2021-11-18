@extends('layouts.admin')

@section('content')
   <div class="row">
      <div class="col-md-9">
         <div class="card card-body">
            <form  action="{{url("Admin/Protfolio/Category/updateType/".$cateitem->id)}}" method="post" >
               @csrf
               <div class="form-group col-md-6">
                  <label for="name"> Name <span class="required">*</span></label>
                  <input id="cat_name" class="form-control"  name="cat_name" type="text" value="{{ $cateitem->category_name }}"/>
               </div>
               <div class="form-group col-md-6">
                  <label  for="textarea">Description</label>
                  <textarea id="description"  name="description" class="form-control">{{ $cateitem->description }}</textarea>
               </div>
               <div class="form-group col-md-6">
                     <button id="updatecate" name="updatecate" type="submit" class="btn btn-outline-primary">Update <i class="fa fa-floppy-o"></i></button>
                     <a href="{{url("Admin/Protfolio/Category")}}" class="btn btn-outline-danger">Back</a>
               </div>
            </form>
         </div>
      </div> 
   </div>
@endsection