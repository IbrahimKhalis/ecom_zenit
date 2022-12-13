@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/transaction-detail.css')}}">
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <h1 class="judul-content">Transaction Details</h1>

    <div class="kotak d-flex">
        <div class="kiri">   
            <div class="kotak-kiri1">
                <h1 class="judul-kiri1">Transaction Details</h1>
                <div class="garis-kiri1"></div>
                <h2 class="invoice-num">Invoice : INV/2313142/MPL/311</h2>
                <div class="purchase-date d-flex" style="margin-top: 11px;">
                    <i class="fa fa-calendar" aria-hidden="true" style="margin-left: 19px;"></i>
                    <h2 class="isi-date">Purchase Date : 24 March 2022</h2>
                </div>
                <div class="purchase-date d-flex" style="margin-top: 11px;">
                    <i class="fas fa-clock" style="margin-left: 19px;"></i>
                    <h2 class="isi-status">Status : Completed</h2>
                </div>
            </div>
            <div class="kotak-kiri2">
                <h1 class="judul-kiri2">Buyer Details</h1>
                <div class="garis-kiri2"></div>
                <div class="buyer-detail d-flex">
                    <i class="fa fa-user" aria-hidden="true" style="margin-left: 19px; margin-top: 11px;"></i>
                    <h2 class="nama-buyer">Name : Kiagus Ahmad Farhan Aziz</h2>
                </div>
                <div class="purchase-date d-flex mt-2">
                    <i class="fa fa-phone" aria-hidden="true" style="margin-left: 19px;"></i>
                    <h2 class="isi-phone">Phone Number : 087887407806</h2>
                </div>
                <div class="location-address d-flex mt-2">
                    <i class="fas fa-location-dot" style="margin-left: 19px;"></i>
                    <h2 class="isi-address">Address : Gg.Swadaya 5 Rt.05 Rw.021 No.131</h2>
                </div>
            </div>

            <div class="kotak-kiri3">
                <h1 class="judul-kiri3">Payment Details</h1>
                <div class="garis-kiri3"></div>
                <div class="payment-method d-flex">
                    <i class="fa fa-credit-card" aria-hidden="true" style="margin-left: 19px; margin-top: 11px;"></i>
                    <h2 class="isi-payment">Payment Method : Dana</h2>
                </div>
                <div class="total-price d-flex mt-2">
                    <i class="fa fa-dollar-sign" aria-hidden="true" style="margin-left: 19px;"></i>
                    <h2 class="isi-price">Total Price (2 Items) : Rp. 100.000</h2>
                </div>
                <div class="shipping-cost d-flex mt-2">
                    <i class="fas fa-truck" style="margin-left: 19px;"></i>
                    <h2 class="isi-shipping">Shipping Cost : Rp. 50.000</h2>
                </div>
                <div class="garis-kiri4"></div>
                <div class="grand-total d-flex mt-2">
                    <i class="fas fa-dollar-sign" style="margin-left: 19px; margin-top: 11px;"></i>
                    <h2 class="isi-total">Grand Total :  1.000.000</h2>
                </div>
            </div>

            <div class="kotak-kiri4">
                <h1 class="judul-kiri4">Shipping Information</h1>
                <div class="garis-kiri4"></div>
                <div class="expedition d-flex">
                    <i class="fa fa-truck" aria-hidden="true" style="margin-left: 19px; margin-top: 11px;"></i>
                    <h2 class="nama-expedition">Expedition : JNE</h2>
                </div>
                <div class="tracking-number d-flex mt-2">
                    <i class="fa fa-calendar" aria-hidden="true" style="margin-left: 19px;"></i>
                    <h2 class="isi-tracking">Tracking Number : 23143523131</h2>
                </div>
                <div class="shipping-address d-flex mt-2">
                    <i class="fas fa-location-dot" style="margin-left: 19px;"></i>
                    <h2 class="isi-address">Address : Gg.Swadaya 5 Rt.05 Rw.021 No.131</h2>
                </div>
            </div>
        </div>
        <div class="kanan">
            <h1 class="judul-kanan">Order Details</h1>
            <div class="garis-kanan"></div>
            <div class="container">
                <table class="table">
                    <tr>
                        <th class="table-product">Product</th>
                        <th class="table-unit">Unit Price</th>
                        <th class="table-qty">Qty</th>
                        <th id="table-sub">Subtotal</th>
                    </tr>
                    <tr class="table-striped">
                        <td class="d-flex"><img src="assets/biaaan.jpg" alt=""><h2 class="nama-product">Website Kece euy</h2></td>
                        <td><h2 class="nama-price">Rp. 30.000</h2></td>
                        <td><h2 class="nama-qty">5</h2></td>
                        <td><h2 class="nama-subtotal">Rp.150.000</h2></td>
                        <tr>
                            <td class="d-flex"><img src="assets/biaaan.jpg" alt=""><h2 class="nama-product">Website Kece euy</h2></td>
                            <td><h2 class="nama-price">Rp. 30.000</h2></td>
                            <td><h2 class="nama-qty">5</h2></td>
                            <td><h2 class="nama-subtotal">Rp.150.000</h2></td>
                        </tr>
                        <tr class="table-striped">
                            <td class="d-flex"><img src="assets/biaaan.jpg" alt=""><h2 class="nama-product">Website Kece euy</h2></td>
                            <td><h2 class="nama-price">Rp. 30.000</h2></td>
                            <td><h2 class="nama-qty">5</h2></td>
                            <td><h2 class="nama-subtotal">Rp.150.000</h2></td>
                        </tr>
                        <tr>
                            <td class="d-flex"><img src="assets/biaaan.jpg" alt=""><h2 class="nama-product">Website Kece euy</h2></td>
                            <td><h2 class="nama-price">Rp. 30.000</h2></td>
                            <td><h2 class="nama-qty">5</h2></td>
                            <td><h2 class="nama-subtotal">Rp.150.000</h2></td>
                        </tr>
                        <tr>
                        </tr>
                    </tr>
                </table>
                <h1 class="total">Total</h1>
                <h2 class="jumlah-total">Rp. 5.000.000</h2>
            </div>
            
        </div>
    </div>
    
</div>
@endsection