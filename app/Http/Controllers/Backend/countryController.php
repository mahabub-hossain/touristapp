<?php

namespace App\Http\Controllers\backend;
use Symfony\Component\HttpFoundation\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\continent;
use App\country;
use App\countryimage;
use Illuminate\Support\Facades\Redirect;
class countryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryinfo = country::all();

        return view('backend.homecountry.manage_country',compact('countryinfo'));}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mycontinents = continent::all();
       return view('backend.homecountry.create_country',compact('mycontinents'));
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

            'title'=>'required',
            'slug'=>'required',
            'continent_id'=>'required',
            'description'=>'required',
            'tourguide'=>'required',
            'benifit'=>'required',
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

        $country = new country();
        $country->imageids=json_encode($data);
        $country->name = $request->title;
        $country->capital = $request->capital;
        $country->lat = $request->lat;
        $country->long = $request->long;
        $slug = str_replace(' ','-',$request->slug);
        $country->slug = $slug;
        $country->continent_id = $request->continent_id;
        $country->description = $request->description;
        $country->tourguide = $request->tourguide;
        $country->benifit = $request->benifit;
        $country->save();
        return back()->with('success', 'Your images has been successfully');
        }

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

       $countrybyId = country::where('id',$id)->first();

      $mycontinent = continent::all();

       return view('backend.homecountry.edit_country',compact('countrybyId','mycontinent'));

    }


    public function update(Request $request, $id)
    {
      $oldimage = country::where('id',$id)->select('imageids')->first();

        $oldImages = json_decode($oldimage->imageids);

        $countryimage = $request->file('filename');
        if (!empty($countryimage)) {

            if($request->hasfile('filename'))
            {
              foreach($countryimage as $image)
                {
                    $name=time() . '.' .$image->getClientOriginalName();
                    $image->move(public_path().'/images/', $name);
                    $data[] = $name;
              }
            }

            $allImages = array_merge( $oldImages , $data);

            $country = new country();
            $country = country::find($id);
            $country->imageids=json_encode($allImages);
            $country->name = $request->title;
            $country->capital = $request->capital;
            $country->lat = $request->lat;
            $country->long = $request->long;
            $slug = str_replace(' ','-',$request->slug);
            $country->slug = $slug;
            $country->continent_id = $request->continent_id;
            $country->description = $request->description;
            $country->tourguide = $request->tourguide;
            $country->benifit = $request->benifit;

            $country->save();

            return back()->with('success', 'Your images has been successfully');

        } else{

            $country = new country();
            $country = country::find($id);
            $country->imageids = $country->imageids;
            $country->name = $request->title;
            $country->capital = $request->capital;
            $country->slug = $request->slug;
            $country->lat = $request->lat;
            $country->long = $request->long;
            $country->continent_id = $request->continent_id;
            $country->description = $request->description;
            $country->tourguide = $request->tourguide;
            $country->benifit = $request->benifit;

            $country->save();

            return back()->with('success', 'Your images has been successfully');
        }



    }


    public function deleteimage($id,$value){

        $country = country::find($id);
        $images=json_decode($country->imageids);
        $new = [];
          foreach ($images as $image){

              if ($value != $image){
                  $new[] = $image;
              }

          }

      $country->imageids =json_encode($new);
        $data = $country->imageids;

        $result = '';
        $decoded = json_decode($data, true);
            foreach ($decoded as $value) {
                $result .= '<div class="form-group delDiv control-group">
                                <img src="http://localhost:8000/images/'.$value.'" width="150px" height="70px"><br><br>
                          
                                <input type="hidden" class="singleimage" value="'.$value.'"><br>
                                <button class="deleteimg" style="background:red;
                                                        padding: 8px 21px;
                                                        color: #fff;
                                                        border-radius: 8%;text-decoration: none;">Delete</button>
                            </div>';
            }
        $country->save();
        echo $result;

    }

    public function destroy($id)
    {

      $countrybyid= country::find($id);
       $unlinkimage = $countrybyid->imageids;
       $decoded = json_decode($unlinkimage,true);
        if(!NULL){
        if(is_array($decoded) || is_object($decoded)){
        foreach ($decoded as $value){
            var_dump($value);
            unlink('images/'.$value);
           }

         }
    }
     $countrybyid->delete();
        return redirect()->back();
    }



}
