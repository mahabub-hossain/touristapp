@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">

                    <table id="countrydata" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="10%">Serial No</th>
                            <th width="10%">Name</th>
                            <th width="20%">images</th>
                            <th width="30%">Travel Guide</th>
                            <th width="20%">Options</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($countryinfo as $country)
                      <tr>
                          <td>{{$loop->index +1}}</td>
                         <td >{{$country->name}}</td>
                          <td>
                           <?php
                           $jsonString = $country->imageids;
                           $decoded = json_decode($jsonString, true);
                             if(!NULL){
                              if(is_array($decoded) || is_object($decoded)){
                                   foreach ($decoded as $value){ ?>
                                   {{--<img src="{{url('/images/'.$value)}}" width="20px" height="20px">--}}
                                   <img src="{{Image::url('/images/'.$value,50,50,array('crop',))}}" >
                                              {{--//var_dump($value);--}}
                                          <?php }
                                      }
                                 }
                             ?></td>
                              <td > {!! str_limit($country->tourguide, $limit =90, $end = '...')!!}</td>
                               <td><a href="{{route('admin.country.edit',$country->id)}}" class="btn btn-sm   btn-success "><i class="fa fa-edit"></i></a>
                                   <form id="delete-form-{{ $country->id }}" method="post" action="{{ route('admin.country.destroy',$country->id) }}" style="display: none">
                                       {{ csrf_field() }}
                                       {{ method_field('DELETE') }}
                                   </form>
                                   <a href="" onclick="
                                       if(confirm('Are you sure, You Want to delete this?'))
                                       {
                                       event.preventDefault();
                                       document.getElementById('delete-form-{{ $country->id }}').submit();
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
        </div>
    </div>

<script>
  $(document).ready(function () {
    $.noConflict();
    var table = $('#countrydata').DataTable();
  });
</script>
@endsection

