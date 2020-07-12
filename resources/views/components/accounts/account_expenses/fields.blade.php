<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Paid From Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paid_from_account', 'Paid From Account:') !!}
    {!! Form::select('paid_from_account', array_add($categories,'','--Choose a Category--'), null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Expense Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expense_category', 'Expense Category:') !!}
    {!! Form::select('expense_category', array_add($categories,'','--Choose a Category--'), null, ['class' => 'form-control']) !!}
</div>

<!-- Expense Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expense_name', 'Expense Name:') !!}
    {!! Form::text('expense_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', 'Vendor Id:') !!}
    {!! Form::select('vendor_id',  array_add($vendors,'','--Choose a vendor--'), null, ['class' => 'form-control']) !!}
</div>

<!-- Team Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_id', 'Team Id:') !!}
    {!! Form::select('team_id', array_add($team_members,'','--Choose a team--'), null, ['class' => 'form-control']) !!}
</div>

<!-- Team Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project :') !!}
    {!! Form::select('project_id', array_add($projects,'','--Choose a project--'), null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

 
   <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accountExpenses.index') !!}" class="btn btn-default">Cancel</a>
</div>
