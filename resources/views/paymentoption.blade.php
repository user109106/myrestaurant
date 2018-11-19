@extends('layouts.app_pages')

@section('content')
<?php $tab = 'payment'; ?>
<section id="inner-headline">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Payment option</h2> 
                
            </div>
        </div>
    </div>
</section> 

<section id="content">
    <div class="container-fluid center">
        <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div style="padding:0px;margin:50px;border:1px solid rgba(0,0,0,0.1);">
                <h4 style="background:black;color:#fff;padding:10px;margin:0;">Choose a payment option</h4><hr>
                <table style="margin:20px;font-size:18px;">
                    <tr>
                        <td width="20%">Method One:</td>
                        <td width="80%"><a style="color:#421702;" href="{{ route('paymentbkash') }}">Bkash</a></td>
                    </tr>
                    <tr>
                        <td width="20%">Method Two:</td>
                        <td width="80%"><a style="color:#421702;" href="{{ route('cashpayment') }}">Cash On Delivery</a></td>
                    </tr>
                </table>
                
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <a style="padding:15px 30px;background:#421702;color:#fff;text-decoration:none;" href="{{ route('cart') }}">Back</a>
        </div>
        </div>
    </div>
</section>

@endsection