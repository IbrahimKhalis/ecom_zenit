@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/fav.css')}}">
@endsection

@section('content')

<div class="container" id="container">
  <div class="your-fav">
    <iconify-icon icon="mdi:cards-heart" class="heart"></iconify-icon>
    <h3>Your Favorite</h3>
    <p>({{ $favorCount }})</p>
  </div>

  <div class="content">
    <div class="card-row">
      <!-- left card -->
      @foreach($favor as $favorite)

      <div class="card">
        <div class="header-card">
          <img src="{{ $favorite->product->users->shop->gallery->first()->getUrl() }}" alt="">
          <p>{{ $favorite->product->users->shop->name }}</p>
        </div>
        <!-- start content -->
        <div class="content-card">
          <div class="left-row">
              <img src="{{ $favorite->product->gallery->first()->getUrl() }}" alt="">
          <div class="details">
            <p class="category">{{ $favorite->product->major }}</p>
            <p class="product-name">{{ $favorite->product->name }}</p>
            <p class="type">{{ $favorite->product->category->name }}</p>
          </div>
          </div>
        
          <div class="right-row">
            <p>RP. {{ number_format($favorite->product->price,0,',','.') }}</p>
            <div class="last-row">
              <button>Buy Now</button>
              <button onclick="trash('{{ url('favorite/del', $favorite->id) }}')"><iconify-icon class="trash" icon="fe:trash"></iconify-icon></button>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
  <div class="btn-paginate">
    {{ $favor->links() }}
</div>

</div>
<script src="{{ asset('assets/js/fav.js') }}"></script>

@endsection
