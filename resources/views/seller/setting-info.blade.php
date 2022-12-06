@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/setting-info.css')}}">
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <div class="sub-content">
        <a href="{{ route('setting-info') }}">Information</a>
        <a href="{{ route('edit-info') }}">Edit Information</a>
        <a href="{{ route('setting-scedhule') }}">Scedhule</a>
    </div>

    <div class="content-setting">
      <div class="about-header">
          <iconify-icon icon="ic:round-store" style="font-size: 35px;"></iconify-icon>
          <h5>About The Store</h5>
      </div>
      <div class="content-about">

          <img src="https://i.pinimg.com/originals/4b/94/68/4b94680222487b212836a9e2e5e3a541.jpg" alt="">
          <div class="details">
              <p>Agus Gaming</p>
              <div class="desc">

                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente adipisci dignissimos
                      veniam quidem assumenda officia cum ullam eligendi? Excepturi commodi veritatis suscipit
                      doloremque voluptate alias quos. Praesentium deserunt maxime totam!</p>
              </div>
                  <button>Edit</button>
          </div>

      </div>
  </div>
</div>


@endsection