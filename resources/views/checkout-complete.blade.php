@extends('layout/main')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/checkout.css')}}">
@endsection

@section('content')
<div class="main-content">
  <header>
    <div class="left-header">
      <div class="img-header">
        <img src="{{ asset('assets/img/logo.png')}}" alt="">
      </div>
      <div class="title-header">
        <p>Order Overview</p>
      </div>
    </div>
    <div class="right-header">
      <div class="breadcrumb">
        <div class="scs">
          <p>&#10004;</p>
        </div>
        <div class="ttl-bc">
          <p>Order Detail</p>
        </div>
        <div class="strip">
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
        </div>
        <div class="scs">
          <p>&#10004;</p>
        </div>
        <div class="ttl-bc">
          <p>Payment Detail</p>
        </div>
        <div class="strip">
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
        </div>
        <div class="scs">
          <p>&#10004;</p>
        </div
        <div class="ttl-bc">
          <p>Complete Order</p>
        </div>
      </div>
    </div>
  </header>
  <div class="content">
    <div class="order-report">
      <div class="title-order">
        <p>Summary Order</p>
      </div>
      <div class="sub-title d-flex justify-content-between">
        <div class="subtitle-order">
          <p>Finish your payment to complete this last step order.</p>
        </div>  
        <div class="btn-tutor">
          <a href="">How to Pay?</a>
        </div>
      </div>
      <div class="card-report">
        <div class="header-report">
          <div class="left-head-report">
            <div class="img-report">
              <img src="assets/logo.png" alt="">
            </div>
            <div class="title-report">
              <p>Order Receipt</p>
            </div>
          </div>
          <div class="right-head-report">
            <p>Invoice : INV/321AA/2414</p>
          </div>
        </div>
        <div class="content-report">
          <div class="row1">
            <div class="title-row1">
              <p>YOUR ORDER COMPLETED</p>
              <div class="scs">
                <p>&#10004;</p>
              </div>
            </div>
            <div class="subtitle-row1">
              <p>your order has been confirmed and will be shipping soon.</p>
            </div>
          </div>
          <div class="row2">
            <div class="col">
              <p>Order Id</p>
              <p>3033030303</p>
            </div>
            <div class="col">
              <p>Order Date</p>
              <p>22 November 2022</p>
            </div>
            <div class="col">
              <p>Receiver Name</p>
              <p>Kiagus Ahmad Farhan Aziz Faturohman Nurohman</p>
            </div>
            <div class="col">
              <p>Address</p>
              <p>Jl. doang seharian jadian kaga</p>
            </div>
          </div>
          <div class="row3">
            <div class="left-product-report">
              <div class="img-product-report">
                <img src="assets/tes-img.png" alt="">
              </div>
              <div class="desc">
                <p>Nama product nya yang panjang</p>
                <p>category product</p>
              </div>
            </div>
            <div class="right-product-report">
              <div class="qty">
                <p>Quantity</p>
                <p>2</p>
              </div>
              <div class="totla-price">
                <p>Rp. 200.000</p>
              </div>
            </div>
          </div>
          <div class="row4">
            <div class="row-sub">
              <p>Subtotal</p>
              <p>Rp. 200.000</p>
            </div>
            <div class="row-sub">
              <p>Shipping</p>
              <p>Rp. 50.000</p>
            </div>
            <div class="row-sub">
              <p>Pajak Sekolah</p>
              <p>Rp. 2.00.000</p>
            </div>
            <div class="row-sub">
              <p>Pajak Dev</p>
              <p>Rp. 10.00.000</p>
            </div>
          </div>
          <div class="row5">
            <div class="total-order">
              <div class="title-total">
                <p>Total</p>
              </div>
              <div class="total-order-complete">
                <p>Rp. 4.000.000</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection