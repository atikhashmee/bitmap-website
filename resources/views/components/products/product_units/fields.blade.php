<!-- Unit Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_name', 'Unit Name:') !!}
    {!! Form::text('unit_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productUnits.index') !!}" class="btn btn-default">Cancel</a>
</div>
