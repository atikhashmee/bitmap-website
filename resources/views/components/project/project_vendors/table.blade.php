<table class="table table-bordered" id="projectVendors-table">
    <thead>
        <tr>
           
        <th>Vendor Name</th>
        
        <th>Budget</th>
        <th>Payment Type</th>
        <th>Extra Requirement</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($projectVendors as $projectVendor)
        <tr>
           
            <td>{!! $projectVendor->vendors->vendor_name !!}</td>
            
            <td>{!! $projectVendor->budget !!}</td>
            <td>{!! $projectVendor->payment_type !!}</td>
            <td>{!! $projectVendor->extra_requirement !!}</td>
            <td>
                {!! Form::open(['route' => ['projectVendors.destroy',request()->route('project_id'),request()->route('task_id'), $projectVendor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('projectVendors.show', [request()->route('project_id'),request()->route('task_id'),$projectVendor->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a>
                    <a href="{!! route('projectVendors.edit', [request()->route('project_id'),request()->route('task_id'),$projectVendor->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>