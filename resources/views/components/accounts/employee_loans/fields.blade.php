<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control form-control-alternative ','id'=>'date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Employee  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Name:') !!}
    {!! Form::select('employee_id', $employee, null, ['class' => 'form-control form-control-alternative']) !!}
</div>


<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Purpose Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('purpose', 'Purpose:') !!}
    {!! Form::textarea('purpose', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
    <a href="{!! route('employeeLoans.index') !!}" class="btn btn-default">Cancel</a>
</div>
