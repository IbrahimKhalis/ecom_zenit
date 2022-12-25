@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/report.css')}}">
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <div class="sub-content">
        <a href="{{ route('seller.report') }}">Overall Report</a>
        <a href="{{ route('seller.monthly-report') }}">Monthly Report</a>
    </div>
    <div class="cards">
        <div class="product-total">
            <iconify-icon icon="ph:package" style="font-size: 70px; margin-left: 5px;"></iconify-icon>
            <div class="text">
                <p>Product Total</p>
                <h5 style="margin-top: -10px;">{{ $products->count() }}</h5>
            </div>
        </div>
        <div class="selled-product">
            <iconify-icon icon="material-symbols:sell-outline"
                style="color: #f24e1e; font-size: 60px; margin-left: 5px;"></iconify-icon>
            <div class="text">
                <p>Selled Product</p>
                <h5 style="margin-top: -10px;">{{ $terjualData }}</h5>
            </div>
        </div>
        {{-- <div class="profit">
            <iconify-icon icon="material-symbols:show-chart" style="color: #0fa958; font-size: 60px; margin-left: 5px;">
            </iconify-icon>
            <div class="text">
                <p>Profit</p>
                <h5 style="margin-top: -10px;"></h5>
            </div>
        </div> --}}
        <div class="income">
            <iconify-icon icon="mdi:dollar" style="color: #ffd233; font-size: 60px; margin-left: 5px;"></iconify-icon>
            <div class="text" style="display: flex; flex-direction: column; gap: -20px;">
                <p>Your Total Income</p>
                <h5 style="margin-top: -10px;">Rp.{{ $income }}</h5>
            </div>
        </div>
    </div>
    {{-- <div class="apa" style="width: 100%; height:50%;">
        {!! $chart->container() !!}
        {!! $chart->script() !!}
    </div> --}}
    <div class="chart">
       <canvas id="myChart" width="1150px" height="300px"></canvas>
    </div>
    @if ($values == [])

    @else    
    <div class="export">
        <p>Export Overall Report</p>
        <a href="{{ url('export/sale/data') }}">
        <button>
            <iconify-icon icon="gridicons:pages"></iconify-icon>
            Export to Excel
        </button>
    </a>
    </div>
    @endif

    <table>
        <tr>
            <th>No</th>
            <th>Month</th>
            <th>Sold Total</th>
            <th>Income</th>
        </tr>

        @foreach ($ibe as $key => $value)
        <tr style="background-color: white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <td style="width: 30px;">{{$loop->iteration}}</td>
            <td style="width: 220px;">{{$key}}</td>
            <td style="width: 300px;">{{ $value['qty'] }} Product</td>
            <td style="width: 300px;">Rp.{{$value['subtotal']}}</td>
        </tr>
        @endforeach


    </table>
</div>

  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
  
      var labels =  {{ Js::from($labels) }};
  
      var values =  {{ Js::from($values) }};

      const data = {
        labels: labels,
        datasets: [{
          label: 'My Sales data',
          data: values,
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
                borderWidth: 0
        }]
      };
  
      const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                beginAtZero: true,
                }
            }       
        }
      };
  
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  
</script>

@endsection