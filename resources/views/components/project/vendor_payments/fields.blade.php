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

<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', 'Vendor Name:') !!}
    {!! Form::select('vendor_id', array_add($vendors,'',"Select a vendor") , null, ['class' => 'form-control form-control-alternative']) !!}
</div>
 <input type="hidden" name="project_id" value="{{ request()->route('project_id') }}" />
   

   <div class="row">
       
           <div class=" col-sm-3 form-group">
               <label for="my-input">Payable</label>
               <input id="my-input" class="form-control form-control-alternative" type="text" readonly>
           </div>
            <div class=" col-sm-3form-group">
             <label for="my-input">Paid</label>
             <input id="my-input" class="form-control form-control-alternative" type="text" readonly>
           </div>
       
   </div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::text('remarks', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vendorPayments.index',[request()->route('project_id')]) !!}" class="btn btn-default">Cancel</a>
</div>
