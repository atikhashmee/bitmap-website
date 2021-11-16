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
