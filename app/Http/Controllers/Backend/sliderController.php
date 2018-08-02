<?php

namespace App\Http\Controllers\backend;

use App\slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderinfo = slider::select('id','title','image','status')->get();
        return view('backend.slider.manage_slider',compact('sliderinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create_slider');
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
            'subtitle'=>'required',
            'body'=>'required',
            'filename' => 'required',
            'status'=>'required',

        ]);

        $sliderimage = $request->file('filename');
        $name = time().'.'.$sliderimage->getClientOriginalExtension();



        $uploadPath ='slideimage/';

        $sliderimage->move( $uploadPath, $name);

        $imgUrl = $uploadPath.$name;

        $sliderinfo = new slider();
        $sliderinfo->title = $request->title;
        $sliderinfo->subtitle = $request->subtitle;
        $sliderinfo->body = $request->body;
        $sliderinfo->image = $imgUrl;
        $sliderinfo->status = $request->status;
        $sliderinfo->save();
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
        $sliderbyid = slider::where('id',$id)->first();
        return view('backend.slider.edit_slider',compact('sliderbyid'));
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
        $sliderimage = $request->file('filename');
        if (!empty($sliderimage)) {
            $name = time().'.'.$sliderimage->getClientOriginalExtension();
            $uploadPath ='slideimage/';
            $sliderimage->move( $uploadPath, $name);
            $imgUrl = $uploadPath.$name;
            $sliderinfo = new slider();
            $sliderinfo = slider::find($id);
            $sliderinfo->title = $request->title;
            $sliderinfo->subtitle = $request->subtitle;
            $sliderinfo->body = $request->body;
            $sliderinfo->image = $imgUrl;
            $sliderinfo->status = $request->status;
            $sliderinfo->save();
            return back()->with('success', 'Your images has been successfully');

            } else{

            $sliderinfo = new slider();
            $sliderinfo = slider::find($id);
            $sliderinfo->title = $request->title;
            $sliderinfo->subtitle = $request->subtitle;
            $sliderinfo->body = $request->body;

            $sliderinfo->status = $request->status;
            $sliderinfo->save();
            return back()->with('success', 'Your images has been successfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $sliderbyid= slider::find($id);
      $unlinkimage = $sliderbyid->image;
      unlink( $unlinkimage);
        $sliderbyid->delete();
        return redirect()->back();
    }
}
