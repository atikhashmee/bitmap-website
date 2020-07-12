<table class="table table-bordered" id="projectTeams-table">
    <thead>
        <tr>
        <th>Team Name</th>
        <th>Task Lists</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($projectTeams as $projectTeam)
        <tr>
           
            <td>{!! $projectTeam->teams->member_name !!}</td>
            <td>{!! $projectTeam->task_lists !!}</td>
            <td>
                {!! Form::open(['route' => ['projectTeams.destroy', request()->route('project_id'),request()->route('task_id'),$projectTeam->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('projectTeams.show', [request()->route('project_id'),request()->route('task_id'),$projectTeam->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a>
                    <a href="{!! route('projectTeams.edit', [request()->route('project_id'),request()->route('task_id'),$projectTeam->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>