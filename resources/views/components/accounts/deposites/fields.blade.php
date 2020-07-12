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

<!-- Paid To Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paid_to_account', 'Paid To Account:') !!}
    {!! Form::select('paid_to_account', array_add($categories,'','--select a category--') , null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', array_add($categories,'','--select a category--'), null, ['class' => 'form-control']) !!}
</div>

<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project Id:') !!}
    {!! Form::select('project_id', array_add($projects,'','--select a project--'), null, ['class' => 'form-control']) !!}
</div>

<!-- Deposit Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deposit_name', 'Deposit Name:') !!}
    {!! Form::text('deposit_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<input type="hidden" name="user_id" value="{{  auth()->user()->id }}" />
<!-- Submit Field -->
 <div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('deposites.index') !!}" class="btn btn-default">Cancel</a>
</div>
