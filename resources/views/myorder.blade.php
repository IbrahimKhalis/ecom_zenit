@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/myorder.css')}}">
@endsection

@section('content')
<div class="content-order">
    <div class="head">
        <div class="left">
            <h1>My Order</h1>
            <p style="font-size: 15px;">Review and Manage Your Orders</p>
        </div>
        <p class="breadcrumbs">Setting > My Order</p>
    </div>
    <div class="form-outline">
        <input type="search" id="form1" class="form-control"
            placeholder="Search for ID code, name, package ID........" aria-label="Search" />
    </div>
    <div class="menus">
        <p style="font-size: 20px; font-weight: 600;">Total : 3 Orders</p>
        <div class="left-row">
            <ul>
                <li><a href="" style="color: white;">View All</a></li>
                <li><a href="">My Order</a></li>
                <li><a href="">Completed</a></li>
                <li><a href="">Canceled</a></li>
            </ul>

        </div>
        <div class="filter-dropdown">
            <select name="sort" id='sort' class="option-filter" >
                <option id="1" value="" selected="" >All</option>
            </select>
        </div>
    </div>
    <table border="1px">
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
        <tr>
            <td style="width: 50px;">1</td>
            <td>12345678</td>
            <td class="status">
                <p class="status-verif">
                    <iconify-icon icon="ic:outline-verified-user"></iconify-icon>
                    Verified
                </p>
            </td>
            <td>20/20/20</td>
            <td>10</td>
            <td>Rp.500.000</td>
            <td></td>
            <td>
                <a href="">Details</a>
            </td>
        </tr>
        <tr>
            <td style="width: 50px;">2</td>
            <td>12345678</td>
            <td class="status">
                <p class="status-proses">
                    <iconify-icon icon="uim:process"></iconify-icon>
                    Processed
                </p>
            </td>
            <td>20/20/20</td>
            <td>10</td>
            <td>Rp.500.000</td>
            <td></td>
            <td>
                <a href="">Details</a>
            </td>
        </tr>
        <tr>
            <td style="width: 50px;">3</td>
            <td>12345678</td>
            <td class="status">
                <p class="status-shipped">
                    <iconify-icon icon="grommet-icons:deliver"></iconify-icon>
                    Shipped
                </p>
            </td>
            <td>20/20/20</td>
            <td>10</td>
            <td>Rp.500.000</td>
            <td></td>
            <td>
                <a href="">Details</a>
            </td>
        </tr>
        <tr>
            <td style="width: 50px;">3</td>
            <td>12345678</td>
            <td class="status">
                <p class="status-delivered">
                    <iconify-icon icon="icon-park-outline:delivery"></iconify-icon>
                    Delivered
                </p>
            </td>
            <td>20/20/20</td>
            <td>10</td>
            <td>Rp.500.000</td>
            <td></td>
            <td>
                <a href="">Details</a>
            </td>
        </tr>
        <tr>
            <td style="width: 50px;">3</td>
            <td>12345678</td>
            <td class="status">
                <p class="status-done">
                    <iconify-icon style="font-size: 20px;" icon="material-symbols:done-all"></iconify-icon>
                    Complete
                </p>
            </td>
            <td>20/20/20</td>
            <td>10</td>
            <td>Rp.500.000</td>
            <td></td>
            <td>
                <a href="">Details</a>
            </td>
        </tr>
        <tr>
            <td style="width: 50px;">3</td>
            <td>12345678</td>
            <td class="status">
                <p class="status-canceled">
                    <iconify-icon style="font-size: 26px;" icon="iconoir:cancel"></iconify-icon>
                    Canceled
                </p>
            </td>
            <td>20/20/20</td>
            <td>10</td>
            <td>Rp.500.000</td>
            <td></td>
            <td>
                <a href="">Details</a>
            </td>
        </tr>
        <tr>
            <td style="width: 50px;">3</td>
            <td>12345678</td>
            <td class="status">
                <p class="status-refund">
                    <iconify-icon style="font-size:24px;" icon="tabler:arrow-back-up"></iconify-icon>
                    Refunded
                </p>
            </td>
            <td>20/20/20</td>
            <td>10</td>
            <td>Rp.500.000</td>
            <td></td>
            <td>
                <a href="">Details</a>
            </td>
        </tr> 
    </table>
</div>
@endsection
