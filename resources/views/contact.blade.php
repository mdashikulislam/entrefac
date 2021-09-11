@extends('layouts.app')
@section('title')
    Contact
@endsection
@section('content')
    <div class="card">
        <div class="card-header" style="padding-top: 20px;padding-bottom: 20px;">
            <div class="row text-center">
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn " href="{{route('landing')}}">Account</a>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn " href="{{route('profile')}}">Profile</a>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn active" href="{{route('contact')}}">Contact</a>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn" href="{{route('document')}}">Document</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('contact')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="trading_name">
                                Trading Name
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$profile->trading_name}}" id="trading_name" name="trading_name" type="text" class="form-control @error('trading_name') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-briefcase"></span>
                                    </div>
                                </div>
                                @error('trading_name')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
