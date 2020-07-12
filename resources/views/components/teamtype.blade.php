@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-4">
             
              <div class="card">
                  
               <form  class="card-body" action="{{url('Admin/Team/Category/newType')}}" method="post" >
                @csrf
                   <h3> Add Member Type <i class="fa fa-plus" aria-hidden="true"></i> </h3>
                  <div class="form-group">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                     <input id="cat_name" class="form-control"  name="cat_name"   type="text" >
                  </div>
                  <div class="form-group">
                     <label  for="textarea">Description 
                     </label>
                     <textarea id="description"  name="description" class="form-control"> </textarea>
                  </div>
                  <div class="form-group">
                     
                      <button id="updatecate" name="updatecate" type="submit" class="btn btn-outline-primary">Save <i class="fa fa-floppy-o"></i></button>
                      <button type="submit" class="btn btn-outline-danger">Cancel</button>
                     
                  </div>
               </form>
            </div>
      </div>
      <div class="col-md-8">
                <div class="card">
                   <div class="card-body">
                     <h3> Type Lists <i class="fa fa-list-alt" aria-hidden="true"></i> </h3>
         <table class="table table-striped table-condensed table-bordered">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody id="sortableblock">
               @foreach ($lists as $item)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                   <td>{{$item->category_title}}</td>
                   <td>{{$item->description}}</td>
                   <td> <a href=" {{ url('Admin/Team/Category/edit/'.$item->id) }}"> <i class="fa fa-pencil" aria-hidden="true"></i></a>  || <a href=" {{ url('Admin/Team/Category/delete/'.$item->id) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                   </tr>
               @endforeach
            </tbody>
         </table>
         </div>
         </div>
      </div>
   </div>
</div>
@endsection