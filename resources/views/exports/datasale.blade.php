<table style='border:2px solid black'>
    <tr>
        <td></td>
        <td></td>
        <td><b>REPORT OVERALL</b></td>
        <td></td>
    </tr>
    <tr></tr>
    <tr>
        <th><b>NO</b></th>
        <th><b>PRODUCT NAME</b></th>
        <th><b>PRODUCT QUANTITY</b></th>
        <th><b>TOTAL</b></th>
        <th><b>SELLER NAME</b></th>
        <th><b>TRANSACTION DONE</b></th>
    </tr>
    @foreach ($income as $item)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->product_name}}</td>
        <td>{{$item->product_qty}}</td>
        <td>{{$item->subtotal}}</td>
        <td>{{$item->seller->name}}</td>
        <td>{{$item->created_at}}</td>
    </tr>
    @endforeach


</table>