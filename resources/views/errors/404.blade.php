@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code')
<img  src="{{ asset('assets/img/404.png')}}" alt="">
@endsection

@section('message')
<p class="not-found">Page Not Found</p>
<p class="message">Hi, you find this page has nothing to see, go to homepage and find some product!!</p>
<a href="{{ url('/') }}"><button>Back To Home Page</button></a>
@endsection