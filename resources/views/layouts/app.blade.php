<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="themesflat.com">
    <title>Chathuranga Auto Care</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/gmap3.min.js') }}" defer></script>
    <script src="{{ asset('js/imagesloaded.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.cookie.js') }}" defer></script>
    <script src="{{ asset('js/jquery.countdown.js') }}" defer></script>
    <script src="{{ asset('js/jquery.easing.js') }}" defer></script>
    <script src="{{ asset('js/jquery.flexslider-min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.isotope.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.sticky.js') }}" defer></script>
    <script src="{{ asset('js/jquery.themepunch.revolution.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.themepunch.tools.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-countTo.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui.js') }}" defer></script>
    <script src="{{ asset('js/jquery-validate.js') }}" defer></script>
    <script src="{{ asset('js/jquery-waypoints.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/owl.carousel.js') }}" defer></script>
    <script src="{{ asset('js/parallax.js') }}" defer></script>
    <script src="{{ asset('js/slider.js') }}" defer></script>
    <script src="{{ asset('js/switcher.js') }}" defer></script>
    <script src="{{ asset('js/html5shiv.js') }}" defer></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>



    <!-- Icons -->
    <link href="{{ asset('icon/apple-touch-icon-48-precomposed.png') }}" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="{{ asset('icon/apple-touch-icon-32-precomposed.png') }}" rel="apple-touch-icon-precomposed">
    <link href="{{ asset('icon/favicon.png') }}" rel="shortcut icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('fonts/fontawesome-webfontd41d.eot') }}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.flex-images.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('responsive/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/revolution-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shortcodes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    {{--<link href="{{ asset('css/preloader.css') }}" rel="stylesheet">--}}

<style>
    .preloader {
        width: 200px;
        height: 200px;
    }
    .preloader,
    .preloader hr {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }
    .preloader hr {
        box-sizing: border-box;
        display: block;
        border: 2px solid transparent;
        border-radius: 50%;

        animation: 1s spin linear infinite;
    }
    .preloader hr:nth-of-type(1) {
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-top-color: #085820;
        animation-duration: 2.4s;
    }
    .preloader hr:nth-of-type(2) {
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        border-top-color: #138535;
        animation-duration: 2s;
    }
    .preloader hr:nth-of-type(3) {
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-top-color: #6BD089;
        animation-duration: 1.6s;
    }
    .preloader hr:nth-of-type(4) {
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;
        border-top-color: #98E0AD;
        animation-duration: 1.2s;
    }
    .preloader hr:nth-of-type(5) {
        top: 25px;
        left: 25px;
        right: 25px;
        bottom: 25px;
        border-top-color: #C8EFD4;
        animation-duration: .8s;
    }


    @keyframes spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
</style>

</head>
<script type="text/javascript">
    $(window).on('load', function() {
        $("#preloaders").fadeOut(5000);
    });
</script>
<section class="loading-overlay" id="preloaders"  style="background: black">

    <div class="preloader">
        <hr><hr><hr><hr><hr>
    </div>
</section>
<body >

<div id="app">

        <div id="site-header">
            <div id="headerbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="custom-info">
                                <i class="fa fa-clock-o">
                                </i>We'are Open: Monday - Saturday, 8:00 Am - 18:00 Pm
                            </div><!-- /.custom-info -->



                            <nav id="site-navigator" class="top-navigator">
                                <ul id="menu-top-menu" class="menu">

                                                    @guest
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            @if (Route::has('register'))
                                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                            @endif
                                                        </li>
                                                    @else

                                                        <li>
                                                            <a style="color: white" id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                {{ Auth::user()->name }} <span class="caret"></span>
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                                <a style="color: black" class="dropdown-item" href="{{ route('logout') }}"
                                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                                                </a>

                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                </form>
                                                            </div>
                                                       </li>


                                                    @endguest

                                </ul>
                            </nav>
                            <!-- /.top-navigator -->
                        </div>
                    </div>
                </div><!-- /.container -->
            </div><!-- /.headerbar -->

            <!-- Header -->
            <header id="header" class="header header-v2 clearfix">
                <div class="site-brand clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="site-logo">
                                    <div id="logo" class="logo">
                                        <a href="{{url('/')}}" rel="home">
                                            <img src="{{ asset('images/cac.png') }}" style="width: 150px;height: 75px" alt="image">
                                        </a>
                                    </div><!-- /.logo -->
                                </div>
                                <div class="header-widgets">
                                    <div class="widget widget_text">
                                        <div class="textwidget">
                                            <div class="info-icon">
                                                <i class="fa fa-phone"></i>
                                                <div class="content">Call Us Now<br><span>036-2235617</span></div>
                                            </div>
                                        </div>
                                    </div><!-- /.widget-text -->

                                    <div id="text-4" class="widget widget_text">
                                        <div class="textwidget">
                                            <div class="info-icon">
                                                <i class="fa fa-map-marker yellow"></i>
                                                <div class="content">7/A/4 Vidya Road<br><span>Awissawella</span></div>
                                            </div>
                                        </div>
                                    </div><!-- /.widget-text -->

                                    <div id="text-5" class="widget widget_text">
                                        <div class="textwidget">
                                            <a href="{{route('ServiceList')}}" class="button yellow"><i class="fa fa-calendar"></i>&nbsp; &nbsp;Make an Appointment</a>
                                        </div>
                                    </div>
                                </div><!-- /.header-widgets -->
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div><!-- /.site-brand -->
                <div id="flat-site-navigator"  class="site-navigator">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header-wrap clearfix">
                                    <div class="nav-wrap clearfix">
                                        <div class="btn-menu"></div><!-- //mobile menu button -->
                                        <nav id="mainnav" class="mainnav">
                                            <ul class="menu">
                                                <li class="home">
                                                    <a href="{{url('/')}}">Home</a>

                                                </li>

                                                <li>
                                                    <a href="{{route('ServiceList')}}">Services</a>

                                                </li>

                                                <li><a href="{{route('contactUs')}}">Contact</a></li>
                                                @guest

                                                @else
                                                    <?php
                                                    $date=\Carbon\Carbon::now();
                                                    $mybooking=DB::table('bookings')->leftjoin('services','services.id','bookings.serviceId')->where('userId',Auth::user()->id)->where('date','>=',$date)->get();
                                                    ?>
                                                    <li><a>Your Upcoming Bookings <label class="label label-success">{{$mybooking->count()}}</label></a>
                                                        <ul class="submenu">

                                                            @foreach($mybooking as $mb)
                                                                 <li>
                                                                     <a style="text-align: center;color: white">
                                                                         <h3 style="color: white">{{$mb->serviceName}}</h3>
                                                                         <h5 style="color: white">Date : {{$mb->date}}</h5>
                                                                         <h5 style="color: white">Time : {{$mb->time}}</h5>
                                                                         <h5 style="color: white">LKR {{$mb->serviceFee}}</h5>
                                                                     </a>
                                                                 </li>
                                                            @endforeach
                                                        </ul><!-- /.submenu -->
                                                    </li>
                                                @endguest

                                            </ul><!-- /.menu -->
                                            <ul class="menu-extra">

                                            </ul> <!-- /.menu-extra -->
                                        </nav><!-- /.mainnav -->

                                    </div><!-- /.nav-wrap -->
                                </div><!-- /.header-wrap -->
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div><!-- /.site-navigator -->
            </header><!-- /.header -->

            <!-- Slider -->

        </div>


<br>

    </div>
<main class="py-4">
    @yield('content')
</main>
</body>
</html>
