<?php

namespace App\Http\Controllers\frontend;

use App\continent;
use App\country;
use App\offer;
use App\package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;


use App\slider;
use App\touristspot;
use DB;
class homemainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {





$route = Route::current();
print_r($route);exit;

//        $name = $route->getName();
//        echo $name.'<br>';
//        $actionName = $route->getActionName();
//        echo $actionName.'<br>'; exit();

          //return view('frontend.includes.single.single_header',compact('menuList'));


//       $continents = continent::select('id', 'continentname')->get();
//        $offerspack = DB::table('offers')
//            ->leftJoin('packages', 'offers.package_id', '=', 'packages.id')
//            ->where('offers.ishighlighted','=',1)
//            ->take(3)
//            ->get();
//       $countries = country::select('id', 'name','continent_id')->get();
//
//       $sliderinfo = slider::all();
//        $packagecount = package::select('id','packageimages')->get();
//
//
//       return view
//            ('frontend.homemain.homecontent',
//           compact('sliderinfo','countries','continents','offerspack',
//               'packagecount7','packagecount'));

    }
    // public function mapshow(){
    //     return view('frontend.homemain.mapa_test');
    // }

    public function winterpackage()
    {
        $winterpackages = package::where('ishighlighted', '=', 1)->paginate(3);
        return view('frontend.homemain.winter_package', compact('winterpackages'));

    }

    public function single(country $slug)
    {
        $id = $slug->id;
        $name = $slug->name;
        $touristspots = touristspot::where('country_id', $id)->take(3)->get();

        $cities = DB::table('list_cities')
            ->leftJoin('list_states', 'list_cities.state_id', '=', 'list_states.id')
            ->leftJoin('list_countries', 'list_countries.id', '=', 'list_states.country_id')
            ->where('list_countries.countryname', '=', $name)
            ->get();




        return view('frontend.homemain.single_country', compact('slug', 'touristspots','cities'));
    }

    public function singlespot(touristspot $spotslug)
    {
         $id = $spotslug->id;
//        var_dump($spotslug);
//        exit();
//         $countryname = DB::select('select countries.name,touristspots.id
//                                     from touristspots
//                                     LEFT JOIN countries
//                                     ON countries.id = touristspots.country_id WHERE touristspots.id = ."$id".');

//        $cities = DB::table('touristspots')
//            ->leftJoin('countries', 'countries.id', '=', 'touristspots.country_id')
//            ->where('touristspots.id ', '=', $id)
//           ->first();
//
//
//         var_dump($cities);
//         exit();
//            $name = $countryname->name;
//            $cities = DB::table('list_cities')
//            ->leftJoin('list_states', 'list_cities.state_id', '=', 'list_states.id')
//            ->leftJoin('list_countries', 'list_countries.id', '=', 'list_states.country_id')
//            ->where('list_countries.countryname', '=', $name)
//            ->get();
        $packagebyspot = package::where('tourist_spotsid', $id)->take(3)->get();
        return view('frontend.homemain.single_spot', compact('spotslug', 'packagebyspot'));

    }

    public function singelpackage(offer $offerslug)
    {

       $id = $offerslug->id;

       //$packageinfo = package::all();
       $offer = offer::with('package', 'package.program')
                 ->where('offers.id','=',$id)
                   ->first();
       //print_r($offer);exit();
        $singleofferpackagebyid = DB::table('packages')
            ->leftJoin('offers', 'offers.package_id', '=', 'packages.id')
            ->where('offers.id', '=', $id)
            ->first();

        $otherofferpackages = DB::table('packages')
            ->leftJoin('offers', 'offers.package_id', '=', 'packages.id')
            ->where('offers.ishighlightedoffer','=',0)
           ->limit(3)
            ->get();
        return view('frontend.homemain.single_package', compact('singleofferpackagebyid', 'otherofferpackages','offer'));
    }

    public function singelrealpackage(package $packageslug)
    {
//        $packagename = urldecode($packagename);
//        return $packagename;

//        var_dump($packagename);
//        die();
//        $singlerealpackage = DB::table('packages')
//            ->where('packages.id', $id)
//            ->first();
        $otherpackages = DB::table('packages')
            ->take(3)
            ->get();
        return view('frontend.homemain.single_realpackage', compact('packageslug', 'otherpackages'));
    }


    public function viewallpackages()
    {
        $allofferpackages = DB::table('offers')
            ->leftJoin('packages', 'offers.package_id', '=', 'packages.id')
            ->paginate(3);
        $countries = DB::table('countries')
            ->select('id', 'name')
            ->get();

        return view('frontend.homemain.all_packages', compact('allofferpackages', 'countries','offerspack'));
    }


    public function viewallcontinents()
    {

        $continentimage = DB::select('SELECT t1.*
                                            FROM(
                                            
                                            SELECT 	con.id, con.continentname,con.continentslug, c.id AS countryid, c.`imageids`
                                            FROM `countries` AS c
                                            LEFT JOIN `continents` AS con ON c.continent_id = con.id
                                            ORDER BY RAND()
                                            
                                            ) AS t1
                                            GROUP BY t1.id');
        return view('frontend.homemain.all_continent', compact('countriesinfo', 'continents', 'continentimage'));
    }

    public function countrybycontinent( continent $continentslug)
    {
        $id = $continentslug->id;

        $countriesbycontinent = DB::table('continents')
            ->leftJoin('countries', 'countries.continent_id', '=', 'continents.id')
            ->where('countries.continent_id', $id)
            ->take(6)
            ->get();
        return view('frontend.homemain.countryby_continents', compact('countriesbycontinent'));

    }

    public function allpackages()
    {

        $allofferpackages = DB::table('packages')
            ->paginate(5);
        $allcountry = country::select('id', 'name')->get();
        return view('frontend.homemain.all_real_packages', compact('allofferpackages', 'allcountry'));
    }

    public function allcountries()
    {

        $allcountriesinfo = country::select('id', 'name', 'description', 'imageids')->paginate(6);
        return view('frontend.homemain.all_country', compact('allcountriesinfo'));
    }

    public function search($id)
    {

        $data = DB::table('packages')
            //->leftJoin('offers', 'packages.id', '=', 'offers.package_id')
            ->where('packages.countryid', '=', $id)
            ->get();
        return response()->json($data);

    }

    public function searchoffer($id)
    {

        $data = DB::table('offers')
            ->leftJoin('packages', 'packages.id', '=', 'offers.package_id')
            ->where('packages.countryid', '=', $id)
            ->get();
        return response()->json($data);

    }

    public function slidersearch($min, $max)
    {

        $data = DB::table('packages')
            ->whereBetween('packageprice', [$min, $max])
            ->get();
        $result = '';

        if ($data) {

            foreach ($data as $value) {
                $jsonString = $value->packageimages;
                $decoded = json_decode($jsonString, true);
                if (!NULL) {
                    if (is_array($decoded)) {
                        $rand_keys = array_rand($decoded, 2);
                        $result .= '<div class="col-xs-12" >
                            <div class="media packagesList">
                             <a class="media-left fancybox-pop" href="/package/'.str_slug($value->packageslug,'-').'">
                             <img src="/images/'.$decoded[$rand_keys[1]].'" style = "height:190px !important;"></a>
                                   <div class="media-body"> 
                                     <div class="bodyLeft">
                                      <h4 class="media-heading"><a href="/package/'.$value->packageslug.'">'.$value->packagename.'</a></h4>
                                        <div class="countryRating">
                                           <span>Asia</span>
                                            <ul class="list-inline rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        
                                        <p>' . str_limit($value->description, $limit = 20, $end = '...') . '</p><ul class="list-inline detailsBtn">
                                            <li><span class="textInfo"><i class="fa fa-calendar" aria-hidden="true"></i> 27 jan, 2016</span></li>
                                            <li><span class="textInfo"><i class="fa fa-clock-o" aria-hidden="true"></i> 5 days</span></li>
                                        </ul>
                                    </div>
                                    <div class="bodyRight">
                                        <div class="bookingDetails">
                                            <h2>$'. $value->packageprice . '</h2>
                                            <p>Per Person</p>
                                            <a href="/package/'.str_slug($value->packageslug,'-').'" class="btn buttonTransparent clearfix">Details</a>
                                            <a data-toggle="modal" data-target="#inquiryModal" href="#" class="btn buttonTransparent">Inquiry</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>';
                    }
                  }
                }
                echo $result;


            }

     }

     public function offerslidersearch($min, $max){

         $data = DB::table('offers')
             ->leftJoin('packages', 'offers.package_id', '=', 'packages.id')
             ->whereBetween('offers.discount', [$min, $max])
             ->get();

         $result = '';

         if ($data) {

             foreach ($data as $value) {


                 $jsonString = $value->packageimages;
                 $decoded = json_decode($jsonString, true);
                 if (!NULL) {
                     if (is_array($decoded)) {
                         $rand_keys = array_rand($decoded, 2);
                         $result .= '<div class="col-lg-4 col-sm-6 col-xs-12"><div class="thumbnail deals packagesPage">
                                <img src="/images/'.$decoded[$rand_keys[1]].'" style = "height:190px !important;"><a class="pageLink" href="/offerpackage/'.str_slug($value->offerslug,'-').'"></a>
                  <div class="discountInfo">
                    <div class="discountOffer">
                      <h4>' . $value->offeramount . '%<span>OFF</span>
                      </h4>
                    </div>
                    <ul class="list-inline rating homePage">
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    </ul>
                    <ul class="list-inline duration">
                      <li>7 days</li>
                      <li>15 hrs</li>
                      <li>15 min</li>
                    </ul>
                  </div>
                  <div class="caption">
                  <h4><a href="/offerpackage/'. str_slug($value->offerslug,'-').'">'.$value->name.'</a></h4>
                    <p>'.str_limit($value->description, $limit = 20, $end = '...').'</p>
                    <div class="detailsInfo">
                      <h5>
                        <span>Start From</span>$' . $value->discount . '</h5>
                      <ul class="list-inline detailsBtn">
                        <li><a data-toggle="modal" data-target="#inquiryModal" href="#" class="btn buttonTransparent">Booknow</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>';
                     }
                 }
             }
             echo $result;
         }
     }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
