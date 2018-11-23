<div class="site-footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div id="text01" class="widget widget_text ">
                    <div class="textwidget">
                        <div class="footer-info">
                            <p>
                                <img  alt="AnyCar" src="{{asset('images/cac.png')}}">
                            </p>
                            <p>We offer a commitment to personalized service for our clients. If you have further questions or need help with a case, please complete our quick form below. A team<br>member will return your message as soon as possible.</p>
                            <div class="two-columns row">
                                <div class="object">
                                    <i class="fa fa-map-marker"></i>
                                    <strong>66 Nicholson St Buffalo New York US</strong> <br>
                                    <i class="fa fa-phone"></i>
                                    <strong>Tel:</strong> 011 3 456 789
                                </div>
                                <div class="object ft-phone">
                                    <i class="fa fa-tablet"></i>
                                    <strong>Mobile: </strong>0718 888 666<br>
                                    <i class="fa fa-envelope"></i>
                                    <strong>E-mail:</strong>
                                    <a href="#">support@linethemes.com</a>
                                </div>
                            </div><!-- /.row -->
                        </div>
                    </div>
                </div>
                <div class="widget widget_nav_menu">
                    <h3 class="widget-title">Pages</h3>
                    <div class="menu-sample-pages-container">
                        <ul  class="menu">
                            <li ><a href="{{url('/')}}">Home</a></li>
                            <li ><a href="{{route('ServiceList')}}">Services</a></li>
                            <li ><a href="#">Our Team</a></li>
                            <li ><a href="{{route('contactUs')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>


                <div class="widget widget_nav_menu">
                    <h3 class="widget-title">SERVICES</h3>
                    <div class="menu-sample-pages-container">
                        <ul  class="menu">
                            <?php $serviceList =DB::table('services')->get();?>
                            @foreach($serviceList as $s)
                            <li ><a href="#">{{$s->serviceName}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-widgets -->
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <div class="social-links">
                            <a href="https://twitter.com/">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://facebook.com/">
                                <i class="fa fa-facebook"></i>
                            </a>

                        </div><!-- /.social-links -->
                        <div class="copyright-content">
                            Copyright © 2018 Chathuranga Auto Care
                        </div><!-- /.copyright-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Go Top -->
    <a class="go-top">
    </a>
</div>