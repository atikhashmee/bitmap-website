<table class="table table-bordered" id="productCategories-table">
    <thead>
        <tr>
            <th>Cat Name</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productCategories as $productCategory)
        <tr>
            <td>{!! $productCategory->cat_name !!}</td>
            <td>{!! $productCategory->description !!}</td>
            <td>
                {!! Form::open(['route' => ['productCategories.destroy', $productCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productCategories.show', [$productCategory->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a>
                    <a href="{!! route('productCategories.edit', [$productCategory->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>