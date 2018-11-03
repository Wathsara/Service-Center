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
                <div class="title-section">
                    <h2 class="title">SPECIALS</h2>
                    <p class="desc-title">Get the best discounts now</p>
                </div>
                <div class="three-columns">
                    <div class="object">
                        <div class="flat-price">
                            <div class="column-container">
                                <div class="plan">Vehicle Inspection</div>
                                <div class="price">$300</div>
                                <div class="description">Services include</div>
                                <ul class="features">
                                    <li class="spacer"></li>
                                    <li>Air Filters</li><li>Fuel Filters</li>
                                    <li>Alignment Check</li>
                                    <li>Front End Alignment</li>
                                    <li>Air Conditioning Service</li>
                                </ul>
                                <div class="cta">
                                    <a class="button" href="#">Contact Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="object">
                        <div class="flat-price">
                            <div class="column-container">
                                <div class="plan">DIAGNOSTIC SERVICES</div>
                                <div class="price highlight">$500</div>
                                <div class="description">Services include</div>
                                <ul class="features">
                                    <li class="spacer"></li>
                                    <li>Air Filters</li><li>Fuel Filters</li>
                                    <li>Alignment Check</li>
                                    <li>Front End Alignment</li>
                                    <li>Air Conditioning Service</li>
                                </ul>
                                <div class="cta highlight">
                                    <a class="button" href="#">Contact Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="object">
                        <div class="flat-price">
                            <div class="column-container">
                                <div class="plan">PERFORMANCE UPGRADES</div>
                                <div class="price">$800</div>
                                <div class="description">Services include</div>
                                <ul class="features">
                                    <li class="spacer"></li>
                                    <li>Air Filters</li><li>Fuel Filters</li>
                                    <li>Alignment Check</li>
                                    <li>Front End Alignment</li>
                                    <li>Air Conditioning Service</li>
                                </ul>
                                <div class="cta">
                                    <a class="button" href="#">Contact Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.three-columns -->

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
