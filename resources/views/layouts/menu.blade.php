    <li class="nav-item ">
        <a class="nav-link active" href="{{ url("Admin/home") }}"> <i class="fa fa-home" aria-hidden="true"></i> Dashboard  </a>
    </li>

    <li>
        <a class="nav-link" href="{{ url("Admin/Website") }}" >Website Manage</a>
    </li>
    <li>
        <a class="nav-link" href="{{ url("Admin/Invoice/Create") }}" >Accessories</a>
    </li>

   




<li class="nav-link">
    <a href="#"><span>Accounts</span></a>
</li>



<li class="{{ Request::is('vendorTypes*') ? 'active' : '' }}">
    <a class="nav-link"  href="{!! route('vendorTypes.index') !!}"><span>Vendor Types</span></a>
</li>
<li class="nav-link{{ Request::is('vendors*') ? 'active' : '' }}">
        <a class="nav-link"  href="#"><span>Vendors</span></a>
</li>




