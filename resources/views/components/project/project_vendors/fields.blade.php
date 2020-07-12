<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', 'Vendor Id:') !!}
    {!! Form::select('vendor_id', $vendors, null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Budget Field -->
<div class="form-group col-sm-6">
    {!! Form::label('budget', 'Budget:') !!}
    {!! Form::text('budget', null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Payment Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_type', 'Payment Type:') !!}
    {!! Form::select('payment_type', [''=>'Select an option','contractual' => 'Contractual', 'contractualwithgoods' => 'Contractual With Goods', 'dailybasis' => 'Daily Basis'], null, ['class' => 'form-control form-control-alternative']) !!}
</div>

<!-- Extra Requirement Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('extra_requirement', 'Extra Requirement:') !!}
    {!! Form::textarea('extra_requirement', null, ['class' => 'form-control form-control-alternative letterbox']) !!}
</div>

<input type="hidden" name="project_task_id"  value="{{ request()->route('task_id') }}" />
<input type="hidden" name="project_id" value="{{ request()->route('project_id') }}"  />

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projectVendors.index',[request()->route('project_id'),request()->route('task_id')]) !!}" class="btn btn-default">Cancel</a>
</div>
