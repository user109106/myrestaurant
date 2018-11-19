@extends('layouts.app_admin')

@section('content')
<div class="card-body">
    @include('partials.error')
    @include('partials.success')
    <div class="header"> 
        <h1 class="page-header">
            Order Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/orders">All Orders</a></li>
            <li class="active">Order Details</li>
        </ol> 
                            
    </div>
        <!--Main content start here-->
    <div id="page-inner">
        <h4>View Order Details</h4> 
        <div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card">
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Order ID</td>
                                    <td>Item ID</td>
                                    <td>Item Name</td>
                                    <td>Image</td>
                                    <td>Unit Price</td>
                                    <td>Item Quantity</td>
                                    <td>Subtotal</td>
                                    <td>Date</td>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php $i=0;$sum=0; ?>
                                @foreach ($orderdetails as $orderdetail)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td style="text-align:center;">{{ $orderdetail->order_id }}</td>
                                    <td style="text-align:center;">{{ $orderdetail->item_id }}</td>
                                    <td>{{ $orderdetail->item_name }}</td>
                                    <td>
                                        <img src="/storage/{{ $orderdetail->item_image }}" height="100px;width:100px;">
                                    </td>
                                    <td>TK.{{ $orderdetail->unit_price }}</td>
                                    <td style="text-align:center;">{{ $orderdetail->item_qty }}</td>
                                    <td style="text-align:center;">TK.{{ $orderdetail->subtotal }}</td>
                                    <td>{{ $orderdetail->created_at }}</td>
                                </tr>
                                <?php $sum = $sum + $orderdetail->subtotal ?>
                                @endforeach
                                <tr>
                                    <td>Order Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>TK.{{ $sum }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection