@extends('layouts.app_pages')

@section('content')
<?php $tab = 'gallery'; ?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Portfolio</h2>
			</div>
		</div>
	</div>
</section>
<section id="content">
	<div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <div class="about-logo">
                    <h3>Our <span class="color">Gallery</span></h3>
                    <p>Welcome to our gallery. We like to share our photos with our clients. Take a look at our photos. Say something about your own gallery.</p>
                        
                </div>  
            </div>
        </div> 	
	</div>
</section>	
			  <!-- Start Gallery 1-2 -->
<section id="gallery-1" class="content-block section-wrapper gallery-1">
    <div class="container">

    <div class="editContent">
        <ul class="filter">
            <li class="active"><a href="#" data-filter="*">All</a></li>
            <li><a class="waves-effect waves-dark" href="#" data-filter=".offer">Offers</a></li>
            <li><a class="waves-effect waves-dark" href="#" data-filter=".service">Services</a></li>
            <li><a class="waves-effect waves-dark" href="#" data-filter=".event">Events</a></li>
            <li><a class="waves-effect waves-dark" href="#" data-filter=".item">Items</a></li>
            <li><a class="waves-effect waves-dark" href="#" data-filter=".photography">Sliders</a></li>
        </ul>
    </div>
    <!-- /.gallery-filter -->
    
    <div class="row">
        <div id="isotope-gallery-container">
            @foreach ($items as $item)
                
            <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper item offer">
                <div class="gallery-item">
                    
                    <div class="gallery-thumb">
                        <img src="storage/{{ $item->item_image }}" class="img-responsive" alt="1st gallery Thumb">
                        <div class="image-overlay"></div>
                        <a href="storage/{{ $item->item_image }}" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                        
                    </div>
                    <div class="gallery-details">
                        <div class="editContent">
                            <h5>Item</h5>
                        </div>
                        <div class="editContent">
                            <p>{{ $item->item_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /.gallery-item-wrapper -->

            @foreach ($offers as $offer)
            <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper service event">
                <div class="gallery-item">
                    
                    <div class="gallery-thumb">
                        <img src="storage/{{ $offer->offer_image }}" class="img-responsive" alt="2nd gallery Thumb">
                        <div class="image-overlay"></div>
                        <a href="storage/{{ $offer->offer_image }}" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                        
                    </div>
                    <div class="gallery-details">
                        <div class="editContent">
                            <h5>Offer Item</h5>
                        </div>
                        <div class="editContent">
                            <p>{{ $offer->offer_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        
            <!-- /.gallery-item-wrapper -->

            @foreach ($services as $service)
            <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper photography item">
                <div class="gallery-item">
                    
                    <div class="gallery-thumb">
                        <img src="storage/{{ $service->service_image }}" class="img-responsive" alt="3rd gallery Thumb">
                        <div class="image-overlay"></div>
                        <a href="storage/{{ $service->service_image }}" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                        
                    </div>
                    <div class="gallery-details">
                        <div class="editContent">
                            <h5>Service Item</h5>
                        </div>
                        <div class="editContent">
                            <p>{{ $service->service_title}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        
            <!-- /.gallery-item-wrapper -->

            @foreach ($sliders as $slider)
            <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper offer service">
                <div class="gallery-item">
                    
                    <div class="gallery-thumb">
                        <img src="storage/{{ $slider->slider_image }}" class="img-responsive" alt="4th gallery Thumb">
                        <div class="image-overlay"></div>
                        <a href="storage/{{ $slider->slider_image }}" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                        
                    </div>
                    <div class="gallery-details">
                        <div class="editContent">
                            <h5>Slider Item</h5>
                        </div>
                        <div class="editContent">
                            <p>{{ $slider->slider_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.gallery-item-wrapper -->
        @endforeach
        
        </div>
        <!-- /.isotope-gallery-container -->
    </div>
    <!-- /.row --> 
<!-- /.container -->
</div>
    </section>
@endsection