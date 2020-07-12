<!-- Team Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_id', 'Team Id:') !!}
    {!! Form::select('team_id', $teams, null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Task Lists Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('task_lists', 'Task Lists:') !!}
    {!! Form::textarea('task_lists', null, ['class' => 'form-control form-control-alternative letterbox']) !!}
</div>
<input type="hidden" name="project_task_id"  value="{{ request()->route('task_id') }}" />
<input type="hidden" name="project_id" value="{{ request()->route('project_id') }}"  />

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projectTeams.index',[request()->route('project_id'),request()->route('task_id')]) !!}" class="btn btn-default">Cancel</a>
</div>
