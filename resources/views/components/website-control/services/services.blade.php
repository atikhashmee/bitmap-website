@extends('layouts.admin')
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
      <div class="col-md-12">
         <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     Background
                  </button>
                </h5>
              </div>
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
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
                              <label for="">Background Image</label>
                              <input type="file" name="bgimgfile" class="form-control-file" id="bgimgfile">
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
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    What we do
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <div class="control-panel d-flex justify-content-between">
                     <div class="left-side">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#what_we_do_service_modal" type="button">Add new</button>
                     </div>
                     <div class="right-side d-flex"></div>
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
                                 <img src="{{ asset("storage/".$service->services_photo) }}" alt="" class="rounded-circle" height="100" width="100" />
                              </td>
                              <td>
                                 <a class="btn btn-primary" href="{{ url("Admin/Service/".$service->id."/edit") }}">Edit</a>
                                 <a class="btn btn-primary" href="{{ url("Admin/delservice/".$service->id) }}"
                                    onclick="return confirm('Are you sure?')">Delete</a>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Services list
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  <div class="control-panel d-flex justify-content-between">
                     <div class="left-side">
                           <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#service_list_modal">Add new</button>
                     </div>
                     <div class="right-side d-flex"></div>
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
            </div>
            <div class="card">
               <div class="card-header" id="headingFour">
                 <h5 class="mb-0">
                   <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                     Clients
                   </button>
                 </h5>
               </div>
           
               <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                 <div class="card-body">
                  <div class="control-panel d-flex justify-content-between">
                     <div class="left-side">
                           <button class="btn btn-primary" data-toggle="modal" data-target="#client_modal" type="button">Add new</button>
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
      </div>
   </div>


 
 <!-- What we do, service section -->
 <div class="modal fade" id="what_we_do_service_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Add new what we do</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         @if (count($errors->what_we_do) > 0)
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->what_we_do->messages() as $error)
                     <li>{{ $error[0] }}</li>
                  @endforeach
               </ul>
            </div>
         @endif
         <form action="{{ url("Admin/SaveserviceInfo") }}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <label for="">Service Name</label>
               <input type="text" class="form-control" name="service_title" id="servicetitle" value="{{old('service_title')}}">
            </div>
            <div class="form-group">
               <label for="">About Service</label>
               <textarea name="about_project" id="about_project" class="form-control">{{old('about_project')}}</textarea>
            </div>
            <div class="form-group">
               <label for="">Details Description</label>
               <textarea class="form-control" id="pro_detail" name="pro_detail">{{old('pro_detail')}}</textarea>
            </div>
            <div class="form-group">
               <label for="">Date</label>
               <input type="date" class="form-control" name="date" id="date" value="{{old('date')}}">
            </div>
            <div class="form-group">
               <label for="">Price</label>
               <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}">
            </div>
            <div class="row">
               <div class="col-6">
                  <div class="form-group">
                     <label for="">Service Cover Photo</label>
                     <br>
                     <small> (height X width = 80 X 80 PX, type png) </small>
                     <input type="file" class="form-control-file" onchange="loadFile(event)" name="service_cover_photo" id="service_cover_photo">
                     <div class="service-img-folder" style="margin-top:20px;">
                        <img src="https://picsum.photos/g/300/300"  id="output">
                     </div>
                  </div>
               </div>
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

 {{-- service lists modal section --}}
 <div class="modal fade" id="service_list_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Add new Service</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         @if (count($errors->service_list) > 0)
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->service_list->messages() as $error)
                     <li>{{ $error[0] }}</li>
                  @endforeach
               </ul>
            </div>
         @endif
         <form method="post" action="{{ url('Admin/SaveServiceList') }} " enctype="multipart/form-data">
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
               <input id="list_avater" name="list_avater" class="form-control-file" type="file">
               <small> <b> (size: 48X40 PX |  ** mandatory) </b> </small>
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


 {{-- client modal section --}}
 <div class="modal fade" id="client_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Add new Client</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         @if (count($errors->service_list) > 0)
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->service_list->messages() as $error)
                     <li>{{ $error[0] }}</li>
                  @endforeach
               </ul>
            </div>
         @endif
         <form method="post"  action="{{ url('Admin/SaveClient') }} " enctype="multipart/form-data">
            @csrf   
            <div class="form-group">
               <label for="my-input">Compnay Name</label>
               <input id="compnay_name"  name="compnay_name" class="form-control" type="text" value="{{old('compnay_name')}}">
            </div>
            <div class="form-group">
               <label for="my-input">Contact Number (Any numbers)</label>
               <input id="phone_number"  name="phone_number" class="form-control" type="text" value="{{old('phone_number')}}">
            </div>
            <div class="form-group">
               <label for="my-input">E-mail</label>
               <input id="email"  name="email" class="form-control" type="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
               <div class="form-group">
                  <label for="my-input">Address</label>
                  <textarea id="address"  name="address" class="form-control" rows="3">{{old('address')}}</textarea>
               </div>
            </div>
            <div class="form-group">
               <label for="my-input">Avatar</label>
               <input id="client_avater" name="client_avater" class="form-control-file" type="file">
               <small> <b>( Logo size : 120X68 PX| **mandatory)</b> </small>
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
         @if (count($errors->what_we_do) > 0)
             $("#what_we_do_service_modal").modal('show')
         @endif
         @if (count($errors->service_list) > 0)
             $("#service_list_modal").modal('show')
         @endif

      </script>
@endsection