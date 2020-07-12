

@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-md-3">
      @include('components.website-control.webcontrol-menu')
   </div>
   <div class="col-md-9">
         @include('components.website-control.webcontrol-header')
   <div class="row">
      <div class="col-md-6">
             
              <div class="card card-body">
              <form action="{{ url("Admin/Protfolio/saveImgage/".request()->route('id') )}}" class="form" method="post" enctype="multipart/form-data">
			 	@csrf
                   <div class="form-group">
                   	<input type="file" name="images[]" id="images" multiple>
                   </div>
						<!-- div where all the images are being previewd -->
                   
                     
                   
                
                <div class="form-group">
                	<button name="saveimg" class="btn btn-outline-primary"> Save <i class="fa fa-floppy-o"></i> </button>
                </div>
			 </form>
            </div>
      </div>
      <div class="col-md-6">
                <div class="card card-body">
                    <div class="row">
                    @foreach ($images as $img)
                    <div class="col-md-4">
                    <a href="{{ url("Admin/Protfolio/deleteImg/".$img->id) }}" onclick="return confirm('Are you sure?')" class="close" aria-label="Close">
									  <span style="color: red" aria-hidden="true">&times;</span>
									</a>
                    <img class="img-thumbnail" src="{{ asset('storage/'.$img->images) }}" alt="">
                        </div>
                    @endforeach
                    {{ $images->links() }}
                      </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection