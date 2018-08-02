@extends('frontend.layouts.single_master')
@section('single_country_content')
    <section class="pageTitle" style="background-image:url({{asset('img/pages/page-title-bg3.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="titleTable">
                        <div class="titleTableInner">
                            <div class="pageTitleInfo">
                                <h1>Continent Wise Countries</h1>
                                <div class="under-border"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- PAGE CONTENT -->
    <section class="mainContentSection packagesSection">
        <div class="container">
            <div class="row">
                @foreach($countriesbycontinent as $countries)

                <div class="col-sm-6 col-lg-4 col-xs-12">
                    <div class="thumbnail deals">
                        <?php
                        $jsonString = $countries->imageids;
                        $decoded = json_decode($jsonString, true);
                        if(!NULL){
                        if(is_array($decoded)){
                        ?>
                        <img src="{{Image::url('/images/'.$decoded[array_rand($decoded, 1)],500,300,array('crop'))}}">
                        <?php  }
                        }
                        ?>
                        <a href="{{url('/country/'.str_slug($countries->slug,'-'))}}" class="pageLink"></a>
                            <div class="media-body">
                             <h5><a style="padding-left: 2%;color: #00A0D1" href="{{url('/country/'.$countries->slug)}}" class="media-heading">{{$countries->name}}</a></h5>
                                <h5><a style="padding-left: 2%;color: #ffbd2a" class="media-heading">{{$countries->continentname}}</a></h5>

                                <h5 style="padding-left: 2%"> {!! str_limit($countries->description, $limit = 30, $end = '..')!!}</h5>
                            </div>
                    </div>

                </div>
                    @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection