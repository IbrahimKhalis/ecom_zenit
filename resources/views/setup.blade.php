@extends('layout/main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/setup.css')}}">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
<div class="main-content">
  <div class="sidebar">
    <div class="logo">
        <img src="{{ asset('assets/img/logo.png')}}" alt="">
        <p>Set Up Profile</p>
    </div>
    <div class="breadcrumbs">
        <div class="one">
            <iconify-icon icon="mdi:number-one-circle-outline" style="font-size: 35px;"></iconify-icon>
            <p>About You</p>
        </div>
        <div class="two">
            <iconify-icon icon="mdi:number-two-circle-outline"  style="font-size: 35px;"></iconify-icon>
            <p>Personal Details</p>
        </div>
    </div>
    <div class="dekor">
        <img src="{{asset('assets/img/setup.png')}}" alt="">
    </div>
  </div>
  <div class="contents">
      <form action="">
        <div class="form-1">
          <div class="title">
            <h1>A bit About You</h1>
            <h2>Share some personal information about you</h2>  
          </div>
          <div class="name">
            <div class="firstname">
              <label for="firstname">First Name</label>
              <input type="text" name="" id="firstname">
            </div>
            <div class="lastname">
              <label for="lastname">Last Name</label>
              <input type="text" name="" id="lastname">
            </div>
          </div>
          <div class="Picture">
            <label for="you">Picture</label>
            <div class="input-file"></div>
          </div>
         </div>
    </form>
  </div>
</div>
@endsection