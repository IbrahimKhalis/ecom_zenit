@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/setup-shop.css')}}">
@endsection

@section('content')
<div class="content">
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
    <form action="#">
      <div class="store-name">
        <h1 class="judul-store">Store Name</h1>
        <input type="text" class="input-name" id="store-name">
      </div>
      <div class="store-desc">
        <h1 class="judul-store">Description</h1>
        <textarea class="input-desc" id="store-desc" cols="30" rows="10"></textarea>
      </div>
      <div class="store-number">
        <h1 class="judul-store">Phone Number</h1>
        <input type="tel" class="input-number" id="store-number">
      </div>
      <div class="store-email">
        <h1 class="judul-store">Email</h1>
        <input type="email" class="input-email" id="store-email">
      </div>
      <a href="toko-setup-personal.html" class="submit-link"><button type="submit"
          class="submit-button">Next</button></a>
    </form>

  </div>
@endsection