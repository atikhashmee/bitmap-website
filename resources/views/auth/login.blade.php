

<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Google Tag Manager -->
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TAGCODE');
    </script>
    <!-- End Google Tag Manager -->
    <title>Bitmap - Login panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href=" {{  asset('asets/css/bootstrap.min.css') }}  ">
    <link type="text/css" rel="stylesheet" href=" {{ asset('asets/fonts/font-awesome/css/font-awesome.min.css') }}   ">
    <link type="text/css" rel="stylesheet" href=" {{ asset('asets/fonts/flaticon/font/flaticon.css') }} ">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('asets/img/favicon.ico') }}  " type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="  {{ asset('asets/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" id="style_sheet" href=" {{ asset('asets/css/skins/default.css') }} ">

</head>
<body id="top">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TAGCODE"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- Login 3 start -->
<div class="login-3 tab-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-pad-0 form-section">
                <div class="login-inner-form">
                    <div class="details">
                        <a href="#">
                            <img src=" {{ asset('siteasset/img/templogo-black.png') }}" style=" width: 85px;
    height: 45px;"  alt="logo">
                        </a>
                        <h3>Sign into your account</h3>
                        <form method="POST" action="{{ route('login') }}">
                           @csrf
                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" class="input-text {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address" required>
                            
                                 @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="input-text {{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox clearfix">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <a href="#">Forgot Password</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-md btn-theme btn-block">Login</button>
                            </div>
                           {{--   <p class="none-2">Don't have an account?<a href="register-3.html"> Register here</a></p>  --}}
                        </form>

                        <div style="width: 100%;
    height: 1px;
    background-color: #212529; margin-top:20px;" ></div>
                       
                               
                          
                                  

                                <div style="margin-top: 60px;" > 
                                <button type="submit" class="btn-md btn-theme facebook-color-btn btn-block"> <i class="fa fa-facebook"></i> Facebook</button>    
                                <button type="submit" class="btn-md btn-theme linkedin-color-btn  btn-block"> <i class="fa fa-linkedin"></i> LinkedIn </button>
                                <button type="submit" class="btn-md btn-theme twitter-color-btn btn-block"> <i class="fa fa-instagram"></i> Instagram </button>
                                </div>
                            
                         
                        
                            
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-pad-0 bg-img none-992">
                <div class="informeson">
                    <div class="btn-section">
                        <a href="#" class="active link-btn">Login</a>
                        <a href="register-3.html" class="link-btn">Register</a>
                    </div>
                    <h3>We make spectacular</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
                    <div class="social-box">
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-color"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-color"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-color"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-color"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 3 end -->

<!-- External JS libraries -->
<script src=" {{ asset('asets/js/jquery-2.2.0.min.js') }}  "></script>
<script src="{{ asset('asets/js/popper.min.js') }} "></script>
<script src=" {{ asset('asets/js/bootstrap.min.js') }} "></script>
<!-- Custom JS Script -->

</body>


</html>







{{--  
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Bitmap  - We design your dream</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <style>
        .navbar-brand img {
            height: 64px !important;
        }
  </style>
</head>

<body class="bg-default">
   <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="{{ url('Admin/login')}}">
          <img src="{{ asset('siteasset/img/templogo.png') }}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="../assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://www.studiobitmap.com">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Website</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://www.studiobitmap.com/webmail">
                <i class="fa fa-envelope"></i>
                <span class="nav-link-inner--text">Webmail</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Welcome To Studio Bitamp!</h1>
              <p class="text-lead text-light">
                 We create awesome design for you
                </p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
              </div>
              <form role="form"  method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                
                  <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                </div>
                <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
           
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5">
    <div class="container">
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
    </div>
  </footer>
 
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script src="../assets/js/argon.js?v=1.0.0"></script> 
  
</body>

</html>    --}}



{{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  --}}
