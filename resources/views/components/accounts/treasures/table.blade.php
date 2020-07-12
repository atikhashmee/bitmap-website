



<div class="table-responsive">
        <table class="table align-items-center table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Account Name</th>
                <th scope="col">Account Type</th>
                <th scope="col">Account Balance</th>
                <th scope="col">Accoutn Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
                @foreach($treasures as $treasures)
                <tr>
                        <td>{!! $treasures->account_name !!}</td>
            
            <td>{!! $treasures->account_type !!}</td>
            <td>{!! $treasures->opening_balance !!}</td>
            <td>
                @if ( $treasures->accoutn_status == '0' )
                      <div class="btn btn-success btn-sm">Active</div>
                @else
                <div class="btn btn-danger btn-sm">Deactive</div>
                @endif
              
            </td>
                   
                     
                    <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        {!! Form::open(['route' =>  ['treasures.destroy', $treasures->id], 'method' => 'delete']) !!}
                                        
                                            <a href="{!! route('treasures.show', [$treasures->id]) !!}" class="dropdown-item" >
                                            <i class="fa fa-eye"></i></a>
                                            <a href="{!! route('treasures.edit', [$treasures->id]) !!}" class="dropdown-item" >
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