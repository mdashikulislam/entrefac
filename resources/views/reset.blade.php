<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Reset Password') }} | ENTRAFAC  CONSULTLTD</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <style>
        .invalid-feedback{
            display: block;
        }
    </style>
</head>
<body class="hold-transition login-page">

<!-- /.login-logo -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 col-12 mt-5">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1">ENTRAFAC  <span style="font-size: 18px;display: block">C O N S U L T L T D</span></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">{{ __('Reset Password') }}</p>
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="input-group mb-3">
                            <input value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus name="email" type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input required autocomplete="new-password" placeholder="{{ __('Password') }}" name="password" type="password" class="form-control @error('password') is-invalid @enderror" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}" id="password-confirm"  name="password_confirmation" type="password" class="form-control" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="social-auth-links text-center mt-2 mb-3">
                            <button type="submit" class="btn btn-block btn-primary">
                                <i class="fas fa-unlock-alt mr-2"></i> {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
@include('sweetalert::alert')
