@include('frontend.includes.city.head')

<body class="body-wrapper ">
<div class="main-wrapper">

    <!-- HEADER -->
@include('frontend.includes.city.header')


    <!-- BANNER -->

@include('frontend.includes.city.slider')


    <!-- PAGE HOME CITY MOST POPULER TOURS -->
    <section class="packagesSection mostPopulerToure ptb-100">
        <div class="container">
            <div class="sectionTitleHomeCity">
                <h2>Most Popular Tours</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="img/packages/most-populer-img-01.jpg" alt="deal-image">
                        <a href="single-package-right-sidebar.html" class="pageLink"></a>
                        <div class="caption">
                            <h4><a href="single-package-right-sidebar.html" class="captionTitle">Museum of london</a></h4>
                            <p>Integer purus ex, dictum nec elementum eu, tristique vel lectus. Donec rutrum lectus et pharetra egestas.</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Start From</span>
                                    $299
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href="" class="btn buttonTransparent"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href='booking-1.html' class="btn buttonTransparent">Book now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="img/packages/most-populer-img-02.jpg" alt="deal-image">
                        <a href="single-package-fullwidth.html" class="pageLink"></a>
                        <div class="caption">
                            <h4><a href="single-package-fullwidth.html" class="captionTitle">London Eye Tour</a></h4>
                            <p>Proin convallis magna vel libero accumsan sollicitudin. Quisque dapibus vitae turpis eu magna sagittis.</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Start From</span>
                                    $499
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href="" class="btn buttonTransparent"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href='booking-1.html' class="btn buttonTransparent">Book now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="img/packages/most-populer-img-03.jpg" alt="deal-image">
                        <a href="single-package-left-sidebar.html" class="pageLink"></a>
                        <div class="caption">
                            <h4><a href="single-package-left-sidebar.html" class="captionTitle">London Bridge Tour</a></h4>
                            <p>Vivamus eu mattis nibh. Quisque eget ipsum at odio fringilla consequat vel id erat. Suspendisse non feugiat mi.</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Start From</span>
                                    $399
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href="" class="btn buttonTransparent"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href='booking-1.html' class="btn buttonTransparent">Book now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="homeCitybtn">
                <a href="packages-grid-left-sidebar.html" class="btn buttonTransparent">View all Tours</a>
            </div>
        </div>
    </section>

    <!-- AMAZING HOTELS SECTION-->
    <section class="amazingHtoleSection" style="background-image: url(img/home-city/amazing-hotel-bg.jpg);" >
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="sectionTitleHomeCity2">
                        <h2>Amazing Hotels and hostels</h2>
                        <p>We’ve pre-picked the best hotels, Hostels and bed and breckfast to make your stay enjoyable.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                    <form action="">
                        <div class="amazingSelectbox">

                            <div class="searchHotel">
                                <div class="input-group date ed-datepicker" data-provide="datepicker">
                                    <input type="text" class="form-control" placeholder="check-in">
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="searchHotel">
                                <div class="input-group date ed-datepicker" data-provide="datepicker">
                                    <input type="text" class="form-control" placeholder="check-out">
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="searchHotel">
                                <select name="guiest_id2" id="guiest_id2" class="select-drop">
                                    <option value="0">3 guests</option>
                                    <option value="1">5 guests</option>
                                    <option value="2">2 guests</option>
                                    <option value="3">1 guest</option>
                                </select>
                            </div>
                            <div class="searchHotelBtn">
                                <a href="#" class="btn buttonCustomPrimary">Search</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>


    <!-- PAGE HOME CITY TOP SECTION -->
    <section class="topHotelSection ptb-100">
        <div class="container">
            <div class="sectionTitleHomeCity">
                <h2>top Hotels</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="img/holets/hotel-list-10.jpg" alt="Hotel-image">
                        <a href="single-hotel-right-sidebar.html" class="pageLink"></a>
                        <div class="discountInfo discountCol-3">
                            <ul class="list-inline rating homePage">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                            <ul class="list-inline duration">
                                <li>55 Review</li>
                            </ul>
                        </div>
                        <div class="caption">
                            <a href="single-hotel-right-sidebar.html" class="captionTitle"><h4>Marriott Hotel London</h4></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Per night</span>
                                    $24
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href='booking-1.html' class="btn buttonTransparent">Book now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="img/holets/hotel-list-11.jpg" alt="Hotel-image">
                        <a href="single-hotel-right-sidebar.html" class="pageLink"></a>
                        <div class="discountInfo discountCol-3">
                            <ul class="list-inline rating homePage">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            </ul>
                            <ul class="list-inline duration">
                                <li>31 Review</li>
                            </ul>
                        </div>
                        <div class="caption">
                            <a href="single-hotel-right-sidebar.html" class="captionTitle"><h4>Marriott Hotel London</h4></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Per night</span>
                                    $29
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href='booking-1.html' class="btn buttonTransparent">Book now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="img/holets/hotel-list-12.jpg" alt="Hotel-image">
                        <a href="single-hotel-right-sidebar.html" class="pageLink"></a>
                        <div class="discountInfo discountCol-3">
                            <ul class="list-inline rating homePage">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                            <ul class="list-inline duration">
                                <li>45 Review</li>
                            </ul>
                        </div>
                        <div class="caption">
                            <a href="single-hotel-right-sidebar.html" class="captionTitle"><h4>Marriott Hotel London</h4></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Per night</span>
                                    $37
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href='booking-1.html' class="btn buttonTransparent">Book now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="homeCitybtn">
                <a href="hotels-list-left-sidebar.html" class="btn buttonTransparent">view all Hotels</a>
            </div>
        </div>
    </section>

    <!-- FOODS ANDS DRINK SECTION -->
    <section class="foodDrinkSection bg-ash ">
        <div class="container-fluid no-padding">
            <div class="row no-margin">
                <div class="col-xs-12 col-sm-6 no-padding">
                    <div class="foodLeftImg">
                        <img class="foodImage " src="img/home-city/fooddrink-img-1.jpg" alt="Image">
                    </div>
                </div>
                <div class="col xs-12 col-sm-5 no-padding">
                    <div class="foodDrinkContent ">
                        <div class="foodDrinkHeader">
                            <h2>Food and <span>drink</span> </h2>
                            <p>Lorem ipsum dolor sit amet, consectetur </p>
                        </div>
                        <div class="FoodDrinkList">
                            <div class="item-list">
                                <h4>Indian Tandoori</h4>
                                <a href="">View in map</a>
                                <span class="pull-right">5 Places</span>
                            </div>
                            <div class="item-list">
                                <h4>Chicken Wings</h4>
                                <a href="">View in map</a>
                                <span class="pull-right">8 Places</span>
                            </div>
                            <div class="item-list">
                                <h4>Indian Tandoori</h4>
                                <a href="">View in map</a>
                                <span class="pull-right">2 Places</span>
                            </div>
                            <div class="item-list">
                                <h4>Chicken Wings</h4>
                                <a href="">View in map</a>
                                <span class="pull-right">3 Places</span>
                            </div>
                            <div class="item-list">
                                <h4>Indian Tandoori</h4>
                                <a href="">View in map</a>
                                <span class="pull-right">6 Places</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SIGHT IN STAR CITY -->
    <section class="sightInCity ptb-100">
        <div class="container">
            <div class="sectionTitleHomeCity">
                <h2>Sights in Star City</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="sightContent">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="destination-single-city.html">
                                    <img class="media-object" src="img/home-city/sight-img-1.jpg" alt="Sight Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="destination-single-city.html"><h4 class="media-heading">Coca cola London eye</h4></a>
                                <a href="destination-single-city.html"><i class="fa fa-map-marker" aria-hidden="true"></i> View in map</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="sightContent">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="destination-single-city.html">
                                    <img class="media-object" src="img/home-city/sight-img-4.jpg" alt="Sight Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="destination-single-city.html"><h4 class="media-heading">Big ben tower</h4></a>
                                <a href="destination-single-city.html"><i class="fa fa-map-marker" aria-hidden="true"></i> View in map</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="sightContent">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="destination-single-city.html">
                                    <img class="media-object" src="img/home-city/sight-img-7.jpg" alt="Sight Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="destination-single-city.html"><h4 class="media-heading">The british museum</h4></a>
                                <a href="destination-single-city.html"><i class="fa fa-map-marker" aria-hidden="true"></i> View in map</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="sightContent">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="destination-single-city.html">
                                    <img class="media-object" src="img/home-city/sight-img-2.jpg" alt="Sight Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="destination-single-city.html"><h4 class="media-heading">Royal Botanical Garden</h4></a>
                                <a href="destination-single-city.html"><i class="fa fa-map-marker" aria-hidden="true"></i> View in map</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="sightContent">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="destination-single-city.html">
                                    <img class="media-object" src="img/home-city/sight-img-5.jpg" alt="Sight Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="destination-single-city.html"><h4 class="media-heading">Barbican opera house</h4></a>
                                <a href="destination-single-city.html"><i class="fa fa-map-marker" aria-hidden="true"></i> View in map</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="sightContent">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="destination-single-city.html">
                                    <img class="media-object" src="img/home-city/sight-img-8.jpg" alt="Sight Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="destination-single-city.html"><h4 class="media-heading">Marriott Hotel London</h4></a>
                                <a href="destination-single-city.html"><i class="fa fa-map-marker" aria-hidden="true"></i> View in map</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="sightContent">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="destination-single-city.html">
                                    <img class="media-object" src="img/home-city/sight-img-3.jpg" alt="Sight Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="destination-single-city.html"><h4 class="media-heading">Tower of london</h4></a>
                                <a href="destination-single-city.html"><i class="fa fa-map-marker" aria-hidden="true"></i> View in map</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="sightContent">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="destination-single-city.html">
                                    <img class="media-object" src="img/home-city/sight-img-6.jpg" alt="Sight Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="destination-single-city.html"><h4 class="media-heading">Imperial war museum</h4></a>
                                <a href="destination-single-city.html"><i class="fa fa-map-marker" aria-hidden="true"></i> View in map</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="sightContent">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="destination-single-city.html">
                                    <img class="media-object" src="img/home-city/sight-img-9.jpg" alt="Sight Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="destination-single-city.html"><h4 class="media-heading">Novotel Hotel</h4></a>
                                <a href="destination-single-city.html"><i class="fa fa-map-marker" aria-hidden="true"></i> View in map</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="homeCitybtn">
                <a href="destination-cities.html" class="btn buttonTransparent">See All Sights</a>
            </div>
        </div>
    </section>

    <!-- EXCLUSIVE DAY SECTION -->
    <section class="exclusiveDaySection ptb-100" style="background-image: url(../img/home-city/exclusive-day-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="sectionTitleHomeCity2">
                        <h2>Exclusive 5 days star city tour <span> from $299</span></h2>
                        <p>This includes 3 sight seen 2 museums and1 art gallery tour</p>
                    </div>
                    <div class="homeCitybtn">
                        <a href="single-package-right-sidebar.html" class="btn buttonCustomPrimary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PLAN TOURE CITY SECTION -->
    <section class="planToureCitySection bg-ash ptb-100">
        <div class="container">
            <div class="sectionTitleHomeCity">
                <h2>Why Plan a tour to star city?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 ">
                    <div class="planToureContent text-center">
                        <div class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <h4>29 Amazing places <br> and spots to visit</h4>
                            <a href="destination-cities.html">View all Spots </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 ">
                    <div class="planToureContent text-center">
                        <div class="icon">
                            <i class="fa fa-beer" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <h4>Traditional Food <br> and drink</h4>
                            <a href="destination-cities.html">View all Spots </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 ">
                    <div class="planToureContent text-center">
                        <div class="icon">
                            <i class="fa fa-umbrella" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <h4>Excellent weather <br> and special tourist services</h4>
                            <a href="destination-cities.html">View all Spots </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PHOTO GALLERY SECTION -->
    <section class="photoGallerySection ptb-100">
        <div class="container">
            <div class="sectionTitleHomeCity">
                <h2>Photo Gallery</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <div class="photoGallery">
                        <div class="slick-carousel">
                            <div class="singlItem">
                                <div class="singleImg">
                                    <img src="img/home-city/slider/photo-slider-01.jpg" alt="image">
                                </div>
                            </div>
                            <div class="singlItem">
                                <div class="singleImg">
                                    <img src="img/home-city/slider/photo-slider-02.jpg" alt="image">
                                </div>
                            </div>
                            <div class="singlItem">
                                <div class="singleImg">
                                    <img src="img/home-city/slider/photo-slider-03.jpg" alt="image">
                                </div>
                            </div>
                            <div class="singlItem">
                                <div class="singleImg">
                                    <img src="img/home-city/slider/photo-slider-01.jpg" alt="image">
                                </div>
                            </div>
                            <div class="singlItem">
                                <div class="singleImg">
                                    <img src="img/home-city/slider/photo-slider-02.jpg" alt="image">
                                </div>
                            </div>
                            <div class="singlItem">
                                <div class="singleImg">
                                    <img src="img/home-city/slider/photo-slider-03.jpg" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRAVEL GUIDE SECTION -->
    <section class="travelGuideSection bg-ash ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="travelGuideImg">
                        <img src="img/home-city/tour-guide-img.png" alt="Image">
                        <span class="freePdf">Free pdf</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="sectionTitleHomeCity">
                        <h2>Travel Guide</h2>
                        <h4>Start From <span>$255</span> </h4>
                    </div>
                    <div class="travelGuideContent">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco nisi ut aliquip ex ea commodo consequat</p>
                        <a href="#" class="btn buttonCustomPrimary">Get it now</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- TRAVEL TIPS SECTION -->
    <section class="travelTipsSection ptb-100">
        <div class="container">
            <div class="sectionTitleHomeCity">
                <h2>Get city travel tips</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 ">
                            <div class="travelTipsImg">
                                <a href="blog-single-right-sidebar.html">
                                    <img src="img/home-city/travel-tips-img-1.jpg" alt="Travel Tips Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-7">
                            <div class="travelTipsContent">
                                <a href="blog-single-right-sidebar.html">
                                    <h4> Panoramic london city Sightseeing tour</h4>
                                </a>
                                <div class="meta-content">
                                    <a href=""><i class="fa fa-user-o" aria-hidden="true"></i>by Admin</a>
                                    <a href=""><i class="fa fa-comments-o" aria-hidden="true"></i>Comments</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmodtempor incididunt ut laboet dolore magna aliqua Ut enim ad minim veniam</p>
                                <a class="readMoreBtn" href="blog-single-right-sidebar.html">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 ">
                            <div class="travelTipsImg">
                                <a href="blog-single-right-sidebar.html">
                                    <img src="img/home-city/travel-tips-img-2.jpg" alt="Travel Tips Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-7">
                            <div class="travelTipsContent">
                                <a href="blog-single-right-sidebar.html">
                                    <h4> Panoramic london city Sightseeing tour</h4>
                                </a>

                                <div class="meta-content">
                                    <a href=""><i class="fa fa-user-o" aria-hidden="true"></i>by Admin</a>
                                    <a href=""><i class="fa fa-comments-o" aria-hidden="true"></i>Comments</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmodtempor incididunt ut laboet dolore magna aliqua Ut enim ad minim veniam</p>
                                <a class="readMoreBtn" href="blog-single-right-sidebar.html">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="homeCitybtn">
                <a href="blog-grid-three-col.html" class="btn buttonCustomPrimary">Read All</a>
            </div>
        </div>
    </section>

    <!--SUBSCRIBS SECTION -->
    <section class="subscribSection ptb-100" style="background-image: url(img/home-city/subscribs-bg.jpg);" >
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    <div class="sectionTitleHomeCity2">
                        <h2>Subscribe to reacive amazing  offer and tips</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-xs-12">
                    <form action="">
                        <div class="amazingSelectbox">
                            <div class="subscribInput">
                                <input type="email" class="form-control" placeholder="Your email" aria-describedby="basic-addon1">
                            </div>
                            <div class="searchHotelBtn">
                                <a href="#" class="btn buttonCustomPrimary">Sign up</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>


    <!-- FOOTER -->
    <footer>
        <div class="footer clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <div class="footerContent">
                            <a href="index.html" class="footer-logo"><img src="img/logo-color-sm.png" alt="footer-logo"></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute </p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="footerContent">
                            <h5>contact us</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod.</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-home" aria-hidden="true"></i>61 Park Street, Fifth Avenue, NY</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>[88] 657 524 332</li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailTo:info@star-travel.com">info@star-travel.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="footerContent imgGallery">
                            <h5>Gallery</h5>
                            <div class="row">
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-1.jpg"><img src="img/home/gallery/thumb-gallery-1.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-2.jpg"><img src="img/home/gallery/thumb-gallery-2.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-3.jpg"><img src="img/home/gallery/thumb-gallery-3.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-4.jpg"><img src="img/home/gallery/thumb-gallery-4.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-5.jpg"><img src="img/home/gallery/thumb-gallery-5.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-6.jpg"><img src="img/home/gallery/thumb-gallery-6.jpg" alt="image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="footerContent">
                            <h5>newsletter</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do. </p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your email" aria-describedby="basic-addon21">
                                <span class="input-group-addon" id="basic-addon21"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </div>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyRight clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-push-6 col-xs-12">
                        <ul class="list-inline">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                        <div class="copyRightText">
                            <p>Copyright © 2016. All Rights Reserved by <a target="_blank" href="http://www.iamabdus.com/">Abdus</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Signup Modal -->
<div class="modal fade signupLoging" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modalContentCustom">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create your account</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="form-group">
                        <input type="text" class="form-control bg-ash" id="exampleInputEmail1" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control bg-ash" id="exampleInputPassword1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control bg-ash" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> I agree to the terms of use and privacy.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
                <div class="or">
                    or
                </div>
                <a class="btn btn-default btnSocial"  href="#">Log in with facebook</a>
            </div>

            <div class="modal-footer">
                <div class="dontHaveAccount">
                    <p>Don’t have an Account?<a href=""> Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade signupLoging" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modalContentCustom">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Log in to your account</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="form-group">
                        <input type="email" class="form-control bg-ash" id="exampleInputPassword1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control bg-ash" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                        <a class="forgotPass clerfix" href="">Fogot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
                <div class="or">
                    or
                </div>
                <a class="btn btn-default btnSocial"  href="#">Log in with facebook</a>
            </div>

            <div class="modal-footer">
                <div class="dontHaveAccount">
                    <p>Don’t have an Account?<a href=""> Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPTS -->
<script src="{{asset('plugins/jquery/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('plugins/selectbox/jquery.selectbox-0.1.3.min.js')}}"></script>
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('plugins/jquery/waypoints.min.js')}}"></script>
<script src="{{asset('plugins/counter-up/jquery.counterup.min.js')}}"></script>
<script src="{{asset('plugins/isotope/isotope.min.js')}}"></script>
<script src="{{asset('plugins/isotope/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('plugins/isotope/isotope-triger.js')}}"></script>
<script src="{{asset('plugins/countdown/jquery.syotimer.js')}}"></script>
<script src="{{asset('plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('frntjs/custom.js')}}"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>

</body>

</html>

