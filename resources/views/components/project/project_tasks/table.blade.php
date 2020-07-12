

<div class="row">
    <div class="col">
        <div class="float-right">
            <button onclick="listView()"><i class="fa fa-bars"></i> List</button>
            <button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
        </div>
    </div>
</div>

<div class="row">

    @foreach($projectTasks as $projectTask)
    <div class="col-md-6 " style="margin-bottom:10px;">
        <div class="card">
            <div class="card-body">

                {!! Form::open(['route' => ['projectTasks.destroy', request()->route('project_id'), $projectTask->id], 'method' => 'delete']) !!}

                <a href="#"  style="font-size:29px;" >{!! $projectTask->task_name !!}  </a> {{--
                <a href="{!! route('projectTasks.show', [request()->route('project_id'),$projectTask->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a> --}}
                <a href="{!! route('projectTasks.edit', [request()->route('project_id'),$projectTask->id]) !!}">
                    <i class="fa fa-pencil"></i></a>

                {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => '', 'onclick' => "return confirm('Are you sure?')"]) !!} {!! Form::close() !!}

                <small>start date: {!! $projectTask->start_date !!}</small> - <small>End Date: {!! $projectTask->end_date !!}</small>
                <br>
                <p>Budget Amount : {!! $projectTask->budget !!}/=</p>
                <div class="row">
                    <div class="col">
                        Vendor Lists
                        <a href="{{  url('Admin/projects/'.request()->route('project_id').'/task/'.$projectTask->id.'/projectVendors') }}"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
                        <ol>
                            @foreach ($projectTask->projectVendors as $taskvendor)
                            <li> {{ $taskvendor->vendors->vendor_name }} </li>
                            @endforeach

                        </ol>
                    </div>
                    <div class="col">
                        Team Lists
                        <a href="{{  url('Admin/projects/'.request()->route('project_id').'/task/'.$projectTask->id.'/projectTeams') }}"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
                        <ol>
                            @foreach ($projectTask->projectTeams as $taskproject)
                            <li> {{ $taskproject->teams->member_name }} </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                        70%
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach
</div>

{{--
<table class="table table-bordered" id="projectTasks-table">
    <thead>
        <tr>
            <th>Task Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Budget</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $sum = 0; @endphp @foreach($projectTasks as $projectTask) @php $sum += (double)$projectTask->budget; @endphp
        <tr>
            <td>{!! $projectTask->task_name !!}</td>
            <td>{!! $projectTask->start_date !!}</td>
            <td>{!! $projectTask->end_date !!}</td>
            <td>{!! $projectTask->budget !!}</td>
            <td>
                {!! Form::open(['route' => ['projectTasks.destroy', request()->route('project_id'), $projectTask->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="
                        {{  url('Admin/projects/'.request()->route('project_id').'/task/'.$projectTask->id.'/projectVendors') }}" class='btn btn-default btn-xs'>
                                vendor</a>
                    <a href="
                        {{  url('Admin/projects/'.request()->route('project_id').'/task/'.$projectTask->id.'/projectTeams') }}" class='btn btn-default btn-xs'>
                                team</a>
                    <a href="{!! route('projectTasks.show', [request()->route('project_id'),$projectTask->id]) !!}" class='btn btn-default btn-xs'>
                        <i class="fa fa-eye"></i></a>
                    <a href="{!! route('projectTasks.edit', [request()->route('project_id'),$projectTask->id]) !!}" class='btn btn-default btn-xs'>
                        <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3">
                <p class="text-right"> Total </p>
            </td>
            <td> {{ $sum }} </td>
        </tr>
    </tbody>
</table> --}} @section('scripts')

<script>
    function listView() {
        alert("hello world");
    }

    function gridView() {
        alert(' this option is not worked yet');
    }
</script>

@endsection