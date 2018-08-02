@extends('frontend.layouts.single_master')
@section('single_country_content')
  <?php
 $jsonString =$offer->package->packageimages;
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
                                <h1>{{$offer->name}}</h1>
                                <p>{!! str_limit($offer->package->description, $limit =50, $end = '...')!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <?php } ?>

    <!-- PAGE CONTENT -->
    <section class="mainContentSection singlePackage">
        <div class="container">
            <div class="row ">
                <div class="col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <div id="package-carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#package-carousel" data-slide-to="0" class=""></li>
                                    <li data-target="#package-carousel" data-slide-to="1" class=""></li>
                                    <li data-target="#package-carousel" data-slide-to="2" class="active"></li>
                                </ol>
                                <div class="carousel-inner">

                                    <?php
                                    $jsonString = $offer->package->packageimages;
                                    $decoded = json_decode($jsonString, true);
                                    if(!NULL){
                                    if(is_array($decoded)){
                                    foreach ($decoded as $key=>$value){
                                    ?>
                                    <div class="item <?php if($key == (count($decoded) - 1 ))echo 'active'; ?>">
                                        <img alt="First slide" src="{{Image::url('/images/'.$value,1170,500,array('crop',))}}">
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
                        <div class="col-xs-12">
                            <div class="description-aria">
                                <div class="sectionTitle2">
                                    <h2>description</h2>
                                    {!! $offer->package->description !!}
                                </div>

                                <div class="information-aria">
                                    <h3>Program</h3>
                                    @foreach($offer->package->program as $program)
                                    <div class="singleContent">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{$program->pro_title}}</h4>
                                                <p>{{$program->pro_description}}</p>
                                            </div>
                                            <div class="media-right">
                                                <div class="days">day {{$program->pro_day}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                            <div class="location-aria">
                                <div class="sectionTitle2">
                                    <h2>Location</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                </div>
                                <div class="google-maps">
                                    {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12097.002861286059!2d-74.01154310416635!3d40.71249695811257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2s!4v1502716241862" width="100%" height="400px" scrolling="no" frameborder="0" style="border:0" allowfullscreen></iframe>--}}

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
                                            var myLatLng = new google.maps.LatLng(<?php echo $offer->package->lat . ',' . $offer->package->long; ?>);
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
                            <div class="review-aria">
                                <div class="sectionTitle2">
                                    <h2>Reviews</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                </div>
                                <div class="reviewContent">
                                    <h3 class="reviewTitle">
                                        Reviews (3)
                                        <span>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>
                                    </h3>

                                    <div class="reviewMedia">
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="img/blog/comments-02.jpg" alt="Image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Jessica Brown</h5>
                                                    <span>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudan totam rem ape riam</p>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="img/blog/comments-01.jpg" alt="Image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Jessica Brown</h5>
                                                    <span>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                            </span>
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudan totam rem ape riam</p>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="img/blog/comments-03.jpg" alt="Image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Jessica Brown</h5>
                                                    <span>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              <i class="fa fa-star-0" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                            </span>
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudan totam rem ape riam</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <form action="" method="POST" role="form" class="commentsForm">
                                        <h3 class="reviewTitle">Leave your review</h3>
                                        <p>Want to Rate it? <span>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-0" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                      </span></p>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" placeholder="Comment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn buttonCustomPrimary">submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <aside class="col-sm-4 col-xs-12">
                    <div class="singleCartSidebar">
                        <div class="panel panel-default">
                            <div class="panel-heading">Booking</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 col-sm-12 col-xs-5" for="inputSuccess3">Select a date:</label>
                                                <div class="col-md-7 col-sm-12 col-xs-7 datepickerWrap">
                                                    <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                                                        <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5 col-sm-12 col-xs-5" for="inputSuccess3">Select a time slot:</label>
                                                <div class="col-md-7 col-sm-12 col-xs-7">
                                                    <div class="input-group">
                                                        <div class="selectbox-sidebar">
                                                            <select name="guiest_id2" id="guiest_id2" class="select-drop">
                                                                <option value="0">9.00 am</option>
                                                                <option value="1">10.00 am</option>
                                                                <option value="2">11.00 am</option>
                                                                <option value="3">12.00 pm</option>
                                                                <option value="3">13.00 pm</option>
                                                                <option value="3">14.00 pm</option>
                                                                <option value="3">15.00 pm</option>
                                                                <option value="3">16.00 pm</option>
                                                            </select>
                                                            <div class="icon-clock">
                                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5 col-sm-12 col-xs-5" for="inputSuccess3">Adults:</label>
                                                <div class="col-md-5 col-sm-12 col-xs-7 datepickerWrap">
                                                    <div class="count-input">
                                                        <a class="incr-btn decrement" data-action="decrease" href="#">–</a>
                                                        <input class="quantity" type="text" value="1">
                                                        <a class="incr-btn increment" data-action="increase" href="#">+</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-12 col-xs-12">
                                                    <input class="original_quantity" type="hidden" value="{!! $offer->discount !!}">
                                                    <p class="price adult_price">{!! $offer->discount !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5 col-sm-12 col-xs-5" for="inputSuccess3">Children:</label>
                                                <div class="col-md-5 col-sm-12 col-xs-7 datepickerWrap">
                                                    <div class="count-input">
                                                        <a class="incr-btn decrement" data-action="decrease" href="#">–</a>
                                                        <input class="quantity quantity_child" type="text" value="0">
                                                        <a class="incr-btn increment" data-action="increase" href="#">+</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-12 col-xs-12">
                                                    <input class="original_quantity" type="hidden" value="{{$offer->package->packageprice_child}}">
                                                    <p class="price child_price">0</p>
                                                </div>
                                            </div>
                                            <div class="totalCost">
                                                <div class="col-xs-8 totalCostLeft">
                                                    <p>Total Cost</p>
                                                </div>
                                                <div class="col-xs-4 totalCostRight">TK. {!! $offer->discount !!}</div>
                                            </div>
                                            <div class="col-sm-12">
                                                <a href="#" class="btn btn-block buttonTransparent">Check now <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <section class="relatedSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle2">
                        <h2>you may also like</h2>
                    </div>
                </div>
                @foreach($otherofferpackages as $otherofferpackage)
                <div class="col-sm-6 col-lg-4 col-xs-12">
                    <div class="thumbnail deals">
                        <?php
                        $jsonString = $otherofferpackage->packageimages;
                        $decoded = json_decode($jsonString, true);
                        if(!NULL){
                        if(is_array($decoded)){
                       ?>
                        <img src="{{Image::url('/images/'.$decoded[array_rand($decoded, 1)],500,350,array('crop',))}}">
                        <?php  }
                        }
                        ?>
                        <a href="{{url('/offerpackage/'.str_slug($otherofferpackage->offerslug,'-'))}}" class="pageLink"></a>
                        <div class="discountInfo discountCol-3">
                            <div class="discountOffer">
                                <h4>
                                    {{$otherofferpackage->offeramount}}% <span>OFF</span>
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
                                <li>7 days</li>
                                <li>15 hrs</li>
                                <li>15 min</li>
                            </ul>
                        </div>
                        <div class="caption">
                            <h4><a href="{{url('/offerpackage/'.str_slug($otherofferpackage->offerslug,'-'))}}" class="captionTitle">{{$otherofferpackage->name}}</a></h4>
                            <p>{!! str_limit($otherofferpackage->description, $limit =50, $end = '...')!!}</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Start From</span>
                                    ${{$otherofferpackage->discount}}
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href="{{url('/offerpackage/'.str_slug($otherofferpackage->offerslug,'-'))}}" class="btn buttonTransparent">Details</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach

            </div>
        </div>
    </section>

@endsection