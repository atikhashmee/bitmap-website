<table class="table table-bordered" id="productsLists-table">
    <thead>
        <tr>
            <th>Category</th>
            <th>Product Name</th>
        
        <th>Unit Id</th>
        <th>Price</th>
       
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productsLists as $productsLists)
        <tr>
            <td>{!! $productsLists->productcategory->cat_name !!}</td>
            <td>{!! $productsLists->product_name !!}</td>
          
            <td>{!! $productsLists->units->unit_name !!}</td>
            <td>{!! $productsLists->price !!}</td>
           
            <td>
                {!! Form::open(['route' => ['productsLists.destroy', $productsLists->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productsLists.show', [$productsLists->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a>
                    <a href="{!! route('productsLists.edit', [$productsLists->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>