<!-- Vendortype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_type_id', 'Vendortype Id:') !!}
    {!! Form::select('vendor_type_id', $venorstype, null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Vendor Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_name', 'Vendor Name:') !!}
    {!! Form::text('vendor_name', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Contact Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_number', 'Contact Number:') !!}
    {!! Form::text('contact_number', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Specification Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('specification', 'Specification:') !!}
    {!! Form::textarea('specification', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
    <a href="{!! route('vendors.index',request()->route('vendor_type_id')) !!}" class="btn btn-default">Cancel</a>
</div>
