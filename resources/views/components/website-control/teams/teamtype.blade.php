@extends('layouts.app')
@section('content')
   <div class="row">
      <div class="col-md-3">
         <div class="left-sidebar-website">
           @include('components.website-control.webcontrol-menu')
         </div>
       </div>
      <div class="col-md-9">
            @include('components.website-control.webcontrol-header')
            <div class="form-container" style="display: none">
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
                  <div class="form-group">
                        <button class="btn btn-sm project-btn btn-primary" type="submit">
                           <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                           <span class="btn-inner--text">Save Changes</span>
                        </button>
                        <button type="submit" class="btn btn-danger project-btn">Cancel</button>
                  </div>
              </form>
            </div>
            <div class="control-panel d-flex justify-content-between">
               <div class="left-side">
                   <button class="btn btn-sm btn-primary project-btn" type="button" onclick="toggleForm()">Add new</button>
               </div>
               <div class="right-side d-flex">
               </div>
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
            <tbody id="sortableblock">
               @foreach ($lists as $item)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                   <td>{{$item->category_title}}</td>
                   <td>{{$item->description}}</td>
                   <td> <a href=" {{ url('Admin/Team/Category/edit/'.$item->id) }}" class="btn btn-sm btn-primary project-btn"> Edit </a>  
                      <a href=" {{ url('Admin/Team/Category/delete/'.$item->id) }}" class="btn btn-sm btn-primary project-btn" onclick="return confirm('Are you sure?')"> Delete </a>
                     </td>
                   </tr>
               @endforeach
            </tbody>
         </table>
            
      </div>
   </div>
   

@endsection