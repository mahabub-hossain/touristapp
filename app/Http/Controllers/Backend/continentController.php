<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\continent;
use Illuminate\Support\Facades\Redirect;
class continentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $continents = continent::all();
        return view('backend.homecontinent.manage_continent',compact('continents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.homecontinent.create_contenent');
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
            'continentname'=>'required|unique:continents',
            'continentslug'=>'required',
         ]);

        $continent = new continent();
        $continent->continentname = $request->continentname;
        $slug = str_replace(' ','-',$request->continentslug);
        $continent->continentslug = $slug;
        $continent->save();
        return Redirect::to('admin/continent/create');
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
        $mycontinent = continent::find($id);
        return view('backend.homecontinent.edit_continent',compact('mycontinent'));

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

            'continentname'=>'required',
            'continentslug'=>'required',
        ]);
        $mycontinent = continent::find($id);
        $mycontinent->continentname= $request->continentname;
        $slug = str_replace(' ','-',$request->continentslug);
        $mycontinent->continentslug = $slug;
        $mycontinent->save();
        return Redirect::to('admin/continent');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        continent::where('id',$id)->delete();
        //return Redirect::to('/admin/role');
        return redirect()->back();
    }
}
