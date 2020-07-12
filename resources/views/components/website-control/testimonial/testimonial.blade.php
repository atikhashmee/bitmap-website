@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-3">
     @include('components.website-control.webcontrol-menu')
  </div>
  <div class="col-md-9">
        @include('components.website-control.webcontrol-header')
           <div class="form-container" style="display: none">
            <form class="form" action="{{ url("Admin/saveTestimonial") }}" method="POST" enctype="multipart/form-data">
              @csrf
                      <div class="form-group">
                      <label for="">Client Name <span>*</span> </label>
                      <input type="text" name="client_name" id="client_name" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                      <div class="form-group">
                        <label for=""> Client Image</label>
                        <input type="file" class="form-control-file" name="client_image" id="client_image" placeholder="" aria-describedby="fileHelpId">
                      </div>
                      <div class="form-group">
                        <label for="">Comments <span>*</span> </label>
                        <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for=""> Signature Image (png)</label>
                        <input type="file" class="form-control-file" name="signature" id="signature" placeholder="" aria-describedby="fileHelpId">
                      </div>
                    <div class="form-group">
                      <label for="">Client Media (facebook,twitter,Etc) <span>*</span> </label>
                      <input type="text" name="comments_via" id="comments_via" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                      <button type="submit" class="btn btn-sm project-btn btn-primary"> Save</button>
              </form>
           </div>
           <div class="control-panel d-flex justify-content-between">
            <div class="left-side">
                <button class="btn btn-sm btn-primary project-btn" type="button" onclick="toggleForm()">Add new</button>
            </div>
            <div class="right-side d-flex">
               
            </div>
        </div>
        <table class="table">
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
                  <tr>
                  <td> 
                    <img 
                    @if (file_exists(public_path().'/storage/'.$testi->client_image))
                        src="{{ asset('storage/'.$testi->client_image) }}" 
                    @else
                        src="//unsplash.it/200/200" 
                    @endif
                    
                    
                    width="50"  height="50"   class="rounded-circle" /></td>
                  <td>{{  $testi->client_name }}</td>
                  <td>{{  $testi->client_comment }}</td>
                  <td>{{  $testi->comment_via }}</td>
                  <td>  
                    <a href="{{ url('Admin/Edit_testimonial/'.$testi->id) }}" class="btn btn-sm btn-warning project-btn" >Edit</a>
                    <a href="{{url('Admin/delete_testimonial/'.$testi->id)}}"  onclick="return confirm('Are you sure?')" class="btn btn-sm btn-warning project-btn"> Delete</a> 
                  </td>
                  </tr>
            @endforeach
            
          </tbody>
        </table>
  </div>
     </div>
@endsection