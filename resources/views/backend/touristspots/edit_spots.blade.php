@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <input type="hidden" class="spotid" value="{{$touristspotbyId->id}}">

    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Tourist Spots Fields</h5>
                <div class="card-body">
                    {!! Form::open(['route' =>['admin.touristspot.update',$touristspotbyId->id],'method'=>'post','enctype'=>'multipart/form-data']) !!}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Spot Name</b></label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$touristspotbyId->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Spot slug</b></label>
                        <input type="text" name="spotslug" class="form-control" id="exampleFormControlInput1" value="{{$touristspotbyId->spotslug}}">
                    </div>

                    <div class="form-group">
                        <label for="continent_id"><b>Select Continent</b></label>
                        <select class="form-control" id="continent_id" name="continent_id">
                            @foreach($continents as $continent)
                                {{--<option value="{{$mycontinent->id}}">{{$mycontinent->name}}</option>--}}
                                <option value="{{ $continent->id }}"  @if($continent->id==$touristspotbyId->continent_id)
                                selected='selected' @endif >{{ $continent->continentname }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="continent_id"><b>Select Country</b></label>
                        <select class="form-control" id="countryid" name="country_id">
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}"  @if($country->id==$touristspotbyId->country_id)
                                selected='selected' @endif >{{ $country->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="countryid"><b>Select City</b></label>
                        <select class="form-control country" id="cities" name="city">
                            <option value="{{$touristspotbyId->city}}">{{$touristspotbyId->city}}</option>
                        </select>
                    </div>


                    <div id="generaldata" class="wrap">
                        <?php
                        $jsonString = $touristspotbyId->imageids;
                        $decoded = json_decode($jsonString, true);
                        if(!NULL){
                        if(is_array($decoded) || is_object($decoded)){
                        foreach ($decoded as $value){ ?>

                        <div class="form-group delDiv  control-group">
                            <img src="{{Image::url('/images/'.$value,100,100,array('crop',))}}" ><br><br>

                            <input type="hidden" class="singleimage" value="{{$value}}">
                            <button class="deleteimg"  style="background:red;
                                                                    padding: 8px 21px;
                                                                    color: #fff;
                                                                    border-radius: 8%;text-decoration: none;">Delete</button>

                        </div>
                        <?php }
                        }
                        }

                        ?>
                        <a href="javascript:void(0);" class="add_button" style="background: #28d19c;
                                                                    padding: 8px 21px;
                                                                    color: #fff;
                                                                    border-radius: 8%;text-decoration: none;">Add</a><br><br><br>
                    </div>
                    <div  id="ajaxdataoffer" class="wrap" style="display: none">

                    </div>

                    <div class="form-group">
                        <label for="description"><b>Description</b></label>
                        <textarea class="form-control" id="description" name="description" >{{$touristspotbyId->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tourguide"><b>Tour Guides</b></label>
                        <textarea class="form-control" id="tourguide" name="tourguide" >{{$touristspotbyId->tourguide}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Latitude</b></label>
                        <input type="text" name="lat" class="form-control" id="exampleFormControlInput1" value="{{$touristspotbyId->lat}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Longitude</b></label>
                        <input type="text" name="long" class="form-control" id="exampleFormControlInput1" value="{{$touristspotbyId->long}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!--col-->
    </div><!--row-->
    <script>
        $(document).ready(function () {
            CKEDITOR.replace( 'description' );
            CKEDITOR.replace( 'tourguide' );
            var maxField =3; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.wrap'); //Input field wrapper
            var fieldHTML = '<div class="form-group control-group"><input type="file" name="filename[]" value="" class="form-control"/><br><a href="javascript:void(0);" class="remove_button" title="Remove field" style="background: #ed3610;\n' +
                '                                                                    padding: 8px 10px;\n' +
                '                                                                    color: #fff;\n' +
                '                                                                    border-radius: 6%;text-decoration: none;">Remove</a></div>'; //New input field html
            var x = 1; //Initial field counter is 1
            $(addButton).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); // Add field html
                }
            });
            $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                $(this).img('src').empty();
                x--; //Decrement field counter
            });
            $('.deleteimg').click(function (e) {
                console.log('ok');
                e.preventDefault();
                var spotid = $('.spotid').val();
                var single_img = $(this).closest('.delDiv').find('.singleimage').val();
                // alert(single_img);
                if (spotid > 0 && single_img.length > 1) {
                    $("#generaldata").remove();
                    $("#ajaxdataoffer").show();

                    $.ajax({
                        type: 'get',
                        url: '/admin/touristspot/deleteimage/'+spotid +'/'+single_img,

                        success: function (data) {
                            console.log(data);
                            $('#ajaxdataoffer').html(data);
                        }
                    });
                }
            });
        });

        $(document).ready(function () {
            $('#continent_id').on('change', function(e) {
                //console.log(e);
                var continentid = e.target.value;
                $.get('/admin/touristspot/findtouristcountry/' + continentid, function (data) {
                    console.log(data);
                    $('#countryid').empty();
                    //$('#success').html(data);

                    $('#countryid').append('<option value="0" disable="true" selected="true">=== Select Country ===</option>');

                    $.each(data, function (index ,countryidObj) {
                        $('#countryid').append('<option value="' + countryidObj.id + '">' + countryidObj.name + '</option>');
                    })
                });
            })
            $('#countryid').on('change', function(e) {
                //console.log(e);
                // var country = e.target.value;
                var country =$('#countryid option:selected').text( );
                //console.log(city);

                $.get('/admin/touristspot/findcities/' + country, function (data) {
                    console.log(data);
                    $('#cities').empty();
                    //$('#success').html(data);

                    $('#cities').append('<option value="0" disable="true" selected="true">=== Select Country ===</option>');

                    $.each(data, function (index ,citiesObj) {
                        $('#cities').append('<option value="' + citiesObj.cityname+ '">' + citiesObj.cityname + '</option>');
                    })
                });

            });
        });

    </script>

@endsection
