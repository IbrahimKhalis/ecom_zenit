@extends('layout/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/order-review.css')}}">
@endsection

@section('content')

<div class="content">
    <div class="content-review">
        <div class="card-review">
            <form action="{{ url('/add-rating')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="header-card">
                    <i class="fas fa-store    "></i>
                    <p>{{ $seller->name }}</p>
                </div>
                <div class="row-product-review">
                    <div class="left-rev">
                        <div class="img-rev">
                            <img src="{{ $product->gallery->first()->getUrl() }}" alt="">
                        </div>
                        <div class="desc-rev">
                            <div class="name-rev">
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class="title-rev">
                                <p>What is overall quality of this product?</p>
                            </div>
                            <div class="star-widget">
                                <input type="radio" name="product_rating" id="rate-5" value="5">
                                <label for="rate-5" class="fas fa-star"></label>
                                <input type="radio" name="product_rating" id="rate-4" value="4">
                                <label for="rate-4" class="fas fa-star"></label>
                                <input type="radio" name="product_rating" id="rate-3" value="3">
                                <label for="rate-3" class="fas fa-star"></label>
                                <input type="radio" name="product_rating" id="rate-2" value="2">
                                <label for="rate-2" class="fas fa-star"></label>
                                <input type="radio" name="product_rating" id="rate-1" value="1">
                                <label for="rate-1" class="fas fa-star"></label>
                            </div>
                        </div>
                    </div>
                    <div class="right-rev">
                        <label for="user">Show this review as..</label>
                        <select name="name" id="user">
                            <option value="{{ Auth()->user()->name }}" checked>{{ Auth()->user()->name }}</option>
                            <option value="anonymous"> Anonymous</option>
                        </select>
                    </div>
                </div>
                <div class="row-comment">
                    <div class="comment-rev">
                        <textarea name="comment" cols="167" rows="4" placeholder="Give us your honest review"></textarea>
                    </div>
                </div>
                <div class="btn-submit">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script src="{{ asset('assets/js/cartmodal.js')}}"></script>

@endsection
