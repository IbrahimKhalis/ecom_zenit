@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/complete-order.css')}}">
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <div class="sub-content">
        <a href="{{ route('seller.upcoming') }}">Upcoming Orders</a>
        <a href="{{ route('seller.process') }}">Processed Orders</a>
        <a href="{{ route('seller.completed') }}">Completed Orders</a>
        <a href="{{ route('seller.canceled') }}">Canceled Orders</a>
    </div>

    <div class="content-tabs">
        <table border="1px solid black">
            <tr>
                <th style="width: 70px;">No</th>
                <th style="text-align: start;">Product</th>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th style="width: 100px;">Quantity</th>
                <th>Type</th>
                <th></th>
            </tr>
        @foreach ($complete as $item)
            <tr>
                <td  style="width: 100px;">{{ $loop->iteration }}</td>
                <td style="display: flex; gap:20px; text-align: start; width: 250px;">
                    <img src="{{ $item->products->gallery->first()->getUrl() }}" alt="">
                    <div class="prod-details" style="line-height: 14px;">
                        <p>{{ $item->product_name }}</p>
                        <p>{{ $item->created_at }}</p>
                        <p>Rp.{{ $item->subtotal }}</p>
                    </div>
                </td>
                <td style="width: 110px;">{{ $item->orders->invoice_no }}</td>
                <td style="width: 250px;">{{ $item->orders->users->name }}</td>
                <td style="width: 120px;">{{ $item->product_qty }}</td>
                <td style="width: 100px;"><p id="label-order"  style="margin-top: 10px;">{{ $item->products->category->name }}</p></td>
                <td style="width: 100px;">
                    <button  onclick="On_klik(this.id)" id="refund" style="font-weight:600;" >Refund</button>
                </td>
            </tr>
        @endforeach 
        </table>
    </div>
</div>
</div>
<div id="myForm" class="modalform">
    <div class="modalform-content">
        <div class="header">
            <span class="close close-form">&times;</span>
        </div>
        <div class="reciep-content">
            <div class="form-profile">
                <img src="assets/ALM00016.JPG" alt="">
                <p>Username kiagus ahmad farhan azis</p>
            </div>
            <div class="form-ratings">
                <p>Rating</p>
                <div class="star-widget">
                    <input type="radio" name="rate" id="rate-5">
                    <label for="rate-5" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-4">
                    <label for="rate-4" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-3">
                    <label for="rate-3" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-2">
                    <label for="rate-2" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-1">
                    <label for="rate-1" class="fas fa-star"></label>
                </div>
            </div>
            <div class="form-review">
                <p>Review</p>
                <textarea name="" id="" cols="83" rows="7"></textarea>
            </div>
            <div class="btn-form">
                <button>submit</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/form-review.js')}}"></script>

@endsection