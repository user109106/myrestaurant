<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Restaurant | ') }}
        <?php
            if($tab == 'home'){echo "HOME";}
            if($tab == 'service'){echo "Services";}
            if($tab == 'event'){echo "Events";}
            if($tab == 'gallery'){echo "Gallery";}
            if($tab == 'pricing'){echo "Pricing";}
            if($tab == 'cart'){echo "Cart";}
            if($tab == 'contact'){echo "Contact";}
            if($tab == 'login'){echo "Login";}
            if($tab == 'register'){echo "Register";}
            if($tab == 'register'){echo "Register";}
            if($tab == 'bkash'){echo "Payment-Bkash";}
            if($tab == 'order-confirm'){echo "order-confirm";}
            if($tab == 'cash-payment'){echo "cash-payment";}
            if($tab == 'cash-confirm'){echo "cash-confirm";}
        ?>
    </title>

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
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/gallery-1.css')}}" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
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
                            <li <?php if($tab == 'service'){echo 'class="active"';} ?>><a href="{{ url('/service') }}">Services</a></li>
                            <li <?php if($tab == 'event'){echo 'class="active"';} ?>><a href="{{ url('/event') }}">Events</a></li>
                            <li <?php if($tab == 'gallery'){echo 'class="active"';} ?>><a href="{{ url('/gallery') }}">Gallery</a></li>
                            <li <?php if($tab == 'pricing'){echo 'class="active"';} ?>><a href="{{ url('/pricing') }}">Pricing</a></li>
                            <li <?php if($tab == 'cart'){echo 'class="active"';} ?>><a href="{{ url('/cart') }}">cart</a></li>
                            <li <?php if($tab == 'contact'){echo 'class="active"';} ?>><a href="{{ url('/contact') }}">Contact</a></li>

                            <li <?php if($tab == 'login'){echo 'class="active"';} ?>>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- <li>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li> --}}
                        @else
                            <li><a href="{{ url('/') }}">Home</a></li> 
                            <li <?php if($tab == 'service'){echo 'class="active"';} ?>><a href="{{ url('/service') }}">Services</a></li>
                            <li <?php if($tab == 'event'){echo 'class="active"';} ?>><a href="{{ url('/event') }}">Events</a></li>
                            <li <?php if($tab == 'gallery'){echo 'class="active"';} ?>><a href="{{ url('/gallery') }}">Gallery</a></li>
                            <li <?php if($tab == 'pricing'){echo 'class="active"';} ?>><a href="{{ url('/pricing') }}">Pricing</a></li>
                            <li <?php if($tab == 'cart'){echo 'class="active"';} ?>><a href="{{ url('/cart') }}">cart</a></li>
                            <li <?php if($tab == 'contact'){echo 'class="active"';} ?>><a href="{{ url('/contact') }}">Contact</a></li>

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
        
        <main class="py-4">
            @yield('content')
        </main>

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
