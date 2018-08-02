@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Tourist Packages Fields</h5>
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.package.store','method'=>'post','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label for="exampleFormControlInput1"><b>Package Name</b></label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Title">
                        </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Package slug</b></label>
                        <input type="text" name="packageslug" class="form-control" id="exampleFormControlInput1" placeholder="slug">
                    </div>

                    <div class="form-group">
                        <label for="continent_id"><b>Select Continent</b></label>
                        <select class="form-control country" id="continentid" name="continentid">
                            <option value="0" disable="true" selected="true">--select one--</option>
                            @foreach($continents as $continent)
                                {{--<option value="{{$country->id}}">{{$country->name}}</option>--}}
                                <option value="{{ $continent->id }}" @if(old('continent_id')&&old('continent_id')== $continent->id)
                                selected='selected' @endif >{{$continent->continentname }}</option>
                            @endforeach

                        </select>
                    </div>

                        <div class="form-group">
                            <label for="continent_id"><b>Select Country</b></label>
                            <select class="form-control country" id="country" name="countryid">
                                <option value="0" disable="true" selected="true">--select one--</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="continent_id"><b>Select TouristSpots</b></label>
                            <select class="form-control tourspots" id="spots" name="touristspots_id">
                                <option  value="0" disable="true" selected="true">--select one--</option>


                            </select>
                        </div>
                    <div class="form-group wrap control-group" >
                        <input type="file" name="filename[]" class="form-control"><br>
                        <a href="javascript:void(0);" class="add_package_button" style="background: #28d19c;
                                                                    padding: 8px 21px;
                                                                    color: #fff;
                                                                    border-radius: 8%;text-decoration: none;">Add</a><br><br>
                    </div>
                        <div class="form-group">
                            <label for="description"><b>Description</b></label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
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

                    <div class="form-group">
                            <label for="exampleFormControlInput1"><b>Package Price</b></label>
                            <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Price">
                     </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Latitude</b></label>
                        <input type="text" name="lat" class="form-control" id="exampleFormControlInput1" placeholder="latitude">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Longitude</b></label>
                        <input type="text" name="long" class="form-control" id="exampleFormControlInput1" placeholder="longitude">
                    </div>
                    <div class="checkbox">
                        <label for="exampleFormControlInput1"><b>Is Highlighted ?</b></label><br>
                        <label><input type="radio" name="ishighlighted" value="1"> Yes</label><br>
                        <label><input type="radio"  name="ishighlighted" value="2"> No</label><br>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
        });


    $(document).ready(function () {
        var maxField =3; //Input fields increment limitation
        var addButton = $('.add_package_button'); //Add button selector
        var wrapper = $('.wrap'); //Input field wrapper
        var fieldHTML = '<div class="form-group control-group"><input type="file" name="filename[]" value="" class="form-control"/><br><a href="javascript:void(0);" class="remove_package_button" title="Remove field" style="background: #ed3610;\n' +
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
        $(wrapper).on('click', '.remove_package_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            $(this).img('src').empty();
            x--; //Decrement field counter
        });
    });


    $(document).ready(function () {
        $('#continentid').on('change', function(e) {
            console.log(e);
            var continentid = e.target.value;

            $.get('/admin/package/findcountry/' + continentid, function (data) {
                console.log(data);
                $('#country').empty();
                //$('#success').html(data);

                $('#country').append('<option value="0" disable="true" selected="true">=== Select Country ===</option>');

                $.each(data, function (index ,countryObj) {
                    $('#country').append('<option value="' + countryObj.id + '">' + countryObj.name + '</option>');
                })
            });
        });

        $('#country').on('change', function(e) {

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
