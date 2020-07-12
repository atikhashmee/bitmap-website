<table class="table table-bordered" id="projectExpenses-table">
    <thead>
        <tr>
                <th>Date</th>
            <th>Expense type</th>
       
        
        <th>Amount</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($projectExpenses as $projectExpense)
        <tr>
                <td>{!! $projectExpense->date !!}</td>
            <td>{!! $projectExpense->expense->expense_name !!}</td>
          
           
            <td>{!! $projectExpense->amount !!}</td>
            <td>{!! $projectExpense->description !!}</td>
            <td>
                {!! Form::open(['route' => ['projectExpenses.destroy',request()->route('project_id'), $projectExpense->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   {{--  <a href="{!! route('projectExpenses.show', [request()->route('project_id'),$projectExpense->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a> --}}
                    <a href="{!! route('projectExpenses.edit', [request()->route('project_id'),$projectExpense->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>