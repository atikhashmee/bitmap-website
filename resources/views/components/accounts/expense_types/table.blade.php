


<div class="table-responsive">
        <table class="table align-items-center table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Expense Name</th>
                <th scope="col">Description</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
                @foreach($expenseTypes as $expenseType)
                <tr>
                        <td>{!! $expenseType->expense_name !!}</td>
                        <td>{!! $expenseType->description !!}</td>
                   
                     
                    <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        {!! Form::open(['route' =>  ['expenseTypes.destroy', $expenseType->id], 'method' => 'delete']) !!}
                                        
                                            <a href="{!! route('expenseTypes.show', [$expenseType->id]) !!}" class="dropdown-item" >
                                            <i class="fa fa-eye"></i></a>
                                            <a href="{!! route('expenseTypes.edit', [$expenseType->id]) !!}" class="dropdown-item" >
                                            <i class="fa fa-edit"></i></a>
                                            {!! Form::button(' <i class="fa fa-times" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'dropdown-item', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        
                                        {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                </tr>
            @endforeach
           
        </tbody>
    </table>
    
    </div>