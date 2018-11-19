@extends('layouts.app_pages')

@section('content')
<?php $tab = 'bkash'; ?>
<section id="inner-headline">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Payment Through BKASH</h2> 
                
            </div>
        </div>
    </div>
</section> 

<section id="content">
<div class="container">
    <div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <style>
                .pay{}
                .pay tr{padding: 8px;}
                .pay tr td{padding: 8px;}
            </style>
            <table class="table-bordered pay">
                <thead style="font-size:16px;">
                    <th>#</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </thead>
                <?php 
                    $i=0; 
                    $sum = 0.00;
                    $subtotal = 0.00;
                    $gtotal = 0.00;
                    $totalquantity = 0;
                ?>
                <tbody style="font-size:15px;">
                    @foreach ($carts as $cart)
                    <?php $i++; ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ $cart->item_name }}</td>
                        <td>{{ $cart->price }}</td>
                        <td>{{ $qty = $cart->quantity }}</td>
                        <td>TK. {{ $sub = $cart->price*$cart->quantity }}</td>
                    </tr>
                    <?php $subtotal = $subtotal+$sub; ?>
                    <?php $totalquantity = $totalquantity+$qty; ?>
                    @endforeach
                </tbody>
            </table>
        </div><br>
        <style>
            .total{width: 400px;}
            .total tr{}
            .total tr td{padding: 10px;}
        </style>
        <div class="table-responsive pull-right card" style="background:#DE8C63;color:#fff;">
            <table class="total">
                <tbody>
                    <tr>
                        <td>Sub Total</td>
                        <td>:</td>
                        <td>TK {{ $subtotal }}</td>
                    </tr>
                    <tr>
                        <td>VAT(5%)</td>
                        <td>:</td>
                        <td>TK {{ $vat = $subtotal*0.05 }}</td>
                    </tr>
                    <tr>
                        <td>Grand Total</td>
                        <td>:</td>
                        <td>TK {{ $gtotal = $subtotal+$vat }}</td>
                    </tr>
                    <tr>
                        <td>Total Item Quantity</td>
                        <td>:</td>
                        <td>{{ $totalquantity }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <form action="{{ route('order') }}" method="post">
        @csrf
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="border:1px solid rgba(0,0,0,0.1)">
        
        <div class="table-responsive">
            <h4>Please Fill up this shipping Form - </h4>
            
            <table>
                <tbody>
                    <tr>
                        <td width="20%">Name</td>
                        <td width="5%"> : </td>
                        <td width="75%"><input type="text" name="name" placeholder="Enter receiver's name.." required="required"></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td> : </td>
                        <td><input type="text" name="phone" placeholder="Enter receiver's mobile.." required="required"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td><input type="text" name="email" placeholder="Enter receiver's email.."></td>
                    </tr>
                    <tr>
                        <td><Address>Address</Address></td>
                        <td> : </td>
                        <td><input type="text" name="address" placeholder="Enter receiver's address.."></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td> : </td>
                        <td><input type="text" name="city" placeholder="Enter city.."></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td> : </td>
                        <td><input type="text" name="country" placeholder="Enter country.."></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
            
    </div>
        <input type="hidden" name="total" value="{{ $gtotal }}" >
        <input type="hidden" name="payment_method" value="Bkash">
        <input style="margin:10px 0px;" class="btn btn-primary btn-large pull-right" type="submit" name="submit" value="ORDER">
    </form>
    </div>
</div>
</section>
@endsection