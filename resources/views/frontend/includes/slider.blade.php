<section class="bannercontainer">

    <div id="rev_slider_wrapper1" class="rev_slider_wrapper fullscreen-container" data-alias="christmas-snow-scene" data-source="gallery" style="background-color:transparent;padding:0px;">
        <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
        <div id="rev_slider_container" class="rev_slider custom_rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
            <ul>
                <!-- SLIDE 1 -->
                @foreach($sliderinfo as $slider)
                    <li data-transition="parallaxvertical" >
                        <!-- MAIN IMAGE -->
                        <img src="{{Image::url('/'.$slider->image,1920,744,array('crop'))}}" alt="slidebg1"   data-bgparallax="3" class="rev-slidebg" data-no-retina>

                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="container">
                            <div class="tp-caption tp-resizeme slide-layer-1" id="slide-layer-1"
                                 data-x="left"
                                 data-y="center"
                                 data-hoffset="['20', '40', '80', '60']"
                                 data-voffset="['-105']"
                                 data-width="['auto']"
                                 data-height="['auto']"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['left']"
                                 data-fontsize="['30', '30', '25', '16']"
                                 data-color="#fff"
                                 data-visibility="['on', 'on', 'on', 'on']"
                                 style="z-index: 1; text-transform: uppercase; ">{{$slider->title}}

                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"
                                 data-x="left"
                                 data-y="center"
                                 data-hoffset="['20', '40', '80', '60']"
                                 data-voffset="-50"
                                 data-width="['auto']"
                                 data-height="['auto']"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['left']"
                                 data-fontsize="['64', '54', '44', '34']"
                                 data-color="#fff"
                                 data-fontweight="bold"

                                 style="z-index: 1; text-transform: uppercase;">{{$slider->subtitle}}

                            </div>

                            <!-- LAYER NR. 3 -->

                            <div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"
                                 data-x="left"
                                 data-y="center"
                                 data-hoffset="['20', '40', '80', '60']"
                                 data-voffset="20"
                                 data-width="['auto']"
                                 data-height="['auto']"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['left']"
                                 data-fontsize="['14', '14', '14', '14']"
                                 data-color="#fff"
                                 data-visibility="['on','on','off','off']"

                                 style="z-index: 1;">{{$slider->body}}
                            </div>


                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption tp-resizeme slide-layer-4" id="slide-layer-4"
                                 data-x="['left','left','left','left']"
                                 data-y="center"
                                 data-hoffset="['20', '40', '80', '60']"
                                 data-voffset="['108', '108', 15, '15']"
                                 data-width="auto"
                                 data-height="auto"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1400,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['left']"
                                 data-lineheight="['45', '40', '35', '30']"
                                 data-color="#FFF"
                                 data-border="0"
                                 data-paddingleft="30"
                                 data-paddingright="30"
                                 data-visibility="['on','on','on','on']"

                                 style="z-index: 500; border-radius: 4px"><span class="page-scroll"><a target="_blank" href="{{$slider->link}}">Buy Now</a></span>
                            </div>
                        </div>
                    </li>
                @endforeach

                {{--<!-- SLIDE 2 -->--}}
                {{--<li data-transition="parallaxvertical">--}}
                {{--<!-- MAIN IMAGE -->--}}
                {{--<img src="{{asset('img/home/slider/slider-02.jpg')}}" alt="slidebg1"   data-bgparallax="3" class="rev-slidebg" data-no-retina>--}}

                {{--<!-- LAYERS -->--}}

                {{--<!-- LAYER NR. 1 -->--}}
                {{--<div class="tp-caption tp-resizeme slide-layer-1" id="slide-layer-1"--}}
                {{--data-x="center" data-hoffset=""--}}
                {{--data-y="center" data-voffset="-105"--}}
                {{--data-width="['auto']"--}}
                {{--data-height="['auto']"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['center']"--}}
                {{--data-fontsize="['30', '30', '30', '25']"--}}
                {{--data-color="#fff"--}}
                {{--style="z-index: 1; text-transform: uppercase; ">Discover The Most Amazing--}}

                {{--</div>--}}

                {{--<!-- LAYER NR. 2 -->--}}
                {{--<div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"--}}
                {{--data-x="center" data-hoffset=""--}}
                {{--data-y="center" data-voffset="-50"--}}
                {{--data-width="['auto']"--}}
                {{--data-height="['auto']"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['center']"--}}
                {{--data-fontsize="['64', '54', '44', '34']"--}}
                {{--data-color="#fff"--}}
                {{--data-fontweight="bold"--}}

                {{--style="z-index: 1; text-transform: uppercase;">Travel Template--}}

                {{--</div>--}}

                {{--<!-- LAYER NR. 3 -->--}}

                {{--<div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"--}}
                {{--data-x="center" data-hoffset="0"--}}
                {{--data-y="center" data-voffset="20"--}}
                {{--data-width="['auto']"--}}
                {{--data-height="['auto']"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['center']"--}}
                {{--data-fontsize="['14', '14', '14', '14']"--}}
                {{--data-color="#fff"--}}
                {{--data-visibility="['on','on','off','off']"--}}

                {{--style="z-index: 1;">Maecenas nec sodales justo. Vivamus auctor pulvinar mattis. Ut at elementum nunc. Quisque condimentum ligula ante, non <br> luctus enim pulvinar sed. Fusce quis congue odio.--}}

                {{--</div>--}}


                {{--<!-- LAYER NR. 4 -->--}}
                {{--<div class="tp-caption tp-resizeme slide-layer-4" id="slide-layer-4"--}}
                {{--data-y="center"--}}
                {{--data-x="center"--}}
                {{--data-hoffset=""--}}
                {{--data-voffset="['108', '108', 15, '15']"--}}
                {{--data-width="auto"--}}
                {{--data-height="auto"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1400,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['center']"--}}
                {{--data-lineheight="['45', '40', '35', '30']"--}}
                {{--data-color="#FFF"--}}
                {{--data-border="0"--}}
                {{--data-paddingleft="30"--}}
                {{--data-paddingright="30"--}}

                {{--style="z-index: 500; border-radius: 4px"><span class="page-scroll"><a target="_blank" href="">Buy Now</a></span>--}}
                {{--</div>--}}
                {{--</li>--}}

                {{--<!-- slide 3   -->--}}
                {{--<li data-transition="parallaxvertical">--}}
                {{--<!-- MAIN IMAGE -->--}}
                {{--<img src="{{asset('img/home/slider/slider-03.jpg')}}" alt="slidebg1"   data-bgparallax="3" class="rev-slidebg" data-no-retina>--}}

                {{--<!-- LAYERS -->--}}

                {{--<!-- LAYER NR. 1 -->--}}
                {{--<div class="tp-caption tp-resizeme slide-layer-1" id="slide-layer-1"--}}
                {{--data-x="left"--}}
                {{--data-y="center"--}}
                {{--data-hoffset="['20', '40', '80', '60']"--}}
                {{--data-voffset="['-105']"--}}
                {{--data-width="['auto']"--}}
                {{--data-height="['auto']"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['left']"--}}
                {{--data-fontsize="['30', '30', '30', '25']"--}}
                {{--data-color="#fff"--}}
                {{--style="z-index: 1; text-transform: uppercase; ">Enjoy Ultimate Freedom--}}

                {{--</div>--}}

                {{--<!-- LAYER NR. 2 -->--}}
                {{--<div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"--}}
                {{--data-x="left"--}}
                {{--data-y="center"--}}
                {{--data-hoffset="['20', '40', '80', '60']"--}}
                {{--data-voffset="-50"--}}
                {{--data-width="['auto']"--}}
                {{--data-height="['auto']"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['left']"--}}
                {{--data-fontsize="['64', '54', '44', '34']"--}}
                {{--data-color="#fff"--}}
                {{--data-fontweight="bold"--}}

                {{--style="z-index: 1; text-transform: uppercase;">Bootstrap Theme--}}

                {{--</div>--}}

                {{--<!-- LAYER NR. 3 -->--}}

                {{--<div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"--}}
                {{--data-x="left"--}}
                {{--data-y="center"--}}
                {{--data-hoffset="['20', '40', '80', '60']"--}}
                {{--data-voffset="20"--}}
                {{--data-width="['auto']"--}}
                {{--data-height="['auto']"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['left']"--}}
                {{--data-fontsize="['14', '14', '14', '14']"--}}
                {{--data-color="#fff"--}}
                {{--data-visibility="['on','on','off','off']"--}}

                {{--style="z-index: 1;">Aenean congue nisi elit, vitae viverra leo luctus et. Donec interdum erat id mi scelerisque, vitae ullamcorper lorem gravida. <br> Nunc sed maximus ante. Nulla dictum turpis vitae vehicula auctor.--}}

                {{--</div>--}}


                {{--<!-- LAYER NR. 4 -->--}}
                {{--<div class="tp-caption tp-resizeme slide-layer-4" id="slide-layer-4"--}}
                {{--data-x="['left','left','left','left']"--}}
                {{--data-y="center"--}}
                {{--data-hoffset="['20', '40', '80', '60']"--}}
                {{--data-voffset="['108', '108', 15, '15']"--}}
                {{--data-width="auto"--}}
                {{--data-height="auto"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1400,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['left']"--}}
                {{--data-lineheight="['45', '40', '35', '30']"--}}
                {{--data-color="#FFF"--}}
                {{--data-border="0"--}}
                {{--data-paddingleft="30"--}}
                {{--data-paddingright="30"--}}

                {{--style="z-index: 500; border-radius: 4px"><span class="page-scroll"><a target="_blank" href="">Buy Now</a></span>--}}
                {{--</div>--}}
                {{--</li>--}}

                {{--<!-- SLIDE 4 -->--}}
                {{--<li data-transition="parallaxvertical">--}}
                {{--<!-- MAIN IMAGE -->--}}
                {{--<img src="{{asset('img/home/slider/slider-04.jpg')}}" alt="slidebg1"   data-bgparallax="3" class="rev-slidebg" data-no-retina>--}}

                {{--<!-- LAYERS -->--}}

                {{--<!-- LAYER NR. 1 -->--}}
                {{--<div class="tp-caption tp-resizeme slide-layer-1" id="slide-layer-1"--}}
                {{--data-x="center" data-hoffset=""--}}
                {{--data-y="center" data-voffset="-105"--}}
                {{--data-width="['autp']"--}}
                {{--data-height="['auto']"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['center']"--}}
                {{--data-fontsize="['30', '30', '30', '25']"--}}
                {{--data-color="#fff"--}}
                {{--style="z-index: 1; text-transform: uppercase; ">Go Where You Wanna Go--}}

                {{--</div>--}}

                {{--<!-- LAYER NR. 2 -->--}}
                {{--<div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"--}}
                {{--data-x="center" data-hoffset=""--}}
                {{--data-y="center" data-voffset="-50"--}}
                {{--data-width="['auto']"--}}
                {{--data-height="['auto']"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['center']"--}}
                {{--data-fontsize="['64', '54', '44', '34']"--}}
                {{--data-color="#fff"--}}
                {{--data-fontweight="bold"--}}

                {{--style="z-index: 1; text-transform: uppercase;">24/7 Quick Support--}}

                {{--</div>--}}

                {{--<!-- LAYER NR. 3 -->--}}

                {{--<div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"--}}
                {{--data-x="center" data-hoffset=""--}}
                {{--data-y="center" data-voffset="20"--}}
                {{--data-width="['auto']"--}}
                {{--data-height="['auto']"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['center']"--}}
                {{--data-fontsize="['14', '14', '14', '14']"--}}
                {{--data-color="#fff"--}}
                {{--data-visibility="['on','on','off','off']"--}}

                {{--style="z-index: 1;">Maecenas et leo nec nunc rutrum tempor. Mauris pharetra porttitor odio eget convallis. Praesent facilisis mattis pretium. <br> Aliquam sagittis efficitur risus, interdum euismod urna. Pellentesque vel augue augue.--}}

                {{--</div>--}}


                {{--<!-- LAYER NR. 4 -->--}}
                {{--<div class="tp-caption tp-resizeme slide-layer-4" id="slide-layer-4"--}}
                {{--data-y="center"--}}
                {{--data-x="center"--}}
                {{--data-hoffset=""--}}
                {{--data-voffset="['108', '108', 15, '15']"--}}
                {{--data-width="auto"--}}
                {{--data-height="auto"--}}
                {{--data-type="text"--}}
                {{--data-responsive_offset="on"--}}
                {{--data-frames='[{"delay":1400,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}
                {{--data-textAlign="['center']"--}}
                {{--data-lineheight="['45', '40', '35', '30']"--}}
                {{--data-color="#FFF"--}}
                {{--data-border="0"--}}
                {{--data-paddingleft="30"--}}
                {{--data-paddingright="30"--}}

                {{--style="z-index: 500; border-radius: 4px"><span class="page-scroll"><a target="_blank" href="">Buy Now</a></span>--}}
                {{--</div>--}}
                {{--</li>--}}
            </ul>

            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div><!-- END REVOLUTION SLIDER -->
    </div>
</section>