@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/profile-cust.css')}}">
@endsection

@section('content')

<div class="container-top">
        
    <div class="content">
        <div class="pict">
            <img src="{{ auth()->user()->profile->gallery->first()->getUrl() }}"alt="">

            <a href="{{ route('editprofile.cust')}}">
                <button>Edit Profile</button>
            </a>
        </div>

        <div class="details">
            <div class="first-name">
                <p>First Name</p>
                <p>{{ auth()->user()->profile->firstname }}</p>
            </div>
            <div class="last-name">
                <p>Last Name</p>
                <p>{{ auth()->user()->profile->lastname }}</p>
            </div>
            <div class="email">
                <p>Email</p>
                <p>{{ auth()->user()->email }}</p>
            </div>
            <div class="phone-number">
                <p>Phone Number</p>
                <p>{{ auth()->user()->profile->phoneNumber }}</p>
            </div>
            <div class="address">
                <p>Address</p>
                <p>{{ auth()->user()->profile->Address }}</p>
            </div>
        </div>
    </div>
    <div class="pesanan">
        <div class="dropdown">
            <select name="" id="">
                <option value="">All Order</option>
                <option value="">My Order</option>
                <option value="">completed Order</option>
                <option value="">canceled Order</option>
            </select>
          </div>
    </div>

    </div>

    @foreach(auth()->user()->orders as $order)
    <div class="orderan-gue">

        <div class="row1">
            <div class="store">
                <iconify-icon id="logo" icon="ic:round-store-mall-directory"></iconify-icon>
                <p>
                    @foreach($order->orderItem as $item)
                    {{ $item->products->users->shop->name }}
                    @endforeach
                </p>
            </div>
            <p class="total">Total</p>
        </div>

        <div class="kontencuy">
            <div class="produknya">
                <img src="assets/web4.jpg" alt="">
            </div>
            
            <div class="detail-produk">
            @foreach($order->orderItem as $item)
                <div class="nama-status">
                    <p>{{ $item->products->name }}</p>
                    <div class="statusnya">{{ $item->product_qty }}</div>
                </div>
            @endforeach
            </div>
    
            <div class="row-kanan">
                    <div class="harga-total">
            <p>Rp.50.000,00</p>
        </div>

        <div class="btn-pesanan">
            <button>Buy More</button>
            <button>Detail</button>
        </div>
            </div>
             
        </div>

   
    </div>

    @endforeach
@endsection
