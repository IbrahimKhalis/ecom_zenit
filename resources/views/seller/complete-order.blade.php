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
            
            @foreach($confirmed as $item)
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
                <a id="label-order" style="display:inline-block; margin-top: 10px;" href="{{ route('seller.order.detail', $item->id) }}">Detail</a>
                </td>
            </tr>
            @endforeach 

        </table>
    </div>
</div>
</div>


@endsection