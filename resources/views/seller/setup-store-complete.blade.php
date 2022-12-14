@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/setup-store-complete.css')}}">
@endsection

@section('content')
<div class="content">
  <!-- Breadcrumb -->
  <div class="breadcrumb d-flex">
      <div class="breadcrumb1 d-flex">
          <div class="bulet1"></div>
          <div class="text-bulet1">Information Store</div>
          <div class="garis1"></div>
          <div class="garis2"></div>
          <div class="garis3"></div>
          <div class="garis4"></div>
      </div>
      <div class="breadcrumb2 d-flex">
          <div class="bulet2"></div>
          <div class="text-bulet2">Personal Detail</div>
          <div class="garis1"></div>
          <div class="garis2"></div>
          <div class="garis3"></div>
          <div class="garis4"></div>
      </div>
      <div class="breadcrumb3 d-flex">
          <div class="bulet3"></div>
          <div class="text-bulet3">Complete</div>
      </div>
  </div>
  <div class="garis-batas"></div>
  <!-- end Breadcrumb -->

  <!-- lottie -->
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_rc5d0f61.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px; margin: auto; margin-top: 20px;"    autoplay></lottie-player>
  <!-- end Lottie -->
  <h1 class="judul-setup-complete">Setup Store Success</h1>
  <h2 class="subjudul-setup-complete">Now you can continue adding your first product!</h2>
  <a href="" class="link-button-complete"><button class="button-setup-complete">Add Product</button></a>

@endsection