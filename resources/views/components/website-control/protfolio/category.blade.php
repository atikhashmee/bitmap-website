@extends('layouts.admin')

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="control-panel d-flex justify-content-between">
         <div class="left-side">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#create_modal">Add new</button>
         </div>
         <div class="right-side d-flex"></div>
      </div>
      <table class="table table-striped table-condensed table-bordered">
         <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Description</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($cat_list as $item)
               <tr>
                  <td> {{$loop->iteration}} </td>
                  <td> {{ $item->category_name }} </td>
                  <td> {{ $item->description }} </td>
                  <td> 
                     <a href="{{ url("Admin/Protfolio/Category/editType/".$item->id) }}"  class="btn btn-primary" > Edit</a>  
                     <a onclick="return confirm('Are you sure?')" href="{{ url("Admin/Protfolio/Category/deleteType/".$item->id) }}" class="btn btn-primary"> Delete</a> 
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div> 
</div>


<div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Add new Category</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         @if (count($errors) > 0)
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
         @endif
         <form  action="{{url("Admin/Protfolio/Category/SavenewType")}}" method="post">
            @csrf
            <div class="form-group">
               <label for="name"> Name <span class="required">*</span></label>
               <input id="cat_name" class="form-control"  name="cat_name"   type="text" >
            </div>
            <div class="form-group">
               <label  for="textarea">Description</label>
               <textarea id="description"  name="description" class="form-control"> </textarea>
            </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
       </div>
     </div>
   </div>
 </div>
@endsection

@section('page_js')
  <script>
      @if (count($errors) > 0)
         $("#create_modal").modal('show')
      @endif
  </script>
@endsection