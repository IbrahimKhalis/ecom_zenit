@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/profile-edit.css')}}">
@endsection

@section('content')
@include('components.sidebar')
  
<div class="contents">
  <div class="sub-content">
    <a href="{{ url('profile-seller') }}">My Profile</a>
    <a href="{{ route('profile-edit1') }}">Edit Profile</a> 
  </div>

  <div class="row-1">
      <div class="left">
          <img src="{{ Auth::check() ? auth()->user()->profile->gallery->first()->getUrl() : asset('assets/img/user.png') }}" alt="">
          <button id="btn-prof">Edit Profile</button>
      </div>
      <div class="right">
          <p>#{{ Auth()->user()->id }}</p>
          <h1>{{ Auth()->user()->name }}</h1>
          <textarea name="" id="" cols="90" rows="5">{{ Auth()->user()->profile->descript }}</textarea>
          <p></p>
      </div>
  </div>

  <div class="row-2">
      <table>
          <tr>
              <td>First Name</td>
              <td><input type="text" value="{{ Auth()->user()->profile->firstname }}"></td>
          </tr>
          <tr>
              <td>Last Name</td>
              <td><input type="text" value="{{ Auth()->user()->profile->lastname }}"></td>
          </tr>
          <tr>
              <td>Email</td>
              <td><input type="email" value="{{ Auth()->user()->email }}"> </td>
          </tr>
          <tr>
              <td>Phone Number</td>
              <td><input type="number" value="{{ Auth()->user()->profile->phoneNumber }}"></td>
          </tr>
          <tr>
              <td>Address</td>
              <td><textarea name="" id="" cols="65" rows="5">{{ Auth()->user()->profile->Address }}</textarea></td>
          </tr>
      </table>
      <div class="btn-submit">
        <button>Save</button>
      </div>
  </div>
</div>

<div id="myProfile" class="modalProfile">
    <div class="modalprofile-content">
        <div class="header">
            <span class="close close-prof">&times;</span>
        </div>
        <div class="profile-content">
            <div class="Profile-pict">
                <p class="cust-prof">Profile Pict</p>
            <label id="largeFile" for="file">
                <input type="file" id="file" />
            </label>
            </div>
            <div class="btn-Profile">
                <button>submit</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/uploadimg.js')}}"></script>
@endsection