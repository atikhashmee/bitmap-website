

<ul class="list-group list-group-flush website-control-menu">
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/products') ? 'active' : '' }} app-panel" href="{{ url('Admin/products/') }}">Overview   <p class="float-right"> <span class="badge badge-warning">{{$global}}</span>  </p>  </a>
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/products/productUnits*') ? 'active' : '' }}" href="{!! route('productUnits.index') !!}">Product Units</a>
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/products/productCategories*') ? 'active' : '' }}" href="{!! route('productCategories.index') !!}">Product Categories</a>
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/products/productsLists*') ? 'active' : '' }}" href="{!! route('productsLists.index') !!}">Products Lists</a>
</ul>





