<?php

namespace App\Http\Controllers\backend;

use App\continent;
use App\package;
use App\program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\country;
use App\touristspot;
use DB;
class packageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packageinfo = package::all();
        return view('backend.packages.manage_package',compact('packageinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $country_id = Input::get('country_id');
        $continents = continent::select('id','continentname')->get();
       // $countries = country::all();
        //$data = touristspot::where('country_id','=',$country_id)->get();



        return view('backend.packages.create_packages',compact('continents'));

    }

    public function findcountry($id){

        $data = country::where('continent_id','=',$id)->select('id', 'name')->get();
        return response()->json($data);

     }

    public function findspots($id){
        $data = touristspot::where('country_id','=',$id)->select('id', 'name')->get();
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

//        print_r($request->all());
//        exit();
        $this->validate($request,[

            'name'=>'required',
            'lat'=>'required',
            'long'=>'required',
            'packageslug'=>'required',
            'countryid'=>'required',
            'continentid'=>'required',
            'touristspots_id'=>'required',
            'description'=>'required',
            'price'=>'required',
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

        $package = new package();

        $package->packagename = $request->name;
        $package->lat = $request->lat;
        $package->long = $request->long;
        $slug = str_replace(' ','-',$request->packageslug);
        $package->packageslug = $slug;
        $package->packageimages=json_encode($data);
        $package->countryid = $request->countryid;
        $package->continentid = $request->continentid;
        $package->tourist_spotsid = $request->touristspots_id;
        $package->description = $request->description;
        $package->packageprice = $request->price;
        $packageprice =$request->price;
        $children_package = (100-60)* $packageprice/100;
        $package->packageprice_child = $children_package;
        $package->ishighlighted = $request->ishighlighted;

        $package->save();
        $packageid = $package->id;

       foreach ($request->program as $key=>$val){
           $programs = new program();
           $package->id = $packageid;
           $programs->pro_title = $val['title'];
           $programs->pro_description =  $val['description'];
           $programs->pro_day =  $val['day'];
           $programs->package_id = $packageid;
           $programs->save();
       }


      return back()->with('success', 'Your images has been successfully');

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
        $packageinfobyid = package::where('id',$id)->first();
        $programs = program::where('package_id','=',$id)->get();

        $spots = touristspot::select('id','name')->get();
        $countryinfo = country::select('id','name')->get();
        $continents = continent::select('id','continentname')->get();

        return view('backend.packages.edit_package',compact('packageinfobyid','countryinfo','spots','continents','programs'));
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
        $oldimage = package::where('id',$id)->select('packageimages')->first();

        $oldImages = json_decode($oldimage->packageimages);
        $packageimage = $request->file('filename');
        if (!empty($packageimage)) {

            if ($request->hasfile('filename')) {
                foreach ($packageimage as $image) {
                    $name = time() . '.' . $image->getClientOriginalName();
                    $image->move(public_path() . '/images/', $name);
                    $data[] = $name;
                }
            }
            $allImages = array_merge( $oldImages , $data);
                $package = new package();
                 $package = package::find($id);
                $package->packagename = $request->name;
                $package->lat = $request->lat;
                $package->long = $request->long;
                $slug = str_replace(' ','-',$request->packageslug);
                $package->packageslug = $slug;
                $package->packageimages=json_encode($allImages);
                $package->countryid = $request->countryid;
                $package->continentid = $request->continentid;
                $package->tourist_spotsid = $request->touristspots_id;
                $package->description = $request->description;
                $package->packageprice = $request->price;
                $package->ishighlighted = $request->ishighlighted;
                $package->save();
                //$packageid = $package->id;

            $packageid = $package->id;

            $deletedRows=DB::table('programs')->where('package_id', '=', $packageid)->delete();
            //print_r($deletedRows);exit();


            foreach ($request->program as $key=>$val){
                $programs = new program();
                $package->id = $packageid;
                $programs->pro_title = $val['title'];
                $programs->pro_description =  $val['description'];
                $programs->pro_day =  $val['day'];
                $programs->package_id = $packageid;
                $programs->save();
            }

                return back()->with('success', 'Your images has been successfully');
            } else {

                $package = new package();
                $package = package::find($id);
                $package->packagename = $request->name;
                $package->countryid = $request->countryid;
                $package->continentid = $request->continentid;
                $package->tourist_spotsid = $request->touristspots_id;
                $package->description = $request->description;
                $package->packageprice = $request->price;
                $package->ishighlighted = $request->ishighlighted;
                $package->lat = $request->lat;
                $package->long = $request->long;
                $package->save();
                $packageid = $package->id;
                $deletedRows =DB::table('programs')->where('package_id', '=', $packageid)->delete();


              // print_r($deletedRows);exit();


               foreach ($request->program as $key=>$val){
                $programs = new program();
                $package->id = $packageid;
                $programs->pro_title = $val['title'];
                $programs->pro_description =  $val['description'];
                $programs->pro_day =  $val['day'];
                $programs->package_id = $packageid;
                $programs->save();
            }

                return back()->with('success', 'Your images has been successfully');

            }


        }
    public function deleteimage($id,$value){

        $package = package::find($id);
        $images=json_decode($package->packageimages);
        $new = [];
        foreach ($images as $image){

            if ($value != $image){
                $new[] = $image;
            }

        }

        $package->packageimages =json_encode($new);
        $data = $package->packageimages;

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
        $package->save();
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
       $packagebyid= package::find($id);
        $unlinkimage = $packagebyid->packageimages;
        $decoded = json_decode($unlinkimage,true);
        if(!NULL){
            if(is_array($decoded) || is_object($decoded)){
                foreach ($decoded as $value){
                    var_dump($value);
                    unlink('images/'.$value);
                }

            }
        }
        $packagebyid->delete();
        return redirect()->back();
      }
}
