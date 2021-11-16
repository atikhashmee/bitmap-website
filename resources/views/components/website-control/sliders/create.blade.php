@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{url('/Admin')}}" class="btn btn-info">Back</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ $error }}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif
            <form action="{{route("admin.sliders.store")}}" class="form" method="post" enctype="multipart/form-data">
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
                    <button class="btn btn-primary" type="submit" name="btnsave">Save Changes</i></button>
                </div>
            </form>
        </div>
    </div>
@endsection