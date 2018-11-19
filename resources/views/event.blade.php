@extends('layouts.app_pages')

@section('content')
<?php $tab = 'event'; ?>
<section id="inner-headline" style="background:#2F1F21">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle" style="font-family:cursive;color:#E7B522;">Upcoming Events</h2>
			</div>
		</div>
	</div>
</section>
<section id="content" style="padding:0;">
	<div class="container-fluid" style="background:#2F1F21;color:#fff;">
		<div class="row"> 
            <div class="col-md-2"></div>
            <div class="col-md-10 col-lg-10 col-sm-10" style="padding:100px 20px;">
                <div class="row">
                    <div class="col-md-3">
                        <img src="img/event1.jpg" height="100%" width="100%">
                    </div>
                    <div class="col-md-7">
                        <h4 style="color:#E7B522;">Welcome 2019 - Special Event</h4>
                        
                        <p><i style="margin:5px;margin-bottom:0;padding-bottom:0;color:#E7B522" class="material-icons">date_range</i><span style="font-weight:bold;">Dec 16th, 2018 </span> <span style="color:#E7B522;">Entrance: 8PM~</span></p>
                        <p>We are arranging an musical event in our restaurant on the upcoming 16th December. We will serve some special item on the event.Say some more about the events that take place.Say some more about the events that take place.Say some more about the events that take place.</p><br><br>
                        <a style="padding:10px 20px;background:#E7B522;font-weight:bold;border-radius:5px;color:#2F1F21;margin-top:10px;" href="#">Learn more</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img src="img/event3.jpg" height="100%" width="100%">
                    </div>
                    <div class="col-md-7">
                        <h4 style="color:#E7B522;">Music Night</h4>
                        
                        <p><i style="margin:5px;margin-bottom:0;padding-bottom:0;color:#E7B522" class="material-icons">date_range</i><span style="font-weight:bold;">Dec 16th, 2018 </span> <span style="color:#E7B522;">Entrance: 8PM~</span></p>
                        <p>We are arranging an musical event in our restaurant on the upcoming 16th December. We will serve some special item on the event.Say some more about the events that take place.Say some more about the events that take place.Say some more about the events that take place.</p><br><br>
                        <a style="padding:10px 20px;background:#E7B522;font-weight:bold;border-radius:5px;color:#2F1F21;margin-top:10px;" href="#">Learn more</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img src="img/cheff.jpg" height="100%" width="100%">
                    </div>
                    <div class="col-md-7">
                        <h4 style="color:#E7B522;">Live Cooking</h4>
                        
                        <p><i style="margin:5px;margin-bottom:0;padding-bottom:0;color:#E7B522" class="material-icons">date_range</i><span style="font-weight:bold;">Dec 16th, 2018 </span> <span style="color:#E7B522;">Entrance: 8PM~</span></p>
                        <p>We are arranging an musical event in our restaurant on the upcoming 16th December. We will serve some special item on the event.Say some more about the events that take place.Say some more about the events that take place.Say some more about the events that take place.</p><br><br>
                        <a style="padding:10px 20px;background:#E7B522;font-weight:bold;border-radius:5px;color:#2F1F21;margin-top:10px;" href="#">Learn more</a>
                    </div>
                </div><hr>
                <div class="row">
                    <h4 style="font-family:cursive;color:#E7B522;padding:15px;">Stories</h4>
                    <div class="col-md-4 md-margin-bottom-40">
                        <div class="card small">
                            <div class="card-image">
                                    <img style="width:100%;height:300px;" class="img-responsive" src="img/burger-bg.jpg" alt="">  
                                <span class="card-title">Special Burger</span>
                            </div>
                            <div class="card-content">
                                <p style="text-align:center">
                                    some description
                                </p>
                                
                            </div>
                        </div>        
                    </div>
                    <div class="col-md-4 md-margin-bottom-40">
                        <div class="card small">
                            <div class="card-image">
                                    <img style="width:100%;height:300px;" class="img-responsive" src="img/drinks.jpg" alt="">  
                                <span class="card-title">Welcome Smoothie</span>
                            </div>
                            <div class="card-content">
                                <p style="text-align:center">
                                    some description
                                </p>
                                
                            </div>
                        </div>        
                    </div>
                    <div class="col-md-4 md-margin-bottom-40">
                        <div class="card small">
                            <div class="card-image">
                                    <img style="width:100%;height:300px;" class="img-responsive" src="img/happy-hour.jpg" alt="">  
                                <span class="card-title">Happy Hours</span>
                            </div>
                            <div class="card-content">
                                <p style="text-align:center">
                                    some description
                                </p>
                                
                            </div>
                        </div>        
                    </div>
                    <div class="col-md-4 md-margin-bottom-40">
                        <div class="card small">
                            <div class="card-image">
                                    <img style="width:100%;height:300px;" class="img-responsive" src="img/happy-hour.jpg" alt="">  
                                <span class="card-title">Happy Hours</span>
                            </div>
                            <div class="card-content">
                                <p style="text-align:center">
                                    some description
                                </p>
                                
                            </div>
                        </div>        
                    </div>
                    <div class="col-md-4 md-margin-bottom-40">
                        <div class="card small">
                            <div class="card-image">
                                    <img style="width:100%;height:300px;" class="img-responsive" src="img/burger-bg.jpg" alt="">  
                                <span class="card-title">Special Burger</span>
                            </div>
                            <div class="card-content">
                                <p style="text-align:center">
                                    some description
                                </p>
                                
                            </div>
                        </div>        
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection