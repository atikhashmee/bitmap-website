@extends('layouts.app')

@section('styles')

    <style>
        .overlay{
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background-color: rgba(0,0,0,0.5);
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
   <div class="row">
      <div class="col-md-6">
              
          <div class="card">
              <div class="card-body">
                  
                  <h5 class="card-title">Home Style 2</h5>
                <img src="{{asset("storage/home_styles/1.png")}}" class="img-thumbnail" width="100%" height="300px" />
                @if ($homestyles->id == 2)
                <div class="overlay"></div>
                @endif
                
              </div>
              <div class="card-footer">
              <form method="post" action="{{ url("Admin/SaveHomeStyle/2") }}">
                @csrf
                      <button type="submit" class="btn btn-outline-primary">Active</button>
                  </form>
              </div>
          </div>
          
          
      
      </div>
      <div class="col-md-6">
      <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Home Style 5</h5>
                <img src="{{asset("storage/home_styles/2.png")}}" class="img-thumbnail" width="100%" height="300px" />
                @if ($homestyles->id == 3)
                <div class="overlay"></div>
                @endif
              </div>
              <div class="card-footer">
                  <form method="post" action="{{ url("Admin/SaveHomeStyle/3") }}">
                    @csrf
                      <button type="submit" class="btn btn-outline-primary">Active</button>
                  </form>
                  
              </div>
          </div>
    </div>
      <div class="col-md-6">
      <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Home Style 6</h5>
                <img src="{{asset("storage/home_styles/3.png")}}" class="img-thumbnail" width="100%" height="300px" />
                @if ($homestyles->id == 4)
                <div class="overlay"></div>
                @endif
              </div>
              <div class="card-footer">
                   <form method="post" action="{{ url("Admin/SaveHomeStyle/4") }}">
                    @csrf
                      <button type="submit" class="btn btn-outline-primary">Active</button>
                  </form>
              </div>
          </div>
    </div>
      <div class="col-md-6">
      
       <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Home Style 8</h5>
                <img src="{{asset("storage/home_styles/4.png")}}" class="img-thumbnail" width="100%" height="300px" />
                @if ($homestyles->id == 5)
                <div class="overlay"></div>
                @endif
              </div>
              <div class="card-footer">
                   <form method="post" action="{{ url("Admin/SaveHomeStyle/5") }}">
                    @csrf
                      <button type="submit" class="btn btn-outline-primary">Active</button>
                  </form>
              </div>
          </div>
    </div>
      <div class="col-md-6">

<div class="card">
              <div class="card-body">
                  <h5 class="card-title">Home Style Default</h5>
                <img src="{{asset("storage/home_styles/5.png")}}" class="img-thumbnail" width="100%" height="300px" />
                @if ($homestyles->id == 1)
                <div class="overlay"></div>
                @endif
              </div>
              <div class="card-footer">
                   <form method="post" action="{{ url("Admin/SaveHomeStyle/1") }}">
                    @csrf
                      <button type="submit" class="btn btn-outline-primary">Active</button>
                  </form>
              </div>
          </div>
    </div>
      
   </div>
    </div>
</div>

@endsection