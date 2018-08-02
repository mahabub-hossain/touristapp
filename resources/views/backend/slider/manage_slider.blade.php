@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="10%">Serial No</th>
                            <th width="10%">Title</th>
                            <th width="20%">images</th>

                            {{--<th width="20%">Description</th>--}}
                            <th width="30%">Slider Type</th>
                            <th width="20%">Options</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliderinfo as $slider)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td >{{$slider->title}}</td>
                                <td>

                                   <img src="{{Image::url($slider->image,50,50,array('crop',))}}" >
                                  </td>
                                <td><?php
                                        if ($slider->status == 1){
                                            echo"Home main";
                                        } elseif ($slider->status == 2){
                                            echo"Home City";
                                        } else{
                                            echo"Destination";
                                        }

                                    ?></td>
                                <td><a href="{{route('admin.slider.edit',$slider->id)}}" class="btn btn-sm btn-success "><i class="fa fa-edit"></i></a>
                                    <form id="delete-form-{{ $slider->id }}" method="post" action="{{ route('admin.slider.destroy',$slider->id) }}" style="display: none">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                            if(confirm('Are you sure, You Want to delete this?'))
                                            {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $slider->id }}').submit();
                                            }
                                            else{
                                            event.preventDefault();
                                            }" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--col-->
    </div><!--row-->
@endsection
