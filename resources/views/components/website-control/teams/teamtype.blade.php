@extends('layouts.admin')

@section('content')
   <div class="row">
      <div class="col-md-6">
         <div class="card card-body">
            <button class="btn btn-primary float-right" data-target="#teamtype_modal" data-toggle="modal">Add new</button>
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
                        <td> 
                           <a href=" {{ url('Admin/Team/Category/edit/'.$item->id) }}" class="btn btn-sm btn-primary project-btn"> Edit </a>  
                           <a href=" {{ url('Admin/Team/Category/delete/'.$item->id) }}" class="btn btn-sm btn-primary project-btn" onclick="return confirm('Are you sure?')"> Delete </a>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>

    {{-- client modal section --}}
 <div class="modal fade" id="teamtype_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Add new Client</h5>
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
         <form  action="{{url('Admin/Team/Category/newType')}}" method="post" >
            @csrf
            <div class="form-group">
               <label for="name"> Name <span class="required">*</span>
               </label>
               <input id="cat_name" class="form-control form-control-alternative"  name="cat_name"   type="text" >
            </div>
            <div class="form-group">
               <label  for="textarea">Description 
               </label>
               <textarea id="description"  name="description" class="form-control form-control-alternative"> </textarea>
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
            $("#teamtype_modal").modal('show')
      @endif

   </script>
@endsection