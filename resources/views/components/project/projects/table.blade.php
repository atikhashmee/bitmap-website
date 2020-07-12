



<div class="row">
        @foreach($projects as $project)
        <div class="col-md-6 ">
                <div class="card mb-2">
                    <div class="card-body custom-card-body">
                        <div class="row">
                            <div class="col d-flex">
                                <h3>{!! $project->project_title !!} 
                                    {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                                    <a href="{!! route('projects.edit', [$project->id]) !!}">
                                            <i class="fa fa-pencil"></i></a>
                                    {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => '', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                    {!! Form::close() !!}
                                 </h3>
                              
                            </div>
                            <div class="col">
                                <div class="right-content-style">
                                        <p> <strong> Budget : </strong> <span class="badge badge-danger">154852</span></p> 
                                        <p> <strong>Status :</strong>  <span class="badge badge-success">Running</span></p>
                                </div>
                               
                                
                            </div>
        
                        </div>
                        <div class="info-div">
                                <p><small> <strong>{!! $project->client->Compnay_name !!}</strong>  ( {!! $project->contact_number !!}  )</small></p>
                                <p><small>{!! $project->location !!}</small></p>
                        </div>
                       
                    </div>
                    <div class="card-footer">
                        <a href="{!! route('projects.show', [$project->id]) !!}" class="btn btn-manageable-tagline" >Operate</a>
                    </div>
                </div>
            </div>
    @endforeach
   
</div>

{{-- <table class="table table-bordered" id="projects-table">
    <thead>
        <tr>
            <th>Project Title</th>
        <th>Client Name</th>
        <th>Location</th>
        <th>Contact Number</th>
        <th>Status</th>
        <th>Budget</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{!! $project->project_title !!}</td>
            <td>{!! $project->client->Compnay_name !!}</td>
            <td>{!! $project->location !!}</td>
            <td>{!! $project->contact_number !!}</td>
            <td>{!! $project->status !!}</td>
            <td>{!! $project->budget !!}</td>
            <td>
                {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-default btn-xs'>
                    Manage</a>
                    <a href="{!! route('projects.edit', [$project->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table> --}}