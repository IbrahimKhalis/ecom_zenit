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
          <h2 class="isi-payment-status">Unpaid</h2>
      </div>
      <div class="garis2"></div>
      <div class="kotak-rekening">
          <div class="title-logo-bank d-flex">
              <h1 class="title-bank">Bca Virtual Account</h1>
              <img src="assets/logo-bca.png" alt="" class="logo-bank">
          </div>
          <div class="garis3"></div>

          <h1 class="title-virtual-account">Bca Virtual Account</h1>
          <div class="rekening d-flex">
              <h1 class="norek-account">04643443253278</h1>
              <div class="copy d-flex">
                  <h2 class="text-copy">Copy</h2>
                  <iconify-icon icon="ic:round-content-copy"></iconify-icon>
              </div>
          </div>

          <h1 class="title-total-payment">Total Payment</h1>
          <div class="total-payment d-flex">
              <h1 class="total-pembayaran">Rp. 300.000</h1>
              <img src="assets/copy.png" alt="" class="logo-copy" style="margin-top: 0.2vw;">
          </div>


      </div>
      <div class="garis4"></div>

      <div class="payment-internet-banking">
          <h2 class="title-payment-internet-banking">Payment Internet Banking</h2>
          <div class="isi-cara-pembayaran">
              <h2 class="no1-internet-banking">1. Login ke Internet banking Bank BNI anda</h2>
              <h2 class="no2-internet-banking">2. Pilih menu transaksi lalu klik menu Virtual Account Billing
              </h2>
              <h2 class="no3-internet-banking">3. Masukkan Nomor VA (21031224898412) Lalu Pilih rekening Debit
              </h2>
              <h2 class="no4-internet-banking">4. Detail Transaksi akan ditampilkan, pastikan data sudah
                  sesuai</h2>
              <h2 class="no5-internet-banking">5. Masukkan respon Key BNI appli 2</h2>
              <h2 class="no6-internet-banking">6. Transaksi sukses, simpan bukti transaksi Anda</h2>
          </div>
      </div>

      <div class="garis5"></div>

      <div class="payment-atm-bni">
          <h2 class="title-atm-bni">Payment ATM BNI</h2>
          <div class="isi-cara-pembayaran-atm">
              <h2 class="no1-atm-bni">1. Login ke Internet banking Bank BNI anda</h2>
              <h2 class="no2-atm-bni">2. Pilih menu transaksi lalu klik menu Virtual Account Billing</h2>
              <h2 class="no3-atm-bni">3. Masukkan Nomor VA (21031224898412) Lalu Pilih rekening Debit</h2>
              <h2 class="no4-atm-bni">4. Detail Transaksi akan ditampilkan, pastikan data sudah sesuai</h2>
              <h2 class="no5-atm-bni">5. Masukkan respon Key BNI appli 2</h2>
              <h2 class="no6-atm-bni">6. Transaksi sukses, simpan bukti transaksi Anda</h2>
          </div>
      </div>
  </div>
</div>
@endsection
