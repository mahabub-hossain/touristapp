@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Slider Fields</h5>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.slider.update',$sliderbyid->id],'method'=>'post','enctype'=>'multipart/form-data']) !!}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Slider Title</b></label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$sliderbyid->title}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Slider Subitle</b></label>
                        <input type="text" name="subtitle" class="form-control" id="exampleFormControlInput1" value="{{$sliderbyid->subtitle}}">
                    </div>


                    <div class="form-group">
                        <label for="description"><b>Body</b></label>
                        <textarea class="form-control" id="description" name="body" rows="4">{{$sliderbyid->body}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Link</b></label>
                        <input type="text" name="link" class="form-control" id="exampleFormControlInput1" {{$sliderbyid->link}}>
                    </div>
                    <div class="form-group control-group" >
                        <input type="file" name="filename" class="form-control">
                        <br>
                        <span>
                            <img src="{{Image::url($sliderbyid->image,500,200,array('crop',))}}" >
                        </span>
                    </div>
                    <div class="checkbox">
                        <label for="exampleFormControlInput1"><b>Check Type</b></label><br>
                        <label><input type="checkbox" class="checkbox" name="status" value="1" @if($sliderbyid->status == 1) checked @endif> Home</label><br>

                        <label><input type="checkbox" class="checkbox" name="status" value="2"  @if($sliderbyid->status == 2) checked @endif> City</label><br>

                        <label><input type="checkbox" class="checkbox" name="status" value="3" @if($sliderbyid->status == 3) checked @endif > Destination</label>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!--col-->
    </div><!--row-->
@endsection
