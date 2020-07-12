

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 , shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    {{--  argon theme styles start  --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href=" {{ asset('/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href=" {{ asset('/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href=" {{ asset('/assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">

    {{--  argon theme styles end  --}}


    <!-- Scripts -->
   {{--   <script src="{{ asset('js/app.js') }}" defer></script>  --}}



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    {{-- summernote integration for rich text editor use --}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">


     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        {{-- summernote js file --}}
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
        {{-- end of summernote js --}}
           
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

        @yield('styles')

</head>
<body>

    <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark bg-dark" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{ url('/Admin/home') }}">
        <img src="{{ asset('siteasset/img/templogo.png') }}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src=" {{ asset('/assets/img/theme/team-1-800x800.jpg') }} ">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="{{ url('Admin/Profile') }}" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="#" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="#" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="#" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ url('/Admin/home') }}">
                <img src="{{ asset('siteasset/img/templogo-black.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/Admin/home') }}">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item {{ Request::is('Admin/Website*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url("Admin/Website") }}">
              <i class="ni ni-planet text-blue"></i> Website Management
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="./examples/maps.html">
              <i class="ni ni-pin-3 text-orange"></i> Maps
            </a>
          </li> --}}

          <li class="nav-item {{ Request::is('Admin/Invoice*') ? 'active' : '' }}">
            <a class="nav-link " href="{!! url ('Admin/Invoice/Create/') !!}">
              <i class="ni ni-single-02 text-yellow"></i> Invoices
            </a>
          </li>

          <li class="nav-item {{ Request::is('Admin/products*') ? 'active' : '' }}">
            <a class="nav-link " href="{!! url ('Admin/products/') !!}">
              <i class="ni ni-single-02 text-yellow"></i> Products
            </a>
          </li>

         {{--   <li class="nav-item {{ Request::is('vendors*') ? 'active' : '' }}">
            <a class="nav-link " href="{!! route('vendors.index') !!}">
              <i class="ni ni-single-02 text-yellow"></i> Vendors
            </a>
          </li>  --}}
          
          <li class="{{ Request::is('vendorTypes*') ? 'active' : '' }} nav-item">
              <a class="nav-link"  href="{!! route('vendorTypes.index') !!}">
                 <i class="ni ni-single-02 text-yellow"></i>Vendors
              </a>
          </li>
          <li class="nav-item {{ Request::is('Admin/Accounts*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('Admin/Accounts/') }}">
              <i class="ni ni-bullet-list-67 text-red"></i> Accounts
            </a>
          </li>
          <li class="nav-item {{ Request::is('Admin/projects*') ? 'active' : '' }}">
            <a class="nav-link " href="{!! route('projects.index') !!}">
              <i class="ni ni-key-25 text-info"></i> Project
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('Admin/user_lists') }}">
              <i class="ni ni-circle-08 text-pink"></i> users
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
       
      </div>
    </div>
  </nav>
  <!-- Main content -->

  <!-- Main content -->
  <div class="main-content">
      <!-- Top navbar -->
      <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
          <!-- Brand -->
          <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ url('/Admin/home') }}">Dashboard</a>
          <!-- Form -->
          <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
          </form>
          <!-- User -->
          <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src=" {{ asset('/assets/img/theme/team-4-800x800.jpg') }} ">
                  </span> 
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="{{ url('Admin/Profile') }}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
               
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="ni ni-user-run"></i>
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
              </div>
            </li>
          </ul>
        </div>
      </nav>
   
      <div class="header top-header bg-gradient-primary pb-8 pt-5 pt-md-8 ">
          <div class="container-fluid">
            <div class="header-body">
             
            </div>
          </div>
        </div>

      <div class="container-fluid mt-3">
          @yield('content')
          <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="https://www.studiobitmap.com" class="font-weight-bold ml-1" target="_blank">Bitmap</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
      </div>

  </div>



    
       {{--   <nav class="navbar navbar-expand-lg   navbar-light mynav-header">
            <div class="container-fluid" >
                      <div class="header-menu-container">
                          
                    
                 
                <a class="navbar-brand" href="{{ url('/Admin/') }}" style="color:white">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                       <li class="nav-item">
                           <a href="" class="nav-link">Dasboard</a>
                       </li>
                       
                    </ul>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                          <li class="nav-item">
                                <a class="nav-link" href="#">Sliders</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                   
            </div>

            </div>
        </nav>  --}}
         
         {{--   <div class="container-fluid main-container">
            <div class="row">
          @auth
             <div class="col-md-2 sidebar">
                 <div class="user-information-container">
                 <img src="https://picsum.photos/90/90" class="rounded user-imag" />
                 <div class="user-contents-info">
                     <h6> <a href="#"> Atik Bin Hashmee </a> </h6>
                     <p>--Software Engineer</p>
                      <small><strong>Last signed In</strong>: 10:20pm</small>
                 </div>
                 </div>
              <nav class="nav flex-column">

                  @include('layouts.menu')
                  @include('components/project/menu')
              </nav>
              </div>
             
          @endauth
         
        <div class="col-md-10 col-lg-10 col-xl-10">
        <main>
             <div class="message-container">
                          @if ($errors->any())
                            
                                        @foreach ($errors->all() as $error)
                                          
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  <span class="sr-only">Close</span>
                              </button>
                              <strong>Validation Error!</strong> {{ $error }}
                          </div>
                                        @endforeach
                                    
                            @endif
                   @if (session('status'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success !</strong> {{ session('status') }}.
                    </div>
                    @endif
                   @if (session('err'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Error !</strong>  {{ session('err') }}.
                    </div>
                    @endif
              </div>
            @yield('content')
        </main>
    </div>

         </div>
        </div>  --}}
       
      
        @yield('scripts')

        <script>

                 var loadFile = function(event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    };

                    function wordLimit(event){
                         let totalword = 7;
                         let headline = event.target.value;
                         var words = headline.split(" ");
                         let len = words.length;
                         totalword -= len;
                          $("#wordcounter").text("-"+totalword).css({
                              "color":"red",
                              "font-size":"16px"
                          });
                          if (totalword === 0) {
                              event.preventDefault();
                          }
                    }

                       $(".foldup").click(function(event){
                               $("#foldinup_"+event.target.id).slideToggle();
                        });

                         

                        
                         $('.letterbox').summernote();
                         var keywords = ['apple', 'orange', 'watermelon', 'lemon'];
                        $('.item-description').summernote({
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                    ],
                    hint: {
                        words: keywords,
                        match: /\b(\w{1,})$/,
                        search: function (keyword, callback) {
                        callback($.grep(this.words, function (item) {
                            return item.indexOf(keyword) === 0;
                        }));
                        }
                    }
                    });

                        //  enabling tooltip for the website
                         $(function () {
                            $('[data-toggle="tooltip"]').tooltip()
                            });
                            //end of tooltip enabling

                            // autocomplete

                             

                            
                              
                            $(document).ready( function () {
                              $('.datatable').DataTable({
                                paging: false
                              });
                          } ); 
                            

        </script>


        {{--  theme asset files start  --}}
        <!-- Core -->
        
        <script src=" {{ asset('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }} "></script>
        <!-- Optional JS -->
        <script src=" {{ asset('/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
        <script src=" {{ asset('/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
        <!-- Argon JS -->
        <script src=" {{ asset('/assets/js/argon.js?v=1.0.0') }}"></script>
        {{--  theme asset files end  --}}

        <script src="{{ asset('js/jquery-ui.min.js') }}" defer></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</body>
</html>
