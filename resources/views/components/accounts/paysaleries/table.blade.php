





<table class="table table-bordered" id="paysaleries-table">
    <thead>
        <tr>
            <th>Date</th>
        <th>Amount</th>
        <th>Loan Payment</th>
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $sum  = 0;
        @endphp
    @foreach($paysaleries as $paysalery)
             @php
             $sum += (double) $paysalery->payamount;
             @endphp
        <tr>
            <td>{!! $paysalery->date !!}</td>
           
            
            <td>{!! $paysalery->payamount !!}</td>
            <td>{!! $paysalery->loan !!}</td>
        
            <td>
                {!! Form::open(['route' => ['paysaleries.destroy',request()->route('employee_id'), $paysalery->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paysaleries.show', [request()->route('employee_id'),$paysalery->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-print"></i></a>
                    <a href="{!! route('paysaleries.edit', [request()->route('employee_id'),$paysalery->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="1" >  <p class="text-right">Total</p> </td>
        <td> {{ $sum }} </td>
        
    </tr>
    </tbody>
</table>