<table class="table table-bordered datatable" id="employeeLoans-table">
    <thead>
        <tr>
        <th>Date</th>
        <th>Employee Id</th>
        <th>Amount</th>
        <th>Purpose</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($employeeLoans as $employeeLoan)
        <tr>
            <td>{!! $employeeLoan->date !!}</td>
            <td>{!! $employeeLoan->employee->member_name !!}</td>
            <td>{!! $employeeLoan->amount !!}</td>
            <td>{!! $employeeLoan->purpose !!}</td>
            <td>
                {!! Form::open(['route' => ['employeeLoans.destroy', $employeeLoan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('employeeLoans.show', [$employeeLoan->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a>
                    <a href="{!! route('employeeLoans.edit', [$employeeLoan->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>