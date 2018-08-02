@extends('frontend.layouts.master')
@section('home_main_content')

<?php
$conConf = Config::get('common.continents');
?>
    <section class="mainContentSection packagesSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span class="lightBg">Our Top Deals</span></h2>
                        <p>Quisque lacus augue, blandit non est a, dictum malesuada odio.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($offerspack as $offerpack)
                <div class="col-sm-4 col-xs-12">
                    <div class="thumbnail deals">

                            <?php
                            $jsonString = $offerpack->packageimages;
                            $decoded = json_decode($jsonString, true);
                            if(!NULL){
                            if(is_array($decoded)){
                            ?>
                                <img src="{{Image::url('/images/'.$decoded[array_rand($decoded, 1)],500,350,array('crop',))}}">
                                <?php  }
                                }
                            ?>

                        <a href="{{url('/offerpackage/'.str_slug($offerpack->offerslug,'-'))}}" class="pageLink"></a>
                        <div class="discountInfo">
                            <div class="discountOffer">
                                <h4>
                                    {{$offerpack->offeramount}} %<span>OFF</span>
                                </h4> 
                                <span style="color: #fff;padding-left: 16px;font-weight: bold;font-size: 12px;;">{{$offerpack->person}} persons</span>
                            </div>
                            <ul class="list-inline rating homePage">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            </ul>
                            <ul class="list-inline duration">
                                <?php
                                 $daynight = explode('-', $offerpack->day);

                                 // var_dump($daynight);
                                 // exit();
                                ?>
                                <li>{{$daynight[0]}} days</li><li>{{$daynight[1]}} nights</li>
                                
                                
                            </ul>
                        </div>
                        <div class="caption">
                            <h4><a href="{{url('/offerpackage/'.str_slug($offerpack->offerslug,'-'))}}" class="captionTitle"> {{$offerpack->name}}</a></h4>
                            <p>{!! str_limit($offerpack->description, $limit =50, $end = '...')!!}</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Start From</span>
                                    Tk {{$offerpack->discount}}
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
            <div class="row">
                <div class="col-xs-12">
                    <div class="btnArea">
                        <a href="{{url('/all-offerpackages')}}" class="btn buttonTransparent">view all</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROMOTION PARALLAX -->
    <section class="promotionWrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="promotionTable">
                        <div class="promotionTableInner">
                            <div class="promotionInfo">
                                <span>Winter Promotion</span>
                                <h2>Greek Island Vacetion Tour</h2>
                                <ul class="list-inline rating">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <p>$599 per person - 5 nights</p>
                                <a href="{{url('/winter-packages/')}}" class="btn buttonCustomPrimary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DESTINATIONS -->
    <section class="whiteSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span>Our Destinations</span></h2>
                        <p>Nullam vitae risus commodo arcu tincidunt ultricies</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="media destinations">
                        <a class="media-left" href="destination-cities.html">
                            <img class="media-object" src="{{asset('img/home/destination.jpg')}}" alt="Destination">
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">Choose <br>Your Destination</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="clearfix">
                                @foreach($newArr as $continentId=>$countries)
                                      <ul class="list-unstyled">
                                    <li><i class="fa fa-minus" aria-hidden="true"></i>{{$continentId}}</li>
                                   @foreach(array_slice($countries, 0, 3) as $countryId=>$countryDetail)
                                     <li><a href="<?php echo '/country/'.$countryDetail['slug'];?>"><i class="fa fa-square" aria-hidden="true"></i>
                                             {{$countryDetail['name']}}
                                              </a></li>
                                     @endforeach
                                      </ul>

                                @endforeach
                           </div>
                            <div class="media-btn">
                                <a href="{{url('/viewallcontinents')}}" class="btn buttonTransparent">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--    --><?php
//            exit();
//    ?>

    <!-- COUNTING PARALLAX -->
    <section class="countUpSection">
        <div class="container">
            <div class="row">

                <?php
                 $numberofrows = $countriescount->count();
                  $packagescount = $packagecount->count();
                ?>
                <div class="col-sm-3 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="counter">{{$numberofrows}}</div>
                        <h5>Destinations</h5>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                        </div>
                        <div class="counter">{{$packagescount}}</div>
                        <h5>tour pack</h5>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-smile-o" aria-hidden="true"></i>
                        </div>
                        <div class="counter">4562</div>
                        <h5>happy clients</h5>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                        </div>
                        <div class="counter">24</div>
                        <h5>hours support</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TOUR PACKAGES -->
    <section class="whiteSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span>Our Packages</span></h2>
                        <p>Ut facilisis facilisis metus quis semper</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="filter-container isotopeFilters">
                        <ul class="list-inline filter">
                            <li class="active"><a href="#" data-filter="*">All Places</a></li>
                            @foreach( $continents as $continent)
                            <li><a class="filter" href="" id="{{$continent->id}}" data-filter=".{{$continent->continentname}}">{{$continent->continentname}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>




            <div class="row isotopeContainer">

                @forelse($packagebycontinent as $package)
                <div class="col-sm-4 isotopeSelector {{$conConf[$package->continentid]}}">
                    <article class="">
                        <figure>
                            <?php
                            $jsonString = $package->packageimages;
                            $decoded = json_decode($jsonString, true);
                            if(!NULL){
                            if(is_array($decoded)){
                             ?>
                            <img src="{{Image::url('/images/'.$decoded[array_rand($decoded, 1)],500,350,array('crop',))}}">
                            <?php  }
                            }
                            ?>
                            <h4>{{$package->packagename}}</h4>
                            <div class="overlay-background">
                                <div class="inner"></div>
                            </div>
                            <div class="overlay">
                                <a class="fancybox-pop" href="{{url('/package/'.str_slug($package->packageslug,'-'))}}">
                                    <div class="overlayInfo">
                                        <h5>from <span>${{$package->packageprice}}</span></h5>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>27 Jan, 2017</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </article>
                </div>
                  @endforeach
            </div>
        </div>
    </section>


    <!-- INQUIRY MODAL -->
    <div class="modal fade bookingModal modalBook" id="inquiryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Inquiry About Tour</h4>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" id="yourName" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="yourEmail" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn buttonCustomPrimary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('frntjs/script.js')}}"></script>
    @endsection