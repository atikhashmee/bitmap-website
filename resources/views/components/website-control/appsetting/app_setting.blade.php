@extends('layouts.app')
@section('styles')
  <style>
    .img-log-box {
      width: 100%;
      height: auto;
      overflow: hidden;
    }
    .img-log-box > img {
      object-fit: contain;
    }
  </style>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-3">
      <div class="left-sidebar-website">
        @include('components.website-control.webcontrol-menu')
      </div>
    </div>
    <div class="col-md-9">
      @include('components.website-control.webcontrol-header')
      <div class="form-container">
        <form action="{{ url("Admin/updateContactForm") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="example-text-input" class="col-form-label">Site Title</label>
                      <input class="form-control" type="text"  id="sitetitle" name="sitetitle" value="{{ $settinginfo->title}}">
                  </div>
                  <div class="form-group">
                    <label for="">Short description</label>
                    <textarea name="shortdes" class="form-control" id="shortdes">{{ $settinginfo->short_description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="adrs" class="form-control" id="adrs" >{{ $settinginfo->address}}</textarea>
                  </div>
                  <div class="form-group">
                      <label for="example-search-input" class="col-form-label">Phone</label>
                      <input class="form-control" type="text" value="{{ $settinginfo->phone}}" id="phone" name="phone">
                  </div> 
                  <div class="form-group">
                      <label for="example-email-input" class="col-form-label">Email</label>
                      <input class="form-control" type="email"  id="email" name="email" value="{{ $settinginfo->email}}">
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-fblink-input" class="col-form-label">Facebook</label>
                  <div class="row">
                    <input type="text" class="form-control col-md-6 text-right" readonly value="https://www.facebook.com/">
                    <input class="form-control col-md-6" type="text" value="{{ $settinginfo->facebook}}" id="fblink" name="fblink">
                  </div>
                </div>
                <div class="form-group">
                  <label for="example-fblink-input" class="col-form-label">Twitter</label>
                  <div class="row">
                      <input type="text" class="form-control col-md-6 text-right" readonly value="https://twitter.com/">
                      <input class="form-control col-md-6" type="text" value="{{ $settinginfo->twitter}}" id="twitterlink" name="twitterlink">
                  </div>
                </div>
                <div class="form-group">
                  <label for="example-fblink-input" class="col-form-label">Instragram</label>
                  <div class="row">
                    <input type="text" class="form-control col-md-6 text-right" readonly value="https://www.linkedin.com/company/">
                    <input class="form-control col-md-6" type="text" value="{{ $settinginfo->instagram}}" id="instlink" name="instlink">
                  </div>
                </div>
                <div class="form-group">
                    <input type="file"  id="logofile" name="logofile">
                    <label  for="logofile">Choose Logo</label>
                    <div class="img-container">
                      <img src=" {{ asset("storage/".$settinginfo->logo) }}" id="output" />
                    </div>
                </div>
                <div class="form-group">
                  <input type="file"  id="feviconfile" name="feviconfile">
                  <label for="feviconfile">Choose Fevicon</label>
                  <div class="img-container">
                    <img src=" {{ asset("storage/".$settinginfo->fevicon)}} " class='img-thumbnail' />
                  </div>
                </div>
              </div>
            </div>
            <div class="input-group-append">
              <button class="btn btn-sm btn-primary project-btn" type="submit">Save Changes</button>
            </div>
        </form>
      </div>
    </div> 
  </div>
@endsection
 
 
 
