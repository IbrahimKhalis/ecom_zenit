@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/tutorial.css')}}">
@endsection

@section('content')
<div class="containers">
  <div class="judul d-flex">
      <a href=""><iconify-icon class="back-btn" icon="material-symbols:arrow-back-rounded"></iconify-icon></a>
      <h2 class="container-title">Payment</h2>
  </div>
  <div class="garis1"></div>
  <div class="container-content">

      <div class="Status d-flex">
          <h2 class="payment-status">Payment Status</h2>
          <h2 class="isi-payment-status">{{ $detail->status }}</h2>
      </div>
      <div class="garis2"></div>
      <div class="kotak-rekening">
          <div class="title-logo-bank d-flex">
              <h1 class="title-bank">{{ $detail->payment_name }}</h1>
              <img src="{{ asset('storage/bank/' . $detail->payment_method . '.png') }}" style="background-size: cover;" class="logo-bank">
          </div>
          <div class="garis3"></div>

          <h1 class="title-virtual-account">{{ $detail->payment_name }}</h1>
          <div class="rekening d-flex">
              <h1 class="norek-account">{!! preg_replace('/[^0-9]/' ,' ', $pay->steps[2]) !!} {!! preg_replace('/[^0-9]/' ,' ', $pay->steps[3]) !!} </h1>


              <div class="copy d-flex">
                  <h2 class="text-copy">Copy</h2>
                  <iconify-icon icon="ic:round-content-copy"></iconify-icon>
              </div>
          </div>

          <h1 class="title-total-payment">Total Payment</h1>
          <div class="total-payment d-flex">
              <h1 class="total-pembayaran">Rp. {{ number_format( $detail->amount ) }}</h1>
              <img src="assets/copy.png" alt="" class="logo-copy" style="margin-top: 0.2vw;">
          </div>


      </div>
      <div class="garis4"></div>
      @foreach ($detail->instructions as $pay )
      <div class="payment-internet-banking">
          <br>
          <hr>
          <h2 class="title-payment-internet-banking">Payment {{ $pay->title }}</h2>
          @foreach($pay->steps as $step)
          <div class="isi-cara-pembayaran">
              <h2 class="no1-internet-banking">{{ $loop->iteration }} . {!! $step !!}</h2>
          </div>
          @endforeach
      </div>
      @endforeach


@endsection