@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <input type="hidden" class="countryid" value="{{$countrybyId->id}}">
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Edit Country</h5>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.country.update',$countrybyId->id],'form' => '1','method'=>'post','name'=>'countryform','enctype'=>'multipart/form-data']) !!}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Country Name</b></label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$countrybyId->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Slug Nmae</b></label>
                        <input type="text" name="slug" class="form-control" id="exampleFormControlInput1" value="{{$countrybyId->slug}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Capital Name</b></label>
                        <input type="text" name="capital" class="form-control" id="exampleFormControlInput1" value="{{$countrybyId->capital}}">
                    </div>

                    <div class="form-group">
                        <label for="continent_id"><b>Select Continent</b></label>
                        <select class="form-control" id="continent_id" name="continent_id">
                            @foreach($mycontinent as $continent)
                                {{--<option value="{{$mycontinent->id}}">{{$mycontinent->name}}</option>--}}
                                <option value="{{ $continent->id }}"  @if($continent->id==$countrybyId->continent_id)
                                selected='selected' @endif >{{ $continent->continentname }}</option>
                            @endforeach

                         </select>
                    </div>
                  <div class="form-group">
                        <label for="description"><b>Description</b></label>
                        <textarea class="form-control" id="description" name="description" >
                            {{$countrybyId->description }}
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label for="tourguide"><b>Tour Guides</b></label>
                        <textarea class="form-control" id="tourguide" name="tourguide" >{{$countrybyId->tourguide}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="benifit"><b>Benifits</b></label>
                        <textarea class="form-control" id="benifit" name="benifit" >{{$countrybyId->benifit}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Latitude</b></label>
                        <input type="text" name="lat" class="form-control" id="exampleFormControlInput1" value="{{$countrybyId->lat}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Longitude</b></label>
                        <input type="text" name="long" class="form-control" id="exampleFormControlInput1" value="{{$countrybyId->long}}">
                    </div>

                    <div id="generaldata" class="wrap">
                    <?php
                        $jsonString = $countrybyId->imageids;
                        $decoded = json_decode($jsonString, true);
                        if(!NULL){
                        if(is_array($decoded) || is_object($decoded)){
                        foreach ($decoded as $value){ ?>

                         <div class="form-group delDiv control-group">
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
                    
                    </div>


                     <a href="javascript:void(0);" class="add_button" style="background: #28d19c;
                                                                    padding: 8px 21px;
                                                                    color: #fff;
                                                                    border-radius: 8%;text-decoration: none;">Add Image</a><br><br><br>

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
            CKEDITOR.replace( 'benifit' );
            var maxField = 4; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.wrap'); //Input field wrapper
            var fieldHTML = '<div class="form-group control-group"><input type="file" name="filename[]" value="" class="form-control"/><br><a href="javascript:void(0);" class="remove_button" title="Remove field" style="background: #ed3610;\n' +
                '                                                                    padding: 8px 10px;\n' +
                '                                                                    color: #fff;\n' +
                '                                                                    border-radius: 6%;text-decoration: none;">Remove</a></div>'; //New input field html
            var x = 1; //Initial field counter is 1
            $(addButton).click(function(){ //Once add button is clicked
                if(x <= maxField){ //Check maximum number of input fields
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
                //console.log('ok');
                e.preventDefault();

                var country_id = $('.countryid').val();
                var single_img = $(this).closest('.delDiv').find('.singleimage').val();
                 //alert(single_img);
                if (country_id > 0 && single_img.length > 1) {
                    $("#generaldata").html('');

                    $.ajax({
                        type: 'get',
                        url: '/admin/country/deleteimage/'+country_id +'/'+single_img,

                        success: function (data) {
                            console.log(data);
                            $('#generaldata').html(data);
                        }
                    });
                }
            });
        });

    </script>



@endsection

