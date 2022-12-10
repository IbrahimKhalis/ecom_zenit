@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/shop.css')}}">
@endsection

@section('content')


<div class="content">
  <div class="card-profile">
    <div class="img-profile">
      <img src="{{ $shop->gallery->first()->getUrl() }}" alt="" id="img-profile">
    </div>
    <div class="desc-shop">
      <div class="name-shop">
        <p>{{ $shop->name }}</p>
      </div>
      <div class="name-seller">
        <p>seller Name : {{ $sellerdata->name }}</p>
      </div>
      <div class="description" style="overflow-x: hidden;">
        <p>{{ $shop->desc }}</p>
      </div>
      <div class="total-product">
        <p>Total Product</p>
        <p>{{ $products->count() }}</p>
      </div>
     
      <div class="sosmed">
        @if ($shop->gmail>=1)
        <div class="email">
          <iconify-icon icon="ic:outline-email" style="font-size: 25px;"></iconify-icon>
          <p>{{ $shop->gmail }}</p>
        </div>
          @endif
        <div class="row-2">
          @if ($shop->instagram>=1)
          <div class="instagram">
            <iconify-icon icon="mdi:instagram"style="font-size: 25px;"></iconify-icon>
            <p>{{ $shop->instagram }}</p>
          </div>
          @endif
          @if ($shop->linkedIn>=1)
          <div class="linkedin">
            <iconify-icon icon="uil:linkedin"style="font-size: 25px;"></iconify-icon>
            <p>{{ $shop->linkedIn }}</p>
          </div>
          @endif
        </div>
        @if ($shop->portofolio>=1)
        <a href="{{ asset($shop->portofolio) }}" target="_blank">
        <button class="portfol">
          <iconify-icon icon="gridicons:pages">
          </iconify-icon>Portofolio/cv
        </button>
      </a> 
          @endif
      </div>
    </div>
    <div class="seller-since">
      <p>Seller since {{ $shop->created_at }}</p>
    </div>
  </div>
  <div class="content-product">
    <div class="header-product">
      <div class="filter-dropdown">
        <label for="filter"><i class="fa fa-bars" aria-hidden="true"></i></label>
        <select name="filter" id="filter" class="option-filter">
          <option value="popular">Popular</option>
        </select>
      </div>
    </div>
    <div class="product-product">
      @foreach($products as $product)
      <div class="card-product">
        <div class="img-card">
          <img src="{{ $product->gallery->first()->getUrl() }}" alt="" id="img-prod">
        </div>
        <div class="desc-product">
          <div class="category-product">
            <p id="ctgry">{{ $product->major }}</p>
          </div>
          <div class="name-product">
            <p id="name-prod">{{ $product->name }}</p>
          </div>
          <div class="row-price">
            <div class="price">
              <p id="prc-prod">Rp {{ number_format($product->price,0,',','.') }}</p>
            </div>
            @if(Auth::check())
                <div class="other-btn">
                  <div class="btn-detail">
                    <button class="modal__button" id="open-modal" onClick="Open_click('{{ $product->gallery->first()->getUrl() }}', '{{ $product->major }}', '{{ $product->name }}', '{{ $product->price }}', '{{ url('/cart/modal', $product->id) }}')"><i class="fa-solid fa-cart-shopping"></i></button>
                    <button class="modal__button" id="open-modal" onClick="Open_click('{{ $product->gallery->first()->getUrl() }}', '{{ $product->major }}', '{{ $product->name }}', '{{ $product->price }}', '{{ url('/favorite/add', $product->id) }}')">
                      @if(in_array($product->id, $favorites))
                      <i class="fa-solid fa-heart"></i>
                      @else
                      <i class="fa-regular fa-heart"></i>
                      @endif
                    </button>
                  </div>
                </div>
            @endif
          </div>
        </div>
      </div>
      @endforeach


    </div>
  </div>
</div>

@endsection
