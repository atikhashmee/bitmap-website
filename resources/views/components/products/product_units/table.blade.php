<table class="table table-bordered" id="productUnits-table">
    <thead>
        <tr>
            <th>Unit Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productUnits as $productUnit)
        <tr>
            <td>{!! $productUnit->unit_name !!}</td>
            <td>
                {!! Form::open(['route' => ['productUnits.destroy', $productUnit->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productUnits.show', [$productUnit->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a>
                    <a href="{!! route('productUnits.edit', [$productUnit->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>