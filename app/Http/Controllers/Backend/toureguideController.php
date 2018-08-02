<?php

namespace App\Http\Controllers\backend;

use App\continent;
use App\country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\touristspot;
use Illuminate\Support\Facades\Redirect;
use DB;
class toureguideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $touristspots = touristspot::all();
        return view('backend.touristspots.manage_spots',compact('touristspots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $continents = continent::select('id','continentname')->get();

        return view('backend.touristspots.create_touristspot',compact('continents'));

    }

  public function findtouristcountry($id){
      $data = country::where('continent_id','=',$id)->select('id', 'name')->get();
      return response()->json($data);
  }

  public function findcities($country){

      $data= DB::table('list_cities')
          ->leftJoin('list_states', 'list_cities.state_id', '=', 'list_states.id')
          ->leftJoin('list_countries', 'list_countries.id', '=', 'list_states.country_id')
          ->where('list_countries.countryname', '=',$country)
          ->get();

      return response()->json($data);

  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required',
            'lat'=>'required',
            'long'=>'required',
            'spotslug'=>'required',
            'description'=>'required',
            'tourguide'=>'required',
            'continentid'=>'required',
            'country_id'=>'required',
            'city'=>'required',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'


        ]);
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=time() . '.' .$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $data[] = $name;
            }
        }

        $tourspot = new touristspot();
        $tourspot->name = $request->name;
        $tourspot->lat = $request->lat;
        $tourspot->long = $request->long;
        $slug = str_replace(' ','-',$request->spotslug);
        $tourspot->spotslug = $slug;
        $tourspot->country_id = $request->country_id;
        $tourspot->continent_id = $request->continentid;
        $tourspot->city = $request->city;
        $tourspot->imageids=json_encode($data);
        $tourspot->description = $request->description;
        $tourspot->tourguide = $request->tourguide;
        $tourspot->save();
        return Redirect::to('admin/touristspot/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $touristspotbyId = touristspot::where('id',$id)->first();

        $countries = country::all();
        $continents = continent::all();


        return view('backend.touristspots.edit_spots',compact('touristspotbyId','countries','continents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name'=>'required',
            'description'=>'required',
            'tourguide'=>'required',


        ]);
        $oldimage = touristspot::where('id',$id)->select('imageids')->first();

        $oldImages = json_decode($oldimage->imageids);


        $touristimage = $request->file('filename');
        if (!empty($touristimage)) {

            if($request->hasfile('filename'))
            {
                foreach( $touristimage as $image)
                {
                    $name=time() . '.' .$image->getClientOriginalName();
                    $image->move(public_path().'/images/', $name);
                    $data[] = $name;
                }
            }
            $allImages = array_merge( $oldImages , $data);

            $tourspot = new touristspot();
            $tourspot = touristspot::find($id);
            $tourspot->name = $request->name;
            $tourspot->lat = $request->lat;
            $tourspot->long = $request->long;
            $slug = str_replace(' ','-',$request->spotslug);
            $tourspot->spotslug = $slug;
            $tourspot->country_id = $request->country_id;
            $tourspot->continent_id = $request->continent_id;
            //$tourspot->city = $request->city;
            $tourspot->imageids=json_encode($allImages);
            $tourspot->description = $request->description;
            $tourspot->tourguide = $request->tourguide;
            $tourspot->save();
            return Redirect::to('admin/touristspot');

        } else{

            $tourspot = new touristspot();
            $tourspot = touristspot::find($id);
            $tourspot->name = $request->name;
            $tourspot->country_id = $request->country_id;
            $tourspot->continent_id = $request->continent_id;
            //$tourspot->city = $request->city;
            $tourspot->description = $request->description;
            $tourspot->tourguide = $request->tourguide;
            $tourspot->lat = $request->lat;
            $tourspot->long = $request->long;
            $tourspot->save();
            return Redirect::to('admin/touristspot');
        }

    }

    public function deleteimage($id,$value){

        $spot= touristspot::find($id);
        $images=json_decode($spot->imageids);
        $new = [];
        foreach ($images as $image){

            if ($value != $image){
                $new[] = $image;
            }

        }

        $spot->imageids =json_encode($new);
        $data = $spot->imageids;

        $result = '';
        $decoded = json_decode($data, true);
        foreach ($decoded as $value) {
            $result .= '<div class="form-group  delDiv control-group">
                                <img src="http://localhost:8000/images/'.$value.'" width="150px" height="70px"><br><br>
                                <input type="hidden" class="countryid" value="'.$id.'">
                                <input type="hidden" class="singleimage" value="'.$value.'"><br>
                                <button class="deleteimg"  style="background:red;
                                                        padding: 8px 21px;
                                                        color: #fff;
                                                        border-radius: 8%;text-decoration: none;">Delete</button>
                            </div>';
        }
        $spot->save();
        echo $result;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tourspotsbyid = touristspot::find($id);
        $unlinkimage = $tourspotsbyid->imageids;
        $decoded = json_decode($unlinkimage,true);
        if(!NULL){
            if(is_array($decoded) || is_object($decoded)){
                foreach ($decoded as $value){
                    var_dump($value);
                    unlink('images/'.$value);
                }

            }
        }
        $tourspotsbyid->delete();
        return redirect()->back();

    }
}
