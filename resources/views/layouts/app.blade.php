<!doctype html>
<html lang="en">
  <head>
    <title>Studio Bitmap</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('drift/css/style.css') }}">
    @yield('styles')
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand logo-container" href="{{url('/Admin')}}">
      Studio Bitmap
        {{-- <img src="{{ asset('siteasset/img/templogo-black.png') }}" alt=""> --}}
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdownId">
            <a class="dropdown-item" href="#">Action 1</a>
            <a class="dropdown-item" href="#">Action 2</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>


  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
          <aside>
            <!-- Nav tabs -->
            <ul class="list-group">
              <li class="list-group-item">
                  <div class="left-side-avater-section">
                    <div class="left-avater">
                      <img src="{{asset('img/avater.png')}}" class="img-circle" alt="">
                    </div>
                  <h3>Mr. {{ ucfirst(auth()->user()->name)}}</h3>
                    <h6>Software Engineer</h6>
                  </div>
              </li>
              <li class="list-group-item">
                <a href="javascript:void(0)" title="Dashboard">
                  <i class="icon icon-dashboard icon-fw icon-lg"></i> <span class="dt-side-nav__text">Dashboard</span> </a>
              </li>
              <li class="list-group-item">
                <a href="{{ url('Admin/Website') }}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
                  <span class="dt-side-nav__text">Website Management</span> </a>
              </li>
        
              <li class="list-group-item">
                <a href="{{ url('Admin/Accounts/accountCategories') }}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
                  <span class="dt-side-nav__text">Categories</span> </a>
              </li>
        
              <li class="list-group-item">
                <a href="{{ url('Admin/Accounts/deposites') }}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
                  <span class="dt-side-nav__text">Deposit</span> </a>
              </li>
        
              <li class="list-group-item">
                <a href="{{ url('Admin/Accounts/accountExpenses') }}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
                  <span class="dt-side-nav__text">Expense</span> </a>
              </li>
        
              <li class="list-group-item">
                <a href="{!! route('projects.index') !!}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
                  <span class="dt-side-nav__text">Projects</span> </a>
              </li>
        
              <li class="list-group-item">
                <a href="{!! route('vendorTypes.index') !!}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
                  <span class="dt-side-nav__text">Vendors</span> </a>
              </li> 
               <li class="list-group-item">
                <a href="{{ url('Admin/Team/ourMember') }}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
                  <span class="dt-side-nav__text">Teams</span> </a>
              </li>
            </ul>
          </aside>
      </div>
      <div class="col-9">
          @yield('content')
      </div>
    </div>
  </div>
 
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script>
       function toggleForm()
        {
            $('.form-container').toggle(300, 'slow');
        }
    </script>
    @yield('page_js')

  </body>
</html>











{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Drift - A fully responsive, HTML5 based admin template">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, jQuery, web design, CSS3, sass">
<!-- /meta tags -->
<title>Studio- Bitmap</title>

<link rel="shortcut icon" href=" {{ asset('drift/images/favicon.ico') }}" type="image/x-icon">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

  @yield('styles')
</head>
<body class="dt-sidebar--fixed dt-header--fixed">
<div class="dt-root">
    <div class="dt-root__inner">
        <!-- Header -->
<header class="dt-header">

  <!-- Header container -->
  <div class="dt-header__container">

    <!-- Brand -->
    <div class="dt-brand">

      <!-- Brand tool -->
      <div class="dt-brand__tool" data-toggle="main-sidebar">
        <div class="hamburger-inner"></div>
      </div>
      <!-- /brand tool -->

      <!-- Brand logo -->
      <span class="dt-brand__logo">
        <a class="dt-brand__logo-link" href="{{ url('Admin/home') }}">
          <img class="dt-brand__logo-img d-none d-sm-inline-block" src=" {{ asset('siteasset/img/templogo-black.png') }}" alt="Drift">
          <img class="dt-brand__logo-symbol d-sm-none" src="{{ asset('siteasset/img/templogo-black.png') }}" alt="Drift">
        </a>
      </span>
      <!-- /brand logo -->

    </div>
    <!-- /brand -->

    <!-- Header toolbar-->
    <div class="dt-header__toolbar">
      <!-- Header Menu Wrapper -->
      <div class="dt-nav-wrapper">
        <!-- Header Menu -->
        <ul class="dt-nav d-lg-none">
          <li class="dt-nav__item dt-notification-search dropdown">

            <!-- Dropdown Link -->
            <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"> <i class="icon icon-search icon-fw icon-lg"></i> </a>
            <!-- /dropdown link -->

            <!-- Dropdown Option -->
            <div class="dropdown-menu">

              <!-- Search Box -->
              <form class="search-box right-side-icon">
                <input class="form-control form-control-lg" type="search" placeholder="Search in app...">
                <button type="submit" class="search-icon"><i class="icon icon-search icon-lg"></i></button>
              </form>
              <!-- /search box -->

            </div>
            <!-- /dropdown option -->

          </li>
        </ul>
        <!-- /header menu -->


        <!-- Header Menu -->
        <ul class="dt-nav">
          <li class="dt-nav__item dropdown">

            <!-- Dropdown Link -->
            <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="dt-avatar-info d-none d-sm-block">
                <span class="dt-avatar-name">Bob Hyden</span>
              
              </span>  <i class="fa fa-caret-down" aria-hidden="true"></i> </a>
            <!-- /dropdown link -->

            <!-- Dropdown Option -->
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dt-avatar-wrapper flex-nowrap p-6 mt--5 bg-gradient-purple text-white rounded-top">
                <span class="dt-avatar-info">
                  <span class="dt-avatar-name">Bob Hyden</span>
                  <span class="f-12">Administrator</span>
                </span>
              </div>
              <a class="dropdown-item" href="page-login.html"  onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i> <i class="icon icon-editors icon-fw mr-2 mr-sm-1"></i>Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
            <!-- /dropdown option -->

          </li>
        </ul>
        <!-- /header menu -->
      </div>
      <!-- Header Menu Wrapper -->

    </div>
    <!-- /header toolbar -->

  </div>
  <!-- /header container -->

</header>
<!-- /header -->
        <!-- Site Main -->
        <main class="dt-main">
            <!-- Sidebar -->
<aside id="main-sidebar" class="dt-sidebar">
  <div class="dt-sidebar__container">

    <!-- Sidebar Navigation -->
    <ul class="dt-side-nav">

      <!-- Menu Header -->
      <li class="dt-side-nav__item dt-side-nav__header">
        <span class="dt-side-nav__text">main</span>
      </li>
      <!-- /menu header -->

      <!-- Menu Item -->
      <li class="list-group-item">
        <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Dashboard">
          <i class="icon icon-dashboard icon-fw icon-lg"></i> <span class="dt-side-nav__text">Dashboard</span> </a>
      </li>
      <li class="dt-side-nav__item">
        <a href="{{ url('Admin/Website') }}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
          <span class="dt-side-nav__text">Website Management</span> </a>
      </li>

      <li class="dt-side-nav__item">
        <a href="{{ url('Admin/Accounts/accountCategories') }}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
          <span class="dt-side-nav__text">Categories</span> </a>
      </li>

      <li class="dt-side-nav__item">
        <a href="{{ url('Admin/Accounts/deposites') }}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
          <span class="dt-side-nav__text">Deposit</span> </a>
      </li>

      <li class="dt-side-nav__item">
        <a href="{{ url('Admin/Accounts/accountExpenses') }}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
          <span class="dt-side-nav__text">Expense</span> </a>
      </li>

      <li class="dt-side-nav__item">
        <a href="{!! route('projects.index') !!}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
          <span class="dt-side-nav__text">Projects</span> </a>
      </li>

      <li class="dt-side-nav__item">
        <a href="{!! route('vendorTypes.index') !!}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
          <span class="dt-side-nav__text">Vendors</span> </a>
      </li> 
       <li class="dt-side-nav__item">
        <a href="{{ url('Admin/Team/ourMember') }}" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
          <span class="dt-side-nav__text">Teams</span> </a>
      </li>

      <li class="dt-side-nav__item">
        <a href="widget.html" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-lg"></i>
          <span class="dt-side-nav__text">Widgets</span> </a>
      </li>
      <li class="dt-side-nav__item">
        <a href="metrics.html" class="dt-side-nav__link" title="Metrics"> <i class="icon icon-metrics icon-fw icon-lg"></i>
          <span class="dt-side-nav__text">Metrics</span> </a>
      </li>
      <li class="dt-side-nav__item">
        <a href="layouts.html" class="dt-side-nav__link" title="Layouts"> <i class="icon icon-layout icon-fw icon-lg"></i>
          <span class="dt-side-nav__text">Layouts</span> </a>
      </li>
      <!-- /menu item -->

  </div>
</aside>
<!-- /sidebar -->
            <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Dashboard - CRM</h1>
                    </div>
                    <!-- /page header -->
                    

                       @yield('content')
                   
                </div>
                <!-- /site content -->

                <!-- Footer -->
<footer class="dt-footer">
  Copyright Company Name © 2019
</footer>
<!-- /footer -->
            </div>
        </main>
    </div>
</div>
<!-- /root -->

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src=" {{ asset('js/jquery-ui.min.js') }}"></script>
</body>

</html> --}}