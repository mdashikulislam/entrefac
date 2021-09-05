<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="container">
    <div class="row">
        <div class="col-md-12   col-lg-12 col-12">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="index2.html" class="h1"><b>Admin</b>LTE</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Register a new membership</p>
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="country">Select Country</label>
                                    <select id="country" name="country" class="form-control select2bs4" style="width: 100%;">
                                        {!! getCountryDropdown('GH') !!}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="business_name">Business Name</label>
                                    <div class="input-group mb-3">
                                        <input id="business_name" name="business_name" type="text" class="form-control" placeholder="Enter Business Name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-briefcase"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <div class="input-group mb-3">
                                        <input id="first_name" name="first_name" type="text" class="form-control" placeholder="Enter First Name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <div class="input-group mb-3">
                                        <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Enter Last Name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <div class="input-group mb-3">
                                        <input id="email" name="email" type="text" class="form-control" placeholder="Enter Email Address">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <div class="input-group mb-3">
                                        <input id="phone" name="phone" type="text" class="form-control" placeholder="Enter Phone Number">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-mobile"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <div class="input-group mb-3">
                                        <input id="password" name="password" type="password" class="form-control" >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <div class="input-group mb-3">
                                        <input id="password-confirm" name="password_confirmation" type="password" class="form-control" >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group" style="margin-top: 32px;">
                                    <div class="input-group d-block">
                                        <div class="text-center">
                                            <button class="btn btn-block btn-success">
                                                <i class="fab fa-google-plus mr-2"></i>
                                                Sign up using Google+
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
</body>
</html>
