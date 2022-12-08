@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/detail.css')}}">
@endsection

@section('content')
<div class="container">
  <div class="content">
    <div class="product">
      <div class="main-product">
        <img src="{{ $product->gallery->first()->getUrl() }}" alt="" id="main-product" onclick="prev(this)">
      </div>
      <div class="other-product">
        @foreach($product->gallery as $img)
        <div class="prev">
          <img src="{{ $img->getUrl() }}" alt="">
        </div>
        @endforeach
      </div>
    </div>
    <div class="description">
      <div class="name-product-main">
        <p>{{ $product->name }}</p>
      </div>
      <div id="rate">
        <div class="d-flex align-items-center">
          @if ($ratings->count() >= 1)
          <div class="ratings">
            <i class="fa fa-star @if($avgsell >= 1) rating-color @endif"></i>
            <i class=" fa fa-star @if($avgsell >= 2) rating-color @endif"></i>
            <i class="fa fa-star @if($avgsell >= 3) rating-color @endif"></i>
            <i class="fa fa-star @if($avgsell >= 4) rating-color @endif"></i>
            <i class="fa fa-star @if($avgsell >= 5) rating-color @endif"></i>
          </div>
          @endif
          <h5 class="review-count">({{ $product->quantity }} product)</h5>
        </div>
      </div>
      <div class="main-price">
        <p>Rp {{ number_format($product->price,0,',','.') }}</p>
      </div>
      <div class="info-product">
        <p>{{ $product->desc }}</p>
      </div>
      @if(Auth::check())
      @if(auth()->user()->id == $product->users_id)
      <div class="btn-product">
        <div>
          <a class="btn-cart" href="{{ route('seller.product.edit', $product->id) }}"><i class="fa-solid fa-pen"></i>Edit</a>
          @if(session()->has('message'))
          <p>{{ session()->get('message') }}</p>
          @endif
        </div>
      </div>
      @else
      <div class="btn-product">
        <a href="checkout-delivery.html"><button class="btn-buy"><i class="fa-solid fa-bag-shopping"></i>Buy
            Now</button></a>
        <div>
          <a class="btn-cart" href="{{ url('cart', $product->id) }}"><i class="fa-solid fa-cart-shopping"></i>Add to cart</a>
          @if(session()->has('message'))
          <p>{{ session()->get('message') }}</p>
          @endif
        </div>
      </div>
      @endif
      @else
      <div class="btn-product">
        <a href="checkout-delivery.html"><button class="btn-buy"><i class="fa-solid fa-bag-shopping"></i>Buy
            Now</button></a>
        <div>
          <a class="btn-cart" href="{{ url('cart', $product->id) }}"><i class="fa-solid fa-cart-shopping"></i>Add to cart</a>
          @if(session()->has('message'))
          <p>{{ session()->get('message') }}</p>
          @endif
        </div>
      </div>
      @endif
      <div class="profile">
        <div class="left-profile">
          <div class="profile-img">
            <img src="{{ $seller->gallery->first()->getUrl() }}" alt="">
          </div>
          <div class="profile-name">
            <div class="name">
              <p>{{ $seller->name }}</p>
            </div>
            <div class="count-product">
              <p>{{ $product->quantity }} Product</p>
            </div>
          </div>  
        </div>
        <div class="other">
          <a href="{{ route('shop.show.profile', $seller->slug) }}">Visit Shop <i class="fa-solid fa-shop"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="review">
    <div class="review-rate">
      <div class="title-reviews">
        <p>Customer Reviews</p>
      </div>
      <div class="title-rate">
        <p>{{ $avg }}</p>
        <div id="rate">
          <div class="d-flex align-items-center">
            <div class="ratings">
              <i class="fa fa-star rating-color"></i>
            </div>
            <h5 class="review-count">( {{ $ratings->count() }} Reviews )</h5>
          </div>
        </div>
      </div>
      <div class="review-rating">
        <div class="five-rate">
          <div class="icon-star">
            <i class="fa fa-star rating-color"></i>
          </div>
          <div class="title-star">
            <p>5</p>
          </div>
          <div class="progress">
            <progress id="progress5" class="progress-bar"
              value="{{ $star5 }}" max="{{ $ratings->count() }}"></progress>
          </div>
        </div>
        <div class="four-rate">
          <div class="icon-star">
            <i class="fa fa-star rating-color"></i>
          </div>
          <div class="title-star">
            <p>4</p>
          </div>
          <div class="progress">
            <progress id="progress4" class="progress-bar"
              value="{{ $star4 }}" max="{{ $ratings->count() }}"></progress>
          </div>
        </div>
        <div class="three-rate">
          <div class="icon-star">
            <i class="fa fa-star rating-color"></i>
          </div>
          <div class="title-star">
            <p>3</p>
          </div>
          <div class="progress">
            <progress id="progress3" class="progress-bar" role="progressbar" 
              value="{{ $star3 }}" max="{{ $ratings->count() }}"></progress>
          </div>
        </div>
        <div class="two-rate">
          <div class="icon-star">
            <i class="fa fa-star rating-color"></i>
          </div>
          <div class="title-star">
            <p>2</p>
          </div>
          <div class="progress">
            <progress id="progress2" class="progress-bar" role="progressbar" 
              value="{{ $star2 }}" max="{{ $ratings->count() }}"></progress>
          </div>
        </div>
        <div class="one-rate">
          <div class="icon-star">
            <i class="fa fa-star rating-color"></i>
          </div>
          <div class="title-star">
            <p>1</p>
          </div>
          <div class="progress">
            <progress id="progress1" class="progress-bar" role="progressbar" 
                value="{{ $star1 }}" max="{{ $ratings->count() }}"></progress>
          </div>
        </div>
      </div>
    </div>
    <div class="other-comment">
      <div class="btn-see-more">
        @if ($ratings->count() >= 1)
        <button id="btn-review" onClick="Open_click(this.id)">See More...</button>
        @endif
      </div>
      <div class="btn-more"></div>
      @foreach ($ratings->take(5) as $rating)
      <div class="comment">
        <div class="comment-user">
          <div class="profile-comment">
            <div class="profile-comment-img">
              <img src="{{ $rating->name != 'anonymous' ? $rating->user->profile->gallery->first()->getUrl() : asset('assets/img/user.png') }}" alt="">
            </div>
            <div class="profile-comment-name">
              <div class="name-comment">
                <p>{{ $rating->name }}</p>
              </div>
              <div id="rate">
                <div class="d-flex align-items-center">
                  <div class="ratings">
                    <i class="fa fa-star  @if($rating->stars_rated >= 1 ) rating-color @endif"></i>
                    <i class=" fa fa-star @if($rating->stars_rated >= 2 ) rating-color @endif"></i>
                    <i class="fa fa-star @if($rating->stars_rated >= 3 ) rating-color @endif"></i>
                    <i class="fa fa-star @if($rating->stars_rated >= 4 ) rating-color @endif"></i>
                    <i class="fa fa-star @if($rating->stars_rated >= 5 ) rating-color @endif"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-comment">
            <p>{{ $rating->comment }}</p>
          </div>
        </div>
      </div>          
      @endforeach
    </div>
  </div>
  <div class="related" data-aos="fade-up">
    <div class="related-title">
      <div class="related-text">
        <p>Related Product</p>
      </div>
      <div class="see-more">
        <a href="#">See More...</a>
      </div>
    </div>
    <div class="related-product">
      @foreach($related_products as $related_product)
      <div class="card-product">
        <div class="img-card">
          <img src="{{ $related_product->gallery->first()->getUrl() }}" alt="">
        </div>
        <div class="desc-product">
          <div class="category-product">
            <p>{{ $related_product->major }}</p>
          </div>
          <div class="name-product">
            <a href="{{ route('product.show', $related_product->slug) }}">{{ $related_product->name }}</a>
          </div>
          <div class="row-price">
            <div class="price">
              <p>Rp {{ number_format($related_product->price,0,',','.') }}</p>
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

<!-- end content -->

<!-- modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="header">
      <span class="close">&times;</span>
      <p>{{ $product->name }}</p>
    </div>
    <div class="product">
      <div class="main-modal">
        <!-- <div class="modal-prev">
          <button><i class="fa-solid fa-caret-left"></i></button>
        </div> -->
        <div class="modal-product">
          <img src="" alt="" id="main-modal">
        </div>
        <!-- <div class="modal-next"> 
          <button><i class="fa-solid fa-caret-right"></i></button>
        </div> -->
      </div>
      <div class="other-modal">
      </div>
    </div>
  </div>
</div>
<!-- end modal -->
<!-- modal -->
<div id="myRev" class="modalreview">
  <div class="modalreview-content">
    <div class="header">
      <span class="close close-rev">&times;</span>
    </div>
    <p class="cust-rev">Customer Review</p>
    <div class="review-modal scrollbar" id="style-3">
      <div class="comment force-overflow">
        @foreach ($ratings as $rating)
        <div class="comment-modal">
          <div class="profile-comment">
            <div class="profile-comment-img">
              <img src="{{ $rating->name != 'anonymous' ? $rating->user->profile->gallery->first()->getUrl() : asset('assets/img/user.png') }}" alt="">
            </div>
            <div class="profile-comment-name">
              <div class="name-comment">
                <p>{{ $rating->name }}</p>
              </div>
              <div id="rate">
                <div class="d-flex align-items-center">
                  <div class="ratings">
                    <i class="fa fa-star  @if($rating->stars_rated >= 1 ) rating-color @endif"></i>
                    <i class=" fa fa-star @if($rating->stars_rated >= 2 ) rating-color @endif"></i>
                    <i class="fa fa-star @if($rating->stars_rated >= 3 ) rating-color @endif"></i>
                    <i class="fa fa-star @if($rating->stars_rated >= 4 ) rating-color @endif"></i>
                    <i class="fa fa-star @if($rating->stars_rated >= 5 ) rating-color @endif"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-comment">
            <p>{{ $rating->comment }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('assets/js/detail.js')}}"></script>

@endsection
