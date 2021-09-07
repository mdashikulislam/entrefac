<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ENTREFAC</title>

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
    <style>
        .invalid-feedback{
            display: block;
        }
    </style>
</head>
<body class="hold-transition register-page">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12   col-lg-12 col-12">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="index2.html" class="h1">ENTREFAC <span style="font-size: 18px;display: block">C O N S U L T L T D</span></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Register a new membership</p>
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="country">Select Country</label>
                                    <select  id="country" name="country" class="form-control select2bs4 @error('country') is-invalid @enderror"  style="width: 100%;">
                                        {!! getCountryDropdown(old('country') ? :'GH') !!}
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="business_name">Business Name</label>
                                    <div class="input-group mb-3">
                                        <input id="business_name" name="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" placeholder="Enter Business Name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-briefcase"></span>
                                            </div>
                                        </div>
                                        @error('business_name')
                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <div class="input-group mb-3">
                                        <input id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <div class="input-group mb-3">
                                        <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <div class="input-group mb-3">
                                        <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email Address">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <div class="input-group mb-3">
                                        <input id="phone" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone Number">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-mobile"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <div class="input-group mb-3">
                                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 mt-1">
                                <div class="form-group">
                                    <label for="">{{ __(' Have you registered your business? ') }}</label>
                                    <div>
                                        <div class="custom-control custom-radio d-inline mr-2">
                                            <input checked class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                                            <label for="customRadio1" class="custom-control-label">Yes, I am</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline">
                                            <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                                            <label for="customRadio1" class="custom-control-label">No, I am Not</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group" style="margin-top: 32px;">
                                    <div class="input-group d-block">
                                        <div class="text-center">
                                            <button class="btn btn-block btn-success">
                                                <i class="fas fa-user-plus mr-2"></i>
                                                Sign Up
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
