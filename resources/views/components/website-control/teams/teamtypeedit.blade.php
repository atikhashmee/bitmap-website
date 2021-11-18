@extends('layouts.admin')

@section('content')
<div class="row">
   <div class="col-md-6">
      <div class="card">
         <form class="card-body" action=" {{ url('Admin/Team/Category/update/'.$theitem->id) }}" method="post" >
         @csrf
            <div class="form-group">
               <label for="name"> Name <span class="required">*</span>
               </label>
               <input id="cat_name" class="form-control"  name="cat_name"  value="{{$theitem->category_title}}"  type="text" >
            </div>
            <div class="form-group">
               <label  for="textarea">Description 
               </label>
               <textarea id="description"  name="description" class="form-control">{{$theitem->description}} </textarea>
            </div>
            <div class="form-group">
               <button id="updatecate" name="updatecate" type="submit" class="btn btn-outline-success">Update <i class="fa fa-floppy-o"></i></button>
               <a href="{{ route('admin.Team.Category.catetype') }}" class="btn btn-outline-danger">Back <i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
            </div>
         </form>
      </div>
   </div>
</div>

@endsection