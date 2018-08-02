@extends('frontend.layouts.single_master')
@section('single_country_content')

    <section class="pageTitle" style="background-image:url({{asset('img/pages/page-title-bg3.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="titleTable">
                        <div class="titleTableInner">
                            <div class="pageTitleInfo">
                                <h1>Destinations</h1>
                                <div class="under-border"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mainContentSection">
        <div class="container">


            <div class="row marginExten">

           @foreach ($continentimage as $continentimg)
            <div class="col-sm-6 col-xs-12">
            <div class="thumbnail citiesContent">
            <div class="imageArea">
            <a href="{{url('countrybycontinent/'.$continentimg->continentslug)}}">

            <div class="sticker">{{$continentimg->continentname}}</div>
                <?php
                $jsonString = $continentimg->imageids;
                $decoded = json_decode($jsonString, true);
                if(!NULL){
                if(is_array($decoded)){
                 ?>
                <img src="{{Image::url('/images/'.$decoded[array_rand($decoded, 1)],700,350,array('crop'))}}">
                <?php  }
                }
                ?>
           </a>
            </div>

            </div>
            </div>
           @endforeach
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="buttonArea">
                        <ul class="list-inline">
                            <li><a href="{{url('/allcountries')}}" class="btn buttonTransparent">All Countries</a></li>
                            <li><a href="{{url('/allpackages')}}" class="btn buttonTransparent">All Packages</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection


