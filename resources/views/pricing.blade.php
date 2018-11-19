@extends('layouts.app_pages')

@section('content')
<?php $tab = 'pricing'; ?>
<section id="inner-headline">
    <div class="container">
    
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Pricing</h2>
            </div>
        </div>
    </div>
</section>
<section id="content">
<section id="pricing">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <div class="about-logo">
                    <h3>Our Price<span class="color">List</span></h3>
                    <p>Check out our price list. We hope find your need within budget.Say something more about your price catalogue</p>
                </div>  
            </div>
        </div>
        
        <div class="row"> 
            
        <div class="col-md-4 menuItem"> 
            <h4 style="color:green;">Regular Items</h4>    
            <ul class="menu">
                 @foreach($items as $item)
                 
                <li>
                    {{$item->item_name}}
                    <div class="detail" style="color:green;">{{$item->itemcategories->item_category_name}}<span class="price">{{$item->item_price}}Tk</span></div>
                    <a class="btn btn-danger pull-left" href="{{ route('viewitem.show',[$item->id]) }}"><small>View & Buy</small></a>
                </li>
                
                @endforeach
            </ul>
        </div>
        
        <div class="col-md-4 menuItem">  
            <h4 style="color:green;">Available Offers</h4>   
            <ul class="menu">
                 @foreach($offers as $item)
                 @if ($item->offer_status == 1)
                <li>
                    {{$item->offer_name}}
                    <div class="detail" style="color:green;">Offers<span class="price">{{$item->offer_price}}Tk</span></div>
                    <a class="btn btn-danger pull-left" href="{{ url('/viewitem/{$item->id}') }}"><small>View & Buy</small></a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <div class="col-md-4 menuItem">   
            <h4 style="color:orange;">Upcoming Offers</h4>  
            <ul class="menu" style="width:100%;">
                 @foreach($offers as $item)
                 @if ($item->offer_status == 3)
                <li>
                    {{$item->offer_name}}
                    <div class="detail" style="color:green;">Offers<span class="price">{{$item->offer_price}}Tk</span></div>
                    <a class="btn btn-danger pull-left" href=""><small>View & Buy</small></a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        
        {{-- <div class="col-md-12 menuItem">
            <div class="about-logo">
                <h3>Our Offer<span class="color">List</span></h3>
                <p>Check out our price list. We hope find your need within budget.Say something more about your price catalogue</p>
            </div>  
        </div>
         --}}
        
       
        </div>
        
    </div>
</section>
</section>
@endsection