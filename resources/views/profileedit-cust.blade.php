@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/profileedit-cust.css')}}">
@endsection

@section('content')
<div class="content">
  <div class="pict">
<img src="{{ Auth::check() ? auth()->user()->profile->gallery->first()->getUrl() : asset('assets/img/user.png') }}" alt="">
<label for="photo">Change Photo</label>
<input type="file" name="photo" id="photo">
</div>

<div class="details">
<table>
    <tr>
        <td>Customer Id</td>
        <td>
            <input type="text" value="#{{ Auth()->user()->profile->user_id }}" disabled class="id">
        </td>
    </tr>
    <tr>
        <td>First Name</td>
        <td>
            <input type="text" value="{{ Auth()->user()->profile->firstname }}">
        </td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td>
            <input type="text" value="{{ Auth()->user()->profile->lastname }}">
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td>
            <input type="email" value="{{ Auth()->user()->email }}">
        </td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td>
            <input type="number" value="{{ Auth()->user()->profile->phoneNumber }}">
        </td>
    </tr>
    <tr>
        <td class="alamat">Address</td>
        <td>
            <textarea  name="" id="" cols="65" rows="5">{{ Auth()->user()->profile->Address }}</textarea>
        </td>
    </tr>
</table>
<div class="pass">
    <p>Password</p>
    <input type="password" value="{{ Auth()->user()->password }}"> 
    <p class="change-pass">Change Password</p>
</div>
<button>Save Changes</button>
</div>
</div>
@endsection
