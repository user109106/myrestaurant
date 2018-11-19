<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Restaurant | Home') }}</title>

    <!-- Scripts -->
        <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox-media.js') }}"></script>  
    <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('js/animate.js') }}"></script>
    <!-- Vendor Scripts -->
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/animate.js') }}"></script> 
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}" media="screen,projection" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fancybox/jquery.fancybox.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" /> 
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>
<body>
    <div id="wrapper" class="home-page">
        <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a style="text-transform: uppercase;" class="navbar-brand" href="{{ url('/') }}">
                        <i class="icon-info-blocks material-icons">location_on</i>My Restaurant
                    </a>
                </div>
                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                <div class="collapse navbar-collapse">
                   
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ url('/') }}">Home</a></li> 
                            <li><a href="{{ url('/service') }}">Services</a></li>
                            <li><a href="{{ url('/event') }}">Events</a></li>
                            <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                            <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                            <li><a href="{{ url('/cart') }}">cart</a></li>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>

                            <li>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- <li>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li> --}}
                        @else
                            <li><a href="{{ url('/') }}">Home</a></li> 
                            <li><a href="{{ url('/service') }}">Services</a></li>
                            <li><a href="{{ url('/event') }}">Events</a></li>
                            <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                            <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                            <li><a href="{{ url('/cart') }}">cart</a></li>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>

                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#" role="button">
                                    {{ Auth::user()->name }} <b class="caret"></b>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="contact.html">Profile</a></li>
                                    <li><a href="contact.html">My Cart</a></li>
                                    <li><a href="{{ route('users.logout') }}">
                                        {{ __('Logout') }}
                                    </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
        </header>

        
{{-- ////////////////////////////////////////////////// --}}

<section id="banner">
    <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
                    @foreach ($sliders as $slider)
                    <li>
                    <img style="height:500px;" src="storage/{{ $slider->slider_image }}" alt=""/>
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
                <div class="aligncenter"><h2 class="aligncenter">Signature Dishes</h2>We have a great reputation specially for our signature dishes.As per our customers demand, Now we are serving three signature dishes on a daily basis.Each of them are available for respectively breakfast, lunch and dinner.If you are new here,we would specially recommend our any of our signature dishes. Because its our only plesure to meet your hunger.</div>
                <br/>
            </div>
        </div>
    
    <div class="row service-v1 margin-bottom-40">
        @foreach ($signatures as $signature)
        <div class="col-md-4 md-margin-bottom-40">
            <div class="card small">
                <div class="card-image">
                        <img class="img-responsive" src="storage/{{ $signature->item_image }}" alt="" height="100px" width="360px">  
                    <span class="card-title">{{ $signature->item_name }}</span>
                </div>
                <div class="card-content">
                    <p style="text-align:center">
                        {{ $signature->item_description }}
                    </p>
                    
                </div>
            </div>        
        </div>
        @endforeach
         
    </div>
</div>

</section>
<section id="content"> 
<div class="container">

    <section class="services">
        <div class="row">
            <div class="col-md-12">
                <div class="aligncenter"><h2 class="aligncenter">We Offer</h2>Mainly we offer Coffee,Breakfast,Lunch,Dinner,Evening sancks <br/> You can also book our place for Birthday Parties or any types of Business Parties. Next We have some event based offer which are follows by some cultural,religion and social festivals. </div>
                <br/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 info-blocks"> 
                <i class="icon-info-blocks material-icons">free_breakfast</i>
                <div class="info-blocks-in">
                    <h3>Coffee</h3>
                    <p>We have several types of coffee including hot and cold.Say some more. For details visit pricing.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks material-icons">settings_input_svideo</i>
                <div class="info-blocks-in">
                    <h3>Breakfast</h3>
                    <p>Our breakfast starts at 4:00AM and it closes at 10:00AM sharp. For details menu please visit pricing.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks material-icons">restaurant_menu</i>
                <div class="info-blocks-in">
                    <h3>Lunch</h3>
                    <p>Lunch time starts at 12PM and it closes at 3:00PM sharp. For details menu please visit pricing.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks material-icons">restaurant</i>
                <div class="info-blocks-in">
                    <h3>Dinner</h3>
                    <p>Dinner time starts after day break and it continues to midnight. For details menu please visit pricing.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks material-icons">hot_tub</i>
                <div class="info-blocks-in">
                    <h3>Parties</h3>
                    <p>You can book our place for birthday or get together, small family and business parties.For detail info, please visit our booking page or contact us directly.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks material-icons">party_mode</i>
                <div class="info-blocks-in">
                    <h3>Events</h3>
                    <p>Following some festivals, we arrange some parties for our clients and to make the festivals more enjoyable and memorable.</p>
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
                    <p>"Say something about your restaurant here. Like - the main theme or slogan or your tags. Just short easy and nice. The more easy it looks the more attractive it is."</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="about-text">
                    <p>A short description can be here. Like - how long it is been running. Just some sort of intro type or anything as your wish. how long it is been running. Just some sort of intro type or anything as your wish.To ratings can be or bla bla.. Or just a voice of the clients testimonial.</p>

                    <ul class="withArrow">
                        <li><span class="fa fa-angle-right"></span> "This is a place of satisfaction" - <strong>Lilly A.</strong></li>
                        <li><span class="fa fa-angle-right"></span> "My first preference is the Signature Lunch" - <strong>Harry K.</strong></li>
                        <li><span class="fa fa-angle-right"></span> "I really love this place" - <strong>Benzema K.</strong></li>
                        <li><span class="fa fa-angle-right"></span> "Thanks for being a part of my dinner routine" - <strong>Modric L.</strong></li>
                    </ul>
                    <a href="#" class="btn btn-primary waves-effect waves-dark">Learn More</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="about-image">
                    <img src="img/dev1.png" alt="About Images">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ////////////////////////////////////////////////// --}}
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Our Contact</h5>
                    <address>
                    <strong>My New Restaurant</strong><br>
                    Your Restaurant Address<br>
                        Zip-XXXX , Country</address>
                    <p>
                        <i class="icon-phone"></i> (123) 456-789 - 1255-12584 <br>
                        <i class="icon-envelope-alt"></i> aasadarefin@yahoo.com
                    </p>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Quick Links</h5>
                    <ul class="link-list">
                        <li><a class="waves-effect waves-dark" href="#">Latest Events</a></li>
                        <li><a class="waves-effect waves-dark" href="#">Terms and conditions</a></li>
                        <li><a class="waves-effect waves-dark" href="#">Privacy policy</a></li>
                        <li><a class="waves-effect waves-dark" href="#">Career</a></li>
                        <li><a class="waves-effect waves-dark" href="#">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Latest posts</h5>
                    <ul class="link-list">
                        <li><a class="waves-effect waves-dark" href="#">The beef burger fantasy</a></li>
                        <li><a class="waves-effect waves-dark" href="#">Offers are not enough to meet customers demand</a></li>
                        <li><a class="waves-effect waves-dark" href="#">More upcoming offers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Recent News</h5>
                    <ul class="link-list">
                        <li><a class="waves-effect waves-dark" href="#">Gamezone is on the way to launch</a></li>
                        <li><a class="waves-effect waves-dark" href="#">New offer - Buy 1 Get one free</a></li>
                        <li><a class="waves-effect waves-dark" href="#">New event - Music with nightwish(10.10.19)</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            <span>&copy; All right reserved 2018 - Template By </span><a href="https://webthemez.com/hotel-restaurant/" target="_blank">WebThemez</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="social-network">
                        <li><a class="waves-effect waves-dark" href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
    </div>
</body>
</html>
