<table class="table table-bordered">
        <tr>
            <!-- Date Field -->
            <td>{!! Form::label('date', 'Date:') !!}</td>
            <td>{!! Form::date('date', null, ['class' => 'form-control form-control-alternative','id'=>'date']) !!}</td>
        </tr>
    
       
    
        <tr>
            <!-- Expense Id Field -->
            <td>{!! Form::label('expense_id', 'Expense Id:') !!}</td>
            <td> {!! Form::select('expense_id', $expense_type, null, ['class' => 'form-control form-control-alternative']) !!}</td>
            <td>
                <a href="{{ url('Admin/Accounts/expenseTypes/create') }}" class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
            </td>
        </tr>
        <tr>
    
            <td></td>
            <td>
                <div id="employeeis">
                    <label class="radio-inline">
                        {!! Form::radio('is_employee', "employee", null) !!} Employee
                    </label>
                    <label class="radio-inline">
                        {!! Form::radio('is_employee', "other", ['selected']) !!} Others
                    </label>
                </div>

              <div class="hide-employee" id="employee_field">
                    {!! Form::select('user_id', array_add($users,'',"Select a employee"), null, ['class' => 'form-control form-control-alternative']) !!}
                     <a href="{{ url('Admin/Team/team_lists') }}" class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
              </div>
            </td>
    
        </tr>

       
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
            <td></td>
            <td>
                    {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
                    <a href="{!! route('expenditures.index') !!}" class="btn btn-default">Cancel</a>
            </td>
        </tr>
    
    </table>
    
   
    
   
    
  
    
  
 
 