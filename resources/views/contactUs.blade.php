@extends('layouts.app')

@section('content')
    <div id="site-content">
        <!-- Map -->
        <section class="flat-row pad-top0px" style="text-align: center">
            <div id="flat-map">
                <div style="margin-left: 10%" class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Awissawella&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de/google-maps/">pureblack.de</a></div><style>.mapouter{text-align:right;height:500px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1080px;}</style></div> </div>
        </section>

        <section class="flat-row pad-top0px pad-bottom0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form  id="contactform" class="flat-contact-form" method="post" action="http://themesflat.com/html/anycar/contact/contact-process.php">
                            <div class="quick-appoinment">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="name" name="name" class="input-text-name" placeholder="Name" required="required">
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <input type="text" id="email" name="email" class="input-text-email" placeholder="Email" required="required">
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->

                                <div class="flat-divider d30px"></div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="phone" name="phone" class="input-text-phone" placeholder="Phone" required="required">
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <input type="text" id="subject" name="subject" class="input-text-subject" placeholder="Subject" required="required">
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->

                                <div class="flat-divider d30px"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="textarea-question" id="message" name="message" placeholder="Message" required="required"></textarea>
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->

                                <div class="flat-divider d26px"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="submit-wrap">
                                            <button class="flat-button bg-theme">Send Your Message</button>
                                        </div>
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                            </div>
                        </form>
                    </div><!-- /.col-md-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->

        <div class="flat-divider d50px"></div>
    </div><!--/.site-content -->
    @include('layouts.footer')
@endsection
