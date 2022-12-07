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
         <p>
          Complete this step, to complete your profile account, which will make it easier to make orders later
         </p>
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
                  <div class="phone">
                    <label for="phone">Phone Number</label>
                      <input type="number" name="" id="phone">
                  </div>
                  <div>
                    <div class="Picture">
                        <label for="you">Picture</label>
                        <div class="input-file"></div>
                    </div>
                    <div class="address">
                      <label for="address">Address</label>
                      <textarea name="" id="" cols="35" rows="5"></textarea>
                    </div>

                  </div>
                  <div class="last-row">
                    <p>I have to read 
                      <a href=""> Privacy and Policy</a>
                      </p>
                    <button type="submit">Get Started</button>
                  </div>
            </div>
        </form>
    </div>
</div>
@endsection
