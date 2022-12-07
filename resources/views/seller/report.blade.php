@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/report.css')}}">
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <div class="sub-content">
        <a href="{{ route('report') }}">Overall Report</a>
        <a href="{{ route('monthly-report') }}">Monthly Report</a>
    </div>
    <div class="cards">
        <div class="product-total">
            <iconify-icon icon="ph:package" style="font-size: 70px; margin-left: 5px;"></iconify-icon>
            <div class="text">
                <p>Product Total</p>
                <h5 style="margin-top: -10px;">40</h5>
            </div>
        </div>
        <div class="selled-product">
            <iconify-icon icon="material-symbols:sell-outline" style="color: #f24e1e; font-size: 60px; margin-left: 5px;"></iconify-icon>
            <div class="text">
                <p>Selled Product</p>
                <h5 style="margin-top: -10px;">40</h5>
            </div>
        </div>
        <div class="profit">
            <iconify-icon icon="material-symbols:show-chart" style="color: #0fa958; font-size: 60px; margin-left: 5px;"></iconify-icon>
            <div class="text">
                <p>Profit</p>
                <h5 style="margin-top: -10px;">40</h5>
            </div>
        </div>
        <div class="income">
            <iconify-icon icon="mdi:dollar" style="color: #ffd233; font-size: 60px; margin-left: 5px;"></iconify-icon>
            <div class="text" style="display: flex; flex-direction: column; gap: -20px;">
                <p>Income this Month</p>
                <h5 style="margin-top: -10px;">40</h5>
            </div>
        </div>
    </div>

    <div class="chart">
    </div>

    <div class="export">
        <p>Export Overall Report</p>
        <a href="{{ url('export/sale/data') }}">
        <button>
            <iconify-icon icon="gridicons:pages"></iconify-icon>
            Export to Excel
        </button>
    </a>
    </div>

    <table>
        <tr>
            <th >No</th>
            <th>Month</th>
            <th>Sold Total</th>
            <th>Income</th>
            <th>Action</th>
        </tr>
        <tr style="background-color: white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <td style="width: 30px;">1</td>
            <td style="width: 300px;">May</td>
            <td style="width: 220px;">300</td>
            <td style="width: 300px;">Rp.300.000</td>
            <td style="width: 250px; align-items: center; justify-content: center; display: flex;">
                <p style="padding: 2px; background-color: #5874AF; width: 100px; color: white; border-radius: 6px; margin: auto;">
                    Details
                </p>
            </td>
        </tr>
        
        <tr style="background-color: white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <td style="width: 30px;">1</td>
            <td style="width: 300px;">May</td>
            <td style="width: 220px;">300</td>
            <td style="width: 300px;">Rp.300.000</td>
            <td style="width: 250px; align-items: center; justify-content: center; display: flex;">
                <p style="padding: 2px; background-color: #5874AF; width: 100px; color: white; border-radius: 6px; margin: auto;">
                    Details
                </p>
            </td>
        </tr>
        
        
    </table>
</div>

@endsection