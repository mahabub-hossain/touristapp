@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">

                    {!! Form::open(['url' => 'admin/menu/storesubmenu','method'=>'post']) !!}
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>SubMenu Name</b></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="submenuname" placeholder="Sub menu name">
                    </div>
                    <div class="form-group">
                        <label for="continent_id"><b>Select Menu</b></label>
                        <select class="form-control" id="menu" name="menu">
                            <option>-- select One --</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" @if(old('menu')&&old('menu')== $menu->id)
                                selected='selected' @endif >{{$menu->menuname }}</option>
                                {{--<option value="{{$mycontinent->id}}">{{ $mycontinent->name}}</option>--}}
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>SubMenu Link</b></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="link" placeholder="Sub menu link">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!--col-->
    </div><!--row-->
@endsection
