@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/order-cust.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/product-not-found.css')}}">
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
                    <select name="filter" id="filter" class="option-filter">
                        <option value="popular">All</option>
                    </select>
                </div>
            </div>
            <table border="1px">
                <tr>
                    <th style="width: 50px;">No.</th>
                    <th>Order Id</th>
                    <th>Status</th>
                    <th>date</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td style="width: 50px;">1</td>
                    <td>12345678</td>
                    <td class="status">
                        <p class="status-paid">
                            <iconify-icon style="font-size: 30px;" icon="material-symbols:check-small-rounded">
                            </iconify-icon>
                            Paid
                        </p>
                    </td>
                    <td>20/20/20</td>
                    <td>10</td>
                    <td>
                        <a href="">Details</a>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50px;">2</td>
                    <td>12345678</td>
                    <td class="status">
                        <p class="status-cancel">
                            <iconify-icon style="font-size: 30px;" icon="iconoir:cancel"></iconify-icon>
                            Cancelled
                        </p>
                    </td>
                    <td>20/20/20</td>
                    <td>10</td>
                    <td>
                        <a href="">Details</a>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50px;">3</td>
                    <td>12345678</td>
                    <td class="status">
                        <p class="status-refund">
                            <iconify-icon style="font-size: 25px;" icon="humbleicons:arrow-go-back"></iconify-icon>
                            Refunded
                        </p>
                    </td>
                    <td>20/20/20</td>
                    <td>10</td>
                    <td>
                        <a href="">Details</a>
                    </td>
                </tr>
            </table>
        </div>

<script src="{{ asset('assets/js/cartmodal.js')}}"></script>



@endsection
