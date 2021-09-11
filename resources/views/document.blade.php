@extends('layouts.app')
@section('title')
    Document
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
                    <a class="btn btn-success custom-btn " href="{{route('contact')}}">Contact</a>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <a class="btn btn-success custom-btn active" href="{{route('document')}}">Document</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('document')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="business_plan">
                                Business Plan
                            </label>
                            <div class="input-group mb-3">
                                <input style="height: auto" id="business_plan" name="business_plan" type="file" class="form-control @error('business_plan') is-invalid @enderror">
                                @error('business_plan')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="certificate_of_in_corporation">
                                Certificate Of In Corporation
                            </label>
                            <div class="input-group mb-3">
                                <input style="height: auto" id="certificate_of_in_corporation" name="certificate_of_in_corporation" type="file" class="form-control @error('certificate_of_in_corporation') is-invalid @enderror">
                                @error('certificate_of_in_corporation')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="form_3">
                                Form 3
                            </label>
                            <div class="input-group mb-3">
                                <input style="height: auto" id="form_3" name="form_3" type="file" class="form-control @error('form_3') is-invalid @enderror">
                                @error('form_3')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="tin">
                                Tax identification Number(TIN)
                            </label>
                            <div class="input-group mb-3">
                                <input style="height: auto" id="tin" name="tin" type="file" class="form-control @error('tin') is-invalid @enderror">
                                @error('tin')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="others">
                                Others
                            </label>
                            <div class="input-group mb-3">
                                <input style="height: auto" id="others" name="others" type="file" class="form-control @error('others') is-invalid @enderror">
                                @error('others')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
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
