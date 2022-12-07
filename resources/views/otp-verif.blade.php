@extends('layout/main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/otp-verif.css')}}">
@endsection

@section('content')
<div class="otp-content">
    <div class="row-1">
        <h3>OTP Verification</h3>
        <p>Setting > OTP Verification</p>
    </div>
    <div class="bg2">
        <div class="contents">
            <div class="head-content">
                <p>OTP</p>
                <p>We’ve sended verification code to your email, please check and write OTP here</p>
            </div>
            <div class="body-content">
                <input type="text" placeholder="OTP Code">
                <button>Confirm</button>
            </div>
        </div>
    </div>
</div>
@endsection