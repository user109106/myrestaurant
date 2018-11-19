<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('backend/assets/js/jquery-1.10.2.js') }}"></script>
	
	<!-- Bootstrap Js -->
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
	
	<script src="{{ asset('backend/assets/materialize/js/materialize.min.js') }}"></script>
	
    <!-- Metis Menu Js -->
    <script src="{{ asset('backend/assets/js/jquery.metisMenu.js') }}"></script>
    <!-- Morris Chart Js -->
    <script src="{{ asset('backend/assets/js/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/morris/morris.js') }}"></script>
	
	
	<script src="{{ asset('backend/assets/js/easypiechart.js') }}"></script>
	<script src="{{ asset('backend/assets/js/easypiechart-data.js') }}"></script>
	
	 <script src="{{ asset('backend/assets/js/Lightweight-Chart/jquery.chart.js') }}"></script>
	
    <!-- Custom Js -->
    <script src="{{ asset('backend/assets/js/custom-scripts.js') }}"></script> 
    <script src="{{ asset('js/main.js') }}"></script> 
    <!-- DATA TABLE SCRIPTS -->
    <script src="{{ asset('backend/assets/js/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dataTables/dataTables.bootstrap.js') }}"></script>
    
    {{-- <link rel="stylesheet" href="{{ asset('backend/assets/js/dataTables/dataTables.bootstrap.css') }}" > --}}

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('backend/assets/materialize/css/materialize.min.css') }}" media="screen,projection" >
    <!-- Bootstrap Styles-->
    <link href="{{ asset('backend/assets/css/bootstrap.css') }}" rel="stylesheet" >
    <!-- FontAwesome Styles-->
    <link href="{{ asset('backend/assets/css/font-awesome.css') }}" rel="stylesheet" >
    <!-- Morris Chart Styles-->
    <link href="{{ asset('backend/assets/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet" >
    <!-- Custom Styles-->
    <link href="{{ asset('backend/assets/css/custom-styles.css') }}" rel="stylesheet" >
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' >
    <link rel="stylesheet" href="{{ asset('backend/assets/js/Lightweight-Chart/cssCharts.css') }}"> 
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="{{ url('/') }}"><i class="large material-icons">track_changes</i> <strong>{{ config('app.name', 'Laravel') }}</strong></a>

                <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>

                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
            </div>

            <ul class="nav navbar-top-links navbar-right"> 
            <!-- Authentication Links -->
            @guest    
                <li>
                    <a class="dropdown-button waves-effect waves-dark" href="{{ route('admin.login') }}" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>{{ __('Login') }}</b> <i class="material-icons right">arrow_drop_down</i></a>
                </li>
            @else
                <li>
                    <a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a>

                    <ul id="dropdown4" class="dropdown-content dropdown-tasks w250 taskList">
                        <li>
                            <a><div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a><div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</p>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the...</p>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                				
                <li>
                    <a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown3"><i class="fa fa-tasks fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a>

                    <ul id="dropdown3" class="dropdown-content dropdown-tasks w250">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">28% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                            <span class="sr-only">28% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">85% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                    </ul> 
                </li>
                
                <li>
                    <a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i class="fa fa-bell fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a>

                    <ul id="dropdown2" class="dropdown-content w250">
                        <li>
                            <a><div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 min</span>
                            </div></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a><div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 min</span>
                            </div></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a><div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 min</span>
                            </div></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a><div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 min</span>
                            </div></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a><div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                            </div></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            
                <li>
                    <a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>{{ Auth::user()->name }}</b> <i class="material-icons right">arrow_drop_down</i></a>

                    <!-- Dropdown Structure -->
                    <ul id="dropdown1" class="dropdown-content">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> 
                    {{-- logout --}}
                        <li>
                            <a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-fw"></i> {{ __('Logout') }}</a>
                        </li>
                        <div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    {{-- //logout --}}
                    </ul>
                </li>
                @endguest
            </ul>
        </nav>


<!-- Dropdown Structure -->

<!--/. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="active-menu waves-effect waves-dark" href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="waves-effect waves-dark"><i class="fa fa-desktop"></i>Manage Users</a>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark"><i class="fa fa-cutlery" aria-hidden="true"></i>Manage All Orders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('orders.index') }}">See All Orders</a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark"><i class="fa fa-cutlery" aria-hidden="true"></i> Manage All Food Items<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('all_item_categories.index') }}">All Item Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('items.index')}}">All Items</a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark"><i class="fa fa-cutlery" aria-hidden="true"></i>Service Settings<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('services.index') }}">See All Services</a>
                    </li>
                    
                </ul>
            </li>
            
            <li>
                <a href="{{ route('sliders.index') }}" class="waves-effect waves-dark"><i class="fa fa-desktop"></i> Slider Management</a>
            </li>
            <li>
                <a href="{{ route('offers.index') }}" class="waves-effect waves-dark"><i class="fa fa-desktop"></i>Manage Offers</a>
            </li>
            <li>
                <a href="{{ route('events.index') }}" class="waves-effect waves-dark"><i class="fa fa-desktop"></i>Manage Events</a>
            </li>
            

            <li>
                <a href="empty.html" class="waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Empty Page</a>
            </li>
        </ul>

    </div>
</nav>
    <!-- /. NAV SIDE  -->

<div id="page-wrapper">
    
<main class="py-4">
    @yield('content')      
</main>

</div>
    
</div>

</body>

<footer style="margin-top:100px;margin-bottom:50px;">
    <div class="container" style="color:#fff;">
        
        <div class="col-md-12" style="text-align:center;">
            <style>
                .footersocial{padding: 10px 15px;margin: 5px;font-size:15px;border:1px solid rgba(0, 0, 0, 0.2);}
                .footersocial:hover{background: #000;color:#fff;}
            </style>
            <i class="fa fa-instagram footersocial" aria-hidden="true"></i>
            <i class="fa fa-facebook footersocial" aria-hidden="true"></i>
            <i class="fa fa-twitter footersocial" aria-hidden="true"></i>
            <i class="fa fa-youtube-play footersocial" aria-hidden="true"></i>
        </div>
        <div class="col-md-12" style="text-align:center;">
            <p><span>&copy; My restaurant 2018 All right reserved.</span></p>
        </div>
    
    </div>
</footer>
</html>
