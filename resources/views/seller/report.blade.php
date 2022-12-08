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
            <iconify-icon icon="material-symbols:sell-outline"
                style="color: #f24e1e; font-size: 60px; margin-left: 5px;"></iconify-icon>
            <div class="text">
                <p>Selled Product</p>
                <h5 style="margin-top: -10px;">40</h5>
            </div>
        </div>
        <div class="profit">
            <iconify-icon icon="material-symbols:show-chart" style="color: #0fa958; font-size: 60px; margin-left: 5px;">
            </iconify-icon>
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
        <canvas id="myChart" width="1150px" height="300px"></canvas>
    </div>

    <div class="export">
        <p>Export Overall Report</p>
        <button>
            <iconify-icon icon="gridicons:pages"></iconify-icon>
            Export to Excel
        </button>
    </div>

    <table>
        <tr>
            <th>No</th>
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
                <p
                    style="padding: 2px; background-color: #5874AF; width: 100px; color: white; border-radius: 6px; margin: auto;">
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
                <p
                    style="padding: 2px; background-color: #5874AF; width: 100px; color: white; border-radius: 6px; margin: auto;">
                    Details
                </p>
            </td>
        </tr>


    </table>
</div>
<script src="{{ asset('assets/js/Chart.js') }}"></script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 23, 2, 3, 10],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 17, 0, 0.2)',
                    'rgba(255, 242, 0, 0.2)',
                    'rgba(255, 43, 128, 0.2)',
                    'rgba(0, 199, 86, 0.2)',
                    'rgba(255, 153, 0, 0.2)',
                    'rgba(210, 64, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 17, 0,1)',
                    'rgba(255, 242, 0, 1)',
                    'rgba(255, 43, 128, 1)',
                    'rgba(0, 199, 86, 1)',
                    'rgba(255, 153, 0, 1)',
                    'rgba(210, 64, 255, 1)'
                ],
                borderWidth: 0.2
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection