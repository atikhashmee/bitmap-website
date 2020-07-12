<!-- Project Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_title', 'Project Title:') !!}
    {!! Form::text('project_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Name:') !!}
    {!! Form::select('client_id', array_add( $clients,'','Select a client'), null, ['class' => 'form-control']) !!}
    
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_number', 'Contact Number:') !!}
    {!! Form::text('contact_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['0' => 'Active', '1' => 'Finished'], null, ['class' => 'form-control']) !!}
</div>

<!-- Budget Field -->
<div class="form-group col-sm-6">
    {!! Form::label('budget', 'Budget:') !!}
    {!! Form::text('budget', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>
