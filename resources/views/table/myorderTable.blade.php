<tr>
    <th style="width: 50px;">No.</th>
    <th>Invoice</th>
    <th>Status</th>
    <th>date</th>
    <th>Qty</th>
    <th>Total</th>
    <th>Payment Method</th>
    <th>Action</th>
</tr>
@foreach($orders as $order)
<tr>
    <td style="width: 50px;">{{ $loop->iteration }}</td>
    <td>{{ $order->invoice_no }}</td>
    <td class="status">
        @if($order->status == 'Not Paid')
            @include('status.notPaid')
        @elseif($order->status == 'PAID')
            @include('status.verified')
        @elseif($order->status == 'PROCESSED')
            @include('status.processed')
        @elseif($order->status == 'SHIPPED')
            @include('status.shipped')
        @elseif($order->status == 'CANCELED')
            @include('status.canceled')
        @elseif($order->status == 'DELIVERED')
            @include('status.delivered')
        @elseif($order->status == 'COMPLETE')
            @include('status.complete')
        @elseif($order->status == 'REFUNDED')
            @include('status.refunded')
        @else
        <p>Status Unknown</p>
        @endif
    </td>
    <td>{{ $order->created_at->format('Y/m/d') }}</td>
    <td>{{ array_sum($order->orderItem->pluck('product_qty')->all()) }}</td>
    <td>Rp. {{ number_format($order->total,0,',','.') }}</td>
    <td>{{ $order->payment_type }}</td>
    <td>
        <a href="">Details</a>
    </td>
</tr>
@endforeach
