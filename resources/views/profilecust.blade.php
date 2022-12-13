@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/profile-cust.css')}}">
@endsection

@section('content')

    <div class="profile-content">
        <div class="row-1">
            <div class="left">
             <img src="{{ auth()->user()->profile->gallery->first()->getUrl() }}"alt="">
                <div class="detail">

                    <h1>{{ auth()->user()->name }}</h1>
                    <h6>#{{ auth()->user()->id }}</h6>
                    <p>{{ auth()->user()->profile->desk }}</p>
                </div>
            </div>
            <div class="right">
                <a href="{{ route('editprofile.cust')}}">Edit Profile</a>
            </div>
        </div>
        <div class="row-2">
            <img src="{{ asset('assets/img/biaaan.jpg')}}" alt="">
            <div class="datas">
                <div class="first-name">
                    <p>First Name</p>
                    <p>{{ auth()->user()->profile->firstname }}</p>
                </div>
                <div class="last-name">
                    <p>Last Name</p>
                    <p>{{ auth()->user()->profile->lastname }}</p>
                </div>
                <div class="email">
                    <p>Email</p>
                    <p>{{ auth()->user()->email }}</p>
                </div>
                <div class="phone">
                    <p>Phone Number</p>
                    <p>{{ auth()->user()->profile->phoneNumber }}</p>
                </div>
                <div class="address">
                    <p>Address</p>
                    <p>{{ auth()->user()->profile->Address }}</p>
                </div>
            </div>
            <img src="{{ asset('assets/img/tigaaan.jpg')}}" alt="">
        </div>
    </div>
@endsection
