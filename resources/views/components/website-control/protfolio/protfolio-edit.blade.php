 @extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-3">
     @include('components.website-control.webcontrol-menu')
  </div>
  <div class="col-md-9">
        @include('components.website-control.webcontrol-header')

            <div class="card card-body">
                <div class="row">
                    <div class="col-md-8">
                    <form action="{{ url("Admin/Protfolio/UpdateSave/".$protfolios->id) }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                 <div class="form-group">
                  <label for="">Project Title</label>
                 <input type="text" class="form-control" name="projecttitle" id="projecttitle" value="{{ $protfolios->project_title }}">
                </div>
                <div class="form-group">
                       <label for="example-text-input" class="col-form-label">Project Type</label>
                       <input name="dbcategory" type="hidden" value="{{ $protfolios->protfolio_categories_id }}">
                  <select class="form-control" id="projecttype" name="projecttype">
                       <option value="">Select a type</option>
                         @foreach ($prottypes as $type)
                        <option value="{{$type->id}}">{{$type->category_name}}</option>
                         @endforeach
                     </select>
                    </div>
                    
                <div class="form-group">
                  <label for="">About Project</label>
                  <textarea name="about_project" id="about_project" class="form-control"> {{ $protfolios->about_project }}</textarea>
                </div>
                <div class="form-group">
                  <label for="">Details Description</label>
                  <textarea class="form-control" id="pro_detail" name="pro_detail">{{ $protfolios->description_project }}</textarea>
                </div>
                <div class="form-group">
                  <label for="">Date</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ $protfolios->date }}">
                </div>
                <div class="form-group">
                  <label for="">Client</label>
                  <input type="text" class="form-control" name="client" id="client" value="{{ $protfolios->client_name }}">
                </div>
                <div class="form-group">
                  <label for="">Project Location</label>
                  <input type="text" class="form-control" name="plocation" id="plocation" value="{{ $protfolios->project_location }}">
                </div>
                <div class="form-group">
                  <label for="">Link your video demo</label>
                  <input type="text" class="form-control" name="vdemo" id="vdemo" value="{{ $protfolios->video_url }}">
                </div>
                <div class="form-group">
                  <label for="">video description</label>
                  <textarea type="text" class="form-control" name="vdesc" id="vdesc">{{ $protfolios->video_description }}</textarea>
                </div>
                <div class="form-group">
                  <label for="">Project Cover Photo</label>
                  <input type="file"  name="project_cover_photo" id="project_cover_photo">
                <input name="dbimage" class="form-control" type="hidden" value="{{ $protfolios->project_cover_photo }}">
                  <img  src="{{ asset ("storage/".$protfolios->project_cover_photo)  }}" width="200" height="200" />
                </div>
                <div class="form-group">
                  <button class="btn btn-outline-primary" name="saveservice"> Update <i class="fa fa-floppy-o"></i></button>
                </div>
               </form>
                    </div>
                   
                </div>
            </div>
</div>
</div>
@endsection
 
 
 
