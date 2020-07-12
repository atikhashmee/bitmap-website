<div class="table-responsive">
        <table class="table align-items-center table-light datatable">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Expense Type</th>
                    <th scope="col">Details</th>
                    <th scope="col">Amount</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php $sum = 0; @endphp @foreach($expenditures as $expenditures) @php $sum += (double) $expenditures->amount; @endphp
                <tr>
                    <td>{!! $expenditures->date !!}</td>
                    <td>{!! $expenditures->expenseType->expense_name !!}</td>
                    <td>{!! $expenditures->description !!}</td>
                    <td>{!! $expenditures->amount !!}</td>
                    <td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                {!! Form::open(['route' => ['expenditures.destroy', $expenditures->id], 'method' => 'delete']) !!}
    
                                <a href="{!! route('expenditures.show',[$expenditures->id] ) !!}" class="dropdown-item">
                                    <i class="fa fa-eye"></i></a>
                                <a href="{!! route('expenditures.edit', [$expenditures->id]) !!}" class="dropdown-item">
                                    <i class="fa fa-edit"></i></a>
                                {!! Form::button(' <i class="fa fa-times" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'dropdown-item', 'onclick' => "return confirm('Are you sure?')"]) !!} {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
    
            </tbody>
            <tr>
    
                <td colspan="3">
                    <p class="text-right"> Total </p>
                </td>
                <td> {{ $sum }} </td>
            </tr>
        </table>
    
    </div>