@include('frontend.includes.head')

<body class="body-wrapper  changeHeader ">
<div class="main-wrapper">

    <!-- HEADER -->

@include('frontend.includes.header')

    <!-- BANNER -->

@include('frontend.includes.slider')


    <!-- SEARCH TOUR -->

{{--@include('frontend.includes.dark_search')--}}
    <!-- TOP DEALS -->
@section('home_main_content')
    @show
    <!-- FOOTER -->

</div>
@include('frontend.includes.footer')