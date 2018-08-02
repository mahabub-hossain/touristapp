@extends('frontend.layouts.single_master')
@section('single_country_content')
    <section class="pageTitle" style="background-image:url({{asset('img/pages/page-title-bg3.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="titleTable">
                        <div class="titleTableInner">
                            <div class="pageTitleInfo">
                                <h1>All Countries</h1>
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
                <div class="col-sm-12 col-xs-12">
                    <div class="thumbnail citiesContent">
                        <div class="caption">
                            <div class="row">

                            @foreach($allcountriesinfo as $allcountryinfo)
                                <div class="col-sm-4 col-xs-12">
                                    <div class="media">
                                        <a class="media-left" href="{{url('/country/'.$allcountryinfo->name)}}">

                                            <?php
                                            $jsonString = $allcountryinfo->imageids;
                                            $decoded = json_decode($jsonString, true);
                                            if(!NULL){
                                            if(is_array($decoded)){
                                           ?>
                                            <img src="{{Image::url('/images/'.$decoded[array_rand($decoded, 1)],500,300,array('crop'))}}">
                                            <?php  }
                                            }
                                            ?>
                                        </a>
                                        <div class="media-body">
                                            <a href="{{url('/country/'.$allcountryinfo->name)}}" class="media-heading">{{$allcountryinfo->name}}</a>
                                            <p> {!! str_limit($allcountryinfo->description, $limit = 30, $end = '..')!!}</p>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
                               </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="buttonArea">
                        {{$allcountriesinfo->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection