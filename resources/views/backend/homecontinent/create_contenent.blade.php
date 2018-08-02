@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">

                    {!! Form::open(['route' => 'admin.continent.store','method'=>'post']) !!}
                        <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Continent Name</b></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="continentname" placeholder="Title">
                        </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Slug Name</b></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="continentslug" placeholder="slug">
                    </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!--col-->
    </div><!--row-->
@endsection
