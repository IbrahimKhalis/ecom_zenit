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
  <form action="{{ route('seller.setup.social') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="ig-toko">
      <h1 class="judul-ig">Instagram</h1>
      <input type="text" name="instagram" id="ig-toko" class="input-ig">
    </div>
    <div class="linkedin-toko">
      <h1 class="judul-linkedin">Gmail</h1>
      <input type="text" name="gmail" id="linkedin-toko" class="input-linkedin">
    </div>  
    <div class="linkedin-toko">
      <h1 class="judul-linkedin">Linkedin</h1>
      <input type="text" name="linkedIn" id="linkedin-toko" class="input-linkedin">
    </div>
    <div class="linkedin-toko">
      <h1 class="judul-linkedin">Portofolio</h1>
      <input type="file" accept="application/pdf" name="portofolio" id="link" value="" class="form" style="border: none">
    </div>
    <div class="btn-next">
      <button type="submit" class="next-button">Save</button>
    </div>
  </form>

</div>


@endsection