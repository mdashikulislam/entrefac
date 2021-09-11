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
                            <label for="email">
                                General Email
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->email}}" id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror">
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
                            <label for="phone">
                                Phone
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->phone}}" id="phone" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="website">
                                Website
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->website}}" id="website" name="website" type="text" class="form-control @error('website') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-globe"></span>
                                    </div>
                                </div>
                                @error('website')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="twitter">
                                Twitter
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->twitter}}" id="twitter" name="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fab fa-twitter"></span>
                                    </div>
                                </div>
                                @error('twitter')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="facebook">
                                Facebook
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->facebook}}" id="facebook" name="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fab fa-facebook-f"></span>
                                    </div>
                                </div>
                                @error('facebook')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="instagram">
                                Instagram
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->instagram}}" id="instagram" name="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fab fa-instagram"></span>
                                    </div>
                                </div>
                                @error('instagram')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="country">Select Country</label>
                            <select  id="country" name="country" class="form-control select2bs4 @error('country') is-invalid @enderror"  style="width: 100%;">
                                {!! getCountryDropdown(@$contact->country ? :'GH') !!}
                            </select>
                            @error('country')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="description">
                                Description
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->description}}" id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-sticky-note"></span>
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
                            <label for="state">
                                State
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->state}}" id="state" name="state" type="text" class="form-control @error('state') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marker"></span>
                                    </div>
                                </div>
                                @error('state')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="city">
                                City
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->city}}" id="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marker"></span>
                                    </div>
                                </div>
                                @error('city')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="street">
                                Street
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->street}}" id="street" name="street" type="text" class="form-control @error('street') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marker"></span>
                                    </div>
                                </div>
                                @error('street')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="apartment">
                                Apartment
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->apartment}}" id="apartment" name="apartment" type="text" class="form-control @error('apartment') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marker"></span>
                                    </div>
                                </div>
                                @error('apartment')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="support">
                                Support
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->support}}" id="support" name="support" type="text" class="form-control @error('support') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('support')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="dispute">
                                Dispute
                            </label>
                            <div class="input-group mb-3">
                                <input value="{{@$contact->dispute}}" id="dispute" name="dispute" type="text" class="form-control @error('dispute') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-undo-alt"></span>
                                    </div>
                                </div>
                                @error('dispute')
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
@push('js')
    <script>
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endpush
