<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $projectTask->id !!}</p>
</div>

<!-- Project Id Field -->
<div class="form-group">
    {!! Form::label('project_id', 'Project Id:') !!}
    <p>{!! $projectTask->project_id !!}</p>
</div>

<!-- Task Name Field -->
<div class="form-group">
    {!! Form::label('task_name', 'Task Name:') !!}
    <p>{!! $projectTask->task_name !!}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{!! $projectTask->start_date !!}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{!! $projectTask->end_date !!}</p>
</div>

<!-- Budget Field -->
<div class="form-group">
    {!! Form::label('budget', 'Budget:') !!}
    <p>{!! $projectTask->budget !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $projectTask->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $projectTask->updated_at !!}</p>
</div>

