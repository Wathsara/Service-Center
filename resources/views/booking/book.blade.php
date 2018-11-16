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
                                            <div class="description">{{$service->serviceDiscription}}</div>
                                            <div class="price">LKR {{$service->serviceFee}} <br>{{$date}}</div>
                                            <div class="cta">
                                                <form method="get" action="">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="{{$date}}" min="<?php $y= date("Y");$m= date("m");$d= date("d");$e= "$y-$m-$d";echo $e;?>" name="checkDate">
                                                    <input type="submit" value="Check Availability" name="submit"class="btn btn-primary btn-xs" style="margin-top: 10px;">

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                        </div> <!-- /.col-md-12 -->

                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section>

            <section class="services-pricing-table">
                <div class="container">
                    <div class="row">
                        <div class="title-section">
                            <h2 class="title">PRICING TABLE</h2>
                            <p class="desc-title">Here you can see what we have to offer and what you’ll pay for that</p>
                        </div>

                        <div class="col-md-12">
                            <table>
                                <thead>
                                <tr class="style1">
                                    <th>Performance</th>
                                    <th>For Car</th>
                                    <th>For Truck</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Air Filter (Improves gas mileage &amp; performance)</td>
                                    <td>From $19.99</td>
                                    <td>From $19.99</td>
                                </tr>
                                <tr class="style1">
                                    <td>Cabin Air Filter (Filter the Air you breathe)</td>
                                    <td>From $24.99</td>
                                    <td>From $24.99</td>
                                </tr>
                                <tr>
                                    <td>Wiper Blades (each)</td>
                                    <td>From $9.99</td>
                                    <td>From $9.99</td>
                                </tr>
                                <tr class="style1">
                                    <td>Bulb Replacement</td>
                                    <td>From $11.99</td>
                                    <td>From $11.99</td>
                                </tr>
                                <tr>
                                    <td>Head Light Replacement</td>
                                    <td>From $24.99</td>
                                    <td>From $24.99</td>
                                </tr>
                                <tr class="style1">
                                    <td>Oil System Cleaning Service</td>
                                    <td>From $11.99</td>
                                    <td>From $11.99</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section>

        </div>

    </div>
@endsection
