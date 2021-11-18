@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
          <div class="control-panel d-flex justify-content-between">
            <div class="left-side">
                <button class="btn btn-primary" type="button" data-target="#create_modal" data-toggle="modal">Add new</button>
            </div>
            <div class="right-side d-flex"></div>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Client Image</th>
              <th>Client Name</th>
              <th width="50%"> Comment </th>
              <th> Comment Via </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($testimonial_lists as $testi)
              @php
                  $img = "//unsplash.it/200/200";
                  if (file_exists(public_path().'/storage/'.$testi->client_image))
                  {
                    $img = asset('storage/'.$testi->client_image);
                  }
              @endphp
              <tr>
                <td> <img src="{{$img}}" width="50" height="50" class="rounded-circle" /></td>
                <td>{{  $testi->client_name }}</td>
                <td>{{  $testi->client_comment }}</td>
                <td>{{  $testi->comment_via }}</td>
                <td>  
                  <a href="{{ url('Admin/Edit_testimonial/'.$testi->id) }}" class="btn btn-primary" >Edit</a>
                  <a href="{{url('Admin/delete_testimonial/'.$testi->id)}}"  onclick="return confirm('Are you sure?')" class="btn btn-primary"> Delete</a> 
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
            <h5 class="modal-title" id="exampleModalLongTitle">Add new Testimonial</h5>
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
            <form class="form" action="{{ url("Admin/saveTestimonial") }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="">Client Name <span>*</span> </label>
                <input type="text" name="client_name" id="client_name" class="form-control" value="{{old('client_name')}}">
              </div>
              <div class="form-group">
                <label for=""> Client Image</label>
                <input type="file" class="form-control-file" name="client_image" id="client_image" >
              </div>
              <div class="form-group">
                <label for="">Comments <span>*</span> </label>
                <textarea class="form-control" name="comments" id="comments" rows="3">{{old('comments')}}</textarea>
              </div>
              <div class="form-group">
                <label for=""> Signature Image (png)</label>
                <input type="file" class="form-control-file" name="signature" id="signature" >
              </div>
              <div class="form-group">
                <label for="">Client Media (facebook,twitter,Etc) <span>*</span> </label>
                <input type="text" name="comments_via" id="comments_via" value="{{old('comments_via')}}" class="form-control">
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