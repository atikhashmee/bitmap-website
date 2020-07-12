<!-- Expense Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expense_id', 'Expense Id:') !!}
    {!! Form::select('expense_id', $expenseTypes, null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control form-control-alternative','id'=>'date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection
   <input type="hidden" name="project_id" value="{{ request()->route('project_id') }}" />
<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- carrier  Field -->
<div class="form-group col-sm-12 col-lg-12">
     <label for=""> Mention the carrier</label>
     <input type="text" class="form-control form-control-alternative" name="carrier" id="carrier"  />
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projectExpenses.index',request()->route('project_id')) !!}" class="btn btn-default">Cancel</a>
</div>
