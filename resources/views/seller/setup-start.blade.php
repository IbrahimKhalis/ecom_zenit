@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/setup-start.css')}}">
@endsection

@section('content')
<div class="contents">
    <div class="img">
        <img src="{{ asset('assets/img/logo-setup-store.png') }}" alt="">
    </div>
    <h5>Welcome to Zenit Store</h5>
    <p>To start selling, register as a seller by completing <br>
         the necessary information.</p>
        <a href="{{ route('seller.setup.create') }}">Start Registration</a>
</div>
@endsection