@extends('layouts.app')


    @section('styles')
    <style>
         .form-container{
            border: none;
            padding: 10px;
            display: none;
         }
         .card-header{
            padding: 10px !important;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
         }
         .card-body{
            display: none;
            padding: 0;
         }
         .show-tab{
            display: block;
         }
      </style>
        
    @endsection


   @section('content')
      <div class="row">
         <div class="col-md-3">
            @include('components.website-control.webcontrol-menu')
         </div>
         <div class="col-md-9">
            @include('components.website-control.webcontrol-header')
            <div class="card">
               <div class="card-header" onclick="toggleTabs(this)">
                  <div class="card-title">Background</div>
                  <ion-icon  class="toggle-icon" name="chevron-down-outline"></ion-icon>
                  {{-- <ion-icon name="chevron-up-outline"></ion-icon> --}}
               </div>
               <div class="card-body show-tab" style="padding: 10px !important">
                  <form action="{{url("Admin/SaveBgInfo")}}"  method="post"  enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Heading</label>
                        <input class="form-control" type="text"  id="headertitle" name="headertitle" value="{{$bg->service_headline}}">
                     </div>
                     <div class="form-group">
                        <label for="description">Descrioptn</label>
                        <textarea id="description" name="bgdescription" class="form-control" rows="3">{{$bg->service_description}}</textarea>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <input type="file" name="bgimgfile" id="bgimgfile">
                           </div>
                           <img src="{{ asset("storage/".$bg->service_bg_img) }}" class="img-thumbnail"  />
                        </div>
                     </div>
                     <div class="form-group">
                        <button class="btn btn-sm project-btn btn-primary" type="submit" name="btnupdate">Update</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="card mt-2">
               <div class="card-header" onclick="toggleTabs(this)">
                  <div class="card-title">What We Do</div>
                  <ion-icon  class="toggle-icon" name="chevron-down-outline"></ion-icon>
               </div>
               <div class="card-body">
                  <div class="form-container">
                     <form action="{{ url("Admin/SaveserviceInfo") }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label for="">Service Name</label>
                           <input type="text" class="form-control" name="servicetitle" id="servicetitle">
                        </div>
                        <div class="form-group">
                           <label for="">About Service</label>
                           <textarea name="about_project" id="about_project" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                           <label for="">Details Description</label>
                           <textarea class="form-control" id="pro_detail" name="pro_detail"></textarea>
                        </div>
                        <div class="form-group">
                           <label for="">Date</label>
                           <input type="date" class="form-control" name="date" id="date">
                        </div>
                        <div class="form-group">
                           <label for="">Price</label>
                           <input type="text" class="form-control" name="price" id="price">
                        </div>
                        <div class="row">
                           <div class="col-6">
                              <div class="form-group">
                                 <label for="">Service Cover Photo</label>
                                 <br>
                                 <small> (height X width = 80 X 80 PX, type png) </small>
                                 <input type="file" class="form-control" onchange="loadFile(event)" name="service_cover_photo" id="service_cover_photo">
                                 <div class="service-img-folder" style="margin-top:20px;">
                                    <img src="https://picsum.photos/g/500/300" id="output">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <button class="btn btn-sm project-btn btn-primary" name="saveservice"> Save</button>
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
                 <table class="table table-bordered">
                    <thead>
                       <tr>
                          <th>Service Name</th>
                          <th style="width: 46%">Description</th>
                          <th>Image</th>
                          <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($allservices as $service)
                           <tr>
                              <td>{{ $service->service_name }}</td>
                              <td>{{ $service->about_service }}</td>
                              <td>
                                 <img 
                                 src="{{ asset("storage/".$service->services_photo) }}"
                                 alt="" />
                              </td>
                              <td>
                                 <a class="btn btn-sm project-btn btn-primary" href="#">view</a>
                                 <a class="btn btn-sm project-btn btn-primary" href="{{ url("Admin/Service/".$service->id."/edit") }}">Edit</a>
                                 <a class="btn btn-sm project-btn btn-primary"  href="{{ url("Admin/delservice/".$service->id) }}"
                                    onclick="return confirm('Are you sure?')">Delete</a>
                              </td>
                           </tr>
                        @endforeach
                    </tbody>
                 </table>
               </div>
            </div>
            <div class="card mt-2">
               <div class="card-header" onclick="toggleTabs(this)">
                  <div class="card-title">Service Lists</div>
                  <ion-icon  class="toggle-icon" name="chevron-down-outline"></ion-icon>
               </div>
               <div class="card-body">
                  <div class="form-container">
                     <form method="post"  action="{{ url('Admin/SaveServiceList') }} " enctype="multipart/form-data">
                        @csrf   
                        <div class="form-group">
                           <label for="my-input">Title</label>
                           <input id="list_title"  name="list_title" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                           <div class="form-group">
                              <label for="my-input">Description <small> <b> (No More than 40 character) </b> </small> </label>
                              <textarea id="short_description"  name="short_description" class="form-control" rows="3"></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="my-input">Avatar</label>
                           <input id="list_avater" name="list_avater" class="form-control" type="file">
                           <small> <b> (size: 48X40 PX |  ** mandatory) </b> </small>
                        </div>
                        <button class="btn btn-primary btn-sm project-btn"> Save</button>
                     </form>
                  </div>
                  <div class="control-panel d-flex justify-content-between">
                     <div class="left-side">
                         <button class="btn btn-sm btn-primary project-btn" type="button" onclick="toggleForm()">Add new</button>
                     </div>
                     <div class="right-side d-flex">
                        
                     </div>
                  </div>

                 <table class="table table-bordered">
                    <thead>
                       <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($shortservicelists as $serviceitem)
                           <tr>
                              <td>{{ $serviceitem->list_title }}</td>
                              <td>{{ $serviceitem->short_description }}</td>
                              <td><img src="{{ asset("storage/".$serviceitem->img) }}" width="48" height="40" /></td>
                              <td><a class="btn btn-danger btn-sm project-btn" onclick="return confirm('Are you sure?')"
                                 href="{{  url("Admin/deletelists/".$serviceitem->id) }}">Delete</a></td>
                           </tr>
                        @endforeach
                    </tbody>
                 </table>
               </div>
            </div>
            <div class="card mt-2">
               <div class="card-header" onclick="toggleTabs(this)">
                  <div class="card-title">
                     Clients
                  </div>
                  <ion-icon  class="toggle-icon" name="chevron-down-outline"></ion-icon>
               </div>
               <div class="card-body">

                  <div class="form-container">
                     <form method="post"  action="{{ url('Admin/SaveClient') }} " enctype="multipart/form-data">
                        @csrf   
                        <div class="form-group">
                           <label for="my-input">Compnay Name</label>
                           <input id="compnay_name"  name="compnay_name" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                           <label for="my-input">Contact Number (Any numbers)</label>
                           <input id="phone_number"  name="phone_number" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                           <label for="my-input">E-mail</label>
                           <input id="email"  name="email" class="form-control" type="email">
                        </div>
                        <div class="form-group">
                           <div class="form-group">
                              <label for="my-input">Address</label>
                              <textarea id="address"  name="address" class="form-control" rows="3"></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="my-input">Avatar</label>
                           <input id="client_avater" name="client_avater" class="form-control" type="file">
                           <small> <b>( Logo size : 120X68 PX| **mandatory)</b> </small>
                        </div>
                        <button class="btn btn-sm project-btn btn-primary"> Save <i class="fa fa-floppy-o" aria-hidden="true"></i> </button>
                     </form>
                  </div>
                  <div class="control-panel d-flex justify-content-between">
                     <div class="left-side">
                         <button class="btn btn-sm btn-primary project-btn" type="button" onclick="toggleForm()">Add new</button>
                     </div>
                     <div class="right-side d-flex">
                        
                     </div>
                  </div>
                  <table class="table table-bordered table-striped table-light">
                     <thead>
                        <tr>
                           <th>#SL</th>
                           <th>Compnay Name</th>
                           <th>Description</th>
                           <th>Avater</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($client_lists as $client)
                        <tr>
                           <td> {{ $loop->iteration }} </td>
                           <td> {{ $client->Compnay_name }} 
                              <a href="{{ url("Admin/Client_edit/".$client->id) }}"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> 
                              <a href="{{ url("Admin/Client_delete/".$client->id) }}" onclick="return confirm('Are you sure?')"  > <i class="fa fa-times-circle" style="color:red" aria-hidden="true"></i> </a>
                           </td>
                           <td>
                              Phone_Number =  {{ $client->phone_number }} <br>
                              Email =  {{ $client->email }} <br>
                              Address =  {{ $client->address }} <br>
                           </td>
                           <td>
                              <img src="{{ asset("storage/".$client->avater) }}" width="80" height="60" class="rounded-circle" alt="Cinque Terre">
                           </td>
                           <td> 
                              @if ($client->status == 0)
                              <a onclick="return confirm('Are you sure?')" href="{{ url('Admin/ActionPublish/'.$client->id.'/1') }}" class="btn btn-danger" >unpublished</a>
                              @else
                              <a onclick="return confirm('Are you sure?')" href="{{ url('Admin/ActionPublish/'.$client->id.'/0') }}" class="btn btn-primary" >Published</a>
                              @endif    
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
               
         </div>
      </div>
   @endsection


@section('page_js')

<script>
   function toggleTabs(current) {
         let cb = document.querySelectorAll('.card-body');
         for (let index = 0; index < cb.length; index++) {
            let element = cb[index];
            element.classList.remove('show-tab');
         }
         let ch = document.querySelectorAll('.card-header');
         for (let index = 0; index < ch.length; index++) {
            let element = ch[index];
            let childs = element.children;
            Array.from(childs)
            .forEach(element => {
               if (element.classList.contains('toggle-icon'))
               {
                  element.setAttribute('name', 'chevron-down-outline');
               }
            });
         }
         current.nextElementSibling.classList.add('show-tab'); 
         let childs =current.children;
         Array.from(childs)
          .forEach(element => {
            if (element.classList.contains('toggle-icon'))
            {
               element.setAttribute('name', 'chevron-up-outline');
            }
         });
   }
</script>
    
@endsection