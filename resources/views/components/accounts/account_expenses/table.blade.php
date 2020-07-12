<table class="table table-bordered" id="accountExpenses-table">
    <thead>
        <tr>
            <th>Date</th>
        <th>Amount</th>
        <th>Account</th>
        <th>Category</th>
        
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($accountExpenses as $accountExpense)
        <tr>
            <td>{!! date('d-M-Y', strtotime($accountExpense->date))   !!}</td>
            <td>{!! $accountExpense->amount !!}</td>
            <td>
                    @if (empty($accountExpense->expense_name))
                           {{ "No Name" }} <br>
                           {!! $accountExpense->paidFromAccount->Category !!}
                    @else
                    {!! $accountExpense->expense_name !!}
                    <br>
                    {!! $accountExpense->paidFromAccount->Category !!}
                    @endif

            </td>
            <td>
                {!! $accountExpense->expensecategory->Category !!}
                     <br>
                 @if (!empty($accountExpense->vendor_id))
                     <span class="badge badge-primary">Bills to</span> vendor <a href="#"> {!! $accountExpense->vendors->vendor_name !!}  </a>    
                 @endif
                  
                <br>

                 @if (!empty($accountExpense->team_id))
                     <span class="badge badge-primary">Bills to</span> team <a href="#">  {!! $accountExpense->teams->member_name !!} </a>    
                 @endif
                  <br>

                 @if (!empty($accountExpense->project_id))
                     <span class="badge badge-primary">Bills to</span> project <a href="#"> {!! $accountExpense->projects->project_title !!} </a>    
                 @endif
                     <br>
                     @if (!empty($accountExpense->note))
                         {!! $accountExpense->note !!}
                     @endif
            </td>
            
            <td>
                {!! Form::open(['route' => ['accountExpenses.destroy', $accountExpense->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('accountExpenses.show', [$accountExpense->id]) !!}" class='btn btn-default btn-xs'>
                    View</a>
                    <a href="{!! route('accountExpenses.edit', [$accountExpense->id]) !!}" class='btn btn-default btn-xs'>
                    Edit</a>
                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>