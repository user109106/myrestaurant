@extends('layouts.app_pages')

@section('content')
<?php $tab = 'pricing'; ?>
<section id="inner-headline">
    <div class="container">
        @include('partials.error')
        @include('partials.success')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">View Item - {{$item->item_name}}</h2>
                {{-- {{ $session_id = session()->getId() }} --}}
            
            </div>
        </div>
    </div>
</section>  
<section id="content">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img style="box-shadow:0 0 3px 2px black;border-radius:5px;" src="/storage/{{ $item->item_image}}" height="100%" width="100%">
        </div>
        <div class="col-md-6" style="padding:30px;">
            <h4>Name of the item : {{$item->item_name}}</h4>
            
            <a href="">Category: Dinner</a>
            <p>{{$item->item_description}}</p>
            <h3 style="color:green;">Price : {{$item->item_price}}TK</h3>
            @if ($item->item_availability == 1)
                <p style="color:green;"><span style="color:green;">Availability</span> : Availavble</p>
                @elseif ($item->item_availability == 2)
                <p style="color:red;"><span style="color:green;">Availability</span> : Unavailavble</p>
                @else
                <p style="color:orange;"><span style="color:green;">Availability</span> : Coming Soon</p>
            @endif
            <form action="{{ route('cart.store') }}" method="post">
                @csrf
                <input type="hidden" type="number" name="id" value="{{ $item->id }}">
                Add Quantity : <input style="width:120px;" type="number" name="quantity" placeholder="enter quantity" required="required"><br>
                <input class="btn btn-primary" type="submit" name="submit" value="ADD to Cart">
            </form>
            
            
        </div>
        <div class="col-md-12"><hr></div>
        <div class="col-md-12">
            <div class="pull-right">
                <input class="btn btn-primary" type="submit" name="checkout" value="Checkout">
                <a style="width:200px;margin:10px;" class="btn btn-primary" href="{{ url('/pricing') }}">Continue Shopping</a>
            </div>
        </div>
        <div class="col-md-12"><hr></div>
        <div class="col-md-12">
            <h4>Review</h4>
            <form>
                @csrf
                <input type="text" name="review" placeholder="Tell us about this item..">
                <input style="color:white;background:seagreen;padding:5px 10px;" type="submit" name="submit" value="Submit">
            </form>
        </div>
        <div class="col-md-12"><hr></div>
        <div class="col-md-12">
            <h4>All Reviews</h4>
            <ul>
                <li><i class="small material-icons">account_circle</i><a>Jessy L.</a></li>
                <li>This is the best item.</li><br>
                <li><i class="small material-icons">account_circle</i><a>Jessy L.</a></li>
                <li>This is the best item.</li><br>
                <li><i class="small material-icons">account_circle</i><a>Jessy L.</a></li>
                <li>This is the best item.</li><br>
            </ul>
        </div>
    </div>
</div>
</section>  
@endsection