@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/upcoming-order.css')}}">
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

    @if(session()->has('massage'))
    <div class="alert alert-primary" role="alert">
        {{ session()->get('massage') }}
    </div>
    @endif
    <div class="content-tabs">
        <table border="1px solid black">
            <tr>
                <th style="width: 70px;" >No</th>
                <th style="text-align: start;">Product</th>
                <th>No Invoice</th>
                <th>Customer Name</th>
                <th style="width: 100px ">Quantity</th>
                <th style="width:100px;">Type</th>
                <th></th>
            </tr>
            @foreach($Paid as $item)
            <tr>
                <td style="width: 100px;">{{ $loop->iteration }}</td>
                <td style="display: flex; gap:20px; text-align: start; width: 250px;">
                    <img src="{{ $item->products->gallery->first()->getUrl() }}" alt="">
                    <div class="prod-details" style="line-height: 14px;">
                        <p>{{ $item->product_name }}</p>
                        <p>{{ $item->created_at }}</p>
                        <p>Rp. {{ $item->subtotal }}</p>
                    </div>
                </td>
                <td style="width: 110px;">{{ $item->orders->invoice_no }}</td>
                <td style="width: 250px;">{{ $item->orders->users->name }}</td>
                <td style="width: 120px;">{{ $item->product_qty }}</td>
                <td style="width: 100px;">
                    <p id="label-order" style="margin-top: 10px;">{{ $item->products->category->name }}</p>
                </td>
                @if($item->status != 'NOT CONFIRM')
                <td style="width: 100px;">
                    <p id="label-order" style="margin-top: 10px; margin-left: 50px;">{{ $item->status }}</p>
                </td>
                @else
                <td style="width: 180px;">
                <form action="{{ route('seller.accept', $item->id) }}" method="POST">
                    @csrf
                    <button style="border: none;">
                        <iconify-icon icon="material-symbols:check-circle-rounded" style="color: #5874af; font-size: 40px;"></iconify-icon>
                    </button>
                </form>
                <form action="{{ route('seller.reject', $item->id) }}" method="POST">
                    @csrf
                    <button style="border: none;">
                        <iconify-icon icon="ri:close-circle-fill" style="color: #d22d2dc7; font-size: 40px;"></iconify-icon>
                    </button>
                </form>
                </td>
                @endif
            </tr>

            @endforeach
        </table>
    </div>
</div>
@endsection
