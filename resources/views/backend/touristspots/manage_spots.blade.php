@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">

                    <table id="spottable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="10%">Serial No</th>
                            <th   width="10%">Name</th>
                            <th  width="40%">Images</th>
                            <th  width="20%">Travel Guide</th>
                            <th  width="20%">Options</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($touristspots as $touristspot)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td >{{$touristspot->name}}</td>

                                <td >

                                    <?php
                                    $jsonString = $touristspot->imageids;
                                    $decoded = json_decode($jsonString, true);
                                    if(!NULL){
                                    if(is_array($decoded) || is_object($decoded)){
                                    foreach ($decoded as $value){ ?>
                                    <img src="{{Image::url('/images/'.$value,50,50,array('crop',))}}" >
                                    <?php }
                                    }
                                    }
                                    ?>
                                </td>
                                <td > {!! str_limit($touristspot->tourguide, $limit =70, $end = '...')!!}</td>
                                <td>
                                    <a href="{{route('admin.touristspot.edit',$touristspot->id)}}" class="btn btn-sm btn-success "><i class="fa fa-edit"></i></a>
                                    {{--<a href="{{route('admin.touristspot.destroy',$touristspot->id)}}" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></a>--}}
                                    <form id="delete-form-{{ $touristspot->id }}" method="post" action="{{ route('admin.touristspot.destroy',$touristspot->id) }}" style="display: none">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                            if(confirm('Are you sure, You Want to delete this?'))
                                            {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $touristspot->id }}').submit();
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

  <script>
  $(document).ready(function () {
    $.noConflict();
    var table = $('#spottable').DataTable();
  });
</script>
@endsection
