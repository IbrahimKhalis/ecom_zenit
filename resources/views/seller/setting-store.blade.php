@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/setting-edit.css')}}">
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <div class="sub-content">
        <a href="{{ route('setting-info') }}">Information</a>
        <a href="{{ route('edit-info') }}">Edit Information</a>
        <a href="{{ route('setting-scedhule') }}">Scedhule</a>
    </div>
    
    <div class="card-store">
      <div class="header-cards">
        <i class="fa-solid fa-store"></i>
        <p>Store Information</p>
      </div>
      <div class="card-content">
        <div class="row1">
          <div class="col1">
            <div class="store-name">
              <label for="name">Store Name</label>
              <input type="text" name="name" id="name" value="Agus Mart">
            </div>
            <div class="desc">
              <label for="desc">Description</label>
              <textarea name="" id="" cols="30" rows="6"></textarea>
            </div>    
          </div>
          <div class="col2">
            <div class="store-profile">
              <p>Store Profile</p>
              <div class="input-file"></div>
            </div>
          </div>
        </div>
        <div class="row2">
          <p>Social Media Stores</p>
          <div class="content-row2">
            <div class="col1">
              <div class="instagram">
                <label for="ig"><iconify-icon icon="mdi:instagram"></iconify-icon> Instagram</label>
                <input type="text" name="ig" id="ig">
              </div>  
              <div class="gmail">
                <label for="gmail"><img src="{{ asset('assets/img/gmail.png') }}" alt=""> Gmail</label>
                <input type="text" name="ig" id="ig">
              </div>  
            </div>
            <div class="col2">
              <div class="linkedin">
                <label for="ig"><img src="{{ asset('assets/img/linkedin.png') }}" alt=""> linkedin</label>
                <input type="text" name="ig" id="ig">
              </div>  
            </div>
  
          </div>
        </div>
      </div>
    </div>
 
</div>


@endsection