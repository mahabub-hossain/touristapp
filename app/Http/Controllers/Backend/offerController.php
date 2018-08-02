<?php

namespace App\Http\Controllers\backend;

use App\offer;
use App\package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class offerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offersinfo = offer::all();
        return view('backend.offers.manage_offer',compact('offersinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packagesinfo = package::select('id','packagename','packageprice')->get();
        return view('backend.offers.create_offer',compact('packagesinfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    

        $packageid = $request->package_id;
        $packagesinfo = package::select('id','packagename','packageprice')->where('id',$packageid)->first();
        $offers = new offer();
        $offers->name=$request->name;
        $slug = str_replace(' ','-',$request->offerslug);
        $offers->offerslug = $slug;                        
        $offers->offeramount= $request->offeramount;
      
         $packagevalue = $packagesinfo->packageprice;
         $discount = (100-$request->offeramount)*$packagevalue/100;
       
        $offers->day = $request->daycount.'-'.$request->nightcount;
         $offers->person =  $request->person;
        $offers->package_id=$request->package_id;
        $offers->discount= $discount;
        $offers->ishighlightedoffer=$request->ishighlightedoffer;
        $offers->save();
        return back()->with('success', 'Your Offers has been successfully');
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
        $packagesinfo = package::select('id','packagename')->get();
        $offerbyid = offer::where('id',$id)->first();
        return view('backend.offers.edit_offer',compact('packagesinfo','offerbyid'));
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
       $packageid = $request->package_id;
        $packagesinfo = package::select('id','packagename','packageprice')->where('id',$packageid)->first();
        $offers = new offer();
        $offers = offer::find($id);
        $offers->name=$request->name;
        $slug = str_replace(' ','-',$request->offerslug);
        $offers->offerslug = $slug;
        $offers->offeramount=$request->offeramount;
         $offers->day = $request->daycount.'-'.$request->nightcount;
         $offers->person =  $request->person;
        $packagevalue = $packagesinfo->packageprice;
        $discount =(100-$request->offeramount)*$packagevalue/100;
        $offers->package_id=$request->package_id;
        $offers->discount= $discount;
        $offers->ishighlightedoffer=$request->ishighlightedoffer;
        $offers->save();
        return back()->with('success', 'Your Offers has been successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offerbyid= offer::find($id);
        $offerbyid->delete();
        return redirect()->back();
    }
}
