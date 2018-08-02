@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    {!!Form::open(['route' => 'admin.image.store','method'=>'post','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label for="image">File upload</label>
                            <input type="file" id="image" name="file[]" multiple>
                       </div>

                        <div class="form-group">
                            <label for="continent_id"><b>Select Type</b></label>
                            <select class="form-control" id="status" name="status">
                                <option>-- select One --</option>
                                <option value="1" >Country</option>
                                <option value="2" >Spots</option>
                                <option value="1" >Package</option>




                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!--col-->
    </div><!--row-->
@endsection
