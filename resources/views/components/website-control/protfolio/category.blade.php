@extends('layouts.app')
@section('content')
<div class="row">
      <div class="col-md-3">
         @include('components.website-control.webcontrol-menu')
      </div>
      <div class="col-md-9">
            @include('components.website-control.webcontrol-header')

            <div class="form-container" style="display: none">
               <form  action="{{url("Admin/Protfolio/Category/SavenewType")}}" method="post">
                  @csrf
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
                       
                        <button id="updatecate" name="updatecate" type="submit" class="btn btn-sm btn-primary project-btn">Save </button>
                        <button type="submit" class="btn  btn-sm btn-danger project-btn">Cancel</button>
                       
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
            <tbody>
                @foreach ($cat_list as $item)
                     <tr>
                         <td> {{$loop->iteration}} </td>
                         <td> {{ $item->category_name }} </td>
                         <td> {{ $item->description }} </td>
                     <td> <a href="{{ url("Admin/Protfolio/Category/editType/".$item->id) }}"  class="btn btn-sm btn-primary project-btn" > Edit</a>  
                        <a  onclick="return confirm('Are you sure?')"
                        href="{{ url("Admin/Protfolio/Category/deleteType/".$item->id) }}" class="btn btn-sm btn-primary project-btn"> Delete</a> </td>
                     </tr>
                @endforeach
            </tbody>
         </table>
</div> </div>
@endsection