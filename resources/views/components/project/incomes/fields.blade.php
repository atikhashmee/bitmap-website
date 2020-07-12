

   @section('styles')
          <style>
                .source-type-style{
                     margin-top: 1rem;
                }
              </style>
   @endsection


<table class="table table-bordered">

    <tr>
            <!-- Date Field -->
        <td>
                {!! Form::label('date', 'Date:') !!}
        </td>
        <td>
                {!! Form::date('date', null, ['class' => 'form-control form-control-alternative','id'=>'date']) !!}
        </td>
    </tr>

    <input type="hidden" name="moneysource"  value="project" />


    <tr>
            <!-- Amount Field -->
        <td>
                {!! Form::label('amount', 'Amount:') !!}
        </td>
        <td>
                {!! Form::text('amount', null, ['class' => 'form-control form-control-alternative']) !!}
        </td>
    </tr>
    <tr>
            <!-- Description Field -->
        <td>
                {!! Form::label('description', 'Description:') !!}
        </td>
        <td>
                {!! Form::textarea('description', null, ['class' => 'form-control form-control-alternative']) !!}
        </td>
    </tr>
    <tr>
            <!-- Carrier Field -->
            <td>
                    {!! Form::label('carrier', 'Carrier:') !!}
            </td>
            <td>
                    {!! Form::text('carrier', null, ['class' => 'form-control form-control-alternative']) !!}
            </td>
    </tr>
    <tr>
        <td></td>
        <td>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('projectIncomes.index',[request()->route('project_id')]) !!}" class="btn btn-default">Cancel</a>
        </td>
    </tr>
</table>











