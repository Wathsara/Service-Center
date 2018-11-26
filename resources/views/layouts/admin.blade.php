<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="themesflat.com">
    <link href="{{ asset('icon/favicon.png') }}" rel="shortcut icon">
    <title>Chathuranga Auto Care</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="https://demos.creative-tim.com/material-dashboard-pro/assets/css/material-dashboard.min.css?v=2.0.2" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="https://demos.creative-tim.com/material-dashboard-pro/assets/demo/demo.css" rel="stylesheet" />

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
</head>
<body>
<div class="wrapper ">

    <div class="sidebar" data-color="rose" data-background-color="black" data-image="https://demos.creative-tim.com/material-dashboard-pro/assets/img/sidebar-1.jpg">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

            Tip 2: you can also add an image using data-image tag
        -->

        <div class="logo"><a href="#" class="simple-text logo-mini">
                CT
            </a>

            <a href="#" class="simple-text logo-normal">
                Chaturanga <br>AutoCare
            </a></div>

        <div class="sidebar-wrapper">

            <div class="user">
                <div class="photo">
                    <img src="{{asset('admin.jpeg')}}" />
                </div>
                <div class="user-info">
                    <a>
                    <span>
                       {{Auth::user()->name}}

                    </span>
                    </a>

                </div>
            </div>
            <ul class="nav">

                <li class="nav-item ">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('appointment')}}">
                        <i class="material-icons">bookings</i>
                        <p> Appointments</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('service')}}">
                        <i class="material-icons">content_paste</i>
                        <p> Services Management</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('employee')}}">
                        <i class="material-icons">content_paste</i>
                        <p> Employee Management</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{route('customerQuestion')}}">
                        <i class="material-icons">help</i>
                        <p> Customer Question</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="material-icons">fingerprint</i>
                        <p> Logout</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>



        </div>
    </div>


    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">


                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>


                    <a class="navbar-brand" href="#pablo">Admin</a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
</body>
        <!-- End Navbar -->
</html>