<ul class="list-group list-group-flush website-control-menu">
        <a class="list-group-item list-group-item-action {{ Request::is('Admin/projects/'.$p_id.'') ? 'active' : '' }}" href="{!! route('projects.show', [$p_id]) !!}">Overview</a>
        <a class="list-group-item list-group-item-action {{ Request::is('Admin/projects/'.$p_id.'/projectTasks*') ? 'active' : '' }}" href="{!! route('projectTasks.index',$p_id) !!}" tabindex="-1">Project Tasks</a>
        <a class="list-group-item list-group-item-action {{ Request::is('Admin/projects/'.$p_id.'/projectExpenses*') ? 'active' : '' }}" href="{!! route('projectExpenses.index',$p_id) !!}" tabindex="-1">Expense</a>
        <a class="list-group-item list-group-item-action {{ Request::is('Admin/projects/'.$p_id.'/vendorPayments*') ? 'active' : '' }}" href="{!! route('vendorPayments.index',$p_id) !!}" tabindex="-1">Vendors payments</a>
        <a class="list-group-item list-group-item-action {{ Request::is('Admin/projects/'.$p_id.'/projectIncomes*') ? 'active' : '' }}" href="{!! route('projectIncomes.index',$p_id) !!}" tabindex="-1">Collections</a>
        <a class="list-group-item list-group-item-action {{ Request::is('Admin/projects/'.$p_id.'/projectGoods*') ? 'active' : '' }}" href="{!! route('projectGoods.index',$p_id) !!}" tabindex="-1">Project Goods Expense</a>
        <a class="list-group-item list-group-item-action {{ Request::is('Admin/projects/'.$p_id.'/projectLoands*') ? 'active' : '' }}" href="{!! route('projectLoands.index',$p_id) !!}" tabindex="-1">Manage loans</a>
    </ul>













