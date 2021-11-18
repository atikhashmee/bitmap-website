 @extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-6">
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
              <button class="btn btn-primary" type="submit" name="btnupdate">Update</button>
            </form>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Protfolio Items
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <button type="button" class="btn btn-outline-primary" data-target="#protfolio_modal" data-toggle="modal">Add new</button>
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
          
          {{ $protfolios->links() }}
          </div>
        </div>
      </div>
    </div>    
  </div>
</div>

 {{-- protfolio modal section --}}
 <div class="modal fade" id="protfolio_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new Protfolio</h5>
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
        $("#protfolio_modal").modal('show')
    @endif
</script>
@endsection
 
 
 
