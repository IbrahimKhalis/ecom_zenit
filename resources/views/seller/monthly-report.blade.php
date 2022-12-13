@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/monthly-report.css')}}">
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <div class="sub-content">
        <a href="{{ route('seller.report') }}">Overall Report</a>
        <a href="{{ route('seller.monthly-report') }}">Monthly Report</a>
    </div>
    <div class="dropdown">

    </div>
    <div class="total-total">
        <div class="left-row">
            <div class="one">
                <p>Month</p>
                <p>November</p>
            </div>
            <div class="two">
                <p>Total Transaction</p>
                <p>5</p>
            </div>
        </div>
        
        <div class="right-row">
            <div class="one">
                <p>Total Income</p>
                <p>Rp.200.000</p>
            </div>
            <div class="two">
                <p>Total Profit</p>
                <p>Rp.100.000</p>
            </div>
        </div>
    </div>

    
    <div class="export">
        <p>Export Overall Report</p>
        <button>
            <iconify-icon icon="gridicons:pages"></iconify-icon>
            Export to Excel
        </button>
    </div>

    <table >
        <tr style="box-shadow: none;">
            <th>No</th>
            <th>Order Id</th>
            <th>Buyer</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <tr>
            <td style="width: 50px;">1</td>
            <td>313314314</td>
            <td>Kiagus Ahmad Farhan Aziz</td>
            <td>Rp. 300.000</td>
            <td>
                <a style="background-color: #5874AF; padding: 7px 25px; border-radius: 5px; color: white;" href="">Detail</a>
            </td>
        </tr>
        <tr>
            <td style="width: 50px;">1</td>
            <td>313314314</td>
            <td>Kiagus Ahmad Farhan Aziz</td>
            <td>Rp. 300.000</td>
            <td>
                <a style="background-color: #5874AF; padding: 7px 25px; border-radius: 5px; color: white;" href="">Detail</a>
            </td>
            </td>
        </tr>
    </table>
</div>


@endsection