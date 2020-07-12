<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $expenseType->id !!}</p>
</div>

<!-- Expense Name Field -->
<div class="form-group">
    {!! Form::label('expense_name', 'Expense Name:') !!}
    <p>{!! $expenseType->expense_name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $expenseType->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $expenseType->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $expenseType->updated_at !!}</p>
</div>

