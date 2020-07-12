<!-- From Person Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('from_person_name', 'From Person Name:') !!}
    {!! Form::text('from_person_name', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Email Adrs Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_adrs', 'Email Adrs:') !!}
    {!! Form::text('email_adrs', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Recieved Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recieved_date', 'Recieved Date:') !!}
    {!! Form::date('recieved_date', null, ['class' => 'form-control form-control-alternative','id'=>'recieved_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#recieved_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Payment Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    {!! Form::date('payment_date', null, ['class' => 'form-control form-control-alternative','id'=>'payment_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#payment_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection
<input type="hidden" name="project_id" value="{{ request()->route('project_id') }}">
<!-- Remarks Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::textarea('remarks', null, ['class' => 'form-control form-control-alternative letterbox']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projectLoands.index',[request()->route('project_id')]) !!}" class="btn btn-default">Cancel</a>
</div>
