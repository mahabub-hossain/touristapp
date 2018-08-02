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
                            <th width="30%">Serial No</th>
                            <th width="30%">Name</th>
                            <th width="20%">Options Option</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($continents as $continent)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td >{{$continent->continentname}}</td>
                                <td><a href="{{route('admin.continent.edit',$continent->id)}}" class="btn btn-sm btn-success "><i class="fa fa-edit"></i></a>
                                    {{--<a href="{{route('admin.continent.delete',$continent->id)}}" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></a>--}}

                                    <form id="delete-form-{{$continent->id }}" method="post" action="{{ route('admin.continent.destroy',$continent->id) }}" style="display: none">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                            if(confirm('Are you sure, You Want to delete this?'))
                                            {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $continent->id }}').submit();
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
