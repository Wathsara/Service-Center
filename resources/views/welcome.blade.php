@extends('layouts.app')

@section('content')
    <div id="site-wrapper">
        <div id="site-header">
            @if(Session::has('que'))
                <div class="alert alert-success" role="alert" style="margin-left: 20%;margin-right: 20%">
                    <strong>Thank you for Contacting Us.Our team Will contact You Soon....</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            {{ Session::forget('que') }}
        @endif
        <!-- Slider -->
            <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                    <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                        <img src="images/slides/slider_1.jpg" alt="slider-image" />

                    </li>

                    </ul>
            </div>
        </div>
        </div>


    <div id="site-content">
        <!-- About us -->
        <section class="flat-row popup pad-bottom70px">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="title-section">
                            <h2 class="title">About Chathuranga Auto Care</h2>
                            <p class="desc-title">Committed to providing the best auto repair services For your Tuk Tuk in Sri Lanka.</p>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->

                <div class="flat-divider d20px"></div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="images-single-flexslider">
                            <ul class="slides">
                                <li>
                                    <a class="img-post popup-gallery" href="images/images-single/1.jpg"><img src="images/images-single/1.jpg" alt="image"></a>
                                </li>

                            </ul>
                        </div><!-- /.images-single-flexslider -->
                    </div><!-- /.col-md-4 -->

                    <div class="col-md-8">
                        <div class="flat-about-us">
                            <p><span class="dropcap">E</span>stablished over 10 years, Chathuranga Auto Care prides itself on its reputation for providing high quality accident repairs and refinishing on all makes of Tuk Tuks.</p>
                            <p>We understand that our customers demand the highest quality repair with an efficient turnaround time with as little inconvenience as possible.</p>
                            <p>Our Team Has the Best knowlede and the capabilities to fix your any sort of trouble</p>

                        </div><!-- /.flat-about-us -->
                    </div><!-- /.col-md-4 -->


                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->

        <section class="flat-row parallax parallax1 pad-top70px pad-bottom70px">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="title-section style1">
                            <h2 class="title">How it Works</h2>
                            <p class="desc-title">Do it in just 4 simple steps. A Consumer’s Guide to Automotive Repair in Sri Lanka.</p>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->

                <div class="flat-divider d40px"></div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="flat-iconbox style1">
                            <div class="icon">
                                <img src="images/iconbox/icon1.svg" alt="images">
                            </div>
                            <div class="content">
                                <h4 class="box-title">1. Register to Our System</h4>
                                <p>Instant Online Registration</p>
                            </div>
                        </div> <!-- /.flat-iconbox -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3">
                        <div class="flat-iconbox style1">
                            <div class="icon">
                                <img src="images/iconbox/icon3.svg" alt="images">
                            </div>
                            <div class="content">
                                <h4 class="box-title">2. Select A Service</h4>
                                <p>Select What sort of Service you Need</p>
                            </div>
                        </div> <!-- /.flat-iconbox -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3">
                        <div class="flat-iconbox style1">
                            <div class="icon">
                                <img src="images/iconbox/icon2.svg" alt="images">
                            </div>
                            <div class="content">
                                <h4 class="box-title">3. Book Online</h4>
                                <p>Book a Date and Time You Want with successful online Payment</p>
                            </div>
                        </div> <!-- /.flat-iconbox -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3">
                        <div class="flat-iconbox style1">
                            <div class="icon">
                                <img src="images/iconbox/icon4.svg" alt="images">
                            </div>
                            <div class="content">
                                <h4 class="box-title">4. Get your Tuk Tuk fixed</h4>
                                <p>You visit the garage to fix your Tuk Tuk</p>
                            </div>
                        </div> <!-- /.flat-iconbox -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-button" style="text-align: center;">
                            <a href="{{route('ServiceList')}}" class="button outline">Book Now</a>
                        </div>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->

        <!-- Services -->
        <section class="flat-row services pad-bottom0px">
            <div class="container">
                <div class="row">
                    <div class="three-columns">
                        <?php $serv=DB::table('services')->orderBy(DB::raw('RAND()'))->take(2)->get()?>
                        @foreach($serv as $ser)

                        <div class="images-single object">

                            <div class="desc-img">
                                <h4 class="title">{{$ser->serviceName}}</h4>
                                <div class="content">{{$ser->serviceDiscription}}</div>

                            </div><!-- /.desc-img -->
                       </div><!-- /.images-single -->
                       @endforeach
                       <div class="object">
                            <form  id="contactform" class="flat-contact-form style1" method="post" action="{{route('question')}}">
                                <div class="quick-appoinment">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{csrf_field()}}
                                            <input type="text" id="name" name="name" class="input-text-name" placeholder="Name" required="required">
                                            <input type="email" id="email" name="email" class="input-text-email" placeholder="Email" required="required">
                                            <input type="text" id="subject" name="subject" class="input-text-subject" placeholder="Your Subject Here" required="required">
                                            <textarea class="textarea-question" id="message" name="question" placeholder="Your Question Here" required="required"></textarea>
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->

                                    <div class="flat-divider d26px"></div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" value="Ask Question" class="input-submit">
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                </div>
                            </form>
                        </div><!-- /.object -->
                    </div> <!-- /.three-columns -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->

        <section class="flat-row flat-bg-white pad-top70px pad-bottom70px">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="title-section">
                            <h2 class="title">Our Team</h2>
                            <p class="desc-title">Who is behind the best mechanic service in town?</p>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <?php $empl=DB::table('employees')->orderBy(DB::raw('RAND()'))->take(3)->get()?>

                        <div class="member-carousel">
                            <!--one Team member card starts -->
                            @foreach($empl as $em)
                            <div class="col-md-4">
                                <article class="member entry object">
                                <div class="member-image">
                                    <img src="{{asset('employeePic/'.$em->id)}}" style="height: 200px" alt="t6">

                                </div>

                                <div class="member-detail">
                                    <h3 class="member-name">{{$em->employeeName}}</h3>
                                    <p class="member-subtitle">{{$em->employeeType}}</p>

                                </div>
                            </article>
                            </div><!--one Team member card ends -->
                            @endforeach
                        </div><!-- /.main-content-wrap -->

                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->


    </div><!--/.site-content -->
        @include('layouts.footer')
    </div>

@endsection