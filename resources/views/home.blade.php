@extends('layouts.app')

@section('content')
<div id="site-wrapper">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Reserved Successfully</strong>
        </div>
        {{ Session::forget('success') }}
    @endif


<div class="flat-row page-title  parallax parallax1">
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="page-title-heading">
                    <h1 class="title">PRICING</h1>
                    <p class="subtitle">Here you can see what we have to offer and what you’ll pay for that.</p>
                </div><!-- /.page-title-captions -->
                <div class="breadcrumbs">
                    <p>You are here:</p>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">services</a></li>
                        <li class="active">Pricing</li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->
<!--  /.site-header -->
</div>
<div id="site-wrapper">
<div id="site-content" style="margin-top: 15px;">
<!-- Services -->
<section class="services-pricing">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
              @foreach($services as $service)
                <div class="col-md-4">
                    <div class="flat-price">
                        <div class="column-container">
                            <div class="plan">{{$service->serviceName}}</div>
                            <div class="price">LKR <br>{{$service->serviceFee}}</div>
                            <div class="description" style="height: 20vh;overflow-y: scroll">{{$service->serviceDiscription}}</div>
                            <div class="cta">
                                <a class="button" data-toggle="collapse" href="#rese{{$service->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">Reserve Now</a>
                                <div class="collapse" id="rese{{$service->id}}" style="margin-top: 5px;">
                                    <div class="card card-body">
                                         <form method="get" action="{{route('checkAvailability')}}">
                                             {{csrf_field()}}
                                             <input type="hidden" value="{{$service->id}}" name="sid">
                                             <input type="date" min="<?php $y= date("Y");$m= date("m");$d= date("d");$e= "$y-$m-$d";echo $e;?>" name="checkDate">
                                             <input type="submit" value="Check Availability" name="submit"class="btn btn-primary btn-xs" style="margin-top: 10px;">

                                         </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach

            </div> <!-- /.col-md-12 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</section>


</div>

</div>
@include('layouts.footer')
@endsection
