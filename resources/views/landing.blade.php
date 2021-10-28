@extends('layouts.app')
@section('title')
    Account
@endsection
@section('content')
    <div class="card">
        <div class="card-header" style="padding-top: 20px;padding-bottom: 20px;">
            <div class="row text-center">
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn active" href="{{route('landing')}}">Account</a>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn" href="{{route('profile')}}">Profile</a>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn" href="{{route('contact')}}">Contact</a>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn" href="{{route('document')}}">Document</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('account.update')}}" method="POST">
                @csrf
                <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                        <label for="country">Select Country</label>
                        <select  id="country" name="country" class="form-control select2bs4 @error('country') is-invalid @enderror"  style="width: 100%;">
                            {!! getCountryDropdown($user->country ? :'GH') !!}
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
                            <input value="{{$user->business_name}}" id="business_name" name="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" placeholder="Enter Business Name">
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
                            <input value="{{$user->first_name}}" id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name">
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
                            <input value="{{$user->last_name}}" id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name">
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
                            <input value="{{$user->email}}" id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email Address">
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
                            <input value="{{$user->phone}}" id="phone" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone Number">
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
                            <input  id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" >
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
                                <input {{$user->registered_business == 'Yes' ? 'checked':''}} class="custom-control-input" type="radio" id="customRadio1" value="Yes" name="registered_business">
                                <label for="customRadio1" class="custom-control-label">Yes, I am</label>
                            </div>
                            <div class="custom-control custom-radio d-inline">
                                <input {{$user->registered_business == 'No' ? 'checked':''}} class="custom-control-input" type="radio" id="customRadio2" value="No" name="registered_business">
                                <label for="customRadio2" class="custom-control-label">No, I am Not</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group" style="margin-top: 32px;">
                        <div class="input-group d-block">
                            <div class="text-center">
                                <button class="btn btn-block btn-success btn-color">
                                    <i class="fas fa-save mr-2"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection
@push('css')
@endpush
@push('js')
    <script>
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endpush
