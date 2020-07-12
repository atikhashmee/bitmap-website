@extends('layouts.app')
@section('content')
   <div class="row">
    <div class="col-md-3">
        <div class="left-sidebar-website">
          @include('components.website-control.webcontrol-menu')
        </div>
      </div>
      <div class="col-md-9">
            @include('components.website-control.webcontrol-header')
            <div class="form-container" style="display: none">
                <form action="{{url('Admin/addnewsliderinfo')}}" class="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Header Title</label>
                                <input class="form-control" type="text" onkeypress="wordLimit(event)"  id="headertitle" name="headertitle">
                                <small>( No more than 6 words )</small>
                                <small id="wordcounter" class="pull-right">6</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="example-url-input" class="col-form-label">URL</label>
                                <input class="form-control" type="text"  placeholder="www.studiobitmap.com" id="url" name="url">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="example-date-input" class="col-form-label">Date</label>
                                <input class="form-control" type="date" value="2018-03-05" name="date" id="example-date-input">
                            </div>
                            <div class="form-group">
                                <label for="example-search-input" class="col-form-label">Description</label>
                                <textarea class="form-control"  id="description" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="example-search-input" class="col-form-label">Make this slider visible</label>
                                <input type="radio" value="yes" name="visiblity" /> Yes
                                <input type="radio" value="no" name="visiblity" /> No
                            </div>
                            <div class="form-group custom-file">
                                <input type="file" class="custom-file-input" id="imgfile" onchange="loadFile(event)" name="imgfile">
                                <label class="custom-file-label" for="imgfile">Choose file</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-container">
                                <img src="//unsplash.it/500/250" id="output" />
                            </div>
                        </div>
                    </div>
                    <div class="input-group-append" style="margin:10px 0;">
                    <button class="btn btn-primary btn-sm project-btn" type="submit" name="btnsave">
                        Save<i class="fa fa-save "></i>
                    </button>
                    </div>
                </form>
            </div>
      {{-- table view --}}
      {{-- <div class="row filter-container">
            <div class="col filter-option">
               <ul class="pull-right">
                   <li> <input id="selectall" class="form-control" type="checkbox"> Select All</li>
                   <li><button class="btn btn-outline-success"><i class="fas fa-th"></i> </button> </li>
                   <li><button class="btn btn-outline-success" id="reorder-img">Reorder</button></li>
                </ul>
            </div>
       </div> --}}
            <div class="control-panel d-flex justify-content-between">
                <div class="left-side">
                    <button class="btn btn-sm btn-primary project-btn" type="button" onclick="toggleForm()">Add new</button>
                </div>
                <div class="right-side d-flex">
                    <div> <input id="selectall" type="checkbox"> Select All </div>
                    <div> <button class="btn btn-sm btn-primary project-btn" id="reorder">Reorder</button> </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Project URL</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                        <td>  
                            <div class="d-flex">
                                <span class="drag-handler d-none"> <img src="{{asset('drift/images/drag.svg')}}" width="20" alt=""> </span>
                                <span style="margin-top: 7px; margin-right: 4px;"><input type="checkbox" class="d-none" name="slider_ids" value="{{$slider->id}}"></span> 
                                <span>{{ $slider->slider_Title }}</span>
                            </div>
                        </td>
                        <td>{{ $slider->project_date }}</td>
                        <td>{{ $slider->project_url  }}</td>
                        <td> <img src="{{ asset('storage/'.$slider->image_link) }}" width="30" alt=""> </td>
                        <td>  
                            <a href="{{ url('Admin/edit_slider_info/'.$slider->id) }}" class="btn btn-sm project-btn btn-warning">Edit</a> 
                            <a href="{{ url('Admin/removeItem/'.$slider->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger project-btn">delete</a> 
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          {{-- <div class="col-md-4 mycol" id="image_no_{{ $slider->id }}" data-value="{{ $slider->id }}">
             <div class="card">
                <a href="{{ asset('storage/'.$slider->image_link) }}" >
                <img class="card-img" src="{{ asset('storage/'.$slider->image_link) }}" alt="">
                   <div class="card-img-overlay">
                      <h5 class="card-title">{{ $slider->slider_Title  }}</h5>
                      <p class="card-text">Date:  {{ $slider->project_date  }} <br>
                         {{ $slider->project_url  }}
                      </p>
                      <div class="action-icon">
                <a href="#" class="view"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
                <a href=" {{ url('Admin/edit_slider_info/'.$slider->id) }}" class="edit"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                <a href=" {{ url('Admin/removeItem/'.$slider->id) }}" onclick="return confirm('Are you sure?')" class="delete"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                </div>
                </div>
                </a>
             </div>
          </div> --}}
      </div>
   </div>

  
@endsection

@section('page_js')
     <script>
          let all_checked = false;
          let orderable = false;
          (function () {  
            document.getElementById('selectall').addEventListener('click', function(evt){
                    let ids = document.querySelectorAll('input[name=slider_ids]');
                    if (all_checked) 
                    {
                        for (let index = 0; index < ids.length; index++) {
                            let element = ids[index];
                            element.classList.add('d-none');
                            element.classList.remove('d-block');
                            element.checked = false;
                        }
                        all_checked = false;
                    }
                    else
                    {
                        for (let index = 0; index < ids.length; index++) {
                            let element = ids[index];
                            element.classList.add('d-block');
                            element.checked = true;
                            element.classList.remove('d-none');
                        }
                        all_checked = true;
                    }
                    
            });

            document.getElementById('reorder').addEventListener('click', function(evt){
                let ids = document.querySelectorAll('.drag-handler');
                    if (orderable) 
                    {
                        for (let index = 0; index < ids.length; index++) {
                            let element = ids[index];
                            element.classList.add('d-none');
                            element.classList.remove('d-block');
                        }
                        orderable = false;
                    }
                    else
                    {
                        for (let index = 0; index < ids.length; index++) {
                            let element = ids[index];
                            element.classList.add('d-block');
                            element.classList.remove('d-none');
                        }
                        orderable = true;
                    }
            });
          })();
     </script>
@endsection