<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name', 'Account Name:') !!}
    {!! Form::text('account_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_number', 'Account Number:') !!}
    {!! Form::text('account_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_location', 'Branch Location:') !!}
    {!! Form::text('branch_location', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_type', 'Account Type:') !!}
    {!! Form::text('account_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Accoutn Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accoutn_status', 'Accoutn Status:') !!}
    {!! Form::select('accoutn_status', ['0' => 'Active', '1' => 'Deactivate'], null, ['class' => 'form-control']) !!}
</div>

<!-- opening balance -->
<div class="form-group col-sm-6">
        {!! Form::label('opening_balance', 'Opening Balance:') !!}
        {!! Form::text('opening_balance', null, ['class' => 'form-control']) !!}
    </div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
    <a href="{!! route('treasures.index') !!}" class="btn btn-default">Cancel</a>
</div>
