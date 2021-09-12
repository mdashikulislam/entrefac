@extends('layouts.app')
@section('title')
    {{$user->first_name.' '.$user->last_name.' - Profile'}}
@endsection
@section('content')
    <div class="card p-4">
        <div class="row item">
            <div class="col-md-12 col-lg-12 col-12">
                <div class="segment">
                    <h4>Profile</h4>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-12">
                        <ul>
                            <li>TRADING NAME:<span>{{@$user->profile->trading_name}}</span></li>
                            <li>INDUSTRY:<span>{{@$user->profile->industry}}</span></li>
                            <li>BUSINESS TYPE:<span>{{@$user->profile->business_type}}</span></li>
                            <li>REGISTRATION TYPE:<span>{{@$user->profile->registration_type}}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                        <ul>
                            <li>STAFF SIZE:<span>{{@$user->profile->stuff_size}}</span></li>
                            <li>CATEGORY:<span>{{@$user->profile->category}}</span></li>
                            <li>LEGAL BUSINESS NAME:<span>{{@$user->profile->legal_business_name}}</span></li>
                            <li>DESCRIPTION:<span>{{@$user->profile->description}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-12">
                <div class="segment">
                    <h4>CONTACT</h4>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-12">
                        <ul>
                            <li>GENERAL EMAIL:<span>{{@$user->contact->email}}</span></li>
                            <li>WEBSITE:<span>{{@$user->contact->website}}</span></li>
                            <li>FACEBOOK:<span>{{@$user->contact->facebook}}</span></li>
                            <li>COUNTRY:<span>{{@$user->contact->country ? getCountryNameByCode(@$user->contact->country):''}}</span></li>
                            <li>STATE / REGION:<span>{{@$user->contact->state}}</span></li>
                            <li>STREET ADDRESS:<span>{{@$user->contact->street}}</span></li>
                            <li>SUPPORT:<span>{{@$user->contact->support}}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                        <ul>
                            <li>PHONE NUMBER:<span>{{@$user->contact->phone}}</span></li>
                            <li>TWITTER:<span>{{@$user->contact->twitter}}</span></li>
                            <li>INSTAGRAM:<span>{{@$user->contact->instagram}}</span></li>
                            <li>DESCRIPTION:<span>{{@$user->contact->description}}</span></li>
                            <li>CITY:<span>{{@$user->contact->city}}</span></li>
                            <li>APARTMENT HOUSE:<span>{{@$user->contact->apartment}}</span></li>
                            <li>DISPUTE:<span>{{@$user->contact->dispute}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-12">
                <div class="segment">
                    <h4>Account</h4>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-12">
                        <ul>
                            <li>COUNTRY:<span>{{getCountryNameByCode(@$user->country)}}</span></li>
                            <li>FIRST NAME:<span>{{@$user->first_name}}</span></li>
                            <li>EMAIL ADDRESS:<span>{{@$user->email}}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                        <ul>
                            <li>BUSINESS NAME:<span>{{@$user->business_name}}</span></li>
                            <li>LAST NAME:<span>{{@$user->last_name}}</span></li>
                            <li>PHONE NUMBER:<span>{{@$user->phone}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-12">
                <div class="segment">
                    <h4>Documents</h4>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-12">
                        <ul>
                            <li>BUSINESS PLAN:
                                <span>
                                    @if(@$user->document->business_plan)
                                        <a target="_blank" href="{{asset('storage/'.$user->document->business_plan)}}">View Document</a>
                                    @endif
                                </span>
                            </li>
                            <li>FORM-3:
                                <span>@if(@$user->document->form_3)
                                        <a target="_blank" href="{{asset('storage/'.$user->document->form_3)}}">View Document</a>
                                    @endif
                                </span>
                            </li>
                            <li>OTHERS:
                                <span>
                                    @if(@$user->document->others)
                                        <a target="_blank" href="{{asset('storage/'.$user->document->others)}}">View Document</a>
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                        <ul>
                            <li>C-IN-C:
                                <span>
                                    @if(@$user->document->certificate_of_in_corporation)
                                        <a target="_blank" href="{{asset('storage/'.$user->document->certificate_of_in_corporation)}}">View Document</a>
                                    @endif
                                </span>
                            </li>
                            <li>TIN:
                                <span>
                                    @if(@$user->document->tin)
                                        <a target="_blank" href="{{asset('storage/'.$user->document->tin)}}">View Document</a>
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .segment h4{
            padding: 20px;
            background: #ededed;
            font-weight: bold;
        }
        .item ul{
            padding-left: 20px;
        }
        .item ul li{
            list-style: none;
            font-weight: bold;
        }
        .item ul li span{
            margin-left: 10px;
            font-weight: 500;
        }
    </style>
@endpush
