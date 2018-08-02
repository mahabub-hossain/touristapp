@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">

                    <table id="offertable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="10%">Serial No</th>
                            <th width="20%">Name</th>
                            <th width="10%">Offeramount</th>
                             <th width="20%">After discount</th>
                            <th width="20%">Is highlighted</th>
                            <th width="20%">Option</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offersinfo as $offer)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$offer->name}}</td>
                                <td >{{$offer->offeramount}}%</td>
                                <td>${{$offer->discount}}</td>
                                <td><?php if ($offer->ishighlightedoffer == 1){ echo"highlighted";} else{echo 'nothighlighted';}?></td>
                                <td><a href="{{route('admin.offers.edit',$offer->id)}}" class="btn btn-sm btn-success "><i class="fa fa-edit"></i></a>
                                    <form id="delete-form-{{$offer->id }}" method="post" action="{{ route('admin.offers.destroy',$offer->id) }}" style="display: none">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                            if(confirm('Are you sure, You Want to delete this?'))
                                            {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$offer->id }}').submit();
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
    var table = $('#offertable').DataTable();
  });
</script>
@endsection
