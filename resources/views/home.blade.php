@extends('layouts.app')

@section('content')
<?php $tab = 'home'; ?>
<section id="banner">
    <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
                @foreach ($sliders as $slider)
                <li>
                <img style="height:500px;" src="storage/{{ $slider->slider_image }}" alt="" />
                <div class="flex-caption">
                    <h3>{{$slider->slider_name}}</h3> 
                    <p>{{$slider->slider_title}}</p> 
                </div>
                </li>
                @endforeach
            </ul>
            
        </div>
    <!-- end slider --> 
</section>
<section class="dishes">
<div class="container">
    <div class="row">
            <div class="col-md-12">
                <div class="aligncenter"><h2 class="aligncenter">Signature Dishes</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, <br/>doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt..</div>
                <br/>
            </div>
        </div>
    
    <div class="row service-v1 margin-bottom-40">
        <div class="col-md-4 md-margin-bottom-40">
                <div class="card small">
                    <div class="card-image">
                            <img class="img-responsive" src="img/service1.jpg" alt="">  
                        <span class="card-title">Cobb Salad</span>
                    </div>
                    <div class="card-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt
                        </p>
                    </div>
                </div>        
        </div>
            <div class="col-md-4 md-margin-bottom-40">
                <div class="card small">
                    <div class="card-image">
                            <img class="img-responsive" src="img/service2.jpg" alt="">  
                        <span class="card-title">Twinkies</span>
                    </div>
                    <div class="card-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt
                        </p>
                    </div>
                </div>        
        </div>
            <div class="col-md-4 md-margin-bottom-40">
                <div class="card small">
                    <div class="card-image">
                            <img class="img-responsive" src="img/service3.jpg" alt="">  
                        <span class="card-title">Pot roast</span>
                    </div>
                    <div class="card-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt
                        </p>
                    </div>
                </div>        
        </div> 
    </div>
</div>
</section>
<section id="content"> 
<div class="container">

    <section class="services">
        <div class="row">
            <div class="col-md-12">
                <div class="aligncenter"><h2 class="aligncenter">We Offer</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, <br/>doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt..</div>
                <br/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 info-blocks"> 
                <i class="icon-info-blocks material-icons">track_changes</i>
                <div class="info-blocks-in">
                    <h3>Coffee</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks material-icons">settings_input_svideo</i>
                <div class="info-blocks-in">
                    <h3>Breakfast</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks material-icons">queue_music</i>
                <div class="info-blocks-in">
                    <h3>Lunch</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks material-icons">my_location</i>
                <div class="info-blocks-in">
                    <h3>Dinner</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks material-icons">shuffle</i>
                <div class="info-blocks-in">
                    <h3>Parties</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks material-icons">tab_unselected</i>
                <div class="info-blocks-in">
                    <h3>Events</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
        </div>
    </section>
</div>
</section>


<section class="section-padding gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Our Restaurant</h2>
                    <p>Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada Pellentesque <br>ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="about-text">
                    <p>Grids is a responsive Multipurpose Template. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>

                    <ul class="withArrow">
                        <li><span class="fa fa-angle-right"></span> Lorem ipsum dolor sit amet</li>
                        <li><span class="fa fa-angle-right"></span> consectetur adipiscing elit</li>
                        <li><span class="fa fa-angle-right"></span> Curabitur aliquet quam id dui</li>
                        <li><span class="fa fa-angle-right"></span> Donec sollicitudin molestie malesuada.</li>
                    </ul>
                    <a href="#" class="btn btn-primary waves-effect waves-dark">Learn More</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="about-image">
                    <img src="img/about.jpg" alt="About Images">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
