@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/product-seller.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <div class="sub-content">
        <a href="">All Product</a>
    </div>
    <div class="row-1">
        <div class="search-product">
            <div class="row">

                <div class="col-md-6">

                    <div class="form">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control form-input" placeholder="Search anything...">
                    </div>

                </div>

            </div>
        </div>
        <div class="add-product">
            <a href="">
                <button>Add Product</button>
            </a>
        </div>
    </div>

    <div class="product-tabs">
        <table border="1px">
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Type</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach ($data as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    <img src="{{ $product->gallery->first()->getUrl() }}" alt="">
                </td>
                <td style="text-align: start; font-size: 14px;">{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>Rp.{{ $product->price }}</td>
                <td>
                    <p
                        style="padding:5px; margin-left: 30px; width: 100px; background-color: #8DB2FF; color: white; border-radius: 5px;  font-size: 14px;">
                        {{ $product->category->name }}
                    </p>
                </td>
                <td>
                    <label class="switch">
                        <input type="checkbox" onclick="changeStatus('{{ route('seller.products.changeStatus', $product->id) }}')" {{ $product->isActive ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </td>
                <td>
                    <a href="" style="font-weight: 600;">
                        Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

function changeStatus(url){
    $.ajax({
        type: "POST",
        url: url,
        success: function (response) {
            console.log(response)
        }
    });
}

</script>
@endsection
