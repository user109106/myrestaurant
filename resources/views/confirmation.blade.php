@extends('layouts.app_pages')

@section('content')
<?php $tab = 'order-confirm'; ?>
<section id="inner-headline">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">Confirm Bkash Transaction ID!</h2>
                </div>
            </div>
        </div>
    </section> 
    
    <section id="content">
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <p style="color:green;">Thank for your order..</p><br>
            <h2>FOLLOW</h2>
            <p style="color:rgba(0, 0, 0, 0.3)">Pay your bill through our bkash agent number. Our Bkash agent number is - 01711-XXXXXX or 019-XXXXXX.</p>
            <ul style="list-style:lower-roman;">
                <li>You have to bkash your bill within 30mins.Oherwise it may result in canceled or delayed delivery.</li>
                <li>1. First go to Bkash Menu</li>
                <li>2. Then go to payment</li>
                <li>3. Then enter any of our agent number mentioned above</li>
                <li>4. Then enter your amount</li>
                <li>5. Then enter your username as reference</li>
                <li>6. Then enter your pin code</li>
                <li>7. Then OK.<?php echo $paymentid; ?></li>
                <li>8. Now submit the transaction id of your Bkash payment and Confirm your order</li><br><br>
                <div>
                    
                    <form action="{{ route('confirmation.tid') }}" method="post">
                        @csrf
                        
                        <input type="hidden" name="payment_id" value="<?php echo $paymentid; ?>">
                        Transaction ID:<input type="text" name="tid" placeholder="Enter transaction id.." required="required">
                        <input class="btn btn-success" type="submit" name="submit" value="Submit">
                    </form>
                    
                    
                </div>
            </ul>
            
            
            
            
            <br><br><br>
            <p>If you have any comments, advice or feedback or any complain regarding our service please let us know. You can contact us directly or you can drop a message through contact form.</p>
        </div>
        </div>
    </div>
    </section>
@endsection