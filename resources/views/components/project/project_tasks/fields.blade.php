<!-- Task Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('task_name', 'Task Name:') !!}
    {!! Form::text('task_name', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control form-control-alternative','id'=>'start_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control form-control-alternative','id'=>'end_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Budget Field -->
<div class="form-group col-sm-6">
    {!! Form::label('budget', 'Budget:') !!}
    {!! Form::text('budget', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<input type="hidden" name="project_id" value="{{ request()->route('project_id') }}" />

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projectTasks.index',request()->route('project_id')) !!}" class="btn btn-default">Cancel</a>
</div>
