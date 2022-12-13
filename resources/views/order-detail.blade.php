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
          <p>Order Id : 8934090139</p>
        </div>
        <div class="row-bottom">
          <div class="row1 d-flex gap-4">
            <div class="date">
              <p>Order date : <span>31 November 2022</span></p>
            </div>
            <div class="status">
              <p><iconify-icon icon="fluent:payment-16-regular"></iconify-icon> UNPAID</p>
            </div>
          </div>
          <div class="inv">
            <p>Invoive no : INV/3141/A41</p>
          </div>
        </div>
      </div>
    </div>
    <div class="content-order">
      <div class="card-product">
        <div class="right-detail">
          <div class="img-order">
            <img src="assets/web1.jpg" alt="">
          </div>
          <div class="desc-order">
            <div class="name-detail">
              <p>Web Design Landingpage</p>
            </div>
            <div class="category-detail">
              <p>Web Design</p>
              <p>|</p>
              <p>Software</p>
            </div>
          </div>
        </div>
        <div class="left-detail">
          <div class="qty">
            <p>Quantity</p>
            <p>1</p>
          </div>
          <div class="total-detail">
            <p>Subtotal</p>
            <p>Rp. 100.000</p>
          </div>
        </div>
      </div>
      
    </div>
    <div class="content-information">
      <div class="payment-det">
        <p>Payment<span><a href="">How to Pay?</a></span></p>
        <p>JKWE67923VSHJD</p>
      </div>
      <div class="gmail-det">
        <p>Gmail</p>
        <p>Dipziee@fmail.com</p>
      </div>
      <div class="delivery-det">
        <p>Delivery</p>
        <div class="address-det">
          <p>address</p>
          <p>Lapangan Sanca, Bhakti Abri, Kota Depok, Jawa Barat, Indonesia, 21918</p>
        </div>
        <div class="method">
          <p>Delivery method</p>
          <p>Rp. 100.000</p>
        </div>
      </div>
    </div>
    <div class="summary-detail">
      <div class="title-summary">
        <p>Order Detail</p>
      </div>
      <div class="total-summary">
        <div class="subtotal">
          <p>Subtotal</p>
          <p>Rp. 100.000</p>
        </div>
        <div class="del">
          <p>Delivery</p>
          <p>Rp. 20.000</p>
        </div>
        <div class="pjk">
          <p>Pajak</p>
          <p>Rp. 10.000</p>
        </div>
      </div>
    </div>
    <div class="summary-total">
      <p>Total</p>
      <p>Rp. 130.000</p>
    </div>
  </div>
  @endsection
