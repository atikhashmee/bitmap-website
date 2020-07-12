<table class="table table-bordered" id="incomes-table">
    <thead>
        <tr>
        <th>Date</th>
        
        <th> Description</th>
        
        <th>Amount</th>
        
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $sum = 0;
        @endphp
    @foreach($incomes as $income)
       @php
       $sum += (double) $income->amount;
       @endphp
        <tr>
            <td>{!! $income->date !!}</td>
           
            <td> 
              <strong> {!! $income->incomefrom_type !!} </strong>   
              <br>
              <p>
                    {!! $income->description !!}
              </p>
                </td>
            <td>{!! $income->amount !!}</td>
          
            <td>
                {!! Form::open(['route' => ['incomes.destroy', $income->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('incomes.show', [$income->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a>
                    <a href="{!! route('incomes.edit', [$income->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    <tr>
       <td colspan="2"> <p class="float-right">Total</p> </td> 
       <td> {{ number_format($sum) }} </td>
    </tr>
    </tbody>
</table>