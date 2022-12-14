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
                <h2 class="invoice-num">Invoice : {{ $order->invoice_no}}</h2>
                <div class="purchase-date d-flex" style="margin-top: 11px;">
                    <i class="fa fa-calendar" aria-hidden="true" style="margin-left: 19px;"></i>
                    <h2 class="isi-date">Purchase Date : {{ $order->created_at->format('d F Y') }}</h2>
                </div>
                <div class="purchase-date d-flex" style="margin-top: 11px;">
                    <i class="fas fa-clock" style="margin-left: 19px;"></i>
                    <h2 class="isi-status">Status : {{ $order->status }}</h2>
                </div>
            </div>
            <div class="kotak-kiri2">
                <h1 class="judul-kiri2">Buyer Details</h1>
                <div class="garis-kiri2"></div>
                <div class="buyer-detail d-flex">
                    <i class="fa fa-user" aria-hidden="true" style="margin-left: 19px; margin-top: 11px;"></i>
                    <h2 class="nama-buyer">Name : {{ $order->shipping->shipping_name }}</h2>
                </div>
                <div class="purchase-date d-flex mt-2">
                    <i class="fa fa-phone" aria-hidden="true" style="margin-left: 19px;"></i>
                    <h2 class="isi-phone">Phone Number : {{ $order->shipping->shipping_phone }}</h2>
                </div>
                <div class="location-address d-flex mt-2">
                    <i class="fas fa-location-dot" style="margin-left: 19px;"></i>
                    <h2 class="isi-address">Address : {{ $order->shipping->adress }}</h2>
                </div>
            </div>

            <div class="kotak-kiri3">
                <h1 class="judul-kiri3">Payment Details</h1>
                <div class="garis-kiri3"></div>
                <div class="payment-method d-flex">
                    <i class="fa fa-credit-card" aria-hidden="true" style="margin-left: 19px; margin-top: 11px;"></i>
                    <h2 class="isi-payment">Payment Method : {{ $order->payment_type }}</h2>
                </div>
                <div class="total-price d-flex mt-2">
                    <i class="fa fa-dollar-sign" aria-hidden="true" style="margin-left: 19px;"></i>
                    <h2 class="isi-price">Total Price (2 Items) : Rp. {{ number_format($order->total,0,',','.') }}</h2>
                </div>
                <div class="shipping-cost d-flex mt-2">
                    <i class="fas fa-truck" style="margin-left: 19px;"></i>
                    <h2 class="isi-shipping">Shipping Cost : Rp. TBD</h2>
                </div>
                <div class="garis-kiri4"></div>
                <div class="grand-total d-flex mt-2">
                    <i class="fas fa-dollar-sign" style="margin-left: 19px; margin-top: 11px;"></i>
                    <h2 class="isi-total">Grand Total : Rp. TBD</h2>
                </div>
            </div>

            <div class="kotak-kiri4">
                <h1 class="judul-kiri4">Shipping Information</h1>
                <div class="garis-kiri4"></div>
                <div class="expedition d-flex">
                    <i class="fa fa-truck" aria-hidden="true" style="margin-left: 19px; margin-top: 11px;"></i>
                    <h2 class="nama-expedition">Expedition : {{ $order->shipping->shipping_method }}</h2>
                </div>
                <div class="shipping-address d-flex mt-2">
                    <i class="fas fa-location-dot" style="margin-left: 19px;"></i>
                    <h2 class="isi-address">Address : {{ $order->shipping->adress }}</h2>
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
                        <th>Tracking Number</th>
                    </tr>
                    @foreach($order->orderItem as $item)
                    <tr class="table-striped">
                        <td class="d-flex"><img src="{{ $item->products->gallery->first()->getUrl() }}" alt=""><h2 class="nama-product">{{ $item->product_name }}</h2></td>
                        <td><h2 class="nama-price">Rp. {{ number_format($item->products->price,0,',','.') }}</h2></td>
                        <td><h2 class="nama-qty">{{ $item->product_qty }}</h2></td>
                        <td><h2 class="nama-subtotal">Rp. {{ number_format($item->subtotal ,0,',','.') }}</h2></td>
                        @if(isset($item->dataResi->no_resi))
                        <td><h2 class="nama-subtotal">{{ $item->dataResi->no_resi }}</h2></td>
                        @elseif($item->status == 'COMPLETE')
                        <td><h2 class="nama-subtotal">Complete</h2></td>
                        @elseif($item->status == 'CANCELED')
                        <td><h2 class="nama-subtotal">Canceled</h2></td>
                        @else
                        <td><h2 class="nama-subtotal">Not Shipped</h2></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
                <h1 class="total">Total</h1>
                <h2 class="jumlah-total">Rp. {{ number_format($order->total,0,',','.') }} </h2>
            </div>
            
        </div>
    </div>
    
</div>
@endsection