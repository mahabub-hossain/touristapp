@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<input type="hidden" class="packageid" value="{{$packageinfobyid->id}}">

    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Tourist Spots Fields</h5>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.package.update',$packageinfobyid->id],'method'=>'post','enctype'=>'multipart/form-data']) !!}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Package Name</b></label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$packageinfobyid->packagename}}">
                    </div><div class="form-group">
                        <label for="exampleFormControlInput1"><b>Package slug</b></label>
                        <input type="text" name="packgeslug" class="form-control" id="exampleFormControlInput1" value="{{$packageinfobyid->packageslug}}">
                    </div>

                    <div class="form-group">
                        <label for="continent_id"><b>Select Continent</b></label>
                        <select class="form-control country" id="continentid" name="continentid">
                            <option value="0" disable="true" selected="true">--select one--</option>
                            @foreach($continents as $continent)
                                {{--<option value="{{$country->id}}">{{$country->name}}</option>--}}
                                <option value="{{ $continent->id }}" @if($continent->id == $packageinfobyid->continentid)
                                selected='selected' @endif >{{$continent->continentname }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="continent_id"><b>Select Country</b></label>
                        <select class="form-control country" id="countryid" name="countryid">
                            <option value="0" disable="true" selected="true">--select one--</option>
                            @foreach($countryinfo as $country)
                                <option value="{{ $country->id }}"  @if($country->id == $packageinfobyid->countryid)
                                selected='selected' @endif >{{$country->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="continent_id"><b>Select TouristSpots</b></label>
                        <select class="form-control tourspots" id="spots" name="touristspots_id">
                            <option  value="0" disable="true" selected="true">--select one--</option>
                            @foreach($spots as $spot)
                            <option value="{{ $spot->id }}"  @if($spot->id == $packageinfobyid->tourist_spotsid)
                            selected='selected' @endif >{{$spot->name}}</option>
                                @endforeach


                        </select>
                    </div>


                    <div id="generaldata" class="wrap">
                        <?php
                        $jsonString = $packageinfobyid->packageimages;
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
                @if(sizeof($programs)>0)
                    <div class="list" data-index_no="<?= sizeof($programs)-1?>">
                        <div class="itemWrapper">
                            <table class="table table-bordered moreTable">
                                <tr>
                                    <th width="5%">DayNo</th>
                                    <th width="40%">title</th>
                                    <th width="40%">description</th>
                                    <th width="15%">Option</th>
                                </tr>


                            @foreach($programs as $key=>$program)
                                <tr class="item_tr single_list">
                                    <td class="day_no">{{$program->pro_day}}</td>
                                    <td><textarea class="form-control" id="pro_title" name="program[<?=$key?>][title]">{{$program->pro_title}}</textarea><br></td>
                                    <td><textarea class="form-control" id="pro_description" name="program[<?=$key?>][description]">{{$program->pro_description}}</textarea><br></td>
                                    <input type="hidden" name="program[<?=$key?>][day]" class="form-control dayval" value="{{$program->pro_day}}">
                                    <td><span class="remove" style="background: #ed3610;padding: 8px 10px;color: #fff;border-radius: 6%;text-decoration: none;cursor:pointer">-</span></td>
                                </tr>
                            @endforeach
                            </table>
                            <span  class="add_more" style="background: #28d19c;
                                                                    padding: 8px 21px;
                                                                    color: #fff;
                                                                    border-radius: 8%;text-decoration: none; margin-bottom: 10px;cursor:pointer;">+</span><br><br>
                        </div>
                    </div>
                    @else

                        <div class="list" data-index_no="0">
                            <div class="itemWrapper">
                                <table class="table table-bordered moreTable">
                                    <tr>
                                        <th width="5%">DayNo</th>
                                        <th width="40%">title</th>
                                        <th width="40%">description</th>
                                        <th width="15%">Option</th>
                                    </tr>

                                    <tr class="item_tr single_list">
                                        <td class="day_no">1</td>
                                        <td><textarea class="form-control" id="pro_title" name="program[0][title]"></textarea><br></td>
                                        <td><textarea class="form-control" id="pro_description" name="program[0][description]"></textarea><br></td>
                                        <input type="hidden" name="program[0][day]" class="form-control dayval" value="1">
                                        <td><span class="remove" style="background: #ed3610;padding: 8px 10px;color: #fff;border-radius: 6%;text-decoration: none;cursor:pointer">-</span></td>
                                    </tr>

                                </table>
                                <span  class="add_more" style="background: #28d19c;
                                                                    padding: 8px 21px;
                                                                    color: #fff;
                                                                    border-radius: 8%;text-decoration: none; margin-bottom: 10px;cursor:pointer;">+</span><br><br>
                            </div>
                        </div>
                    @endif;






                    <div  id="ajaxdataoffer" class="wrap" style="display: none"></div>
                    <div class="form-group">
                        <label for="description"><b>Description</b></label>
                        <textarea class="form-control" id="description" name="description">{{$packageinfobyid->description}}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Package Price</b></label>
                        <input type="text" name="price" class="form-control" id="exampleFormControlInput1" value="{{$packageinfobyid->packageprice}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Latitude</b></label>
                        <input type="text" name="lat" class="form-control" id="exampleFormControlInput1" value="{{$packageinfobyid->lat}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Longitude</b></label>
                        <input type="text" name="long" class="form-control" id="exampleFormControlInput1" value="{{$packageinfobyid->long}}">
                    </div>
                    <div class="checkbox">
                        <label for="exampleFormControlInput1"><b>Is Highlighted ?</b></label><br>

                        <label><input type="radio" name="ishighlighted" value="1" @if($packageinfobyid->ishighlighted == 1) checked @endif> Yes</label><br>
                        <label><input type="radio" name="ishighlighted" value="2" @if($packageinfobyid->ishighlighted == 2) checked @endif> No</label><br>

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div><!--col-->
    </div><!--row-->
    <script>

        CKEDITOR.replace( 'description' );

        $(document).ready(function () {

            $(document).on('click', '.add_more', function () {
                var index = $('.list').data('index_no');
                $('.list').data('index_no', index + 1);
                var html = $('.itemWrapper .item_tr:last').clone().find('.form-control').each(function () {
                    this.name = this.name.replace(/\d+/, index+1);
                    this.id = this.id.replace(/\d+/, index+1);
                    this.value = '';
                }).end();

                $('.moreTable').append(html);
                var rowCount = $('.moreTable tr').length;
                $(this).closest('.itemWrapper').find('.item_tr:last').find('.day_no').html(rowCount-1);
                $(this).closest('.itemWrapper').find('.item_tr:last').find('.dayval').val(rowCount-1);

            });

            $(document).on('click', '.remove', function () {
                var obj=$(this);
                var count= $('.single_list').length;
                if(count > 1) {
                    if(obj.closest('.single_list').is($(this).closest('.itemWrapper').find('.single_list:last'))){
                        obj.closest('.single_list').remove();
                    }else{
                        alert('You can only remove the last day!');
                    }
                }
            });



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
                var package_id = $('.packageid').val();
                var single_img = $(this).closest('.delDiv').find('.singleimage').val();
                // alert(single_img);
                if (package_id > 0 && single_img.length > 1) {
                    $("#generaldata").remove();
                    $("#ajaxdataoffer").show();

                    $.ajax({
                        type: 'get',
                        url: '/admin/package/deleteimage/'+package_id +'/'+single_img,

                        success: function (data) {
                            console.log(data);
                            $('#ajaxdataoffer').html(data);
                        }
                    });
                }
            });
        });

        $(document).ready(function () {
            $('#continentid').on('change', function(e) {
                console.log(e);
                var continentid = e.target.value;

                $.get('/admin/package/findcountry/' + continentid, function (data) {
                    console.log(data);
                    $('#countryid').empty();
                    //$('#success').html(data);

                    $('#countryid').append('<option value="0" disable="true" selected="true">=== Select Country ===</option>');

                    $.each(data, function (index ,countryidObj) {
                        $('#countryid').append('<option value="' + countryidObj.id + '">' + countryidObj.name + '</option>');
                    })
                });
            });

            $('#countryid').on('change', function(e) {

                console.log(e);
                var country = e.target.value;

                $.get('/admin/package/findspots/' + country, function (data) {
                    console.log(data);
                    $('#spots').empty();
                    //$('#success').html(data);

                    $('#spots').append('<option value="0" disable="true" selected="true">=== Select Country ===</option>');

                    $.each(data, function (index ,spotsObj) {
                        $('#spots').append('<option value="' + spotsObj.id + '">' + spotsObj.name + '</option>');
                    })
                });

            });

        });

    </script>
@endsection
