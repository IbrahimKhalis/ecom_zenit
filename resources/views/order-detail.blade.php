@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/order-detail.css')}}">
@endsection

@section('content')
<div class="content">
    <div class="header-detail">
      <div class="title-header">
        <p>Order Detail</p>
      </div>
      <div class="desc-header">
        <div class="row-top">
          <p>Order Id : {{ $order->id }}</p>
        </div>
        <div class="row-bottom">
          <div class="row1 d-flex gap-4">
            <div class="date">
              <p>Order date : <span>{{ $order->created_at->format('d F Y') }}</span></p>
            </div>
            <div class="status">
              <p><iconify-icon icon="fluent:payment-16-regular"></iconify-icon> {{ $order->transData->status }}</p>
            </div>
          </div>
          <div class="inv">
            <p>Invoive no : {{ $order->invoice_no }}</p>
          </div>
        </div>
      </div>
    </div>
    @foreach($order->orderItem as $item)
    <div class="content-order">
      <div class="card-product">
        <div class="right-detail">
          <div class="img-order">
            <img src="{{ $item->products->gallery->first()->getUrl() }}" alt="">
          </div>
          <div class="desc-order">
            <div class="name-detail">
              <p>{{ $item->product_name }}</p>
            </div>
            <div class="category-detail">
              <p>{{ $item->products->tags->first()->name }}</p>
              <p>|</p>
              <p>{{ $item->status }}</p>
              <p>|</p>
              <p>{{ $item->products->category->name }}</p>
            </div>
          </div>
        </div>
        <div class="left-detail">
          <div class="qty">
            <p>Quantity</p>
            <p>{{ $item->product_qty }}</p>
          </div>
          <div class="total-detail">
            <p>Subtotal</p>
            <p>Rp. {{ number_format($item->subtotal,2,',','.') }}</p>
          </div>
        </div>
      </div>
      
    </div>
    @endforeach
    <div class="content-information">
      <div class="payment-det">
        <p>Payment<span><a href="">How to Pay?</a></span></p>
        <p>{{ $order->payment_type }}</p>
      </div>
      <div class="gmail-det">
        <p>Gmail</p>
        <p>{{ $order->shipping->shipping_email }}</p>
      </div>
      <div class="delivery-det">
        <p>Delivery</p>
        <div class="address-det">
          <p>address</p>
          <p>{{ $order->shipping->adress }}</p>
        </div>
        <div class="method">
          <p>Delivery method</p>
          <p>{{ $order->shipping->shipping_method }}</p>
        </div>
      </div>
    </div>
    <div class="summary-detail">
      <div class="title-summary">
        <p>Order Detail</p>
      </div>
      <div class="total-summary">
        <div class="subtotal">
          <p>Total</p>
          <p>Rp.{{ number_format($order->total,2,',','.') }} </p>
        </div>
        <div class="del">
          <p>Delivery</p>
          <p>Rp. TBD</p>
        </div>
        <div class="pjk">
          <p>Pajak</p>
          <p>Rp. TBD</p>
        </div>
      </div>
    </div>
    <div class="summary-total">
      <p>Total Keseluruhan</p>
      <p>Rp. TBD</p>
    </div>
  </div>
  @endsection
