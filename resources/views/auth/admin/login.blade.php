<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Laravel | Ecommerce</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('public/backend_assets/vendor/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/backend_assets/vendor/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('public/backend_assets/vendor/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('public/backend_assets/style.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="{{asset('public/css/jquery.dataTables.css')}}">

  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('public/frontend_assets/images/logo/logo.png')}}" />
</head>
<body style="background-color: #1f2529;">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          @include('frontend.partial.messages')

          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <!-- <input type="text" class="form-control" placeholder="Username"> -->
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="custom-control custom-checkbox mb-2">
                  <input class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label custom-control-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Login') }}
                  </button>
                </div>
              </form>
            </div>

            <p class="footer-text text-center">copyright © 2018 BOOKSTOR. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- <div class="container mt-4">
  <div class="row d-flex justify-content-center">
  <div class="col-md-8">
  <div class="card">
  <div class="card-header">{{ __('Login') }}</div>
  @include('frontend.partial.messages')

  <div class="card-body">
  <form method="POST" action="{{ route('admin.login.submit') }}">
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
</div> -->

</body>
</html>
