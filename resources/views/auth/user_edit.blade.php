
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('Admin/update_user/'.$user_info->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-alternative" name="name" 
                                value="{{ $user_info->name }}" 
                                required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-alternative" name="email"
                                 value="{{ $user_info->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          

                          <input id="dbpassword" class="form-control" type="hidden" value="{{ $user_info->password }}" />


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-alternative" 
                                name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control form-control-alternative" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Select a Role</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="dbrole" value="{{ $user_info->role }}">
                                    <select id="role" name="role" class="custom-select form-control-alternative edit-user-select">
                                        <option value="">Select a role</option>
                                        <option value="0">Admin</option>
                                        <option value="1">Accounts</option>
                                        <option value="2">Project Maneger</option>
                                        <option value="3">Editor</option>
                                    </select>
                                    @if ($errors->has('role'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info ">
                                    {{ __('Update') }} <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                </button>
                                <button type="reset" class="btn btn-danger ">
                                    {{ __('Reset') }}
                                </button>
                               <a href="{{ url('Admin/user_lists') }}" class="btn btn-success">
                                  <i class="fa fa-arrow-left" aria-hidden="true"></i>  {{ __('Back') }}
                                </a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>



@endsection

@section('scripts')
  

 <script>
      (function(){
               
             var eles = document.getElementsByClassName('edit-user-select')[0].options;
      })();
 </script>
    
@endsection
