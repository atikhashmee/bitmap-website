

<ul class="list-group list-group-flush website-control-menu">
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/Accounts') ? 'active' : '' }} app-panel" href="{{ url('Admin/Accounts/') }}">Overview   <p class="float-right"> <span class="badge badge-warning">{{$global}}</span>  </p>  </a>
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/Accounts/expenseTypes*') ? 'active' : '' }}" href="{!! route('expenseTypes.index') !!}">Expense Types</a>
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/Accounts/treasures*') ? 'active' : '' }}" href="{!! route('treasures.index') !!}">Treasures</a>
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/Accounts/expenditures*') ? 'active' : '' }}" href="{!! route('expenditures.index') !!}">Expenditures</a>
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/Accounts/saleryKeys*') ? 'active' : '' }}" href="{!! route('saleryKeys.index') !!}">Salery Keys</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/Accounts/employee_salery*') ? 'active' : '' }}"  href="{{ url('Admin/Accounts/employee_salery') }}">Salery</a>
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/Accounts/incomes*') ? 'active' : '' }} " href="{!! route('incomes.index') !!}">Incomes</a>
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/Accounts/employeeLoans*') ? 'active' : '' }} " href="{!! route('employeeLoans.index') !!}">Employee Loans</a>
</ul>














<li class="{{ Request::is('accountCategories*') ? 'active' : '' }}">
    <a href="{!! route('accountCategories.index') !!}"><i class="fa fa-edit"></i><span>Account Categories</span></a>
</li>

<li class="{{ Request::is('deposites*') ? 'active' : '' }}">
    <a href="{!! route('deposites.index') !!}"><i class="fa fa-edit"></i><span>Deposites</span></a>
</li>


<li class="{{ Request::is('accountExpenses*') ? 'active' : '' }}">
    <a href="{!! route('accountExpenses.index') !!}"><i class="fa fa-edit"></i><span>Account Expenses</span></a>
</li>

