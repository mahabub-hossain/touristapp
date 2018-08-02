@extends('frontend.layouts.single_master')
@section('single_country_content')
    <section class="pageTitle" style="background-image:url({{asset('img/pages/page-title-bg6.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="titleTable">
                        <div class="titleTableInner">
                            <div class="pageTitleInfo">
                                <h1>Winter Packages</h1>
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

                <div class="col-sm-12  col-xs-12" id="generaldata">
                    <div class="row sidebarPage" >
                        @foreach($winterpackages as $winterpackage)
                            <div class="col-xs-12" >
                                <div class="media packagesList">
                                    <a class="media-left fancybox-pop" href="{{url('/package/'.$winterpackage->packageslug)}}">

                                        <?php
                                        $jsonString =  $winterpackage->packageimages;
                                        $decoded = json_decode($jsonString, true);
                                        if(!NULL){
                                        if(is_array($decoded)){
                                         ?>
                                        <img src="{{Image::url('/images/'.$decoded[array_rand($decoded, 1)],500,300,array('crop',))}}">
                                        <?php  }
                                        }
                                        ?>
                                    </a>
                                    <div class="media-body">
                                        <div class="bodyLeft">
                                            <h4 class="media-heading"><a href="{{url('/package/'.$winterpackage->packageslug)}}">{{$winterpackage->packagename}}</a></h4>
                                            <div class="countryRating">
                                                <ul class="list-inline rating">
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                </ul>
                                            </div>
                                            <p>{!! str_limit($winterpackage->description, $limit =90, $end = '...')!!}</p>
                                            <ul class="list-inline detailsBtn">
                                                <li><span class="textInfo"><i class="fa fa-calendar" aria-hidden="true"></i> 27 jan, 2016</span></li>
                                                <li><span class="textInfo"><i class="fa fa-clock-o" aria-hidden="true"></i> 5 days</span></li>
                                            </ul>
                                        </div>
                                        <div class="bodyRight">
                                            <div class="bookingDetails">
                                                <h2>${{$winterpackage->packageprice}}</h2>
                                                <p>Per Person</p>
                                                <a href="{{url('/singelrealpackage/'.$winterpackage->packageslug)}}" class="btn buttonTransparent clearfix">Details</a>
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
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="paginationCenter">
                        {{$winterpackages->links()}}

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection