<table class="table table-bordered" id="projectLoands-table">
    <thead>
        <tr>
           
        <th>From Person Name</th>
        <th>Phone Number</th>
      
        <th>Amount</th>
       
        <th>Payment Date</th>
        <th>Remarks</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($projectLoands as $projectLoands)
        <tr>
           
            <td>{!! $projectLoands->from_person_name !!}</td>
            <td>{!! $projectLoands->phone_number !!}</td>
           
            <td>{!! $projectLoands->amount !!}</td>
         
            <td>{!! $projectLoands->payment_date !!}</td>
            <td>{!! $projectLoands->remarks !!}</td>
            <td>
                {!! Form::open(['route' => ['projectLoands.destroy',request()->route('project_id'), $projectLoands->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('projectLoands.show', [request()->route('project_id'),$projectLoands->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a> --}}
                    <a href="{{ url('Admin/projects/'.request()->route('project_id').'/projectLoands/'.$projectLoands->id.'/projectLoanPayments') }}" class='btn btn-default btn-xs'>
                    <i class="fa fa-paypal" aria-hidden="true"></i></a>
                    <a href="{!! route('projectLoands.edit', [request()->route('project_id'),$projectLoands->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>