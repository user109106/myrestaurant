@extends('layouts.app_pages')

@section('content')
<?php $tab = 'cart'; ?>
<section id="inner-headline">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle"><i class="large material-icons">add_shopping_cart</i>Your Cart</h2> 
                
            </div>
        </div>
    </div>
</section> 

<section id="content">
<div class="container">
    <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        @include('partials.error')
        @include('partials.success')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead style="background:#421702;color:#fff;padding:20px;">
                <tr>
                    <th style="text-align:center">#</th>
                    <th style="text-align:center">Item Name</th>
                    <th style="text-align:center">Image</th>
                    <th style="text-align:center">Price</th>
                    <th style="text-align:center">Quantity</th>
                    <th style="text-align:center">Total Price</th>
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i=0; 
                    $sum = 0.00;
                    $subtotal = 0.00;
                ?>
                @foreach ($carts as $cart)
                <?php 
                    $i++; 
                    $sum = $sum + $cart->price;
                ?>
                <tr>
                    <td style="text-align:center">{{$i}}</td>
                    <td style="text-align:center">{{$cart->item_name}}</td>
                    <td style="text-align:center"><img src="/storage/{{ $cart->image}}" alt="image" height="50px" width="80px"></td>
                    <td style="text-align:center">TK. {{ $cart->price }}</td>
                    <td style="text-align:center">
                        <form class="form-inline" action="{{ route('cart.update',[$cart->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $cart->id }}">
                                <input style="height:15px;width:40px;border:1px solid rgba(0,0,0,0.3);" type="number" name="quantity" value="{{ $cart->quantity }}">
                                <button style="background:black;color:#fff;box-shadow:none;border:none;padding:2px 4px;" type="submit" name="submit" >Update</button>                            
                            </div>
                            
                        </form>
                        
                    </td>
                    <td style="text-align:center">TK. {{ $sub = $cart->price*$cart->quantity }}</td>
                    <td style="text-align:center">
                        <form action="{{ route('cart.destroy',[$cart->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <input onclick="return confirm('Are you sure to delete?');" style="background:none;border:none;color:red;font-weight:bold;" type="submit" name="submit" value="X">
                        </form>
                        
                    </td>
                </tr>
                <?php $subtotal = $subtotal+$sub; ?>
                @endforeach
                
            </tbody>
        </table>
        @if ($subtotal>0)
            <div class="pull-right" style="font-size:18px;line-height:5px;text-align:right;margin:10px;">
                <p>Subtotal    : TK {{ $subtotal }}</p><br>
                <p>Vat(5%)    : TK {{ $vat = $subtotal*0.05 }}</p><br>
                <p>Grandtotal  : TK {{ $subtotal+$vat }}</p><br>
            </div>
        @else
            <h4>Empty cart. Please shop</h4>
        @endif
        
    </div>
    </div>
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div style="margin:20px;padding:10px;" class="center">
            @if ($subtotal>0)
            <a class="btn btn-primary" href="{{ route('checkout') }}">Checkout</a>
            @endif
            
            <a style="width:200px;margin:10px;" class="btn btn-primary" href="{{ url('/pricing') }}">Continue Shopping</a>
        </div>
    </div>
    </div>
</div>
</section>
@endsection