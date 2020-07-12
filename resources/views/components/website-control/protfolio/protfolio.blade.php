 @extends('layouts.app')
@section('content')

   
     
<div class="row">
  <div class="col-md-3">
     @include('components.website-control.webcontrol-menu')
  </div>
  <div class="col-md-9">
        @include('components.website-control.webcontrol-header')
               <div class="card">
                 <div class="card-header">
                   <div class="card-title">Background</div>
                 </div>
                 <div class="card-body" style="padding: 10px !important">
                  <form action="{{url("Admin/Protfolio/Savepbginfo")}}"  method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="example-text-input" class="col-form-label">Heading</label>
                      <input class="form-control" type="text"  id="headertitle" name="headertitle" value="{{ $bginfo->bg_title }}">
                    </div>
                    <div class="form-group">
                      <label for="description">Descrioptn</label>
                      <textarea id="description" name="bgdescription" class="form-control" rows="3">{{ $bginfo->bg_description }}</textarea>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <input type="file" name="bgimgfile" id="bgimgfile">
                        </div>
                      </div>
                      <div class="col">
                        <img src="{{ asset("storage/".$bginfo->bg_image ) }}" class="img-thumbnail" width="200" height="200"  />
                      </div>
                    </div>
                    <button class="btn btn-primary btn-sm project-btn" type="submit" name="btnupdate">Update</button>
                  </form>
                 </div>
               </div>


            <div class="card mt-5">
              <div class="card-header">
                <div class="card-title">
                  Protfolio Items
                </div>
              </div>
                <div class="form-container" style="border: none !important; display:none">
                  <form action="{{ url("Admin/Protfolio/saveprotfolio") }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                       <label for="">Project Title</label>
                       <input type="text" class="form-control" name="projecttitle" id="projecttitle">
                    </div>
                    <div class="form-group">
                       <label for="example-text-input" class="col-form-label">Project Type</label>
                       <select class="form-control" id="projecttype" name="projecttype">
                          <option value="">Select a type</option>
                          @foreach ($prottypes as $type)
                          <option value="{{$type->id}}">{{$type->category_name}}</option>
                          @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                       <label for="">About Project</label>
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
                       <label for="">Client</label>
                       <input type="text" class="form-control" name="client" id="client">
                    </div>
                    <div class="form-group">
                       <label for="">Project Location</label>
                       <input type="text" class="form-control" name="plocation" id="plocation">
                    </div>
                    <div class="form-group">
                       <label for="">Link your video demo</label>
                       <input type="text" class="form-control" name="vdemo" id="vdemo">
                    </div>
                    <div class="form-group">
                       <label for="">video description</label>
                       <textarea type="text" class="form-control" name="vdesc" id="vdesc"></textarea>
                    </div>
                    <div class="form-group">
                       <label for="">Project Cover Photo</label>
                       <input type="file"  name="project_cover_photo" id="project_cover_photo">
                    </div>
                    <div class="form-group">
                       <button class="btn btn-sm project-btn btn-primary" name="saveservice"> Save <i class="fa fa-floppy-o"></i></button>
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
                  <div class="row">
                    @foreach ($protfolios as $prot)
                      <div class="col-6">
                          <img class="card-img-top img-thumbnail" src="{{ asset ("storage/".$prot->project_cover_photo)  }}" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title">{{ $prot->project_title }}</h5>
                            <p class="card-text">{{ $prot->about_project }}</p>
                            <a href="{{ url("Admin/Protfolio/edit/".$prot->id) }}" class="btn btn-sm btn-outline-warning">Edit <i class="fa fa-pencil"></i> </a> 
                            <a href="{{ url("Admin/Protfolio/".$prot->id.'/faqs') }}" class="btn btn-outline-primary btn-sm">FaQs <i class="fa fa-pencil"></i> </a>
                            <a href="{{   url("Admin/Protfolio/".$prot->id."/images") }}" class="btn btn-outline-primary btn-sm">Images<i class="fa fa-pencil"></i> </a> 
                            <a href="#" class="btn btn-outline-primary btn-sm">Map<i class="fa fa-pencil"></i> </a>
                            <a href="{{ url("Admin/Protfolio/DeleteProtfolio/".$prot->id) }}" onclick="return confirm('Are you sure?</br> all the contents related to this post will be deleted')" class="btn btn-outline-danger btn-sm">Delete <i class="fa fa-times"></i></a>
                          </div>
                      </div>
                    @endforeach                   
                  </div>
                  <div style="margin: 0 auto">
                    {{ $protfolios->links() }}
                  </div>
            </div>
</div>
</div>
</div>
@endsection
 
 
 
