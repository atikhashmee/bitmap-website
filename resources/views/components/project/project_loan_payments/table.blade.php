<table class="table table-bordered" id="projectLoanPayments-table">
    <thead>
        <tr>
          
        <th>Date</th>
        <th>Amount</th>
        <th>Remarks</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($projectLoanPayments as $projectLoanPayment)
        <tr>
           
            <td>{!! $projectLoanPayment->date !!}</td>
            <td>{!! $projectLoanPayment->amount !!}</td>
            <td>{!! $projectLoanPayment->remarks !!}</td>
            <td>
                {!! Form::open(['route' => ['projectLoanPayments.destroy',request()->route('project_id'),request()->route('loan_id'), $projectLoanPayment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('projectLoanPayments.show', [request()->route('project_id'),request()->route('loan_id'),$projectLoanPayment->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a> --}}
                    <a href="{!! route('projectLoanPayments.edit', [request()->route('project_id'),request()->route('loan_id'),$projectLoanPayment->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>