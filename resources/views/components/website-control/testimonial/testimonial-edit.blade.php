@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card card-body">
      <form class="form" action="{{ url("Admin/update_testimonial/".$testimonial_info->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Client Name <span>*</span> </label>
          <input type="text" name="client_name" id="client_name" class="form-control"  aria-describedby="helpId" value="{{$testimonial_info->client_name}}"  />
        </div>
        <div class="form-group">
          <label for=""> Client Image</label>
          <input name="dbclientimage" class="form-control" type="hidden" value="{{$testimonial_info->client_image  }}"/>
          <input type="file" class="form-control-file" name="client_image" id="client_image"  aria-describedby="fileHelpId">
          <img src="{{ asset('storage/'.$testimonial_info->client_image) }}"  class="img-thumbnail" />
        </div>
        <div class="form-group">
          <label for="">Comments <span>*</span> </label>
          <textarea class="form-control" name="comments" id="comments" rows="3">{{$testimonial_info->client_comment  }}</textarea>
        </div>
        <div class="form-group">
          <label for=""> Signature Image (png)</label>
          <input name="dbclientsignature" class="form-control" type="hidden">
          <input type="file" class="form-control-file" name="signature" id="signature"  aria-describedby="fileHelpId">
          <img src="{{ asset('storage/'.$testimonial_info->signature)}}" class="img-thumbnail" />
        </div> 
        <div class="form-group">
          <label for="">Client Media (facebook,twitter,Etc) <span>*</span> </label>
          <input type="text" name="comments_via" id="comments_via" class="form-control" value="{{$testimonial_info->comment_via  }}" />
        </div>
        <button type="submit" class="btn btn-outline-primary"> Update</button>
        <a href="{{route('admin.testimonial_page')}}"  class="btn btn-outline-primary"> Back</a>
      </form>
    </div>
  </div>
</div>
@endsection