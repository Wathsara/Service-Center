@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">

                        </div>
                    </div>
                </div>


                <h3>Services</h3>
                <br>

                @if(Session::has('serviceadd'))
                    <div class="alert alert-success" role="alert">
                        <strong>Service Successfully Added</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Session::forget('serviceadd') }}
                @endif

                @if(Session::has('serviceupdate'))
                    <div class="alert alert-success" role="alert">
                        <strong>Service Successfully Updated</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Session::forget('serviceupdate') }}
                @endif
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Error Please Check Your Details</strong>
                    </div>
                @endif
                @if(Session::has('servicedel'))
                    <div class="alert alert-warning" role="alert">
                        <strong>Service Successfully Deleted</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Session::forget('servicedel') }}
                @endif


                <div class="row">
                    <div class="col-md-12">
                        {{--Button add new Service--}}
                        <button style="float: right" type="button" class="btn btn-success" data-toggle="modal" data-target="#addservice">
                            Add New Service
                        </button>

                        {{--Add new service modal--}}
                        <div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">New Service</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('addService')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="serviceName"style="font-size: 18px;">Service name</label><br>
                                                <input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="Ex: Full Service" required>
                                            </div><br>
                                            <div class="form-group">
                                                <label for="serviceDiscription" style="font-size: 18px;">Service Discription</label><br>
                                                <textarea type="text" class="form-control" id="serviceDiscription" name="serviceDiscription" placeholder="Short discription about the Service" required></textarea>
                                            </div><br>

                                            <div class="form-group">
                                                <label for="serviceFee" style="font-size: 18px;">Service Fee <b>LKR</b></label><br>
                                                <input type="number" class="form-control" id="serviceFee" name="serviceFee" placeholder="2500.00" required>
                                            </div><br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" style="margin-right: 5px;" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title">Service Details</h4>
                            </div>

                            {{--service table view card--}}
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Service Name</th>
                                            <th>Service Discription</th>
                                            <th>Service Fee</th>
                                            <th class="text-right">Actions</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($ser as $service)
                                            <tr>
                                                <td class="text-center">{{$service->id}}</td>
                                                <td>{{$service->serviceName}}</td>
                                                <td>{{$service->serviceDiscription}} </td>
                                                <td>LKR {{$service->serviceFee}}</td>
                                                <td class="td-actions text-right">
                                                    {{--update service button--}}
                                                    <button type="button" rel="tooltip" class="btn btn-success btn-link" data-toggle="modal" data-target="#updateService{{$service->id}}">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    {{--update service modal--}}
                                                    <div class="modal fade" id="updateService{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h2 class="modal-title" id="exampleModalLabel">Update Service</h2>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('updateService')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        <div class="form-group">
                                                                            <label for="serviceName"style="font-size: 18px;">Service name</label><br>
                                                                            <input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="Ex: Full Service" value="{{$service->serviceName}}" required>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="serviceDiscription" style="font-size: 18px;">Service Discription</label><br>
                                                                            <textarea type="text" class="form-control" id="serviceDiscription" name="serviceDiscription" placeholder="Short discription about the Service"  required>{{$service->serviceDiscription}}</textarea>
                                                                        </div><br>
                                                                        <input type="hidden" value="{{$service->id}}" name="sid">
                                                                        <div class="form-group">
                                                                            <label for="serviceFee" style="font-size: 18px;">Service Fee <b>LKR</b></label><br>
                                                                            <input type="number" step="0.01" class="form-control" id="serviceFee" name="serviceFee" placeholder="2500.00" value="{{$service->serviceFee}}" required>
                                                                        </div><br>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" style="margin-right: 5px;" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-success">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--delete service button--}}
                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-toggle="modal" data-target="#delService">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                    {{--delete service modal--}}
                                                    <div class="modal fade bd-example-modal-sm" tabindex="-1" id="delService" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLabel">Are you Sure You want to Delete this Service?</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('deleteService')}}" method="post">
                                                                        {{csrf_field()}}

                                                                        <input type="hidden" value="{{$service->id}}" name="sid">

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" style="margin-right: 5px;" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-warning">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    </div>

    </div>



    <!--   Core JS Files   -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>

    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/perfect-scrollbar.jquery.min.js" ></script>


    <!-- Plugin for the momentJs  -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/moment.min.js"></script>

    <!--  Plugin for Sweet Alert -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/sweetalert2.js"></script>

    <!-- Forms Validations Plugin -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jquery.validate.min.js"></script>

    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jquery.bootstrap-wizard.js"></script>

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/bootstrap-selectpicker.js" ></script>

    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>

    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jquery.dataTables.min.js"></script>

    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/bootstrap-tagsinput.js"></script>

    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jasny-bootstrap.min.js"></script>

    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/fullcalendar.min.js"></script>

    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jquery-jvectormap.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/nouislider.min.js" ></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <!-- Library for adding dinamically elements -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/arrive.min.js"></script>


    <!--  Google Maps Plugin    -->

    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <!-- Chartist JS -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/bootstrap-notify.js"></script>





    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/material-dashboard.min.js?v=2.0.2" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/demo/demo.js"></script>
    <script>
        $(document).ready(function(){
            $().ready(function(){
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>






    <!-- Sharrre libray -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/demo/jquery.sharrre.js"></script>


    <script>
        $(document).ready(function(){


            $('#facebook').sharrre({
                share: {
                    facebook: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                click: function(api, options){
                    api.simulateClick();
                    api.openPopup('facebook');
                },
                template: '<i class="fab fa-facebook-f"></i> Facebook',
                url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
            });

            $('#google').sharrre({
                share: {
                    googlePlus: true
                },
                enableCounter: false,
                enableHover: false,
                enableTracking: true,
                click: function(api, options){
                    api.simulateClick();
                    api.openPopup('googlePlus');
                },
                template: '<i class="fab fa-google-plus"></i> Google',
                url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
            });

            $('#twitter').sharrre({
                share: {
                    twitter: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                buttons: { twitter: {via: 'CreativeTim'}},
                click: function(api, options){
                    api.simulateClick();
                    api.openPopup('twitter');
                },
                template: '<i class="fab fa-twitter"></i> Twitter',
                url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
            });


            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-46172202-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

            // Facebook Pixel Code Don't Delete
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
                n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
                document,'script','http://connect.facebook.net/en_US/fbevents.js');

            try{
                fbq('init', '111649226022273');
                fbq('track', "PageView");

            }catch(err) {
                console.log('Facebook Track Error:', err);
            }

        });
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"
        />

    </noscript>
















    <script>
        $(document).ready(function(){
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

            md.initVectorMap();

        });
    </script>

@endsection