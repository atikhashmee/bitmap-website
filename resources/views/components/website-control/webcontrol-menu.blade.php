
<div class="website-header-style">
    <h3>Menu bar</h3>
</div>

<ul class="list-group list-group-flush website-control-menu">
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/Website') ? 'active' : '' }}" href="{{ url('Admin/Website') }}">Dashboard</a>
    <a class="list-group-item list-group-item-action  {{ Request::is('Admin/homeSliders*') ? 'active' : '' }}" href="{{url('Admin/homeSliders')}}">Slider</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/Team/Category*') ? 'active' : '' }}" href="{{url('Admin/Team/Category/')}}">Team Category</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/Team/team_lists*') ? 'active' : '' }}" href="{{url('Admin/Team/team_lists/')}}">Teams</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/AboutUs*') ? 'active' : '' }}" href="{{url('Admin/AboutUs')}}">About Us</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/Services*') ? 'active' : '' }}" href="{{url('Admin/Services')}}">Services</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/Contact-page*') ? 'active' : '' }}" href="{{url('Admin/Contact-page')}}">Contact</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/Home-styles*') ? 'active' : '' }}" href="{{url('Admin/Home-styles')}}">Home Styles</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/Settings*') ? 'active' : '' }}" href="{{url('Admin/Settings')}}">Settings</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/Protfolio/Category*') ? 'active' : '' }}" href="{{ url("Admin/Protfolio/Category/") }}">Protfolio Category</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/Protfolio*') ? 'active' : '' }}" href="{{ url("Admin/Protfolio/") }}">Protfolio</a>
    <a class="list-group-item list-group-item-action {{ Request::is('Admin/Testimonials*') ? 'active' : '' }}" href="{{ url("Admin/Testimonials/") }}">Testimonial</a>
</ul>

