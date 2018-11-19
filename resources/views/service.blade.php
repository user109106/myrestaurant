@extends('layouts.app_pages')

@section('content')
<?php $tab = 'service'; ?>
<section id="inner-headline">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="pageTitle">Services</h2>
        </div>
    </div>
</div>
</section>
<section id="content">
    <div class="container content">		
    <!-- Service Blcoks -->
        
    <div class="row"> 
        <div class="col-md-12">
            <div class="about-logo">
                <h3>Our Available <span class="color">Services</span></h3>
                <p>It is a great pleasure for us to provide the recent available services to our customers. Still we are trying to add new services to our restaurant. If you think of any good idea of service that we can provide please feel free to let us know about it.And say something more about your services. Define all of your services here. Thank you.</p>
            </div>  
        </div>
    </div>

    
    <!-- Info Blcoks -->
    <div class="row">
        @foreach ($activeservices as $service)
        <div class="col-sm-4 info-blocks">
            <i class="icon-info-blocks fa fa-html5"></i>
            <div class="info-blocks-in">
                <h3>{{ $service->service_title }}</h3>
                <p style="text-align:justify;">{{ $service->service_details }}</p>
            </div>
        </div>
        @endforeach
        
    </div>
    <!-- End Info Blcoks -->
    <h3>Upcoming <span class="color">Services</span></h3>
    <div class="row service-v1 margin-bottom-20">
        @foreach ($services as $service)
        <div class="col-md-4 info-blocks">
            <div class="card small">
                <div class="card-image">
                        <img style="height:230px;" class="img-responsive" src="storage/{{ $service->service_image}}" alt="">  
                    <span class="card-title">{{ $service->service_title }}</span>
                </div>
                <div class="card-content">
                    <p style="text-align:justify;">{!! \Illuminate\Support\Str::limit($service->service_details,100)  !!}</p>
                    
                </div>
            </div>        
        </div>
        @endforeach   
             
    </div>
    <!-- End Service Blcoks -->

    

    
</div>
</section>


@endsection