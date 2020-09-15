

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    <title>Bitmap - Login panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
  
    <div class="container-fluid" class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%">
                <div style="width: 30%; margin: 0 auto">
                  <img src=" {{ asset('siteasset/img/templogo-black.png') }}" style=" width: 85px;height: 45px;"  alt="logo">
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
                </div>
                  
    </div>
<!-- Login 3 end -->
<!-- External JS libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Custom JS Script -->
</body>
</html>



