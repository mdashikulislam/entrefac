@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="card">
        <div class="card-header" style="padding-top: 20px;padding-bottom: 20px;">
            <div class="row text-center">
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn " href="{{route('landing')}}">Account</a>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn active" href="{{route('profile')}}">Profile</a>
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
            <form action="{{route('profile')}}" method="POST">
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
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="description">
                                Description
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$profile->description}}" id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-briefcase"></span>
                                    </div>
                                </div>
                                @error('description')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="stuff_size">Staff Size</label>
                            <select  id="stuff_size" name="stuff_size" class="form-control select2bs4 @error('stuff_size') is-invalid @enderror"  style="width: 100%;">
                                <option value="">Select Stuff Size</option>
                                <option {{@$profile->stuff_size =='1-5 people' ? 'selected' : ''}} value="1-5 people">1-5 people</option>
                                <option {{@$profile->stuff_size =='1-10 people' ? 'selected' : ''}} value="1-10 people">1-10 people</option>
                                <option {{@$profile->stuff_size =='1-20 people' ? 'selected' : ''}} value="1-20 people">1-20 people</option>
                                <option {{@$profile->stuff_size =='1-50 people' ? 'selected' : ''}} value="1-50 people">1-50 people</option>
                                <option {{@$profile->stuff_size =='1-100 people' ? 'selected' : ''}} value="1-100 people">1-100 people</option>
                            </select>
                            @error('stuff_size')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="industry">Industry</label>
                            <select  id="industry" name="industry" class="form-control select2bs4 @error('industry') is-invalid @enderror"  style="width: 100%;">
                                <option value="">Select Industry</option>
                                <option {{@$profile->industry =='Commerce' ? 'selected' : ''}} value="Commerce">Commerce</option>
                                <option {{@$profile->industry =='Commerce12' ? 'selected' : ''}} value="Commerce12">Commerce12</option>
                            </select>
                            @error('industry')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select  id="category" name="category" class="form-control select2bs4 @error('category') is-invalid @enderror"  style="width: 100%;">
                                <option value="">Select Category</option>
                                <option {{@$profile->category =='Professional Services' ? 'selected' : ''}} value="Professional Services">Professional Services</option>
                                <option {{@$profile->category =='Commerce12' ? 'selected' : ''}} value="Commerce12">Commerce12</option>
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="business_type">Business Type</label>
                            <select  id="business_type" name="business_type" class="form-control select2bs4 @error('business_type') is-invalid @enderror"  style="width: 100%;">
                                <option  value="">Select Business Type</option>
                                <option {{@$profile->business_type =='Registered Business' ? 'selected' : ''}} value="Registered Business">Registered Business</option>
                            </select>
                            @error('business_type')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="legal_business_name">
                                Legal Business Name
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$profile->legal_business_name}}" id="legal_business_name" name="legal_business_name" type="text" class="form-control @error('legal_business_name') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-briefcase"></span>
                                    </div>
                                </div>
                                @error('legal_business_name')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="registration_type">Registration Type </label>
                            <select  id="registration_type" name="registration_type" class="form-control select2bs4 @error('registration_type') is-invalid @enderror"  style="width: 100%;">
                                <option value="">Select Registration Type</option>
                                <option {{@$profile->registration_type =='Registered Business' ? 'selected' : ''}} value="Registered Business">Registered Business</option>
                            </select>
                            @error('registration_type')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
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

