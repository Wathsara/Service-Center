@extends('layouts.app')

@section('content')
    <div id="site-content">
        <!-- Map -->
        @if(Session::has('que'))
            <div class="alert alert-success" role="alert" style="margin-left: 20%;margin-right: 20%">
                <strong>Thank you for Contacting Us.Our team Will contact You Soon....</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Session::forget('que') }}
        @endif
        <section class="flat-row pad-top0px" style="text-align: center;width: 100%">

                <div style="width: 100%" id="flat-map"><div class="gmap_canvas" style="width: 100%;text-align: center"><iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Awissawella&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1080px;}</style></div>
        </section>

        <section class="flat-row pad-top0px pad-bottom0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form  class="flat-contact-form" method="post" action="{{route('question')}}">
                            {{csrf_field()}}
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
                                    <div class="col-md-12">
                                        <input type="text" id="subject" name="subject" class="input-text-subject" placeholder="Subject" required="required">
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->

                                <div class="flat-divider d30px"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="textarea-question" id="message" name="question" placeholder="Message" required="required"></textarea>
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->

                                <div class="flat-divider d26px"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="submit-wrap">
                                            <input type="submit" class="flat-button bg-theme" value="Send Your Question">
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
