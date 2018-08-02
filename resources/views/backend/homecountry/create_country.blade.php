@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Country Options</h5>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.country.store','method'=>'post','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label for="exampleFormControlInput1"><b>Country Name</b></label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                        </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Slug Nmae</b></label>
                        <input type="text" name="slug" class="form-control" id="exampleFormControlInput1" placeholder="Ex:Bangladesh">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Capital Name</b></label>
                        <input type="text" name="capital" class="form-control" id="exampleFormControlInput1" placeholder="Capital">
                    </div>

                        <div class="form-group">
                            <label for="continent_id"><b>Select Continent</b></label>
                            <select class="form-control" id="continent_id" name="continent_id">
                                <option>-- select One --</option>
                                @foreach($mycontinents as $mycontinent)
                                    <option value="{{ $mycontinent->id }}" @if(old('continent_id')&&old('continent_id')== $mycontinent->id)
                                    selected='selected' @endif >{{$mycontinent->continentname }}</option>
                                @endforeach
                          </select>
                        </div>

                         <div class="form-group">
                            <label for="description"><b>Description</b></label>
                            <textarea class="form-control" id="description" name="description" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tourguide"><b>Tour Guides</b></label>
                            <textarea class="form-control" id="tourguide" name="tourguide" ></textarea>
                        </div>
                    <div class="form-group">
                        <label for="benifit"><b>Benifits</b></label>
                        <textarea class="form-control" id="benifit" name="benifit"></textarea>
                    </div>
                    <div class="form-group wrap control-group" >
                        <input type="file" name="filename[]" class="form-control"><br>

                    </div>
                    <a href="javascript:void(0);" class="add_button" style="background: #28d19c;
                                                                    padding: 8px 21px;
                                                                    color: #fff;
                                                                    border-radius: 8%;text-decoration: none;">Add Image</a><br><br>


                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Latitude</b></label>
                        <input type="text" name="lat" class="form-control" id="exampleFormControlInput1" placeholder="latitude">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Longitude</b></label>
                        <input type="text" name="long" class="form-control" id="exampleFormControlInput1" placeholder="longitude">
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
            var maxField =4; //Input fields increment limitation
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
        });

    </script>
@endsection
