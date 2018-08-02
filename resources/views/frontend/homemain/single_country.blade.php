@extends('frontend.layouts.single_master')
@section('single_country_content')
 <?php
    $jsonString = $slug->imageids;
    $decoded = json_decode($jsonString, true);
    if(is_array($decoded)){
     ?>
    <section class="pageTitle" style="background-image:url({{Image::url('/images/'.$decoded[array_rand($decoded, 1)],1600,350,array('crop',))}});">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="titleTable">
                        <div class="titleTableInner">
                            <div class="pageTitleInfo">
                                <h1>{{$slug->name}}</h1>
                                <div class="under-border"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <section class="mainContentSection singlePackage">
        <div class="container">
            <div class="row countryTitle">
                <div class="col-sm-8 col-xs-12">
                    <div id="package-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#package-carousel" data-slide-to="0" class=""></li>
                            <li data-target="#package-carousel" data-slide-to="1" class=""></li>
                            <li data-target="#package-carousel" data-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            $jsonString = $slug->imageids;
                            $decoded = json_decode($jsonString, true);
                            if(!NULL){
                            if(is_array($decoded) || is_object($decoded)){
                            foreach ($decoded as $key=>$value){
                            ?>
                            <div class="item <?php if($key == (count($decoded) - 1 ))echo 'active'; ?>">
                                <img alt="First slide" src="{{Image::url('/images/'.$value,1170,500,array('crop'))}}">
                            </div>
                            <?php }
                            }
                            }
                            ?>
                        </div>
                        <a class="left carousel-control" href="#package-carousel" data-slide="prev"><span class="glyphicon glyphicon-menu-left"></span></a>
                        <a class="right carousel-control" href="#package-carousel" data-slide="next"><span class="glyphicon glyphicon-menu-right"></span></a>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <aside>
                        {{--<input type="text" id="city">--}}

                        {{--<button id="getweatherforcast">Getweather</button><br>--}}
                        <div class="weatherInfo" id="showweatherforcast">
                            <img src="{{asset('img/cities/weather-bg.jpg')}}" alt="image" height="200px">
                            <div class="cityWeather">
                                <div class="cityTable">
                                    <div class="cityTableInner">
                                        <div class="cityWeatherInfo">
                                            <img src="{{asset('img/icons/cloud.png')}}">
                                            <h2>28<sup>0</sup></h2>
                                            <p>{{$slug->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dayTime">
                                <input type="hidden" id="capitalweather" class="form-control" value="{{$slug->capital}}">
                                <span class="pull-left">April 20, 2016</span>
                                <span class="pull-right">Monday</span>
                            </div>

                        </div> <br>
                        <div>
                            <select class="select2" style="width: 100%;" id="city">
                                <option>select one</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->cityname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div role="tabpanel" class="countryTabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#over-view" aria-controls="over-view" role="tab" data-toggle="tab">OVER VIEW</a>
                            </li>
                            <li role="presentation">
                                <a href="#tour-guide" aria-controls="tour-guide" role="tab" data-toggle="tab">Tour guide</a>
                            </li>
                            <li role="presentation">
                                <a href="#location-map" aria-controls="location-map" role="tab" data-toggle="tab">location map</a>
                            </li>
                            <li class="pull-right">
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                                </ul>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="over-view">
                                <div class="row">
                                    <div class="col-sm-8 col-xs-12">
                                        <div class="commonInfo">
                                            {!! $slug->description !!}

                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <aside>
                                            <div class="well">
                                                <h3>benefits</h3>
                                                <ul class="list-unstyled">
                                                   {!! $slug->benifit !!}
                                                </ul>
                                                <a href="booking-1.html" class="btn buttonCustomPrimary">BOOK NOW</a>
                                            </div>
                                        </aside>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tour-guide">
                                <div class="row">
                                    <div class="col-sm-8 col-xs-12">
                                        <div class="commonInfo">
                                            {!! $slug->tourguide !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="well">
                                            <h3>benefits</h3>
                                            <ul class="list-unstyled">
                                                {!! $slug->benifit!!}
                                            </ul>
                                            <a href="booking-1.html" class="btn buttonCustomPrimary">BOOK NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="location-map">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="location-aria">
                                            <div class="google-maps">
                                                <div id="map"></div>
                                                <input id="origin-input" class="controls" type="text"
                                                       placeholder="Enter an origin location">

                                                <input id="destination-input" class="controls" type="text"
                                                       placeholder="Enter a destination location">

                                                <div id="mode-selector" class="controls">
                                                    <input type="radio" name="type" id="changemode-walking" checked="checked">
                                                    <label for="changemode-walking">Walking</label>

                                                    <input type="radio" name="type" id="changemode-transit">
                                                    <label for="changemode-transit">Transit</label>

                                                    <input type="radio" name="type" id="changemode-driving">
                                                    <label for="changemode-driving">Driving</label>
                                                </div>
                                                <script>
                                                    function initMap() {
                                                        var myLatLng = new google.maps.LatLng(<?php echo $slug->lat . ',' . $slug->long; ?>);
                                                        var map = new google.maps.Map(document.getElementById('map'), {
                                                            mapTypeControl: false,
                                                            center:  myLatLng,
                                                            zoom: 13
                                                        });

                                                        new AutocompleteDirectionsHandler(map);
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-xs-12">
            <div class="relatedProduct">
            <h2>Tour's spots from {{$slug->name}}</h2>


            <div class="row">
            <?php
            foreach($touristspots as $touristspot){
            $jsonString = $touristspot->imageids;
            $decoded = json_decode($jsonString, true);
            if(!NULL){
            if(is_array($decoded) || is_object($decoded)){
           ?>

            <div class="col-sm-4 col-xs-12">
            <div class="relatedItem">
            <img src="{{Image::url('/images/'.$decoded[array_rand($decoded, 1)],500,350,array('crop',))}}" alt="related image">
            <div class="maskingInfo">
            <h4>{{$touristspot->name}} tour</h4>
            <p>{!! str_limit($touristspot->description, $limit =10, $end = '...')!!}</p>
            <a href="{{url('/tourist-spot/'.str_slug($touristspot->spotslug,'-'))}}" class="btn buttonTransparent">view more</a>
            </div>
            </div>
            </div>
            <?php  }
            }
            }
            ?>


            </div>
            </div>
            </div>
            </div>
        </div>
    </section>
    
@endsection