<?php

namespace App\Http\Controllers\backend;

use App\image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class imageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.allimages.insert_image');
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

            'file'=>'required',
            'status'=>'required',

        ]);

        if ($request->hasFile('file')){
            $allowedfileExtension=['pdf','jpg','png','docx'];
            //return $request->all();
            foreach ($request->file as $file){
                $filename = time().'.'.$file->getClientOriginalName();
                $extension = time().'.'.$file->getClientOriginalExtension();

                $image = new image();
                $file->storeAs('public/upload', $filename);
                $image->path =  $filename;
                $image->status = $request->status;
                $image->save();
                //$image->image()->sync($request->countryimages);
            }
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
