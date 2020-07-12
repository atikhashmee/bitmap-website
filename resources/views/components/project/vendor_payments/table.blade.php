<table class="table table-bordered" id="vendorPayments-table">
    <thead>
        <tr>
            <th>Date</th>
        <th>Vendor Name</th>
        
        <th>Amount</th>
        <th>Remarks</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $sum = 0;
        @endphp
    @foreach($vendorPayments as $vendorPayment)

       @php
           $sum +=  (double) $vendorPayment->amount;
       @endphp
        <tr>
            <td>{!! $vendorPayment->date !!}</td>
            <td>{!! $vendorPayment->vendor->vendor_name !!}</td>
            <td>{!! $vendorPayment->amount !!}</td>
            <td>{!! $vendorPayment->remarks !!}</td>
            <td>
                {!! Form::open(['route' => ['vendorPayments.destroy',request()->route('project_id'), $vendorPayment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('vendorPayments.show', [request()->route('project_id'),$vendorPayment->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a> --}}
                    <a href="{!! route('vendorPayments.edit', [request()->route('project_id'),$vendorPayment->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="2"><p class="text-right">Total</p></td>
        <td>{{ number_format($sum)  }}</td>
    </tr>
    </tbody>
</table>