@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/setup-store-personal.css')}}">
@endsection

@section('content')
<div class="content">
  <!-- BreadCrumb -->
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
  <!-- End BreadCrumb -->
  <form action="#">
    <div class="ig-toko">
      <h1 class="judul-ig">Instagram</h1>
      <input type="url" name="ig-toko" id="ig-toko" class="input-ig">
    </div>
    <div class="linkedin-toko">
      <h1 class="judul-linkedin">Linkedin</h1>
      <input type="url" name="linkedin-toko" id="linkedin-toko" class="input-linkedin">
    </div>
    <div class="foto-toko">
      <h1 class="judul-foto-toko">Store Photo</h1>
      <input type="file" name="foto-toko" id="foto-toko" class="input-foto-toko">
    </div>
    <div class="button-grup d-flex">
      <a href="toko-setup-personal.html" class="submit-link"><button type="submit"
          class="back-button">Back</button></a>
      <a href="toko-setup-personal.html" class="submit-link"><button type="submit"
          class="next-button">Next</button></a>
    </div>
  </form>

</div>
@endsection