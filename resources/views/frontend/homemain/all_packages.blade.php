@extends('frontend.layouts.single_master')
@section('single_country_content')


    <section class="pageTitle" style="background-image:url({{asset('img/pages/page-title-bg9.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="titleTable">
                        <div class="titleTableInner">
                            <div class="pageTitleInfo">
                                <h1>Offer Packages</h1>
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
                                            <select name="guiest_id3" id="searchitem" class="select-drop">
                                                <option value="0">Destinations</option>
                                                @foreach($countries as $country)
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
                                <h3 class="panel-title"> Search by Price Range</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                <div class="col-xs-12 priceRange">
                                      <div class="price-slider-inner">
                                        <div class="offerslide" > <br>
                                           <span id='pricerange'></span>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
               </div>
            <div class="col-sm-9 col-xs-12" id="generaldata">
                <div class="row">
                    @foreach($allofferpackages as $allofferpackage)
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="thumbnail deals packagesPage">
                            <?php
                            $jsonString = $allofferpackage->packageimages;
                            $decoded = json_decode($jsonString, true);
                            if(!NULL){
                            if(is_array($decoded)){
                            ?>

                            <img src="{{Image::url('/images/'.$decoded[array_rand($decoded, 1)],500,350,array('crop',))}}">
                            <?php  }
                            }
                            ?>
                            <a href="{{url('/offerpackage/'.str_slug($allofferpackage->offerslug,'-'))}}" class="pageLink"></a>
                            <div class="discountInfo">
                                <div class="discountOffer">
                                    <h4>
                                        {{$allofferpackage->offeramount}}% <span>OFF</span>
                                    </h4>
                                </div>
                                <ul class="list-inline rating homePage">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <ul class="list-inline duration">
                                    <li>12 days</li>
                                    <li>3 hrs</li>
                                    <li>12 min</li>
                                </ul>
                            </div>
                            <div class="caption">
                                <h4><a href="{{url('/offerpackage/'.str_slug($allofferpackage->offerslug,'-'))}}" class="captionTitle">{{$allofferpackage->name}}</a></h4>
                                <p>{!! str_limit($allofferpackage->description, $limit =10, $end = '...')!!}</p>
                                <div class="detailsInfo">
                                    <h5>
                                        <span>Start From</span>
                                        Tk  {{$allofferpackage->discount}}
                                    </h5>
                                    <ul class="list-inline detailsBtn">
                                        <li><a href='booking-1.html' class="btn buttonTransparent">Book now</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                   </div>

                </div>
            <div class="col-sm-9 col-xs-12" id="ajaxdataoffer" style="display: none">
                <div class="row" id="successoffer">
                </div>

            </div>
            {{--<div class="col-sm-9 col-xs-12" id="ajaxdataofferslider" style="display: none">--}}
                {{--<div class="row" id="successsofferlider">--}}
                {{--</div>--}}

            {{--</div>--}}
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="paginationCenter">
                    {{ $allofferpackages->links() }}

                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('frntjs/script.js')}}"> </script>

</section>
@endsection