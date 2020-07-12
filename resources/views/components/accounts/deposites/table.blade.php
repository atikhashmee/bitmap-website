<table class="table table-bordered" id="deposites-table">
    <thead>
        <tr>
        <th>Date</th>
        <th>Paid To Account</th>
        <th>Amount</th>
        <th>Category</th>
        <th>Project Id</th>
        <th>Deposit Name</th>
        <th>Description</th>
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($deposites as $deposites)
        <tr>
            <td>{!! $deposites->date !!}</td>
            <td>{!! $deposites->paidtoaccount->Category !!}</td>
            <td>{!! $deposites->amount !!}</td>
            <td>{!! $deposites->accountCategory->Category !!}</td>
            <td>{!! $deposites->project_id !!}</td>
            <td>{!! $deposites->deposit_name !!}</td>
            <td>{!! $deposites->description !!}</td>
            <td>
                {!! Form::open(['route' => ['deposites.destroy', $deposites->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('deposites.show', [$deposites->id]) !!}" class='btn btn-default btn-xs'>
                    View</a>
                    <a href="{!! route('deposites.edit', [$deposites->id]) !!}" class='btn btn-default btn-xs'>
                    Edit</a>
                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>