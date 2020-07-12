<table class="table table-bordered" id="projectGoods-table">
    <thead>
        <tr>
            
        <th>Date</th>
        <th>Goods Name</th>
        <th>Quantity</th>
        <th>Price</th>
        
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($projectGoods as $projectGoods)
        <tr>
           
            <td>{!! $projectGoods->date !!}</td>
            <td>{!! $projectGoods->goods_name !!}</td>
            <td>{!! $projectGoods->quantity !!}</td>
            <td>{!! $projectGoods->price !!}</td>
           
            <td>
                {!! Form::open(['route' => ['projectGoods.destroy', request()->route('project_id'), $projectGoods->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('projectGoods.show', [ request()->route('project_id') , $projectGoods->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a>
                    <a href="{!! route('projectGoods.edit', [ request()->route('project_id') , $projectGoods->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>