<!-- Date Field -->
<div class="form-group">
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



<input type="hidden" name="employee_id" value="{{request()->route('employee_id')}}" />


<!-- Payamount Field -->
<div class="form-group">
    {!! Form::label('saleryamount', 'Salery Amount:') !!}
    {!! Form::text('saleryamount',  $total_amount , ['class' => 'form-control']) !!}
</div>


<div id="salery_calculate">

<!-- vat/tex  Field -->
<div class="form-group">
    {!! Form::label('tax', 'tax (%):') !!}
    {!! Form::text('tax', null, ['class' => 'form-control']) !!}
</div>

<!-- vat/tex  Field -->
<div class="form-group">
    {!! Form::label('loan', 'loan:') !!}
    {!! Form::text('loan', $loans, ['class' => 'form-control']) !!}
</div>

</div>

<div class="form-group">
    <label for="gross_amount">Gross Amount</label>
    <input id="gross_amount" class="form-control" type="text">
</div>
<!-- Payamount Field -->
<div class="form-group">
    {!! Form::label('payamount', 'Pay Amount:') !!}
    {!! Form::text('payamount', $total_amount-$loans, ['class' => 'form-control']) !!}
</div>
  

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Pay', ['class' => 'btn btn-warning']) !!}
    <a href="{!! route('paysaleries.index',request()->route('employee_id')) !!}" class="btn btn-default">Cancel</a>
</div>



