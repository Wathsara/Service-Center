@extends('layouts.app')

@section('content')
    <div id="site-wrapper">
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
                                <li class="active">Reserve</li>
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

                                <div class="col-md-8 offset-2">
                                    <div class="flat-price">
                                        <div class="column-container">

                                            <div class="plan">{{$service->serviceName}}</div>
                                            <div class="description" style="color: black">{{$service->serviceDiscription}}</div>
                                            <div class="price">LKR {{$service->serviceFee}} <br>{{$date}}</div>
                                            <div class="cta">
                                                <form method="post" action="{{route('reserve')}}">
                                                    {{csrf_field()}}
                                                    <select name="time" style="width: 150px;margin-left: 10px;" required>
                                                        <option disabled selected> -- select a Time Slot -- </option>
                                                        @if(in_array("8.00",$timesTaken))
                                                            <option value="8.00" disabled="">8.00</option>
                                                        @else
                                                            <option value="8.00" >8.00</option>
                                                        @endif

                                                        @if(in_array("9.00",$timesTaken))
                                                            <option value="9.00" disabled>9.00</option>
                                                        @else
                                                            <option value="9.00">9.00</option>
                                                        @endif

                                                        @if(in_array("10.00",$timesTaken))
                                                            <option value="10.00" disabled>10.00</option>
                                                        @else
                                                            <option value="10.00">10.00</option>
                                                        @endif

                                                        @if(in_array("11.00",$timesTaken))
                                                            <option value="11.00" disabled>11.00</option>
                                                        @else
                                                            <option value="11.00">11.00</option>
                                                        @endif

                                                        @if(in_array("13.00",$timesTaken))
                                                           <option value="13.00" disabled>13.00</option>
                                                        @else
                                                            <option value="13.00">13.00</option>
                                                        @endif

                                                        @if(in_array("14.00",$timesTaken))
                                                            <option value="14.00" disabled>14.00</option>
                                                        @else
                                                            <option value="14.00">14.00</option>
                                                        @endif

                                                        @if(in_array("15.00",$timesTaken))
                                                            <option value="15.00" disabled>15.00</option>
                                                        @else
                                                            <option value="15.00">15.00</option>
                                                        @endif

                                                        @if(in_array("16.00",$timesTaken))
                                                            <option value="16.00" disabled>16.00</option>
                                                        @else
                                                            <option value="16.00">16.00</option>
                                                        @endif
                                                    </select>
                                                    <input type="hidden" value="{{$service->id}}" name="sid">
                                                    <input type="hidden" value="{{$date}}" min="<?php $y= date("Y");$m= date("m");$d= date("d");$e= "$y-$m-$d";echo $e;?>" name="checkDate">
                                                    <input type="submit" value="Reserve" name="submit"class="btn btn-primary btn-xs" style="margin-top: 10px;">

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                        </div> <!-- /.col-md-12 -->

                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section>

        </div>

    </div>
@endsection
