@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <h5 class="card-header">Tourist Spots Fields</h5>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.offers.update',$offerbyid->id],'method'=>'post','enctype'=>'multipart/form-data']) !!}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Offers Title</b></label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$offerbyid->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Offer slug</b></label>
                        <input type="text" name="offerslug" class="form-control" id="exampleFormControlInput1" value="{{$offerbyid->offerslug}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>Offers Amount</b></label>
                        <input type="text" name="offeramount" class="form-control" id="exampleFormControlInput1" value="{{$offerbyid->offeramount}}">
                    </div>

                    <div class="form-group">
                            <label for="exampleFormControlInput1"><b>Number of person</b></label>
                            <input type="text" name="person" class="form-control" id="exampleFormControlInput1" value="{{$offerbyid->person}}">
                        </div>

                        <div class="form-group">
                            <?php
                                 $daynight = explode('-', $offerbyid->day);
                               ?>

                             <label for="exampleFormControlInput1"><b>Day and Night</b></label>
                             <div class="form-row">
                               <div class="col">
                                  <input type="text" name="daycount" class="form-control" value="{{ $daynight[0]}}">
                                </div>
                                <div class="col">
                                  <input type="text" name="nightcount" class="form-control" value="{{$daynight[1]}}">
                                </div>
                              </div>

                            
                           
                        </div>

                    <div class="form-group">
                        <label for="continent_id"><b>Select Package</b></label>
                        <select class="form-control" id="continent_id" name="package_id">
                            <option>--select one--</option>
                            @foreach($packagesinfo as $package)
                                <option value="{{$package->id }}"  @if($package->id==$offerbyid->package_id)
                                selected='selected' @endif >{{ $package->packagename}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="checkbox">
                        <label for="exampleFormControlInput1"><b>Is Highlighted ?</b></label><br>
                        <label><input type="radio"  name="ishighlightedoffer" value="1" @if($offerbyid->ishighlightedoffer == 1) checked @endif> Yes</label><br>
                        <label><input type="radio"  name="ishighlightedoffer" value="2" @if($offerbyid->ishighlightedoffer == 2) checked @endif> No</label><br>
                  </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div> 
        </div><!--col-->
    </div><!--row-->
@endsection
