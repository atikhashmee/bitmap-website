<!-- Key Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('key_name', 'Key Name:') !!}
    {!! Form::text('key_name', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
    <a href="{!! route('saleryKeys.index') !!}" class="btn btn-default">Cancel</a>
</div>
