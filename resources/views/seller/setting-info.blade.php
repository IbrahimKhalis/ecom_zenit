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

          <img src="{{ $shop->gallery->first()->getUrl() }}" alt="">
          <div class="details">
              <p>{{ $shop->name }}</p>
              <div class="desc">

                  <p>{{ $shop->desc }}</p>
              </div>
              <a href="{{ route('edit-info') }}">
                  <button>Edit</button>
            </a>
          </div>

      </div>
  </div>
</div>


@endsection