@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div class="container-fluid mt-7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                     @if ($profile != null)
                     <img src="{{ asset('storage/'.$profile->image) }}" class="rounded-circle">
                     @else
                     <img src="#" class="rounded-circle">
                     @endif
                   
                  </a>
                </div>
              </div>
            </div>
            <!-- <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div> -->
            <div class="card-body pt-0 pt-md-4">
              <!-- <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="text-center">
                <h3>
                        {{ $users->name }}
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>
                  @if ( $profile != null )
                  {{  $profile->adres }}
                  @endif
                </div>
                
                
                <hr class="my-4" />
                <p> @if ($profile!= null)
                        {{  $profile->description }}
                        @endif</p>
              
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <!-- <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div> -->
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ url('Admin/UpdateProfile') }}" enctype="multipart/form-data" >
                 @csrf
                <div class="pl-lg-4">
                        <h6 class="heading-small  text-muted mb-4">User information</h6>
                        
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" name="username" class="form-control form-control-alternative" placeholder="Username" value="{{ $users->name }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" name="emailadres" class="form-control form-control-alternative" 
                        placeholder="jesse@example.com"
                        value="{{ $users->email }}"
                        >
                      </div>
                    </div>
                  </div>
                 
                </div>
                <hr class="my-4" />
                <!-- Address -->
                
                <div class="pl-lg-4">
                        <h6 class="heading-small text-muted mb-4">Contact information</h6>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" name="adrs" class="form-control form-control-alternative" 
                        placeholder="Home Address" 
                        @if ( $profile != null )
                            value="{{  $profile->adres }}"
                            @else
                            value="" 
                            @endif
                        type="text">
                      </div>
                    </div>
                  </div>
                  
                </div>
                <hr class="my-4" />
                <!-- Description -->
               
                <div class="pl-lg-4">
                        <h6 class="heading-small text-muted mb-4">About me</h6>
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea rows="4"  name="aboutuser" class="form-control form-control-alternative">
                      @if ($profile!= null)
                      {{  $profile->description }}
                      @endif
                    </textarea>
                  </div>

                  <div class="form-group">
                      <label for="image">Image</label>
                      <input id="image" class="form-control form-control-alternative" name="profileimage" type="file">
                  </div>
                  <button type="submit" class="btn btn-primary">Update <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  
    </div>

@endsection
