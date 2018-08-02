@extends('frontend.layouts.single_master')
@section('single_country_content')
    <script src="{{asset('frntjs/script.js')}}"> </script>

    <section class="pageTitle" style="background-image:url({{asset('img/pages/page-title-bg6.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="titleTable">
                        <div class="titleTableInner">
                            <div class="pageTitleInfo">
                                <h1>Tour Packages</h1>
                                <div class="under-border"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mainContentSection packagesSection">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <aside>
                        <div class="panel panel-default packagesFilter">
                            <div class="panel-heading">
                                <h3 class="panel-title">search by country</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="searchFilter">
                                           <input type="hidden"  id="signup-token" name="_token" value="{{csrf_token()}}" >
                                            <select name="guiest_id3" id="search"   class="select-drop">
                                                <option value="0">--selectone--</option>
                                                @foreach($allcountry as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default packagesFilter">
                            <div class="panel-heading">
                                <h3 class="panel-title"> Search by Price</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 priceRange">
                                        <div class="price-slider-inner">

                                            <div class="packageslide" > <br>
                                                    <span id='range'></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-9  col-xs-12" id="generaldata">
                    <div class="row sidebarPage" >
                        @foreach($allofferpackages as $allofferpackage)
                        <div class="col-xs-12" >
                            <div class="media packagesList">
                                <a class="media-left fancybox-pop" href="{{url('/package/'.str_slug($allofferpackage->packageslug,'-'))}}">

                                    <?php
                                    $jsonString =  $allofferpackage->packageimages;
                                    $decoded = json_decode($jsonString, true);
                                    if(!NULL){
                                    if(is_array($decoded)){
                                   ?>
                                    <img src="{{Image::url('/images/'.$decoded[array_rand($decoded, 1)],500,370,array('crop'))}}">
                                    <?php  }
                                    }
                                    ?>
                                </a>
                                <div class="media-body">
                                    <div class="bodyLeft">
                                        <h4 class="media-heading"><a href="{{url('/package/'.str_slug($allofferpackage->packageslug,'-'))}}">{{$allofferpackage->packagename}}</a></h4>
                                        <div class="countryRating">
                                            <span>Asia</span>
                                            <ul class="list-inline rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        <p>{!! str_limit($allofferpackage->description, $limit =30, $end = '...')!!}</p>
                                        <ul class="list-inline detailsBtn">
                                            <li><span class="textInfo"><i class="fa fa-calendar" aria-hidden="true"></i> 27 jan, 2016</span></li>
                                            <li><span class="textInfo"><i class="fa fa-clock-o" aria-hidden="true"></i> 5 days</span></li>
                                        </ul>
                                    </div>
                                    <div class="bodyRight">
                                        <div class="bookingDetails">
                                            <h2>Tk. {{$allofferpackage->packageprice}}</h2>
                                            <p>Per Person</p>
                                            <a href="{{url('/package/'.str_slug($allofferpackage->packageslug,'-'))}}" class="btn buttonTransparent clearfix">Details</a>
                                            <a data-toggle="modal" data-target="#inquiryModal" href="#" class="btn buttonTransparent">Inquiry</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                            @endforeach
                    </div>

                </div>

                <div class="col-sm-9  col-xs-12" id="ajaxdata" style="display: none">
                    <div class="row sidebarPage" id="success">

                    </div>
                </div>
                <div class="col-sm-9  col-xs-12" id="ajaxdataslider" style="display: none">
                    <div class="row sidebarPage" id="successslider">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="paginationCenter">
                        {{$allofferpackages->links()}}

                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection